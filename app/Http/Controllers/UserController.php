<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\FaviconRequest;
use App\Http\Requests\LogotypeRequest;
use App\Jobs\ProfileViewJob;
use App\Models\User;
use App\Services\UploadPhotoService;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Services\CreateProfileViewStatistics;
use App\Traits\IconsAndFonts;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        ProfileViewJob::dispatch($user, $_SERVER['REMOTE_ADDR'], $this->statistics);

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
        return view('user.profile', [
            'user' => $user,
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
        $user->editUserProfile($user, $request);

        return redirect()->back()->with('success', 'Profile settings have been changed!');
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

    public function profileSettingsForm(User $user): View
    {
        return view('user.profile-form', compact('user'));
    }

    public function designSettingsForm(User $user): View
    {
        return view('user.design-form', compact('user'));
    }

    public function getStats(User $user)
    {
        return view('statistic.user_profile', compact('user'));
    }

    public function updateAvatar(User $user, AvatarRequest $request)
    {
        $user->updateAvatar($user, $request, $this->uploadService);

        return redirect()->back();
    }

    public function updateLogotype(User $user, LogotypeRequest $request)
    {
        $user->updateLogotype($user, $request, $this->uploadService);

        return redirect()->back();
    }

    public function updateAvatarVsLogotype(User $user, Request $request)
    {
        $user->updateAvatarVsLogotype($user, $request);

        return redirect()->back();
    }

    public function updateBackgroundImage(User $user, BackgroundRequest $request)
    {
        $user->updateBackgroundImage($user, $request, $this->uploadService);

        return redirect()->back();
    }

    public function updateFavicon(User $user, FaviconRequest $request)
    {
        $user->updateFavicon($user, $request, $this->uploadService);

        return redirect()->back();
    }

    public function updateColors(User $user, Request $request)
    {
        $user->updateColors($user, $request);

        return redirect()->back();
    }

    public function updateSocialBar(User $user, Request $request)
    {
        $user->updateSocialBar($user, $request);

        return redirect()->back();
    }

    public function updateChrryLogo(User $user, Request $request)
    {
        $user->updateChrryLogo($user, $request);

        return redirect()->back();
    }

    /**
     * Change user password
     *
     * @param User $user
     * @param ChangePasswordRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(User $user, ChangePasswordRequest $request)
    {
        if(Hash::check($request->old_password, $request->user()->password)) {

            User::where('id', $user->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back();
        }

        throw ValidationException::withMessages(['Old password' => 'Your old password is not correct']);
    }

    public function updateTwoFactorAuth(User $user, Request $request)
    {
        $user->updateTwoFactorAuth($user, $request);

        return redirect()->back();
    }
}

