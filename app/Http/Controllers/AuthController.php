<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\AuthServices\VkAuthService;
use App\AuthServices\YandexAuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param $social
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse|void
     */
    public function index($social)
    {
        if($social == 'vk') {
            return VkAuthService::driver();
        }
        if($social == 'yandex') {
            return YandexAuthService::driver();
        }
    }

    /**
     * @param $social
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
    public function callback($social)
    {
        if($social == 'vk') {
            return VkAuthService::register();
        }
        if($social == 'yandex') {
            return YandexAuthService::register();
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeUserEmail(int $id, Request $request)
    {
        User::where('id', $id)->update([
            'email' => $request->email,
        ]);

        $user = User::find($id);
        Auth::login($user);
        return redirect()->route('editProfileForm', ['id' => $user->id]);
    }
}
