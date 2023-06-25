<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\FaviconRequest;
use App\Http\Requests\LogotypeRequest;
use App\Http\Requests\UserSettingsRequest;
use App\Http\Requests\VerifyRequest;
use App\Jobs\ProfileViewJob;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\User;
use App\Models\UserSettings;
use App\Models\Verification;
use App\Services\PropertiesService;
use App\Services\UploadPhotoService;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Services\CreateProfileViewStatistics;
use App\Traits\IconsAndFonts;
use Google\Client;
use Google\Service\Drive;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        private User                        $user,
    ) {
    }

    /**
     * Show user profile and count view stats
     *
     * @param User $user
     * @return View
     */
    public function userHomePage(User $user): View
    {
//        ProfileViewJob::dispatch($user, $_SERVER['REMOTE_ADDR'], $this->statistics);

        $this->statistics->createStatistics($user, $_SERVER['REMOTE_ADDR']);

        $cities = \DB::select('SELECT * FROM city');

        return view('user.home', compact('user','cities'));
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
            'allFontsInFolder' => $this->getFonts(),
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
        $user->updateLogotype($user, $request, $this->uploadService);

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
     * @param UserSettingsRequest $request
     * @return RedirectResponse
     */
    public function updateDesignSettings(User $user, UserSettingsRequest $request): RedirectResponse
    {
        $user->updateDesignSettings($user, $request, $this->uploadService);

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
        if (Hash::check($request->old_password, $request->user()->password)) {

            User::where('id', $user->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back();
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
        $user->updateTwoFactorAuth($user, $request);

        return redirect()->back();
    }

    /**
     * @param User $user
     * @return Application|Factory|\Illuminate\Contracts\View\View
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
        $verifyRequest = Verification::where('user_id', $user->id)->first();

        if ($verifyRequest) {
            return redirect()->back()->with('success', 'You have already applied for verification. Wait for it to be reviewed.');
        }

        Verification::create([
            'user_id' => $user->id,
            'profile_address' => 'chrry.me/' . $user->slug,
            'description' => $request->description,
            'contacts' => $request->contacts,
            'photo' => $this->uploadService->savePhoto(
                photo: $request->photo,
                path: $this->user->imgPath($user->id),
                size: 1000
            )
        ]);

        return redirect()->back()->with('success', 'Profile verification request sent');
    }

    public function metrikaForm(User $user)
    {
        return view('statistic.metrika-form', compact('user'));
    }

    public function setMetrikaId(User $user, Request $request)
    {
        $request->validate(['yandex_metrika' => 'nullable|integer']);

        User::updateOrCreate(
            ['id' => $user->id],
            ['yandex_metrika' => $request->yandex_metrika]
        );

        return redirect()->back()->with('success', 'Yandex Metrika id updated');
    }

    public function googleOAuth()
    {
        $client = new Google_Client();
        $client->setAuthConfig('../client_secret_40088812296-lmuin8lmkfv6cvc47tka7vio22m6hpbb.apps.googleusercontent.com.json');
        $client->addScope('email');
        $client->addScope('profile');

        return redirect()->to($client->createAuthUrl());
    }

    public function googleOAuthCallback()
    {
        $client = new Google_Client();
        $client->setAuthConfig('../client_secret_40088812296-lmuin8lmkfv6cvc47tka7vio22m6hpbb.apps.googleusercontent.com.json');

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();

            $createdUser = User::where('email', $google_account_info->email)->first();

            if(!$createdUser) {
                $user = User::create([
                    'name' => stristr($google_account_info->email, '@', true),
                    'slug' => stristr($google_account_info->email, '@', true),
                    'email' => $google_account_info->email,
                    'password' => Hash::make(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10)),
                    'remember_token' => Str::random(60),
                ]);

                UserSettings::create(['user_id' => $user->id]);

                event(new Registered($user));

                Auth::login($user);

            } else {
                Auth::login($createdUser);
            }

            return redirect()->route('editProfileForm', ['user' => Auth::user()->id]);
        }
    }
}

