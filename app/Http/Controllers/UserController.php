<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Http\Requests\RegNewUserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //Отображение главной страницы/профиля пользователя
    public function userHomePage(string $slug) : mixed
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->orderBy('position')->get();

        StatsService::createUserStats($user);

        return view('user.home', compact('user', 'links'));
    }

    //Отображение личного кабинета со статистикой по профилю и по кликам
    public function editProfileForm(int $id) : mixed
    {
        $user = User::where('id', $id)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        $day = StatsService::getUserStatsByDay($user);
        $month = StatsService::getUserStatsByMonth($user);
        $year = StatsService::getUserStatsByYear($user);
        $all = StatsService::getAllUserStats($user);

        $dayClick = [];
        $monthClick = [];
        $yearClick = [];
        $allClick = [];

        foreach($links as $link) {
            $dayClick[] = StatsService::getUserLinkStatsByDay($user, $link->id);
            $monthClick[] = StatsService::getUserLinkStatsByMonth($user, $link->id);
            $yearClick[] = StatsService::getUserLinkStatsByYear($user, $link->id);
            $allClick[] = StatsService::getAllUserLinkStats($user, $link->id);
        }

        $icons  = public_path('images/social');
        $allIconsInsideFolder = File::files($icons);

        if($user) {
            return view('user.edit-profile', compact('user', 'links', 'day', 'month', 'year', 'all', 'dayClick', 'monthClick', 'yearClick', 'allClick', 'allIconsInsideFolder'));
        }
        abort(404);
    }

    //Редактирование профиля полсе фальш реги
    public function editUserProfile(int $id, UpdateRegisteruserRequest $request) : mixed
    {
        $user = User::where('id', $id)->firstOrFail();

        if($request->avatar) {
            if($user->avatar != '') {
                $path = $user->avatar;
                unlink($path);
            }
        }

        if($request->banner) {
            if($user->banner != '') {
                $path = $user->banner;
                unlink($path);
            }
        }

        if($user) {
            User::editUserProfile($user, $request);
            return redirect()->back();
        }

        return abort(404);
    }

    //Отображение фальш реги юзер-формы
    public function editNewUserForm(string $utag, Request $request) {
        $user = User::where('utag', $utag)->where('is_active', 0)->first(); //Берем юзера где ютаг = ютаг и где юзер не активен еще

        if(!$user) { //Если такой записи нет
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first(); //Берем активного юзера в бд, берем сегмент 2
            return redirect()->route('userHomePage', ['slug' => $active_user->slug]); //редиректим на страницу со слаг
        }
        return view('auth.edit-user', compact('user')); //Возвр форму фальш реги
    }

    public function editNewUser($utag, RegNewUserRequest $request) {

        User::where('utag', $utag)
            ->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => 1,
            ]);

        $user = User::where('utag', $utag)->where('is_active', 1)->firstOrFail();

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('editProfileForm', ['id' => $user->id]);
    }

    public function delUserAvatar($id) {
        $user = User::where('id', $id)->firstOrFail();

        User::where('id', $id)->update([
            'avatar' => null,
        ]);

        $path = $user->avatar;
        unlink($path);

        return redirect()->back();
    }

    public function delUserBanner($id) {
        $user = User::where('id', $id)->firstOrFail();

        User::where('id', $id)->update([
            'banner' => null,
        ]);

        $path = $user->banner;
        unlink($path);

        return redirect()->back();
    }
}

