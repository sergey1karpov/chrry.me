<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

/**
 * [Работа со ссылками/постами]
 */
class LinkController extends Controller
{
    /**
     * @param int $id
     *
     * @return mixed
     *
     * Возвращает страницу со всеми ссылками /links
     */
    public function allLinks(int $id) : mixed
    {
        if($id == Auth::user()->id) {
            $user = User::where('id', $id)->firstOrFail();
            $links = Link::where('user_id', $user->id)->where('pinned', null)->orderBy('position')->get();
            $pinnedLinks = Link::where('user_id', $user->id)->where('pinned', true)->orderBy('position')->get();
            $icons  = public_path('images/social');
            $allIconsInsideFolder = File::files($icons);
            return view('user.links', compact('user', 'links', 'allIconsInsideFolder','pinnedLinks'));
        } else {
            return abort(404);
        }
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * @return [type]
     *
     * Добавление ссылки или поста, в зависимости от значения $request->type
     */
    public function addLink(int $id, Request $request)
    {
        if($id == Auth::user()->id) {
            if($request->type == 'LINK') {
                Link::addLink($id,$request);
            }
            if($request->type == 'POST') {
                if(isset($request->photos)) {
                    if(count($request->photos) > 10) {
                        return redirect()->back()->with('error','К посту можно прикрепить не более 10 изображений');
                    }
                }
                Link::addPost($id,$request);
            }
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param int $id
     * @param int $link
     * @param Request $request
     *
     * @return [type]
     *
     * Редактирование ссылки или поста, в зависимости от $request->type
     */
    public function editLink(int $id, int $link, Request $request)
    {
        if($id == Auth::user()->id) {
            if($request->type == 'LINK') {
                Link::editLink($id,$link,$request);
            }
            if($request->type == 'POST') {
                if(isset($request->photos)) {
                    if(count($request->photos) > 10) {
                        return redirect()->back()->with('error','К посту можно прикрепить не более 10 изображений');
                    }
                }
                Link::editPost($id,$link,$request);
            }
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * @return [type]
     *
     * Массовое изменение ссылок
     */
    public function editAllLink(int $id, Request $request) : mixed
    {
        if($id == Auth::user()->id) {
            Link::editAll($id, $request);
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param mixed $id
     * @param mixed $link
     * @param Request $request
     *
     * @return [type]
     *
     * Удаление фотографий в ссылке и посте в зависимости от параметра $request->type
     */
    public function delPhoto($id, $link, Request $request) : mixed
    {
        if($id == Auth::user()->id) {
            Link::delLinkPhoto($id, $link, $request);
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param mixed $id
     * @param mixed $link
     *
     * @return [type]
     *
     * Удаление ссылки и поста
     */
    public function delLink($id, $link) : mixed
    {
        if($id == Auth::user()->id) {
            Link::where('user_id', $id)->where('id', $link)->delete();
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param int $id
     * @param int $link
     *
     * @return mixed
     *
     * Удаление иконки ссылки
     *
     * P.S. передалать под фотографию
     */
    public function delLinkIcon(int $id, int $link) : mixed
    {
        if($id == Auth::user()->id) {
            Link::where('id', $link)->update(['icon' => null]);
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    /**
     * @param mixed $id
     *
     * @return [type]
     *
     * Сортировка ссылок на js
     */
    public function sortLink(int $id) : void
    {
        if($id == Auth::user()->id) {
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
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * @return mixed
     *
     * Laravel Scout search service
     */
    public function searchLink(int $id, Request $request) : mixed
    {
        if($id == Auth::user()->id) {
            $user = User::where('id', $id)->firstOrFail();
            $links = Link::search($request->search)->where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $icons  = public_path('images/social');
            $allIconsInsideFolder = File::files($icons);
            return view('user.search', compact('user', 'links', 'allIconsInsideFolder'));
        } else {
            return abort(404);
        }
    }
}
