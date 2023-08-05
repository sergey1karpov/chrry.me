<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaxCountFreeLinksMiddleware
{
    const MAX_FREE_LINKS = 50;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = Auth::user();

        if(count($currentUser->links) > self::MAX_FREE_LINKS) {
            return back()->with('error', 'Достигнут лимит на колличество ссылок. Максимальное кол-во - 50 ссылок');
        }

        return $next($request);
    }
}
