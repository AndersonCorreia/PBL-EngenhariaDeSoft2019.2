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
        if( $tipo == 'visitante' || $tipo == 'institucional'){
            return $next($request);
        }
        print("\Erro: esta conta não é de Instituição ou de Visitante!");
        session(['ID' => 601, 'tipo' => 'institucional']);
        return $next($request);//temporariamente retorna a tela normalmente
        return redirect()->route('dashboard');
    }
}
