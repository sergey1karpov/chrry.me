<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|never
     *
     * Возвращает страницу со всеми ссылками /links
     */
    public function allLinks(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $links = Link::where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();
        $pinnedLinks = Link::where('user_id', $user->id)->where('pinned', true)->orderBy('position')->get();
        $icons  = public_path('images/social');
        $allIconsInsideFolder = File::files($icons);
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);
        return view('user.links', compact('user', 'links', 'allIconsInsideFolder','pinnedLinks', 'allFontsInFolder'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|never
     *
     * Добавление ссылки
     */
    public function addLink(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        Link::addLink($user, $request);
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param int $linkId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|never
     *
     * Редактирование ссылки
     */
    public function editLink(int $id, int $linkId, Request $request)
    {
        $link = Link::where('id', $linkId)->where('user_id', $id)->firstOrFail();
        if($request->photo) {
            if($link->photo != '') {
                unlink(ltrim($link->photo, "/"."../"));
            }
        }
        if($link) {
            Link::editLink($id, $link, $request);
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|never
     *
     * Массовое изменение ссылок
     */
    public function editAllLink(int $id, Request $request)
    {
        Link::editAll($id, $request);
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param int $link
     * @return \Illuminate\Http\JsonResponse|never
     *
     * Удаление фотографий в ссылке
     */
    public function delPhoto(int $id, int $link)
    {
        $delPhotoFromFolder = Link::where('id', $link)->firstOrFail();
        unlink(ltrim($delPhotoFromFolder->photo, "/"."../"));
        Link::where('user_id', $id)->where('id', $link)->update(['photo' => null]);
        return response()->json('deleted');
    }

    /**
     * @param int $id
     * @param int $link
     * @return \Illuminate\Http\JsonResponse|never
     *
     * Удаление иконки ссылки
     */
    public function delLinkIcon(int $id, int $link)
    {
        Link::where('user_id', $id)->where('id', $link)->update(['icon' => null]);
        return response()->json('deleted');
    }

    /**
     * @param int $id
     * @param int $link
     * @return \Illuminate\Http\RedirectResponse|never
     *
     * Удаление ссылки и поста
     */
    public function delLink(int $id, int $link)
    {
        Link::where('user_id', $id)->where('id', $link)->delete();
        return redirect()->back();
    }

    /**
     * @param int $id
     * @return void
     *
     * Сортировка ссылок на js
     */
    public function sortLink(int $id)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Link::where('user_id', $id)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|never
     *
     * Laravel Scout search service
     */
    public function searchLink(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        $links = Link::search($request->search)->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $icons  = public_path('images/social');
        $allIconsInsideFolder = File::files($icons);
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);
        return view('user.search', compact('user', 'links', 'allIconsInsideFolder', 'allFontsInFolder'));

    }
}
