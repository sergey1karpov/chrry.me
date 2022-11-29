<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UploadPhotoService;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private readonly UploadPhotoService $uploadService,
        private readonly StatsService $statsService,
    ) {}

    /**
     * Show user profile and count view stats
     *
     * @param User $user
     * @return View
     */
    public function userHomePage(User $user): View
    {
        $this->statsService->createUserStats($user, $_SERVER['REMOTE_ADDR']);

        return view('user.home', compact('user'));
    }

    /**
     * Show user admin profile
     *
     * @param int $userId
     * @return View
     */
    public function editProfileForm(int $userId): View
    {
        $user = User::where('id', $userId)->firstOrFail();

        $stat = $this->statsService->getUserProfileStatistic($user);

        // Get icons and fonts to customize links, events from project folder
        // Transfer all this shit to AWS
        $icons = public_path('images/social');
        $allIconsInsideFolder = File::files($icons);
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);

        return view('user.edit-profile', compact('user', 'stat' , 'allIconsInsideFolder', 'allFontsInFolder'));

    }

    /**
     * Update user prodile
     *
     * @param int $userId
     * @param User $user
     * @param UpdateRegisteruserRequest $request
     * @return RedirectResponse
     */
    public function editUserProfile(int $userId, User $user, UpdateRegisteruserRequest $request): RedirectResponse
    {
        $user->editUserProfile($userId, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Профиль изменен!');
    }

    /**
     * Delete user avatar, banner and favicon from db and user folder
     *
     * @param int $userId
     * @param string $type
     * @param User $user
     * @return RedirectResponse
     */
    public function delUserAvatar(int $userId, string $type, User $user): RedirectResponse
    {
        $user->deleteUserImages($userId, $type, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Change menu color theme, day-night
     *
     * @param int $userId
     * @param User $user
     * @return JsonResponse
     */
    public function changeTheme(int $userId, User $user): JsonResponse
    {
        $user->changeUserTheme($userId);

        return response()->json('changed');
    }

    /**
     * Show edit profile form
     *
     * @param int $userId
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function profileSettingsForm(int $userId): \Illuminate\Contracts\View\View|Factory|Application
    {
        $user = User::where('id', $userId)->firstOrFail();

        return view('user.edit-profile-form', compact('user'));
    }
}

