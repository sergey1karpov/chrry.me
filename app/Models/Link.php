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

    /**
     * @return string
     *
     * Таблица для индексирования
     */
    public function searchableAs()
    {
        return 'links_index';
    }

    /**
     * @return array
     *
     * Laravel scout. Поля по которым идет поиск
     */
    public function toSearchableArray()
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
        ];
    }

    /**
     * Путь по которому сохраняются фотографии для ссылок
     *
     * @param int $id
     * @return string
     */
    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id . '/links/';
    }

    /**
     * Добавление ссылки
     *
     * @param int $userId
     * @param LinkRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function addLink(int $userId, LinkRequest $request, UploadPhotoService $uploadService)
    {
        $lastLink = Link::where('user_id', $userId)->orderBy('created_at', 'desc')->first();

        Link::create([
            'type'      => 'LINK',
            'user_id'   => Auth::user()->id,
            'title'     => $request->title,
            'link'      => $request->link,
            'photo'     => isset($request->photo) ?
                $uploadService->uploader(
                    ph: $request->photo,
                    path: $this->imgPath($userId),
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
     * Изменить ссылку
     *
     * @param int $userId
     * @param Link $link
     * @param LinkRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function editLink(int $userId, Link $link, UpdateLinkRequest $request, UploadPhotoService $uploadService)
    {
        Link::where('id', $link->id)->where('user_id', $userId)->update([
            'title'                => isset($request->title) ? $request->title : $link->title,
            'link'                 => isset($request->link) ? $request->link : $link->link,
            'shadow'               => $request->shadow,
            'rounded'              => $request->rounded,
            'title_color'          => isset($request->title_color) ? $request->title_color : $link->title_color,
            'background_color'     => isset($request->background_color) ?
                ColorConvertorService::convertBackgroundColor($request->background_color) :
                $link->background_color,
            'title_color_hex'      => $request->title_color,
            'background_color_hex' => $request->background_color,
            'photo'                => isset($request->photo) ?
                $uploadService->uploader(
                    ph: $request->photo,
                    path: $this->imgPath($userId),
                    size: 200,
                    drop: true,
                    dropImagePath: $link->photo
                ) :
                $link->photo,
            'icon'                 => isset($request->icon) ? $request->icon : $link->icon,
            'transparency'         => isset($request->transparency) ? $request->transparency : $link->transparency,
            'pinned'               => isset($request->pinned) ? 1 : 0,
            'animation'            => $request->animation,
            'font'                 => isset($request->font) ? $request->font : $link->font,
            'font_size'            => $request->font_size,
            'text_shadow_color'    => $request->text_shadow_color,
            'text_shadow_blur'     => $request->text_shadow_blur,
            'text_shadow_bottom'   => $request->text_shadow_bottom,
            'text_shadow_right'    => $request->text_shadow_right,
            'bold'                 => $request->bold,
        ]);
    }

    /**
     * Массовое изменение ссылок
     *
     * @param int $userId
     * @param Request $request
     * @return void
     */
    public function editAll(int $userId, Request $request) : void
    {
        Link::where('user_id', $userId)->update([
            'title_color'          => $request->title_color,
            'background_color'     => ColorConvertorService::convertBackgroundColor($request->background_color),
            'background_color_hex' => $request->background_color,
            'title_color_hex'      => $request->title_color,
            'transparency'         => $request->transparency,
            'shadow'               => $request->shadow,
            'rounded'              => $request->rounded,
            'font'                 => isset($request->font) ? $request->font : 'Inter',
            'font_size'            => $request->font_size,
            'text_shadow_color'    => $request->text_shadow_color,
            'text_shadow_blur'     => $request->text_shadow_blur,
            'text_shadow_bottom'   => $request->text_shadow_bottom,
            'text_shadow_right'    => $request->text_shadow_right,
            'bold'                 => $request->bold,
        ]);
    }

    /**
     * Удаление прикрепленного изображения
     *
     * @param int $userId
     * @param Link $link
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function deleteLinkImage(int $userId, Link $link, UploadPhotoService $uploadService)
    {
        $uploadService->dropImg($link->photo);

        Link::where('user_id', $userId)->update([
            'photo' => '',
        ]);
    }

    /**
     * Удаление ссылки
     *
     * @param Link $link
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function dropLink(Link $link, UploadPhotoService $uploadService)
    {
        $uploadService->dropImg($link->photo);

        $link->delete();
    }
}

