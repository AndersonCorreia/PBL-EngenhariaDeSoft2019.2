<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        if($request->session()->has('ID')){
            return $next($request);
        }
        print("Você não está conectado em uma conta!");
        return $next($request);
        return redirect()->route('entrar');
    }
}
