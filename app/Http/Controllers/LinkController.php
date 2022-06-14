<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\LinkRequest;
class LinkController extends Controller
{
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
}
