<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Http\Requests\LinkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\PostRequest;

class LinkController extends Controller
{
    public function allLinks($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $links = Link::where('user_id', $user->id)->orderBy('position')->get();
        return view('user.links', compact('user', 'links'));
    }

    public function addLink(int $id, LinkRequest $request)
    {
        Link::addLink($id, $request);
        session()->flash('message', 'Ссылка успешно добавлена');
        return redirect()->back();
    }

    public function editLink($id, $link, LinkRequest $request)
    {
        Link::editLink($id, $link, $request);
        session()->flash('message', 'Ссылка успешно изменина');
        return redirect()->back();
    }

    public function delLinkPhoto($id, $link)
    {
        Link::delLinkPhoto($id, $link);
        return redirect()->back();
    }

    public function delLink($id, $link)
    {
        Link::delLink($id, $link);
        session()->flash('message', 'Ссылка успешно удалена(');
        return redirect()->back();
    }

    public function editAllLink($id, Request $request)
    {
        Link::where('user_id', $id)->update([
            'title_color' => $request->title_color,
            'background_color' => Link::convertBackgroundColor($request->background_color),
            'transparency' => $request->transparency,
            'shadow' => $request->shadow,
            'rounded' => $request->rounded,
        ]);

        if($request->withoutTransparency) {
            Link::where('user_id', $id)->update([
                'transparency' => null,
            ]);
        }

        return redirect()->back();
    }

    public function searchLink($id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        $links = Link::search($request->search)->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('user.search', compact('user', 'links'));
    }

    public function sortLink($id)
    {
        if (isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
               $index = $position[0];
               $newPosition = $position[1];

               Link::where('user_id', $id)->where('id', $index)->update([
                    'position' => $newPosition,
               ]);
            }
        }
    }

    public function addPost($id, PostRequest $request)
    {
        $user = User::where('id', $id)->firstOrFail();

        if(isset($request->photos)) {
            if(count($request->photos) > 10) {
                return redirect()->back()->with('error','К посту можно прикрепить не более 10 изображений');
            }
        }

        Link::create([
            'type' => $request->type,
            'user_id' => $user->id,
            'title' => $request->title,
            'full_text' => $request->full_text,
            'link' => $request->link,
            'photos' => isset($request->photos) ? $this->addPhotos($request->photos) : null,
            'video' => $request->video,
            'media' => $request->media,
            'shadow' => $request->shadow,
            'rounded' => $request->rounded,
            'title_color' => $request->title_color,
            'background_color' => Link::convertBackgroundColor($request->background_color),
            'title_color_hex' => $request->title_color,
            'background_color_hex' => $request->background_color,
            'transparency' => $request->transparency,
        ]);

        return redirect()->back();
    }

    public function editPost($id, $link, PostRequest $request)
    {
        if(isset($request->photos)) {
            if(count($request->photos) > 10) {
                return redirect()->back()->with('error','К посту можно прикрепить не более 10 изображений');
            }
        }

        $user = User::where('id', $id)->firstOrFail();
        $link = Link::where('id', $link)->where('user_id', $id)->firstOrFail();

        Link::where('id', $link->id)->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'link' => $request->link,
            'photos' => isset($request->photos) ? $this->addPhotos($request->photos) : $link->photos,
            'video' => $request->video,
            'media' => $request->media,
            'shadow' => isset($request->shadow) ? $request->shadow : $link->shadow,
            'rounded' => isset($request->rounded) ? $request->rounded : $link->rounded,
            'title_color' => isset($request->title_color) ? $request->title_color : $link->title_color,
            'background_color' => Link::convertBackgroundColor($request->background_color),
            'title_color_hex' => isset($request->title_color_hex) ? $request->title_color_hex : $link->title_color_hex,
            'background_color_hex' => isset($request->background_color) ? $request->background_color : $link->background_color_hex,
            'transparency' => isset($request->transparency) ? $request->transparency : $link->transparency,
        ]);

        return redirect()->back();
    }

    public function addPhotos($photos)
    {
        $urls = [];
        foreach($photos as $photo) {
            $path = Storage::putFile('public/' . Auth::user()->id . '/posts', $photo);
            $strrpos = strrpos($path, '/');
            $mb_substr = mb_substr($path, $strrpos);
            $name = $mb_substr;
            $img = Image::make($photo->getRealPath())->fit(500);
            $img->save('../storage/app/public/'. Auth::user()->id. '/posts'. $name);
            $urls[] = '/'.$img->dirname . '/' . $img->basename;
        }

        return serialize($urls);
    }

    public function delPostPhoto($id, $link)
    {
        Link::where('id', $link)->update([
            'photos' => null,
        ]);

        return redirect()->back();
    }

    public function delLinkIcon($id, $link)
    {
        Link::where('id', $link)->update([
            'icon' => null,
        ]);

        return redirect()->back();
    }
}
