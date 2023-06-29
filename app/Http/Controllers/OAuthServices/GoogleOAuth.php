<?php

namespace App\Http\Controllers\OAuthServices;

use App\Contracts\OAuthInterface;
use App\Models\User;
use App\Models\UserSettings;
use Google\Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Google_Client;
use Google_Service_Oauth2;

class GoogleOAuth implements OAuthInterface
{
    /**
     * @var string Google OAuth config file
     */
    private string $configFile = '../googleConfig.json';

    /**
     * @return string
     * @throws Exception
     */
    public function OAuth(): string
    {
        $client = new Google_Client();

        $client->setAuthConfig($this->configFile);
        $client->addScope('email');
        $client->addScope('profile');

        return $client->createAuthUrl();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function OAuthCallback(): void
    {
        $client = new Google_Client();

        $client->setAuthConfig($this->configFile);

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

            $client->setAccessToken($token['access_token']);

            $google_oauth = new Google_Service_Oauth2($client);

            $google_account_info = $google_oauth->userinfo->get();

            $createdUser = User::where('email', $google_account_info->email)->first();

            if(!$createdUser) {

                $user = User::create([
                    'name' => stristr($google_account_info->email, '@', true),
                    'slug' => stristr($google_account_info->email, '@', true),
                    'email' => $google_account_info->email,
                    'password' => Hash::make(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10)),
                    'remember_token' => Str::random(60),
                ]);

                UserSettings::create(['user_id' => $user->id]);

                event(new Registered($user));

                Auth::login($user);
            } else {
                Auth::login($createdUser);
            }

            request()->session()->regenerate();
        }
    }
}
