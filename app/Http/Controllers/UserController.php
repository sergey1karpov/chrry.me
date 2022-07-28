<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
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
    /**
     * @param string $slug
     *
     * @return mixed
     *
     * Отображение главной страницы аккаунта
     */
    public function userHomePage(string $slug) : mixed
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();
        $pinnedLinks = \DB::table('links')->where('user_id', $user->id)->where('pinned', true)->orderBy('position')->get();
        $events = Event::where('user_id', $user->id)->orderBy('date')->get();
        StatsService::createUserStats($user);
        Carbon::setLocale('ru');
        return view('user.home', compact('user', 'links', 'pinnedLinks', 'events'));
    }

    /**
     * @param int $id
     *
     * @return mixed
     *
     * Отображение админки юзера со статистикой и другим функционалом
     */
    public function editProfileForm(int $id) : mixed
    {
        if($id == Auth::user()->id) {
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

            $icons = public_path('images/social');
            $allIconsInsideFolder = File::files($icons);

            return view('user.edit-profile', compact('user', 'links', 'day', 'month', 'year', 'all', 'dayClick', 'monthClick', 'yearClick', 'allClick', 'allIconsInsideFolder'));
        } else {
            return abort(404);
        }
    }

    /**
     * @param int $id
     * @param UpdateRegisteruserRequest $request
     *
     * @return mixed
     *
     * Изменение юзера после фальш-реги
     */
    public function editUserProfile(int $id, UpdateRegisteruserRequest $request) : mixed
    {
        if($id == Auth::user()->id) {
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
            User::editUserProfile($user, $request);
            return redirect()->back();
        } else {
            return abort(404);
        }
    }


    /**
     * @param string $utag
     * @param Request $request
     *
     * @return mixed
     *
     * Отображение фальш реги формы после сканирования чипа
     */
    public function editNewUserForm(string $utag, Request $request) : mixed
    {
        $user = User::where('utag', $utag)->where('is_active', 0)->first(); //Берем юзера где ютаг = ютаг и где юзер не активен еще
        if(!$user) { //Если такой записи нет
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first(); //Берем активного юзера в бд, берем сегмент 2
            return redirect()->route('userHomePage', ['slug' => $active_user->slug]); //редиректим на страницу со слаг
        }
        return view('auth.edit-user', compact('user')); //Возвр форму фальш реги
    }

    /**
     * @param string $utag
     * @param RegNewUserRequest $request
     *
     * @return [type]
     *
     * Регистрация\обнова нового юзера
     */
    public function editNewUser(string $utag, RegNewUserRequest $request) : mixed
    {
        User::confirmNewUser($utag, $request);
        $user = User::where('utag', $utag)->where('is_active', 1)->firstOrFail();
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('editProfileForm', ['id' => $user->id]);
    }

    /**
     * @param mixed $id
     * @param Request $request
     *
     * @return [type]
     *
     * Удаление аватара или баннера в зависимости от request->type
     */
    public function delUserAvatar(int $id, Request $request)
    {
        if($id == Auth::user()->id) {
            $user = User::where('id', $id)->firstOrFail();
            if($request->type == 'avatar') {
                User::where('id', $id)->update(['avatar' => null]);
                unlink($user->avatar);
            }
            if($request->type == 'banner') {
                User::where('id', $id)->update(['banner' => null]);
                unlink($user->banner);
            }
            return redirect()->back();
        } else {
            return abort(404);
        }
    }
}

