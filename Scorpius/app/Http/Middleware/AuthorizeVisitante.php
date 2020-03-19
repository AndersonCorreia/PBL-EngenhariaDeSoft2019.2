<?php

namespace App\Http\Middleware;

use Closure;
use App\DB\PessoaDAO;
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
        if( $tipo == 'visitante' || $tipo == 'institucional' || $tipo == 'scorpius'){
            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}
