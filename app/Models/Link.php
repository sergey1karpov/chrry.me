<?php

namespace App\Models;

use App\Enums\EntityPropertiesPrefix;
use App\Http\Requests\UpdateLinkRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Services\PropertiesService;
use App\Services\UploadPhotoService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LinkRequest;
use Laravel\Scout\Searchable;
use Illuminate\Http\Request;

class Link extends Model
{
    use HasFactory, Searchable;

    protected $table = 'links';

    protected $dates = ['created_at'];

    protected $fillable = [
        'title',
        'link',
        'photo',
        'position',
        'type',
        'user_id',
        'icon',
        'pinned',
        'animation',
        'properties',
        'animation_speed'
    ];

    public function searchableAs(): string
    {
        return 'links_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
        ];
    }

//    /**
//     * @field_prefix dl_
//     * @param UpdateLinkRequest|LinkRequest|Request $request
//     * @param PropertiesService $propertiesService
//     * @return void
//     */
//    public function setDesignLinkProperties(UpdateLinkRequest|LinkRequest|Request $request, PropertiesService $propertiesService): void
//    {
//        $designProductFields = preg_grep("/^" . EntityPropertiesPrefix::Link ."/", array_keys($request->all()));
//        foreach ($designProductFields as $field) {
//            $propertiesService->addProperty($field, $request->$field);
//        }
//    }
//
//    /**
//     * @param User $user
//     * @return string|null
//     */
//    public function getLastLinkDesignFields(User $user): ?string
//    {
//        $event = Link::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
//
//        return $event->properties;
//    }

    /**
     * Path to save photo for link
     *
     * @param int $id
     * @return string
     */
    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id . '/links/';
    }

//    /**
//     * Create new link
//     *
//     * @param User $user
//     * @param LinkRequest $request
//     * @param UploadPhotoService $uploadService
//     * @param PropertiesService $propertiesService
//     * @return void
//     */
//    public function addLink(User $user, LinkRequest $request, UploadPhotoService $uploadService, PropertiesService $propertiesService): void
//    {
//        $this->setDesignLinkProperties($request, $propertiesService);
//
//        Link::create([
//            'type'      => 'LINK',
//            'user_id'   => Auth::user()->id,
//            'title'     => $request->title,
//            'link'      => $request->link,
//            'icon'      => $request->icon,
//            'photo'     => isset($request->photo) ?
//                $uploadService->savePhoto(
//                    photo: $request->photo,
//                    path: $this->imgPath($user->id),
//                    size: 200,
//                    imageType: 'link'
//                ) : null,
//            'pinned' => isset($request->pinned) ? 1:0,
//            'animation' => $request->animation,
//            'animation_speed' => $request->animation_speed,
//            'properties' => isset($request->check_last_link) ? $this->getLastLinkDesignFields($user) : serialize($propertiesService->getProperties()),
//        ]);
//    }

    /**
     * Update link
     *
     * @param User $user
     * @param Link $link
     * @param PropertiesService $propertiesService
     * @param LinkRequest $request
     * @return void
     */
    public function editLink(User $user, Link $link, PropertiesService $propertiesService, LinkRequest $request): void
    {
        $this->setDesignLinkProperties($request, $propertiesService);

        Link::where('id', $link->id)->where('user_id', $user->id)->update([
            'title'                => $request->title ?? $link->title,
            'link'                 => $request->link ?? $link->link,
            'icon'                 => $request->icon ?? $link->icon,
            'pinned'               => isset($request->pinned) ? 1 : 0,
            'animation' => $request->animation,
            'animation_speed' => $request->animation_speed,
            'properties' => serialize($propertiesService->getProperties()),
        ]);
    }

    public function updateIcon(User $user, Link $link, Request $request)
    {
        Link::where('id', $link->id)->where('user_id', $user->id)->update([
            'icon' => $request->icon ?? $link->icon,
        ]);
    }

    public function updatePhoto(User $user, Link $link, UploadPhotoService $uploadService, UpdatePhotoRequest $request)
    {
        Link::where('id', $link->id)->where('user_id', $user->id)->update([
            'photo' => $uploadService->savePhoto(
                photo: $request->photo,
                path: $this->imgPath($user->id),
                size: 200,
                dropImagePath: $link->photo,
                imageType: 'link'
            )
        ]);
    }

    /**
     * Mass update links
     *
     * @param User $user
     * @param UpdateLinkRequest $request
     * @param PropertiesService $propertiesService
     * @return void
     */
    public function editAll(User $user, UpdateLinkRequest $request, PropertiesService $propertiesService) : void
    {
        $this->setDesignLinkProperties($request, $propertiesService);

        Link::where('user_id', $user->id)->update([
            'properties' => serialize($propertiesService->getProperties()),
        ]);
    }

    /**
     * Delete link photo
     *
     * @param User $user
     * @param Link $link
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function deleteLinkImage(User $user, Link $link, UploadPhotoService $uploadService): void
    {
        $uploadService->deletePhotoFromFolder($link->photo);

        Link::where('user_id', $user->id)->where('id', $link->id)->update([
            'photo' => '',
        ]);
    }

    /**
     * Drop link
     *
     * @param Link $link
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function dropLink(Link $link, UploadPhotoService $uploadService): void
    {
        if($link->photo) {
            $uploadService->deletePhotoFromFolder($link->photo);
        }

        $link->delete();
    }
}

