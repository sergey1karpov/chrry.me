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
    ];

    public function searchableAs()
    {
        return 'links_index';
    }

    protected $dates = ['created_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }

    /**
     * @param int $userId
     * @param Request $request
     *
     * @return void
     *
     * Добавления ссылки типа LINK
     */
    protected static function addLink(int $userId, Request $request) : void
    {
        $request->validate([
            'title' => 'min:1|max:50',
            'link' => 'required|url',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $user = User::where('id', $userId)->firstOrFail();

        if($request->check_last_link == 'penis') {
            $lastLink = Link::where('user_id', $userId)->orderBy('created_at', 'desc')->first();
            $link = new self([
                'type' => 'LINK',
                'title' => $request->title,
                'link' => $request->link,
                'title_color' => $lastLink->title_color,
                'background_color' => $lastLink->background_color,
                'title_color_hex' => $lastLink->title_color_hex,
                'background_color_hex' => $lastLink->background_color_hex,
                'icon' => $request->icon,
                'photo' => isset($request->photo) ? self::addPhoto($request->photo, $request->type) : null,
                'shadow' => $lastLink->shadow,
                'rounded' => $lastLink->rounded,
                'transparency' => $lastLink->transparency,
                'pinned' => isset($request->pinned) ? 1 : 0,
                'animation' => $request->animation,
                'font' => $lastLink->font,
                'place' => $request->place,
                'animation' => $request->animation,
                'font_size' => $lastLink->font_size,
            ]);
            $user->links()->save($link);
        } else {
            $link = new self([
                'type' => 'LINK',
                'title' => $request->title,
                'link' => $request->link,
                'title_color' => $request->title_color,
                'background_color' => self::convertBackgroundColor($request->background_color),
                'title_color_hex' => $request->title_color,
                'background_color_hex' => $request->background_color,
                'icon' => $request->icon,
                'photo' => isset($request->photo) ? self::addPhoto($request->photo, $request->type) : null,
                'shadow' => $request->shadow,
                'rounded' => $request->rounded,
                'transparency' => $request->transparency,
                'pinned' => isset($request->pinned) ? 1 : 0,
                'animation' => $request->animation,
                'font' => is_null($request->font) ? 'Inter' : $request->font,
                'place' => $request->place,
                'animation' => $request->animation,
                'font_size' => $request->font_size,
            ]);
            $user->links()->save($link);
        }
    }

    /**
     * @param int $userId
     * @param int $link
     * @param Request $request
     *
     * @return void
     *
     * Редактирование ссылки типа LINK
     */
    protected static function editLink(int $userId, int $link, Request $request) : void
    {
        $request->validate([
            'title' => 'min:1|max:50',
            'link' => 'required|url',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $actualLink = self::where('id', $link)->where('user_id', $userId)->firstOrFail();

        self::where('id', $link)->where('user_id', $userId)->update([
            'title' => $request->title,
            'link' => $request->link,
            'shadow' => $request->shadow,
            'rounded' => $request->rounded,
            'title_color' => isset($request->title_color) ? $request->title_color : $actualLink->title_color,
            'background_color' => isset($request->background_color) ? self::convertBackgroundColor($request->background_color) : $actualLink->background_color,
            'title_color_hex' => $request->title_color,
            'background_color_hex' => $request->background_color,
            'photo' => isset($request->photo) ? self::addPhoto($request->photo, $request->type) : $actualLink->photo,
            'icon' => isset($request->icon) ? $request->icon : $actualLink->icon,
            'transparency' => isset($request->transparency) ? $request->transparency : $actualLink->transparency,
            'pinned' => isset($request->pinned) ? 1 : 0,
            'animation' => $request->animation,
            'font' => isset($request->font) ? $request->font : $actualLink->font,
            'font_size' => $request->font_size,
        ]);
    }


    /**
     * @param int $id
     * @param Request $request
     *
     * @return void
     *
     * Массовое изменение ссылок
     */
    public static function editAll(int $id, Request $request) : void
    {
        self::where('user_id', $id)->update([
            'title_color' => $request->title_color,
            'background_color' => Link::convertBackgroundColor($request->background_color),
            'background_color_hex' => $request->background_color,
            'title_color_hex' => $request->title_color,
            'transparency' => $request->transparency,
            'shadow' => $request->shadow,
            'rounded' => $request->rounded,
            'font' => $request->font,
            'font_size' => $request->font_size,
        ]);
    }

    /**
     * @param mixed $color
     *
     * @return [type]
     *
     * Возвращает цвет, конвертируемый в формат hex
     */
    public static function convertBackgroundColor($color)
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        return $r.', '.$g.', '.$b;
    }

    /**
     * @param object $img
     *
     * @return string
     *
     * Проверяем по типу type
     *
     * Если приходит gif, то просто загружаем в каталог, если img, то сперва обрезаем до 200х200
     * с помощью Intervention, затем сохраняем. В обоих случаях обратно получаем строку.
     */
    protected static function addPhoto($img, string $type) : string
    {
        if($type == 'LINK') {
            if($img->getClientOriginalExtension() == 'gif') {
                $path = Storage::putFile('public/' . Auth::user()->id, $img);
                return '../storage/app/'.$path;
            }
            $image = Image::make($img->getRealPath())->fit(200);
            $image->save('../storage/app/public/'. Auth::user()->id. '/links'. $img->hashName());
            return '/'.$image->dirname . '/' . $image->basename;
        }
    }

    /**
     * @param int $id
     * @param int $link
     *
     * @return void
     *
     * Удаление фотографии или икоки в ссылке
     */
    protected static function delLinkPhoto(int $id, int $link, Request $request) : void
    {
        if($request->type == 'LINK') {
            self::where('user_id', $id)->where('id', $link)->update(['photo' => null]);
        }
    }
}
