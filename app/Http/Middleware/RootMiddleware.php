<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RootMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('id', $request->route('user.id'))->firstOrFail();
        if($user->id == Auth::user()->id) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
