<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LogotypeRequest;
use App\Http\Requests\FilterStatRequest;
use App\Http\Requests\SetEmailRequest;
use App\Http\Requests\UploadPhotoRequest;
use App\Http\Requests\UserSettingsRequest;
use App\Http\Requests\VerifyRequest;
use App\Http\Requests\YaMetrikaRequest;
use App\Jobs\ProfileViewJob;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\VerificationRepository;
use App\Services\ProfileViewStatsService;
use App\Services\UploadPhotoService;
use App\Http\Requests\UpdateRegisterUserRequest;
use App\Services\CreateProfileViewStatistics;
use App\Services\UserService;
use App\Traits\IconsAndFonts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use IconsAndFonts;

    public function __construct(
        private UploadPhotoService          $uploadService,
        private ProfileViewStatsService     $profileViewStatsService,
        private CreateProfileViewStatistics $statistics,
        private User                        $user,
        private UserRepository              $userRepository,
        private UserService                 $userService,
        private VerificationRepository      $verificationRepository,
    ) {}

    /**
     * @param User $user
     * @return View
     */
    public function userHomePage(User $user): View
    {
//        $this->statistics->createStatistics($user, $_SERVER['REMOTE_ADDR']);
        ProfileViewJob::dispatch($user, $_SERVER['REMOTE_ADDR'], $this->statistics);

        $cities = null;

        if($user->getPageType() != 'Links') {
            $cities = DB::select('SELECT * FROM city');
        }

        return view('user.home', compact('user','cities'));
    }

    /**
     * @param User $user
     * @return View
     */
    public function editProfileForm(User $user): View
    {
        return view('user.profile', ['user' => $user]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function setEmailForm(User $user): View
    {
        return view('auth.changeGenerateEmail', ['user' => $user]);
    }

    /**
     * @param User $user
     * @param SetEmailRequest $request
     * @return RedirectResponse
     */
    public function setEmail(User $user, SetEmailRequest $request): RedirectResponse
    {
        $this->userRepository->setUserEmail($user, $request->email);

        return redirect()->route('editProfileForm', ['user' => $user->id]);
    }

    /**
     * @param User $user
     * @param UpdateRegisteruserRequest $request
     * @return RedirectResponse
     */
    public function editUserProfile(User $user, UpdateRegisterUserRequest $request): RedirectResponse
    {
        $this->userRepository->editUserProfile($user, $request);

        return redirect()->back()->with('success', 'Profile settings have been changed!');
    }

    /**
     * Change menu color theme, day-night
     *
     * @param User $user
     * @return JsonResponse
     */
    public function changeTheme(User $user): JsonResponse
    {
        $this->userRepository->changeUserProfileThemeColor($user);

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
            'user'             => $user,
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Profile view stats
     *
     * @param User $user
     * @return View
     */
    public function getStats(User $user): View
    {
        return view('statistic.user_profile', compact('user'));
    }

    /**
     * @param User $user
     * @param FilterStatRequest $request
     * @return View
     */
    public function profileFilterStatistic(User $user, FilterStatRequest $request): View
    {
        $stats = $this->profileViewStatsService->getTotalStatistic($request);

        return view('statistic.user_profile', compact('user', 'stats'));
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
        $this->userRepository->updateProfileLogotype($user, $request);

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
        $this->userRepository->selectAvatarOrLogotype($user, $request->avatar_vs_logotype);

        return redirect()->back()->with('success', $request->avatar_vs_logotype . ' is publish');
    }

    /**
     * Update user design settings
     *
     * @param User $user
     * @param UserSettingsRequest $request
     * @return RedirectResponse
     */
    public function updateDesignSettings(User $user, UserSettingsRequest $request): RedirectResponse
    {
        $this->userRepository->updateUserDesignSettings($user, $request);

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    /**
     * @param User $user
     * @param ChangePasswordRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(User $user, ChangePasswordRequest $request): RedirectResponse
    {
        if ($this->userService->checkHashPassword($request->old_password, $request->user()->password)) {

            $this->userRepository->updateUserPassword($user, $request);

            return redirect()->back()->with('success', 'Password updated successfully');
        }

        throw ValidationException::withMessages(['Old password' => 'Your old password is not correct']);
    }

    /**
     * On\Off two-factor auth
     *
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateTwoFactorAuth(User $user, Request $request): RedirectResponse
    {
        $this->userRepository->onOrOffTwoFactorAuth($user, $request);

        return redirect()->back();
    }

    /**
     * @param User $user
     * @return View
     */
    public function verify(User $user)
    {
        return view('user.verify', compact('user'));
    }

    /**
     * Verify user profile
     *
     * @param User $user
     * @param VerifyRequest $request
     * @return RedirectResponse
     */
    public function verifyProfile(User $user, VerifyRequest $request): RedirectResponse
    {
        if ($this->verificationRepository->getVerifyRequestIfExists($user)) {
            return redirect()
                ->back()
                ->with('success', 'You have already applied for verification. Wait for it to be reviewed');
        }

        $this->verificationRepository->createVerifyRequest($user, $request, $this->user->imgPath($user->id));

        return redirect()->back()->with('success', 'Profile verification request sent');
    }

    /**
     * @param User $user
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function metrikaForm(User $user)
    {
        return view('statistic.metrika-form', compact('user'));
    }

    /**
     * @param User $user
     * @param YaMetrikaRequest $request
     * @return RedirectResponse
     */
    public function setMetrikaId(User $user, YaMetrikaRequest $request)
    {
        $this->userRepository->updateYandexMetrika($user, $request);

        return redirect()->back()->with('success', 'Yandex Metrika id updated');
    }

    /**
     * Method upload photo img|gif for avatar|bg image|favicon|verify icon
     *
     * @param User $user
     * @param UploadPhotoRequest $request
     * @return RedirectResponse
     */
    public function uploadImage(User $user, UploadPhotoRequest $request): RedirectResponse
    {
        $this->userRepository->uploadAnyUserImage($user, $request);

        return redirect()->back()->with('success', 'Профиль успешно обновлен!');
    }

    /**
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteImage(User $user, Request $request): RedirectResponse
    {
        $imageType = $request->type;

        $imagePath = $user->settings->$imageType;

        DB::transaction(function () use ($user, $imageType, $imagePath) {
            $this->uploadService->deletePhotoFromFolder($imagePath);
            $this->userRepository->deletePhotoFromDB($user, $imageType);
        });

        return redirect()->back()->with('success', 'Профиль успешно обновлен!');
    }
}

