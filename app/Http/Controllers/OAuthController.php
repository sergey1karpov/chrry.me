<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OAuthServices\GoogleOAuth;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller
{
    const GOOGLE = 'Google';
    const VK = 'VK';
    const YANDEX = 'Yandex';

    public function __construct(
        private GoogleOAuth $googleOAuth,
    ) {}

    public function OAuth(string $social)
    {
        switch ($social) {
            case self::GOOGLE:
                return redirect()->to($this->googleOAuth->OAuth());
            case 1:
                echo "i равно 1";
                break;
            case 2:
                echo "i равно 2";
                break;
        }
    }

    public function callBack(string $social)
    {
        switch ($social) {
            case self::GOOGLE:
                dd(123);
                $this->googleOAuth->OAuthCallback();
                break;
            case 1:
                echo "i равно 1";
                break;
            case 2:
                echo "i равно 2";
                break;
        }
    }
}
