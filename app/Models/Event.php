<?php

namespace App\Models;

use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Services\ColorConvertorService;
use App\Services\UploadPhotoService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory, Searchable;

    protected $table = 'events';

    public function searchableAs()
    {
        return 'events_index';
    }

    protected $dates = ['created_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
        ];
    }

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
        'location_font',
        'location_font_size',
        'location_font_color',
        'date_font',
        'date_font_size',
        'date_font_color',
        'transparency',
        'background_color_rgba',
        'background_color_hex',
        'event_animation',
        'event_round',
        'location_text_shadow_color',
        'location_text_shadow_blur',
        'location_text_shadow_bottom',
        'location_text_shadow_right',
        'date_text_shadow_color',
        'date_text_shadow_blur',
        'date_text_shadow_bottom',
        'date_text_shadow_right',
        'block_shadow',
        'bold_city',
        'bold_location',
        'bold_date',
        'bold_time',
    ];

    /**
     * Возвращает путь по которому сохраняются изображения для Event
     *
     * @param int $id
     * @return string
     */
    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id . '/events/';
    }

    /**
     * Добавление нового мероприятия
     *
     * @param int $id
     * @param EventRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function createEvent(int $id, EventRequest $request, UploadPhotoService $uploadService): void
    {
        $lastEvent = Event::where('user_id', $id)->orderBy('created_at', 'desc')->first();

        Event::create([
            'title'       => $request->title,
            'city'        => $request->city,
            'description' => $request->description,
            'location'    => $request->location,
            'time'        => $request->time,
            'date'        => $request->date,
            'banner'      => $uploadService->uploader(
                ph: $request->banner,
                path: $this->imgPath($id),
                size: 500
            ),
            'video'       => $request->video,
            'media'       => $request->media,
            'tickets'     => $request->tickets,
            'user_id'     => Auth::user()->id,
            'link_id'     => 1,

            'location_font'         => isset($request->check_last_event) ? $lastEvent->location_font : $request->location_font,
            'location_font_size'    => isset($request->check_last_event) ? $lastEvent->location_font_size : $request->location_font_size,
            'location_font_color'   => isset($request->check_last_event) ? $lastEvent->location_font_color : $request->location_font_color,
            'date_font'             => isset($request->check_last_event) ? $lastEvent->date_font : $request->date_font,
            'date_font_size'        => isset($request->check_last_event) ? $lastEvent->date_font_size : $request->date_font_size,
            'date_font_color'       => isset($request->check_last_event) ? $lastEvent->date_font_color : $request->date_font_color,
            'transparency'          => isset($request->check_last_event) ? $lastEvent->transparency : $request->transparency,
            'background_color_rgba' => isset($request->check_last_event) ? $lastEvent->background_color_rgba : ColorConvertorService::convertBackgroundColor($request->background_color_hex),
            'background_color_hex'  => isset($request->check_last_event) ? $lastEvent->background_color_hex : $request->background_color_hex,
            'event_animation'       => $request->event_animation,
            'event_round'           => isset($request->check_last_event) ? $lastEvent->event_round : $request->event_round,
            'location_text_shadow_color'  => isset($request->check_last_event) ? $lastEvent->location_text_shadow_color : $request->location_text_shadow_color,
            'location_text_shadow_blur'   => isset($request->check_last_event) ? $lastEvent->location_text_shadow_blur : $request->location_text_shadow_blur,
            'location_text_shadow_bottom' => isset($request->check_last_event) ? $lastEvent->location_text_shadow_bottom : $request->location_text_shadow_bottom,
            'location_text_shadow_right'  => isset($request->check_last_event) ? $lastEvent->location_text_shadow_right : $request->location_text_shadow_right,
            'date_text_shadow_color'      => isset($request->check_last_event) ? $lastEvent->date_text_shadow_color : $request->date_text_shadow_color,
            'date_text_shadow_blur'       => isset($request->check_last_event) ? $lastEvent->date_text_shadow_blur : $request->date_text_shadow_blur,
            'date_text_shadow_bottom'     => isset($request->check_last_event) ? $lastEvent->date_text_shadow_bottom : $request->date_text_shadow_bottom,
            'date_text_shadow_right'      => isset($request->check_last_event) ? $lastEvent->date_text_shadow_right : $request->date_text_shadow_right,
            'block_shadow'                => isset($request->check_last_event) ? $lastEvent->block_shadow : $request->block_shadow,
            'bold_city'     => isset($request->check_last_event) ? $lastEvent->bold_city : $request->bold_city,
            'bold_location' => isset($request->check_last_event) ? $lastEvent->bold_location : $request->bold_location,
            'bold_date'     => isset($request->check_last_event) ? $lastEvent->bold_date : $request->bold_date,
            'bold_time'     => isset($request->check_last_event) ? $lastEvent->bold_time : $request->bold_time,
        ]);
    }

    /**
     * Изменить мероприятие
     *
     * @param int $id
     * @param Event $event
     * @param Request $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function editEvent(int $id, Event $event, UpdateEventRequest $request, UploadPhotoService $uploadService)
    {
        Event::where('id', $event->id)->update([
            'title'       => isset($request->title) ? $request->title : $event->title,
            'description' => isset($request->description) ? $request->description : $event->description,
            'city'        => isset($request->city) ? $request->city : $event->city,
            'location'    => isset($request->location) ? $request->location : $event->location,
            'time'        => isset($request->time) ? $request->time : $event->time,
            'date'        => isset($request->date) ? $request->date : $event->date,
            'banner'      => isset($request->banner) ?
                $uploadService->uploader(
                    ph: $request->banner,
                    path: $this->imgPath($id),
                    size: 500,
                    drop: true,
                    dropImagePath: $event->banner
                ) :
                $event->banner,
            'video'       => $request->video,
            'media'       => $request->media,
            'tickets'     => $request->tickets,

            'location_font'         => isset($request->location_font) ? $request->location_font : $event->location_font,
            'location_font_size'    => $request->location_font_size,
            'location_font_color'   => $request->location_font_color,
            'date_font'             => isset($request->date_font) ? $request->date_font : $event->date_font,
            'date_font_size'        => $request->date_font_size,
            'date_font_color'       => $request->date_font_color,
            'transparency'          => $request->transparency,
            'background_color_rgba' => ColorConvertorService::convertBackgroundColor($request->background_color_hex),
            'background_color_hex'  => $request->background_color_hex,
            'event_animation'       => $request->event_animation,
            'event_round'           => $request->event_round,
            'location_text_shadow_color'  => $request->location_text_shadow_color,
            'location_text_shadow_blur'   => $request->location_text_shadow_blur,
            'location_text_shadow_bottom' => $request->location_text_shadow_bottom,
            'location_text_shadow_right'  => $request->location_text_shadow_right,
            'date_text_shadow_color'      => $request->date_text_shadow_color,
            'date_text_shadow_blur'       => $request->date_text_shadow_blur,
            'date_text_shadow_bottom'     => $request->date_text_shadow_bottom,
            'date_text_shadow_right'      => $request->date_text_shadow_right,
            'block_shadow'                => isset($request->block_shadow) ? $request->block_shadow : $event->shadow,
            'bold_city'     => $request->bold_city,
            'bold_location' => $request->bold_location,
            'bold_date'     => $request->bold_date,
            'bold_time'     => $request->bold_time,
        ]);
    }

    /**
     * Массовое изменение мероприятий
     *
     * @param int $id
     * @param Request $request
     * @return void
     */
    public function editAll(int $id, Request $request)
    {
        Event::where('user_id', $id)->update([
            'location_font'         => $request->location_font,
            'location_font_size'    => $request->location_font_size,
            'location_font_color'   => $request->location_font_color,
            'date_font'             => $request->date_font,
            'date_font_size'        => $request->date_font_size,
            'date_font_color'       => $request->date_font_color,
            'transparency'          => $request->transparency,
            'background_color_rgba' => ColorConvertorService::convertBackgroundColor($request->background_color_hex),
            'background_color_hex'  => $request->background_color_hex,
            'event_round'           => $request->event_round,
            'location_text_shadow_color'  => $request->location_text_shadow_color,
            'location_text_shadow_blur'   => $request->location_text_shadow_blur,
            'location_text_shadow_bottom' => $request->location_text_shadow_bottom,
            'location_text_shadow_right'  => $request->location_text_shadow_right,
            'date_text_shadow_color'      => $request->date_text_shadow_color,
            'date_text_shadow_blur'       => $request->date_text_shadow_blur,
            'date_text_shadow_bottom'     => $request->date_text_shadow_bottom,
            'date_text_shadow_right' => $request->date_text_shadow_right,
            'block_shadow'           => $request->block_shadow,
            'bold_city'              => $request->bold_city,
            'bold_location'          => $request->bold_location,
            'bold_date'              => $request->bold_date,
            'bold_time'              => $request->bold_time,
        ]);
    }

    /**
     * Удаление мероприятия
     *
     * @param Event $event
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function dropEvent(Event $event, UploadPhotoService $uploadService)
    {
        $uploadService->dropImg($event->banner);

        $event->delete();
    }
}
