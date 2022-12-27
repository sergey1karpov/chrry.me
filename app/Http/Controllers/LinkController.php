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
     * @param User $user
     * @return View|Factory|Application
     */
    public function allLinks(User $user): View|Factory|Application
    {
        return view('link.all-links', [
            'user' => $user,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Form for create new link
     *
     * @param User $user
     * @return View
     */
    public function createLinkForm(User $user): View
    {
        return view('link.add-link', [
            'user' => $user,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Create new link
     *
     * @param User $user
     * @param Link $link
     * @param LinkRequest $request
     * @return RedirectResponse
     */
    public function addLink(User $user, Link $link, LinkRequest $request): RedirectResponse
    {
        $link->addLink($user, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Мультиссылка добавлена!');
    }

    /**
     * Update link
     *
     * @param User $user
     * @param Link $link
     * @param UpdateLinkRequest $request
     * @return RedirectResponse
     */
    public function editLink(User $user, Link $link, UpdateLinkRequest $request): RedirectResponse
    {
        $link->editLink($user, $link, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Mass update links
     *
     * @param User $user
     * @param Link $link
     * @param Request $request
     * @return RedirectResponse
     */
    public function editAllLink(User $user, Link $link, Request $request): RedirectResponse
    {
        $link->editAll($user, $request);

        return redirect()->back();
    }

    /**
     * Delete photo from link
     *
     * @param User $user
     * @param Link $link
     * @return JsonResponse
     */
    public function delPhoto(User $user, Link $link): JsonResponse
    {
        $link->deleteLinkImage($user, $link, $this->uploadService);

        return response()->json('deleted');
    }

    /**
     * Delete icon from link
     *
     * @param User $user
     * @param Link $link
     * @return JsonResponse
     */
    public function delLinkIcon(User $user, Link $link): JsonResponse
    {
        Link::where('user_id', $user->id)->where('id', $link->id)->update(['icon' => null]);

        return response()->json('deleted');
    }

    /**
     * Delete link
     *
     * @param User $user
     * @param Link $link
     * @return RedirectResponse
     */
    public function delLink(User $user, Link $link): RedirectResponse
    {
        $link->dropLink($link, $this->uploadService);

        return redirect()->back();
    }

    public function showClickLinkStatistic(User $user, Link $link): View|Factory|Application
    {
        return view('link.stat', compact('user', 'link'));
    }

    /**
     * Full-text search in admin panel
     *
     * @param User $user
     * @param Request $request
     * @return View
     */
    public function searchLink(User $user, Request $request): View
    {
        $links = Link::search($request->search)->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('link.search', [
            'user' => $user,
            'links' => $links,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    public function sortLink(User $user)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Link::where('user_id', $user->id)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }
}
