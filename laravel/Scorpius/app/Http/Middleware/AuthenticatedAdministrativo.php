<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticatedAdministrativo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $nameRota = \Route::currentRouteName();
        return $next($request);
    }
}
