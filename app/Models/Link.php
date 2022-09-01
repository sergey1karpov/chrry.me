<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
use App\Http\Requests\LinkRequest;
use App\Http\Requests\PostRequest;
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
        'full_text',
        'photos',
        'video',
        'media',
        'pinned',
        'animation',
        'font',
        'place',
        'font_size',
        'text_shadow_color',
        'text_shadow_blur',
        'text_shadow_bottom',
        'text_shadow_right',
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
     * @param \App\Models\User $user
     * @param Request $request
     * @return void
     *
     * Добавления ссылки
     */
    protected static function addLink(User $user, Request $request)
    {
        $request->validate([
            'title' => 'min:1|max:50',
            'link'  => 'required|url',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $lastLink = Link::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        $link = new self([
            'type'      => 'LINK',
            'title'     => $request->title,
            'link'      => $request->link,
            'photo'     => isset($request->photo) ? self::addPhoto($request->photo, $request->type) : null,
            'pinned'    => isset($request->pinned) ? 1 : 0,
            'icon'      => $request->icon,
            'animation' => $request->animation,
            //Design fields
            'title_color'          => isset($request->check_last_link) ? $lastLink->title_color : $request->title_color,
            'background_color'     => isset($request->check_last_link) ? $lastLink->background_color : self::convertBackgroundColor($request->background_color),
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
        ]);

        $user->links()->save($link);
    }

    /**
     * @param int $userId
     * @param Link $link
     * @param Request $request
     * @return void
     *
     * Редактирование ссылки
     */
    protected static function editLink(int $userId, Link $link, Request $request)
    {
        $request->validate([
            'title' => 'min:1|max:50',
            'link'  => 'required|url',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        self::where('id', $link->id)->where('user_id', $userId)->update([
            'title'                => $request->title,
            'link'                 => $request->link,
            'shadow'               => $request->shadow,
            'rounded'              => $request->rounded,
            'title_color'          => isset($request->title_color) ? $request->title_color : $link->title_color,
            'background_color'     => isset($request->background_color) ? self::convertBackgroundColor($request->background_color) : $link->background_color,
            'title_color_hex'      => $request->title_color,
            'background_color_hex' => $request->background_color,
            'photo'                => isset($request->photo) ? self::addPhoto($request->photo, $request->type) : $link->photo,
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
        ]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return void
     *
     * Массовое изменение ссылок
     */
    public static function editAll(int $id, Request $request) : void
    {
        self::where('user_id', $id)->update([
            'title_color'          => $request->title_color,
            'background_color'     => Link::convertBackgroundColor($request->background_color),
            'background_color_hex' => $request->background_color,
            'title_color_hex'      => $request->title_color,
            'transparency'         => $request->transparency,
            'shadow'               => $request->shadow,
            'rounded'              => $request->rounded,
            'font'                 => $request->font,
            'font_size'            => $request->font_size,
            'text_shadow_color'    => $request->text_shadow_color,
            'text_shadow_blur'     => $request->text_shadow_blur,
            'text_shadow_bottom'   => $request->text_shadow_bottom,
            'text_shadow_right'    => $request->text_shadow_right,
        ]);
    }

    /**
     * @param $color
     * @return string
     *
     * Возвращает цвет, конвертируемый в формат hex
     */
    public static function convertBackgroundColor($color)
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        return $r.', '.$g.', '.$b;
    }

    /**
     * @param $img
     * @param string $type
     * @return string|void
     *
     * * Проверяем по типу type
     *
     * Если приходит gif, то просто загружаем в каталог, если img, то сперва обрезаем до 200х200
     * с помощью Intervention, затем сохраняем. В обоих случаях обратно получаем строку.
     */
    protected static function addPhoto($img, string $type)
    {
        if($type == 'LINK') {
            if($img->getClientOriginalExtension() == 'gif') {
                $path = Storage::putFile('public/' . Auth::user()->id, $img);
                return '../storage/app/'.$path;
            }
            $image = Image::make($img->getRealPath())->fit(200);
            $basePath = '../storage/app/public/' . Auth::user()->id . '/links/';
            $image->save($basePath . '/' .$img->hashName());
            return '/'.$image->dirname . '/' . $image->basename;
        }
    }
}
