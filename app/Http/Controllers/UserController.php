<?php

namespace App\Http\Controllers;

use App\Models\Link;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Отображение главной страницы аккаунта
     */
    public function userHomePage(string $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();
        $pinnedLinks = \DB::table('links')->where('user_id', $user->id)->where('pinned', true)->orderBy('position')->get();

        $linksWithoutBar = \DB::table('links')->where('type', 'LINK')->where('user_id', $user->id)->where('icon', null)->orderBy('position')->get();

        $events = Event::where('user_id', $user->id)->orderBy('date')->get();
        StatsService::createUserStats($user);
        Carbon::setLocale('ru');
        return view('user.home', compact('user', 'links', 'pinnedLinks', 'events', 'linksWithoutBar'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|never
     *
     * Отображение админки юзера со статистикой и другим функционалом
     */
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
     * @param int $id
     * @param UpdateRegisteruserRequest $request
     * @return \Illuminate\Http\RedirectResponse|never
     *
     * Изменение профиля юзера
     */
    public function editUserProfile(int $id, UpdateRegisteruserRequest $request)
    {
        $user = User::where('id', $id)->firstOrFail();

        if($request->avatar) {
            if($user->avatar != '') {
                if(file_exists($user->avatar)) {
                    $path = $user->avatar;
                    unlink($path);
                }
            }
        }
        if($request->banner) {
            if($user->banner != '') {
                $path = $user->banner;
                unlink($path);
            }
        }
        if($request->favicon) {
            if($user->favicon != '') {
                $path = $user->favicon;
                unlink(ltrim($path, "/"."../"));
            }
        }
        User::editUserProfile($user, $request);
        return redirect()->back();
    }

    /**
     * @param string $utag
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     *
     * Отображение фальш реги формы после сканирования чипа
     */
    public function editNewUserForm(string $utag, Request $request)
    {
        $user = User::where('utag', $utag)->where('is_active', 0)->firstOrFail(); //Берем юзера где ютаг = ютаг и где юзер не активен еще
        if(!$user) { //Если такой записи нет
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first(); //Берем активного юзера в бд, берем сегмент 2
            return redirect()->route('userHomePage', ['slug' => $active_user->slug]); //редиректим на страницу со слаг
        }
        return view('auth.edit-user', compact('user')); //Возвр форму фальш реги
    }

    /**
     * @param string $utag
     * @param RegNewUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Регистрация\обнова нового юзера
     */
    public function editNewUser(string $utag, RegNewUserRequest $request)
    {
        User::confirmNewUser($utag, $request);
        $user = User::where('utag', $utag)->where('is_active', 1)->firstOrFail();
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('editProfileForm', ['id' => $user->id]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|never
     *
     * Удаление аватара или баннера в зависимости от request->type
     */
    public function delUserAvatar(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();

        if($request->type == 'avatar') {
            User::where('id', $id)->update(['avatar' => null]);
            if(file_exists($user->avatar)) {
                unlink($user->avatar);
            }
        }
        if($request->type == 'banner') {
            User::where('id', $id)->update(['banner' => null]);
            unlink($user->banner);
        }
        if($request->type == 'favicon') {
            User::where('id', $id)->update(['favicon' => null]);
            unlink(ltrim($user->favicon, "/"."../"));
        }

        return response()->json('deleted');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Смена цвета темы в меню
     */
    public function changeTheme(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user->dayVsNight == 0) {
            User::where('id', $id)->update(['dayVsNight' => 1]);
        } else {
            User::where('id', $id)->update(['dayVsNight' => 0]);
        }
        return response()->json('changed');
    }
}

