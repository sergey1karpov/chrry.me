<?php

namespace App\Http\Controllers\OAuthServices;

use App\Contracts\OAuthInterface;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class YandexOAuth implements OAuthInterface
{
    private string $clientId = 'bb784ccd17fc47ce9b741a585d8b1165';

    private string $clientSecret = '07975b4da2a54c6d8c188b5fd7221a28';

    public function OAuth(): string
    {
        $params = array(
            'client_id'     => $this->clientId,
            'redirect_uri'  => route('callBack', ['social' => 'yandex']),
            'response_type' => 'code',
            'state'         => '123'
        );

        return 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query($params));
    }

    public function OAuthCallback(): void
    {
        if (!request()->get('code')) {

            $response = Http::asForm()->post('https://oauth.yandex.ru/token', [
                'grant_type'    => 'authorization_code',
                'code'          => request()->get('code'),
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]);

            $data = json_decode($response->body(), true);

            if (!empty($data['access_token'])) {
                $response = Http::withHeaders([
                    'Authorization' => 'OAuth ' . $data['access_token']
                ])
                    ->asForm()
                    ->post('https://login.yandex.ru/info', [
                        'format' => 'json'
                    ]);

                $userYandex = $response->object();

                $createdUser = User::where('email', $userYandex->default_email)->first();

                if(!$createdUser) {

                    $user = User::create([
                        'name'           => $userYandex->real_name,
                        'slug'           => $userYandex->login,
                        'email'          => $userYandex->default_email,
                        'password'       => Hash::make(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10)),
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
}
