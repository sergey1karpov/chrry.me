<?php

namespace App\AuthServices;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class VkAuthService
{
    public static function driver()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public static function register()
    {
        $user = Socialite::driver('vkontakte')->user();

        $createdUser = User::where('vk_id', $user->getId())->first();

        if($user->getEmail()) {
            $a = User::updateOrCreate(
                [
                    'vk_id' => $user->getId(),
                ],
                [
                    'name'      => $user->getName(),
                    'slug'      => isset($createdUser) ? $createdUser->slug : $user->getNickname(),
                    'email'     => $user->getEmail(),
                    'password'  => Hash::make(UserObserver::flush()),
                    'is_active' => 1,
                    'avatar'    => isset($createdUser) ? $createdUser->avatar : $user->getAvatar(),
                    'vk_id'     => $user->getId(),
                ]
            );

            Auth::login($a);
            return redirect()->route('editProfileForm', ['id' => $a->id]);
        }

        $createUserWithGenerateEmail = User::updateOrCreate(
            [
                'vk_id' => $user->getId(),
            ],
            [
                'name'      => $user->getName(),
                'slug'      => isset($createdUser) ? $createdUser->slug : $user->getNickname(),
                'email'     => isset($createdUser) ? $createdUser->email : UserObserver::flush() . '@gmail.com',
                'password'  => Hash::make(UserObserver::flush()),
                'is_active' => 1,
                'avatar'    => isset($createdUser) ? $createdUser->avatar : $user->getAvatar(),
                'vk_id'     => $user->getId(),
            ]
        );

        if($createdUser) {
            Auth::login($createdUser);
            return redirect()->route('editProfileForm', ['id' => $createdUser->id]);
        } else {
            return view('auth.changeGenerateEmail', compact('createUserWithGenerateEmail'));
        }
    }


}
