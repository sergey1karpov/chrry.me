<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Models\User;
use App\Services\UploadPhotoService;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public $uploadService;

    public function __construct(UploadPhotoService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * Возвращает страницу со всеми ссылками /links
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|never
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
     * Добавление ссылки
     *
     * @param int $userId
     * @param Link $link
     * @param LinkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLink(int $userId, Link $link, LinkRequest $request)
    {
        $link->addLink($userId, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Изменить ссылку
     *
     * @param int $userId
     * @param Link $link
     * @param LinkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editLink(int $userId, Link $link, LinkRequest $request)
    {
        $link->editLink($userId, $link, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Изменить все ссылки
     *
     * @param int $userId
     * @param Link $link
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editAllLink(int $userId, Link $link, Request $request)
    {
        $link->editAll($userId, $request);

        return redirect()->back();
    }

    /**
     * Удалить прикрепленное изображение у ссылки
     *
     * @param int $userId
     * @param Link $link
     * @return \Illuminate\Http\JsonResponse
     */
    public function delPhoto(int $userId, Link $link)
    {
        $link->deleteLinkImage($userId, $link, $this->uploadService);

        return response()->json('deleted');
    }

    /**
     * Удаление иконки ссылки
     *
     * @param int $id
     * @param int $link
     * @return \Illuminate\Http\JsonResponse|never
     */
    public function delLinkIcon(int $userId, int $link)
    {
        Link::where('user_id', $userId)->where('id', $link)->update(['icon' => null]);

        return response()->json('deleted');
    }

    /**
     * Удаление ссылки
     *
     * @param int $userId
     * @param Link $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delLink(int $userId, Link $link)
    {
        $link->dropLink($link, $this->uploadService);

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
