<?php

namespace App\Models;

use App\Enums\EntityPropertiesPrefix;
use App\Http\Requests\EventRequest;
use App\Http\Requests\MassUpdateEventRequest;
use App\Http\Requests\UpdateEventBannerRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Services\ColorConvertorService;
use App\Services\PropertiesService;
use App\Services\UploadPhotoService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory, Searchable;

    protected $table = 'events';

    protected $dates = ['created_at'];

    protected $fillable = [
        'title',
        'description',
        'location',
        'time',
        'date',
        'banner',
        'video',
        'media',
        'tickets',
        'user_id',
        'link_id',
        'city',

        'event_animation',
        'animation_speed',
        'btn_text',
        'properties',
    ];

    public function searchableAs()
    {
        return 'events_index';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
        ];
    }

    /**
     * @field_prefix de_
     * @param UpdateEventRequest|EventRequest|Request $request
     * @param PropertiesService $propertiesService
     * @return void
     */
    public function setDesignEventProperties(UpdateEventRequest|EventRequest|Request $request, PropertiesService $propertiesService): void
    {
        $designProductFields = preg_grep("/^" . EntityPropertiesPrefix::Event ."/", array_keys($request->all()));
        foreach ($designProductFields as $field) {
            $propertiesService->addProperty($field, $request->$field);
        }
    }

    /**
     * @param User $user
     * @return string|null
     */
    public function getLastEventDesignFields(User $user): ?string
    {
        $event = Event::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        return $event->properties;
    }

    /**
     * Path to save photo for event
     *
     * @param int $id
     * @return string
     */
    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id . '/events/';
    }

    /**
     * Create new event
     *
     * @param User $user
     * @param EventRequest $request
     * @param UploadPhotoService $uploadService
     * @param PropertiesService $propertiesService
     * @return void
     */
    public function createEvent(User $user, EventRequest $request, UploadPhotoService $uploadService, PropertiesService $propertiesService): void
    {
        $this->setDesignEventProperties($request, $propertiesService);

        $lastEvent = Event::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        Event::create([
            'title'       => $request->title,
            'city'        => $request->city,
            'description' => $request->description,
            'location'    => $request->location,
            'time'        => $request->time,
            'date'        => Carbon::parse($request->date)->format('Y-m-d'),
            'banner'      => $uploadService->savePhoto(
                photo: $request->banner,
                path: $this->imgPath($user->id),
                size: 500
            ),
            'video'       => $request->video,
            'media'       => $request->media,
            'tickets'     => $request->tickets,
            'user_id'     => $user->id,
            'link_id'     => 1,

            //Props fields
            'event_animation' => $request->event_animation,
            'animation_speed' => $request->animation_speed,
            'btn_text' => isset($request->check_last_event) ? $lastEvent->btn_text : $request->btn_text,
            'properties' => isset($request->check_last_event) ? $this->getLastEventDesignFields($user) : serialize($propertiesService->getProperties()),
        ]);
    }

    public function editEventBanner(User $user, Event $event, UpdateEventBannerRequest $request, UploadPhotoService $uploadService)
    {
        Event::where('id', $event->id)->where('user_id', $user->id)->update([
            'banner'      => isset($request->banner) ?
                $uploadService->savePhoto(
                    photo: $request->banner,
                    path: $this->imgPath($user->id),
                    size: 500,
                    dropImagePath: $event->banner
                ) :
                $event->banner,
        ]);
    }

    /**
     * Update event
     *
     * @param User $user
     * @param Event $event
     * @param UpdateEventRequest $request
     * @param PropertiesService $propertiesService
     * @return void
     */
    public function editEvent(User $user, Event $event, UpdateEventRequest $request, PropertiesService $propertiesService)
    {
        $this->setDesignEventProperties($request, $propertiesService);

        Event::where('id', $event->id)->where('user_id', $user->id)->update([
            'description' => $request->description,
            'city'        => $request->city ?? $event->city,
            'location'    => $request->location ?? $event->location,
            'time'        => $request->time ?? $event->time,
            'date'        => Carbon::parse($request->date)->format('Y-m-d') ?? $event->date,
            'video'       => $request->video,
            'media'       => $request->media,
            'tickets'     => $request->tickets,
            'title' => $request->title,

            'event_animation' => $request->event_animation,
            'animation_speed' => $request->animation_speed,
            'btn_text' => $request->btn_text,
            'properties' => serialize($propertiesService->getProperties()),
        ]);
    }

    /**
     * Events mass edit
     *
     * @param User $user
     * @param MassUpdateEventRequest $request
     * @param PropertiesService $propertiesService
     * @return void
     */
    public function editAll(User $user, MassUpdateEventRequest $request, PropertiesService $propertiesService): void
    {
        $this->setDesignEventProperties($request, $propertiesService);

        Event::where('user_id', $user->id)->update([
            'properties' => serialize($propertiesService->getProperties()),
        ]);
    }

    /**
     * Delete event
     *
     * @param Event $event
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function dropEvent(Event $event, UploadPhotoService $uploadService)
    {
        $uploadService->deletePhotoFromFolder($event->banner);

        $event->delete();
    }
}
