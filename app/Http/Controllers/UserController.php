<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\StatsService;
use App\Http\Requests\RegNewUserRequest;

class UserController extends Controller
{
    //Отображение главной страницы/профиля пользователя
    public function userHomePage($slug) {

        $user = User::where('slug', $slug)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        StatsService::createUserStats($user);

        return view('user.home', compact('user', 'links'));
    }

    public function editProfileForm($id) {
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

        if($user) {
            return view('user.edit-profile', compact('user', 'links', 'day', 'month', 'year', 'all', 'dayClick', 'monthClick', 'yearClick', 'allClick'));
        }
        abort(404);
    }

    public function editUserProfile($id, UpdateRegisteruserRequest $request) {

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

            User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'background_color' => isset($request->background_color) ? $request->background_color : $user->background_color,
                    'name_color' => isset($request->name_color) ? $request->name_color : $user->name_color,
                    'description_color' => isset($request->description_color) ? $request->description_color : $user->description_color,
                    'verify_color' => isset($request->verify_color) ? $request->verify_color : $user->verify_color,
                    'slug' => isset($request->slug) ? $request->slug : $user->slug,
                    'avatar' => isset($request->avatar) ? $this->addPhotos($request->avatar) : $user->avatar,
                    'banner' => isset($request->banner) ? $this->addPhotos($request->banner) : $user->banner,
                ]);

            return redirect()->back();
        }

        return abort(404);
    }

    public function addPhotos($img) {
        $path = Storage::putFile('public/' . Auth::user()->id . '/profile', $img);
        $strpos = strpos($path, '/');
        $mb_substr = mb_substr($path, $strpos);
        $url = '../storage/app/public'.$mb_substr;
        return $url;
    }

    public function editNewUserForm($utag, Request $request) {
        $user = User::where('utag', $utag)->where('is_active', 0)->first();

        if(!$user) {
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first();
            return redirect()->route('userHomePage', ['slug' => $active_user->slug]);
        }
        return view('auth.edit-user', compact('user'));
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

