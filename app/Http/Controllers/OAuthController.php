<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OAuthServices\GoogleOAuth;
use App\Http\Controllers\OAuthServices\VkOAuth;
use App\Http\Controllers\OAuthServices\YandexOAuth;
use Google\Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller
{
    const GOOGLE = 'google';
    const VK = 'vk';
    const YANDEX = 'yandex';

    public function __construct(
        private GoogleOAuth $googleOAuth,
        private VkOAuth     $vkOAuth,
        private YandexOAuth $yandexOAuth
    ) {}

    /**
     * @param string $social
     * @return RedirectResponse
     * @throws Exception
     */
    public function OAuth(string $social): RedirectResponse
    {
        switch ($social) {
            case self::GOOGLE:
                return redirect()->to($this->googleOAuth->OAuth());
            case self::VK:
                return redirect()->to($this->vkOAuth->OAuth());
            case self::YANDEX:
                return redirect()->to($this->yandexOAuth->OAuth());
        }
    }

    /**
     * @param string $social
     * @return RedirectResponse
     * @throws Exception
     */
    public function callBack(string $social): RedirectResponse
    {
        switch ($social) {
            case self::GOOGLE:
                $this->googleOAuth->OAuthCallback();
                break;
            case self::VK:
                $this->vkOAuth->OAuthCallback();
                break;
            case self::YANDEX:
                $this->yandexOAuth->OAuthCallback();
                break;
        }

        return redirect()->route('editProfileForm', ['user' => Auth::user()->id]);
    }
}
