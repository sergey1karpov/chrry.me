<?php

namespace App\Http\Controllers\OAuthServices;

use App\Contracts\OAuthInterface;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use VK\Client\VKApiClient;
use VK\OAuth\Scopes\VKOAuthUserScope;
use VK\OAuth\VKOAuth as VK;
use VK\OAuth\VKOAuthDisplay;
use VK\OAuth\VKOAuthResponseType;

class VkOAuth implements OAuthInterface
{
    private int $clientId = 51612657;

    private string $privateKey = '3vlZ60DjgkBFeMCwH0JY';

    public function OAuth(): string
    {
        $oauth = new VK();
        $redirect_uri = route('callBack', ['social' => 'vk']);
        $display = VKOAuthDisplay::PAGE;
        $scope = array(VKOAuthUserScope::WALL, VKOAuthUserScope::GROUPS);
        $state = 'secret_state_code';

        return $oauth->getAuthorizeUrl(VKOAuthResponseType::CODE, $this->clientId, $redirect_uri, $display, $scope, $state);
    }

    public function OAuthCallback(): void
    {
        $oauth = new VK();
        $redirect_uri = route('callBack', ['social' => 'vk']);
        $code = $_GET['code'];

        $response = $oauth->getAccessToken($this->clientId, $this->privateKey, $redirect_uri, $code);

        $vk = new VKApiClient();

        $user = $vk->users()->get($response['access_token'], array(
            'user_ids' => array($response['user_id']),
            'fields' => array('domain', 'verified'),
        ));

        $userVkId = User::where('vk_id', $user[0]['id'])->first();

        if(!$userVkId) {
            $user = User::create([
                'vk_id' => $user[0]['id'],
                'name' => $user[0]['first_name'] . ' ' . $user[0]['last_name'],
                'slug' => $user[0]['domain'],
                'email' => '-',
                'password' => Hash::make(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10)),
                'remember_token' => Str::random(60),
                'verify' => $user[0]['verified']
            ]);

            UserSettings::create(['user_id' => $user->id]);

            event(new Registered($user));

            Auth::login($user);
        } else {
            Auth::login($userVkId);
        }

        request()->session()->regenerate();
    }
}
