<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UploadPhotoService;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Services\CreateProfileViewStatistics;
use App\Traits\IconsAndFonts;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    use IconsAndFonts;

    public function __construct(
        private readonly UploadPhotoService          $uploadService,
        private readonly StatsService                $statsService,
        private readonly CreateProfileViewStatistics $statistics,
    ) {}

    /**
     * Show user profile and count view stats
     *
     * @param User $user
     * @return View
     */
    public function userHomePage(User $user): View
    {
        $this->statistics->createStatistics($user, $_SERVER['REMOTE_ADDR']);

        return view('user.home', compact('user'));
    }

    /**
     * Show user admin profile
     *
     * @param User $user
     * @return View
     */
    public function editProfileForm(User $user): View
    {
        $stat = $this->statsService->getUserProfileStatistic($user);

        return view('user.edit-profile', [
            'user' => $user,
            'stat' => $stat,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Update user profile
     *
     * @param User $user
     * @param UpdateRegisteruserRequest $request
     * @return RedirectResponse
     */
    public function editUserProfile(User $user, UpdateRegisteruserRequest $request): RedirectResponse
    {
        $user->editUserProfile($user, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Профиль изменен!');
    }

    /**
     * Delete user avatar, banner and favicon from db and user folder
     *
     * @param User $user
     * @param string $type
     * @return RedirectResponse
     */
    public function delUserAvatar(User $user, string $type): RedirectResponse
    {
        $user->deleteUserImages($user, $type, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Change menu color theme, day-night
     *
     * @param User $user
     * @return JsonResponse
     */
    public function changeTheme(User $user): JsonResponse
    {
        $user->changeUserTheme($user);

        return response()->json('changed');
    }

    /**
     * Show edit profile form
     *
     * @param User $user
     * @return View
     */
    public function profileSettingsForm(User $user): View
    {
        return view('user.edit-profile-form', compact('user'));
    }
}

