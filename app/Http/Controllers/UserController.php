<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\FaviconRequest;
use App\Http\Requests\LogotypeRequest;
use App\Jobs\ProfileViewJob;
use App\Models\User;
use App\Services\PropertiesService;
use App\Services\UploadPhotoService;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Services\CreateProfileViewStatistics;
use App\Traits\IconsAndFonts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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
        private UploadPhotoService          $uploadService,
        private StatsService                $statsService,
        private CreateProfileViewStatistics $statistics,
        public PropertiesService            $propertiesService,
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

    /**
     * User profile settings forms
     *
     * @param User $user
     * @return View
     */
    public function profileSettingsForm(User $user): View
    {
        return view('user.profile-form', compact('user'));
    }

    /**
     * Profile design settings forms
     *
     * @param User $user
     * @return View
     */
    public function designSettingsForm(User $user): View
    {
        return view('user.design-form', [
            'user' => $user,
            'properties' => (object) unserialize($user->settings->properties),
        ]);
    }

    /**
     * Profile view stats
     *
     * @param User $user
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function getStats(User $user): \Illuminate\Contracts\View\View|Factory|Application
    {
        return view('statistic.user_profile', compact('user'));
    }

    /**
     * Filtered user profile view stats
     *
     * @param User $user
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function profileFilterStatistic(User $user, Request $request): \Illuminate\Contracts\View\View|Factory|Application
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);

        $stats = $this->statsService->getProfileStatistic($user, $request);

        return view('statistic.user_profile', compact('user', 'stats'));
    }

    /**
     * Update user avatar
     *
     * @param User $user
     * @param AvatarRequest $request
     * @return RedirectResponse
     */
    public function updateAvatar(User $user, AvatarRequest $request): RedirectResponse
    {
        $user->updateAvatar($user, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Avatar updated successfully');
    }

    /**
     * Update user logotype
     *
     * @param User $user
     * @param LogotypeRequest $request
     * @return RedirectResponse
     */
    public function updateLogotype(User $user, LogotypeRequest $request)
    {
        $user->updateLogotype($user, $request, $this->uploadService, $this->propertiesService);

        return redirect()->back()->with('success', 'Logotype updated successfully');
    }

    /**
     * Avatar vs. Logotype
     *
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAvatarVsLogotype(User $user, Request $request): RedirectResponse
    {
        $user->updateAvatarVsLogotype($user, $request);

        return redirect()->back()->with('success', $request->avatar_vs_logotype . ' is publish');
    }

    /**
     * Update bg image
     *
     * @param User $user
     * @param BackgroundRequest $request
     * @return RedirectResponse
     */
    public function updateBackgroundImage(User $user, BackgroundRequest $request): RedirectResponse
    {
        $user->updateBackgroundImage($user, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Background image updated successfully');;
    }

    /**
     * Update favicon
     *
     * @param User $user
     * @param FaviconRequest $request
     * @return RedirectResponse
     */
    public function updateFavicon(User $user, FaviconRequest $request): RedirectResponse
    {
        $user->updateFavicon($user, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Favicon updated successfully');
    }

    /**
     * Update user design settings
     *
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateDesignSettings(User $user, Request $request): RedirectResponse
    {
        $user->updateDesignSettings($user, $request, $this->propertiesService);

        return redirect()->back()->with('success', 'Settings updated successfully');
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

