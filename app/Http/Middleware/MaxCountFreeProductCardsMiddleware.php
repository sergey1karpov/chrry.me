<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaxCountFreeProductCardsMiddleware
{
    const MAX_FREE_PRODUCT_CARDS = 20;

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

        if(count($currentUser->products) > self::MAX_FREE_PRODUCT_CARDS) {
            return back()->with('error', 'Достигнут лимит на колличество карточек товара. Максимальное кол-во - 20 карточек');
        }

        return $next($request);
    }
}
