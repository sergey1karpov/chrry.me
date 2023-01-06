<?php

namespace App\Models;

use App\Http\Requests\UpdateLinkRequest;
use App\Services\ColorConvertorService;
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
        'title_color',
        'background_color',
        'title_color_hex',
        'background_color_hex',
        'photo',
        'shadow',
        'rounded',
        'transparency',
        'position',
        'type',
        'user_id',
        'icon',
        'pinned',
        'animation',
        'font',
        'place',
        'font_size',
        'text_shadow_color',
        'text_shadow_blur',
        'text_shadow_bottom',
        'text_shadow_right',
        'bold',
    ];

    public function searchableAs()
    {
        return 'links_index';
    }

    public function toSearchableArray()
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
        ];
    }

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

    /**
     * Add new link
     *
     * @param User $user
     * @param LinkRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function addLink(User $user, LinkRequest $request, UploadPhotoService $uploadService)
    {
        $lastLink = Link::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        Link::create([
            'type'      => 'LINK',
            'user_id'   => Auth::user()->id,
            'title'     => $request->title,
            'link'      => $request->link,
            'photo'     => isset($request->photo) ?
                $uploadService->savePhoto(
                    photo: $request->photo,
                    path: $this->imgPath($user->id),
                    size: 200
                ) :
                null,
            'pinned'    => isset($request->pinned) ? 1 : 0,
            'icon'      => $request->icon,
            'animation' => $request->animation,

            'title_color'          => isset($request->check_last_link) ? $lastLink->title_color : $request->title_color,
            'background_color'     => isset($request->check_last_link) ?
                $lastLink->background_color :
                ColorConvertorService::convertBackgroundColor($request->background_color),
            'title_color_hex'      => isset($request->check_last_link) ? $lastLink->title_color_hex : $request->title_color,
            'background_color_hex' => isset($request->check_last_link) ? $lastLink->background_color_hex : $request->background_color,
            'shadow'               => isset($request->check_last_link) ? $lastLink->shadow : $request->shadow,
            'rounded'              => isset($request->check_last_link) ? $lastLink->rounded : $request->rounded,
            'transparency'         => isset($request->check_last_link) ? $lastLink->transparency : $request->transparency,
            'font'                 => isset($request->check_last_link) ? $lastLink->font : $request->font,
            'font_size'            => isset($request->check_last_link) ? $lastLink->font_size : $request->font_size,
            'text_shadow_color'    => isset($request->check_last_link) ? $lastLink->text_shadow_color : $request->text_shadow_color,
            'text_shadow_blur'     => isset($request->check_last_link) ? $lastLink->text_shadow_blur : $request->text_shadow_blur,
            'text_shadow_bottom'   => isset($request->check_last_link) ? $lastLink->text_shadow_bottom : $request->text_shadow_bottom,
            'text_shadow_right'    => isset($request->check_last_link) ? $lastLink->text_shadow_right : $request->text_shadow_right,
            'bold'                 => isset($request->check_last_link) ? $lastLink->bold : $request->bold,
        ]);
    }

    /**
     * Update link
     *
     * @param int $userId
     * @param Link $link
     * @param UpdateLinkRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function editLink(User $user, Link $link, UpdateLinkRequest $request, UploadPhotoService $uploadService): void
    {
        Link::where('id', $link->id)->where('user_id', $user->id)->update([
            'title'                => $request->title ?? $link->title,
            'link'                 => $request->link ?? $link->link,
            'shadow'               => $request->shadow ?? $link->shadow,
            'rounded'              => $request->rounded ?? $link->rounded,
            'title_color'          => $request->title_color ?? $link->title_color,
            'background_color'     => isset($request->background_color) ?
                ColorConvertorService::convertBackgroundColor($request->background_color) :
                $link->background_color,
            'title_color_hex'      => $request->title_color ?? $link->title_color,
            'background_color_hex' => $request->background_color ?? $link->background_color,
            'photo'                => isset($request->photo) ?
                $uploadService->savePhoto(
                    photo: $request->photo,
                    path: $this->imgPath($user->id),
                    size: 200,
                    dropImagePath: $link->photo
                ) :
                $link->photo,
            'icon'                 => $request->icon ?? $link->icon,
            'transparency'         => $request->transparency ?? $link->transparency,
            'pinned'               => isset($request->pinned) ? 1 : 0,
            'animation'            => $request->animation,
            'font'                 => $request->font ?? $link->font,
            'font_size'            => $request->font_size ?? $link->font_size,
            'text_shadow_color'    => $request->text_shadow_color ?? $link->text_shadow_color,
            'text_shadow_blur'     => $request->text_shadow_blur ?? $link->text_shadow_blur,
            'text_shadow_bottom'   => $request->text_shadow_bottom ?? $link->text_shadow_bottom,
            'text_shadow_right'    => $request->text_shadow_right ?? $link->text_shadow_right,
            'bold'                 => $request->bold ?? $link->bold,
        ]);
    }

    /**
     * Mass update links
     *
     * @param User $user
     * @param Request $request
     * @return void
     */
    public function editAll(User $user, Request $request) : void
    {
        Link::where('user_id', $user->id)->update([
            'title_color'          => $request->title_color,
            'background_color'     => ColorConvertorService::convertBackgroundColor($request->background_color),
            'background_color_hex' => $request->background_color,
            'title_color_hex'      => $request->title_color,
            'transparency'         => $request->transparency,
            'shadow'               => $request->shadow,
            'rounded'              => $request->rounded,
            'font'                 => $request->font ?? 'Inter',
            'font_size'            => $request->font_size,
            'text_shadow_color'    => $request->text_shadow_color,
            'text_shadow_blur'     => $request->text_shadow_blur,
            'text_shadow_bottom'   => $request->text_shadow_bottom,
            'text_shadow_right'    => $request->text_shadow_right,
            'bold'                 => $request->bold,
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

        Link::where('user_id', $user->id)->update([
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

