<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizeVisitante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $tipo = session("tipo");
        if( $tipo == 'visitante' || $tipo == 'institucional'){
            return $next($request);
        }
        print("\Esta conta não é de instituição ou de visitante");
        session(['ID' => 701, 'tipo' => 'institucional']);
        return $next($request);//temporariamente retorna a tela normalmente
        return redirect()->route('dashboard');
    }
}
