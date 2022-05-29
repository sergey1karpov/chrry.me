<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLinks;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use App\Http\Requests\UpdateRegisteruserRequest;

class UserController extends Controller
{
    //Отображение главной страницы/профиля пользователя
    public function userHomePage($slug) {

        $user = User::where('slug', $slug)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('user.home', compact('user', 'links'));
    }

    //Отображение формы редактирования информации профиля
    public function editProfileForm($id) {
        $user = User::where('id', $id)->firstOrFail();
        $links = \DB::table('links')->where('user_id', $user->id)->orderBy('id', 'desc')->get();

        if($user) {
            return view('user.edit-profile', compact('user', 'links'));
        }
        abort(404);
    }

    public function editUserProfile($id, UpdateRegisteruserRequest $request) {
        // dd($request);
        $user = User::where('id', $id)->firstOrFail();

        if($request->avatar) {
            if($user->avatar != '') {
                // $ava = explode("/", $user->avatar);
                // Storage::delete('public/' . Auth::user()->id . '/profile/' . $ava[4]);
                $path = $user->avatar;
                unlink($path);
            }
        }

        if($request->banner) {
            if($user->banner != '') {
                // $ban = explode("/", $user->banner);
                // Storage::delete('public/' . Auth::user()->id . '/profile/' . $ban[4]);
                $path = $user->banner;
                unlink($path);
            }
        }

        if($user) {

            //Говнокод, оптимизировать всю эту чепуху
            User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    // 'locale' => $request->locale,
                ]);

            if($request->background_color != 'Выберите один из цветов') {
                User::where('id', $user->id)
                    ->update(['background_color' => $request->background_color]);
            } else {
                User::where('id', $user->id)
                    ->update(['background_color' => $user->background_color]);
            }    

            if($request->name_color != 'Выберите один из цветов') {
                User::where('id', $user->id)
                    ->update(['name_color' => $request->name_color]);
            } else {
                User::where('id', $user->id)
                    ->update(['name_color' => $user->name_color]);
            }  

            if($request->description_color != 'Выберите один из цветов') {
                User::where('id', $user->id)
                    ->update(['description_color' => $request->description_color]);
            } else {
                User::where('id', $user->id)
                    ->update(['description_color' => $user->description_color]);
            } 

            if($request->verify_color != 'Выберите один из цветов') {
                User::where('id', $user->id)
                    ->update(['verify_color' => $request->verify_color]);
            } else {
                User::where('id', $user->id)
                    ->update(['verify_color' => $user->verify_color]);
            } 

            if($request->slug) {
                User::where('id', $user->id)
                    ->update(['slug' => $request->slug]);
            }      

            if($request->avatar) {
                User::where('id', $user->id)
                    ->update(['avatar' => $this->addPhotos($request->avatar)]);
            }   

            if($request->banner) {
                User::where('id', $user->id)
                    ->update(['banner' => $this->addPhotos($request->banner)]);
            }   

            return redirect()->back();   
        }

        return abort(404);
    }

    public function addPhotos($img) {
        $path = Storage::putFile('public/' . Auth::user()->id . '/profile', $img); //Where to put the file
        // $url = Storage::url($path); //url() - Get the URL for the file at the given path.
        // return $url;
        $strpos = strpos($path, '/');
        $mb_substr = mb_substr($path, $strpos);
        $url = '../storage/app/public'.$mb_substr;
        return $url;
    }

    public function editNewUserForm($utag, Request $request) {
        $user = User::where('utag', $utag)->where('is_active', 0)->first(); //Если пидр не активен

        if(!$user) {
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first();
            return redirect()->route('userHomePage', ['slug' => $active_user->slug]); 
        }
        return view('auth.edit-user', compact('user'));
    }

    public function editNewUser($utag, Request $request) {

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'slug' => ['required', 'unique:users', 'min:5', 'max:150', 'alpha_dash'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' =>['required', 'confirmed', Rules\Password::defaults()],
        ]);

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

