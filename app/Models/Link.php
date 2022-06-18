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
        'title',
        'link',
        'title_color',
        'background_color',
        'photo',
        'shadow',
        'rounded',
        'transparency'
    ];

    public function searchableAs()
    {
        return 'links_index';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }

    protected static function addLink(int $userId, LinkRequest $request) : void
    {
        $user = User::where('id', $userId)->firstOrFail();
        if(true == $user) {
            $link = new self([
                'title' => $request->title,
                'link' => $request->link,
                'title_color' => $request->title_color,
                'background_color' => $request->background_color,
                'photo' => isset($request->photo) ? self::addLinkPhoto($request->photo) : null,
                'shadow' => $request->shadow,
                'rounded' => $request->rounded,
                'transparency' => $request->transparency,
            ]);

            $user->links()->save($link);
        }
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
                'background_color' => isset($request->background_color) ? $request->background_color : $actualLink->background_color,
                'photo' => isset($request->photo) ? self::addLinkPhoto($request->photo) : $actualLink->photo,
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
        $img = Image::make($img->getRealPath())->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
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
