<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    public function addLink($id, LinkRequest $request)
    {
        $user = User::where('id', $id)->firstOrFail();

        if($user) {
            $link = new Link([
                'title' => $request->title,
                'link' => $request->link,
                'title_color' => $request->title_color,
                'background_color' => $request->background_color,
                'photo' => isset($request->photo) ? $this->addPhotos($request->photo) : null,
            ]);

            $user->links()->save($link);

            return redirect()->back();
        }
    }

    public function editLink($id, $link, Request $request)
    {

        $actualLink = Link::where('id', $link)->where('user_id', Auth::user()->id)->firstOrFail();

        $validated = $request->validate([
            'title' => 'min:3|max:150',
            'link' => 'url',
            'title_color' => 'nullable',
            'background_color' => 'nullable',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:3000',
        ]);

        Link::where('id', $link)
            ->update([
                'title' => $request->title,
                'link' => $request->link,
            ]);

        if($request->title_color != 'Выберите один из цветов') {
            Link::where('id', $link)
                ->update(['title_color' => $request->title_color]);
        } else {
            Link::where('id', $link)
                ->update(['title_color' => $actualLink->title_color]);
        }  
        
        if($request->background_color != 'Выберите один из цветов') {
            Link::where('id', $link)
                ->update(['background_color' => $request->background_color]);
        } else {
            Link::where('id', $link)
                ->update(['background_color' => $actualLink->background_color]);
        }  

        if($request->photo) {
            Link::where('id', $link)
                ->update(['photo' => $this->addPhotos($request->photo)]);
        }

        return redirect()->back();
    }

    public function delLinkPhoto($id, $link)
    {
        $link = Link::find($link);
        $link->photo = null;
        $link->save();

        return redirect()->back();
    }

    public function delLink($id, $link)
    {
        $link = Link::find($link);
        $link->delete();
        return redirect()->back();
    }

    public function addPhotos($img) {
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
        $img = Image::make($img->getRealPath())->resize(48, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save('../storage/app/public/'. Auth::user()->id. '/links'. $name);
        $url = '/'.$img->dirname . '/' . $img->basename;

        return $url;
    }

}
