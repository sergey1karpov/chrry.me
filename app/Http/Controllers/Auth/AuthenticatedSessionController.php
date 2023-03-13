<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\TwoFactorMail;
use App\Models\User;
use App\Models\UserHash;
use App\Observers\UserObserver;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @return RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('editProfileForm', ['user' => Auth::user()->id]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
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
    public static function generateHash(User $user): void
    {
        $hash = rand();

        UserHash::updateOrCreate(
            ['user_id' =>  $user->id],
            [
                'hash' => $hash,
            ],
        );

        Mail::to($user->email)->send(new TwoFactorMail($hash));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function twoFactorForm(Request $request): View|Factory|Application
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        return view('auth.two-factor');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function hashCheck(Request $request): RedirectResponse
    {
        $userHash = UserHash::where('hash', $request->hash)->first();

        if($userHash) {
            $this->dropHash($userHash->hash);

            Auth::login($userHash->user);

            $request->session()->regenerate();

            return redirect()->route('editProfileForm', ['user' => $userHash->user->id]);
        }

        return redirect()->back()->with('bad_code', 'Your code not valid');
    }

    /**
     * @param string $hash
     * @return void
     */
    public function dropHash(string $hash): void
    {
        UserHash::where('hash', $hash)->update([
            'hash' => null,
        ]);
    }
}
