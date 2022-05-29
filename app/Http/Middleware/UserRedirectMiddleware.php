<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class UserRedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $user = User::where('utag', $request->path())->firstOrFail();
        // if($user) {
        //     dd('rrr');
        //     return redirect()->route('userHomePage', ['slug' => $user->slug]);
        // } else {
        //     dd('qw');
        //     return redirect()->route('userHomePage', ['slug' => $request->path()]);
        // }
        // dd($request->path());
        return $next($request);
    }
}
