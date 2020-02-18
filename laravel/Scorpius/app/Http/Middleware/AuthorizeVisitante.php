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
        
        $tipo = session("tipo", "institucional");
        if( $tipo == 'visitante' || $tipo == 'institucional'){
            return $next($request);
        }
        print("\Esta conta não é de instituição ou de visitante");
        session(['ID' => 701, 'tipo' => 'institucional']);
        return $next($request);//temporariamente retorna a tela normalmente
        return redirect()->route('dashboard');
    }

    public function setRotasPermissoes(){
        //"estagiario" representa as permissões especificas do estagiario
        $this->RotasPermissoes[ "dashboard.show" ] = "visitante";
       
    }
}
