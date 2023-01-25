<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCategorySlugMiddleware
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
        $slugCat = Auth::user()->productCategories->where('slug', $request->slug)->first();

        if($slugCat) {
            return redirect()->back()->with('success', 'The slug "' . $request->slug .'" has already used in category "' . $slugCat->name . '"');
        }

        return $next($request);
    }
}
