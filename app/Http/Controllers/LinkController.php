<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use App\Services\UploadPhotoService;
use App\Traits\IconsAndFonts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    use IconsAndFonts;

    public function __construct(
        private readonly UploadPhotoService $uploadService
    ) {}

    /**
     * Page with all user links
     *
     * @param int $userId
     * @return View|Factory|Application
     */
    public function allLinks(int $userId): View|Factory|Application
    {
        $user = User::where('id', $userId)->firstOrFail();

        return view('link.all-links', [
            'user' => $user,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Form for create new link
     *
     * @param int $userId
     * @return Application|Factory|View
     */
    public function createLinkForm(int $userId): View|Factory|Application
    {
        $user = User::findOrFail($userId);

        return view('link.add-link', [
            'user' => $user,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Create new link
     *
     * @param int $userId
     * @param Link $link
     * @param LinkRequest $request
     * @return RedirectResponse
     */
    public function addLink(int $userId, Link $link, LinkRequest $request): RedirectResponse
    {
        $link->addLink($userId, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Мультиссылка добавлена!');
    }

    /**
     * Update link
     *
     * @param int $userId
     * @param Link $link
     * @param UpdateLinkRequest $request
     * @return RedirectResponse
     */
    public function editLink(int $userId, Link $link, UpdateLinkRequest $request): RedirectResponse
    {
        $link->editLink($userId, $link, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Mass update links
     *
     * @param int $userId
     * @param Link $link
     * @param Request $request
     * @return RedirectResponse
     */
    public function editAllLink(int $userId, Link $link, Request $request): RedirectResponse
    {
        $link->editAll($userId, $request);

        return redirect()->back();
    }

    /**
     * Delete photo from link
     *
     * @param int $userId
     * @param Link $link
     * @return JsonResponse
     */
    public function delPhoto(int $userId, Link $link): JsonResponse
    {
        $link->deleteLinkImage($userId, $link, $this->uploadService);

        return response()->json('deleted');
    }

    /**
     * Delete icon from link
     *
     * @param int $userId
     * @param int $link
     * @return JsonResponse
     */
    public function delLinkIcon(int $userId, int $link): JsonResponse
    {
        Link::where('user_id', $userId)->where('id', $link)->update(['icon' => null]);

        return response()->json('deleted');
    }

    /**
     * Delete link
     *
     * @param int $userId
     * @param Link $link
     * @return RedirectResponse
     */
    public function delLink(int $userId, Link $link): RedirectResponse
    {
        $link->dropLink($link, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Full text link search in all links page
     */
    public function searchLink(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();

        $links = Link::search($request->search)->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('link.search', [
            'user' => $user,
            'links' => $links,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

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
}
