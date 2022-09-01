<?php

namespace App\AuthServices;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class YandexAuthService
{
    public static function driver()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public static function register()
    {
        $user = Socialite::driver('yandex')->user();

        $createdUser = User::where('yandex_id', $user->getId())->first();
        if($createdUser) {
            Auth::login($createdUser);
            return redirect()->route('editProfileForm', ['id' => $createdUser->id]);
        }

        $createUserWithGenerateEmail = User::updateOrCreate(
            [
                'yandex_id' => $user->getId(),
            ],
            [
                'name'      => $user->getNickname(),
                'slug'      => isset($createdUser) ? $createdUser->slug : $user->getNickname(),
                'email'     => $user->getNickname() . '@yandex.ru',
                'password'  => Hash::make(UserObserver::flush()),
                'is_active' => 1,
                'avatar'    => isset($createdUser->avatar) ? $createdUser->avatar : asset('public/images/default_images/default_profile_ava.jpg'),
                'yandex_id' => $user->getId(),
            ]
        );


        Auth::login($createUserWithGenerateEmail);
        return redirect()->route('editProfileForm', ['id' => $createUserWithGenerateEmail->id]);
    }


}
