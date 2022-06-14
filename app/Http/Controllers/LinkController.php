<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\LinkRequest;
class LinkController extends Controller
{
    public function addLink(int $id, LinkRequest $request)
    {
        Link::addLink($id, $request);
        return redirect()->back();
    }

    public function editLink($id, $link, LinkRequest $request)
    {
        Link::editLink($id, $link, $request);
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
        return redirect()->back();
    }
}
