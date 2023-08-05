<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaxCountFreeEventsMiddleware
{
    const MAX_FREE_EVENTS = 50;

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

        if(count($currentUser->events) > self::MAX_FREE_EVENTS) {
            return back()->with('error', 'Достигнут лимит на колличество мероприятий. Максимальное кол-во - 50 мероприятий');
        }

        return $next($request);
    }
}
