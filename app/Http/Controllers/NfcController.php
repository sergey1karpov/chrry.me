<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegNewUserRequest;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * NFC Chip service
 */
class NfcController extends Controller
{
    /**
     * 1. In parameter has come the uniq generated $utag - the random string
     * 2. Check user in database where $utag == 'utag' and where user is not active
     * 3. If we don't found record, we get the second segment('slug') from url and make redirect on User Profile with slug
     * 4. Another we redirect new User on page with fake-register form
     *
     * @param string $utag
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function editNewUserForm(string $utag, Request $request): View|Factory|RedirectResponse|Application
    {
        $user = User::where('utag', $utag)->where('is_active', 0)->first();

        if(!$user) {
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first();
            return redirect()->route('userHomePage', ['user' => $active_user->slug]);
        }

        return view('auth.edit-user', compact('user'));
    }

    /**
     * Fake-register new User(Update)
     *
     * @param string $utag
     * @param RegNewUserRequest $request
     * @return RedirectResponse
     */
    public function editNewUser(string $utag, RegNewUserRequest $request): RedirectResponse
    {
        User::where('utag', $utag)->update([
            'name'      => $request->name,
            'slug'      => $request->slug,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'is_active' => 1,
        ]);

        $newUser = User::where('utag', $utag)->where('is_active', 1)->firstOrFail();

        UserSettings::create(['user_id' => $newUser->id]);

        event(new Registered($newUser));

        Auth::login($newUser);

        $request->session()->regenerate();

        return redirect()->route('editProfileForm', ['user' => $newUser->id]);
    }
}
