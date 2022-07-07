<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
use App\Http\Requests\LinkRequest;
use Laravel\Scout\Searchable;

class Link extends Model
{
    use HasFactory, Searchable;

    protected $table = 'links';

    protected $fillable = [
        //common properties
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
        //Post properties
        'full_text',
        'photos',
        'video',
        'media',
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

    public function icon()
    {
        return $this->hasMany(IconModel::class);
    }

    protected static function addLink(int $userId, LinkRequest $request) : void
    {
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
                'photo' => isset($request->photo) ? self::addLinkPhoto($request->photo) : null,
                'shadow' => $lastLink->shadow,
                'rounded' => $lastLink->rounded,
                'transparency' => $lastLink->transparency,
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
                'photo' => isset($request->photo) ? self::addLinkPhoto($request->photo) : null,
                'shadow' => $request->shadow,
                'rounded' => $request->rounded,
                'transparency' => $request->transparency,
            ]);

            $user->links()->save($link);
        }

    }

    public static function convertBackgroundColor($color)
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        return $r.', '.$g.', '.$b;
    }

    protected static function editLink(int $id, $link, LinkRequest $request) : void
    {
        $actualLink = self::where('id', $link)->where('user_id', $id)->firstOrFail();

        self::where('id', $link)
            ->update([
                'title' => $request->title,
                'link' => $request->link,
                'shadow' => $request->shadow,
                'rounded' => $request->rounded,
                'title_color' => isset($request->title_color) ? $request->title_color : $actualLink->title_color,
                'background_color' => isset($request->background_color) ? self::convertBackgroundColor($request->background_color) : $actualLink->background_color,
                'title_color_hex' => $request->title_color,
                'background_color_hex' => $request->background_color,
                'photo' => isset($request->photo) ? self::addLinkPhoto($request->photo) : $actualLink->photo,
                'icon' => isset($request->icon) ? $request->icon : $actualLink->icon,
                'transparency' => isset($request->transparency) ? $request->transparency : $actualLink->transparency,
            ]);

        if($request->withoutTransparency) {
            self::where('id', $link)->update([
                'transparency' => null,
            ]);
        }
    }

    protected static function delLink(int $id, int $link) : void
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            self::find($link)->delete();
        }
    }

    protected static function addLinkPhoto($img) : string
    {
        $mime = $img->getClientOriginalExtension();

        if($mime == 'gif') {
            $path = Storage::putFile('public/' . Auth::user()->id . '/links', $img);
            $strpos = strpos($path, '/');
            $mb_substr = mb_substr($path, $strpos);
            $url = '../storage/app/public'.$mb_substr;
            return $url;
        }

        $path = Storage::putFile('public/' . Auth::user()->id . '/links', $img);
        $strrpos = strrpos($path, '/');
        $mb_substr = mb_substr($path, $strrpos);

        $name = $mb_substr;
        // $img = Image::make($img->getRealPath())->resize(100, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        $img = Image::make($img->getRealPath())->fit(200);
        // $img = Image::make($img->getRealPath())->crop(1000, 1000);
        $img->save('../storage/app/public/'. Auth::user()->id. '/links'. $name);
        $url = '/'.$img->dirname . '/' . $img->basename;

        return $url;
    }

    protected static function delLinkPhoto(int $id, int $link) : void
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            $link = self::find($link);
            $link->photo = null;
            $link->save();
        }
    }
}
