<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Api\IpApiConnection;
use Illuminate\Support\Facades\App;

class IndexLocaleMiddleware
{
    public function __construct(private IpApiConnection $connection)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userData = $this->connection->getDataFromAPI($_SERVER['REMOTE_ADDR'] ?? '103.136.43.0');

        if (isset($userData['country'])) {
            if ($userData['country'] == 'Russia') {
                App::setLocale('ru');
            } else {
                App::setLocale('en');
            }
        } else {
            App::setLocale('ru');
        }

        return $next($request);
    }
}
