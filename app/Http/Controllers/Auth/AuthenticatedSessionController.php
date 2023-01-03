<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\TwoFactorMail;
use App\Models\User;
use App\Models\UserHash;
use App\Observers\UserObserver;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
//        $user = User::where('email', $request->email)->first();
//        if(!$user) {
//            throw ValidationException::withMessages(['user' => 'User not found']);
//        }
//        if($user->two_factor_auth == true) {
//            AuthenticatedSessionController::generateHash($user);
//
//            $url = URL::temporarySignedRoute('twoFactorForm', now()->addMinutes(1), ['user' => $user->id]);
//
//            return redirect()->to($url);
//        }

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('editProfileForm', ['user' => Auth::user()->id]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Generate hash and send it to user email
     *
     * @param User $user
     * @return void
     */
    public static function generateHash(User $user)
    {
        $hash = UserObserver::flush();

        UserHash::updateOrCreate(
            ['user_id' =>  $user->id],
            [
                'hash' => $hash,
            ],
        );

        Mail::to($user->email)->send(new TwoFactorMail($hash));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function twoFactorForm(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        return view('auth.two-factor');
    }


    public function hashCheck(Request $request)
    {
        $userHash = UserHash::where('hash', $request->hash)->first();

        if($userHash) {
            $this->dropHash($userHash->hash);

            Auth::login($userHash->user);

            $request->session()->regenerate();

            return redirect()->route('editProfileForm', ['user' => $userHash->user->id]);
        }

        throw ValidationException::withMessages(['hash' => 'Your code not valid']);
    }

    public function dropHash(string $hash)
    {
        UserHash::where('hash', $hash)->update([
            'hash' => null,
        ]);
    }
}
