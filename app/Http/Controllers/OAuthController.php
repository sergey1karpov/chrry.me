<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OAuthServices\GoogleOAuth;
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
                echo "i равно 1";
                break;
            case self::YANDEX:
                echo "i равно 2";
                break;
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
                echo "i равно 1";
                break;
            case self::YANDEX:
                echo "i равно 2";
                break;
        }

        return redirect()->route('editProfileForm', ['user' => Auth::user()->id]);
    }
}
