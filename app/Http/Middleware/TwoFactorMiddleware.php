<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use App\Models\UserHash;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return string
     * @throws ValidationException
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            throw ValidationException::withMessages(['user' => 'User not found']);
        }

        if($user->two_factor_auth) {
            AuthenticatedSessionController::generateHash($user);

            $url = URL::temporarySignedRoute('twoFactorForm', now()->addMinutes(10));

            return redirect()->to($url);
        }

        return $next($request);
    }
}
