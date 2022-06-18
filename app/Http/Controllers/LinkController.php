<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Http\Requests\LinkRequest;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function allLinks($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $links = Link::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);
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
            'background_color' => $request->background_color,
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
}
