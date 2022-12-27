<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegNewUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * NFC Chip servise
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editNewUserForm(string $utag, Request $request)
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editNewUser(string $utag, RegNewUserRequest $request)
    {
        User::where('utag', $utag)->update([
            'name'      => $request->name,
            'slug'      => $request->slug,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'is_active' => 1,
        ]);

        $newUser = User::where('utag', $utag)->where('is_active', 1)->firstOrFail();

        event(new Registered($newUser));

        Auth::login($newUser);

        return redirect()->route('editProfileForm', ['user' => $newUser->id]);
    }
}
