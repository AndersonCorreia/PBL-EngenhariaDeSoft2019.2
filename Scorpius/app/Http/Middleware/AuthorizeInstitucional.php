<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizeInstitucional{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next){   
        
        $tipo = session('tipo');
        if($tipo == 'institucional' || $tipo == 'scorpius'){
            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}
