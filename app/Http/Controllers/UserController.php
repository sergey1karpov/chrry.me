<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Models\Event;
use App\Services\UploadPhotoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Http\Requests\RegNewUserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct(private UploadPhotoService $uploadService) {}


    public function userHomePage(string $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();
        $pinnedLinks = \DB::table('links')->where('user_id', $user->id)->where('pinned', true)->orderBy('position')->get();

        $products = $user->products;
        $linksWithoutBar = \DB::table('links')->where('type', 'LINK')->where('user_id', $user->id)->where('icon', null)->orderBy('position')->get();

        $events = Event::where('user_id', $user->id)->orderBy('date')->get();

        StatsService::createUserStats($user);

        Carbon::setLocale('ru');

        return view('user.home', compact('user', 'links', 'pinnedLinks', 'events', 'linksWithoutBar', 'products'));
    }


    public function editProfileForm(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $day = StatsService::getUserStatsByDay($user);
        $month = StatsService::getUserStatsByMonth($user);
        $year = StatsService::getUserStatsByYear($user);
        $all = StatsService::getAllUserStats($user);

        $icons = public_path('images/social');
        $allIconsInsideFolder = File::files($icons);
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);

        return view('user.edit-profile', compact('user', 'day', 'month',
            'year', 'all', 'allIconsInsideFolder', 'allFontsInFolder'));

    }

    /**
     * Редактирование профиля пользователя
     *
     * @param int $userId
     * @param User $user
     * @param UpdateRegisteruserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editUserProfile(int $userId, User $user, UpdateRegisteruserRequest $request)
    {
        $user->editUserProfile($userId, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Первая регистрация после сканирования NFC чипа
     *
     * @param string $utag
     * @param User $user
     * @param Request $request
     * @return void
     */
    public function editNewUserForm(string $utag, User $user, Request $request)
    {
        $user->newUserNFC($utag, $request);
    }


    public function editNewUser(string $utag, User $user, RegNewUserRequest $request)
    {
        $user->confirmNewUser($utag, $request);

        $newUser = User::where('utag', $utag)->where('is_active', 1)->firstOrFail();

        event(new Registered($newUser));

        Auth::login($newUser);

        return redirect()->route('editProfileForm', ['id' => $newUser->id]);
    }

    /**
     * Удаление Аватарки, Баннера и Фавикона юзера
     *
     * @param int $userId
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delUserAvatar(int $userId, User $user, Request $request)
    {
        $user->deleteUserImages($userId, $request, $this->uploadService);

        return response()->json('deleted');
    }

    /**
     * Темная\светлая тема личного кабинета
     *
     * @param int $userId
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeTheme(int $userId, User $user)
    {
        $user->changeUserTheme($userId);

        return response()->json('changed');
    }
}

