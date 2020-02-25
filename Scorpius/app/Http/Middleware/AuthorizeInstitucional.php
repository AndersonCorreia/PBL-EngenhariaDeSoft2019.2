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
        
        if($request->session()->get('tipo') == 'institucional'){
            return $next($request);
        }
        print("\Erro: esta conta não é de Instituição!");
        session(['ID' => 701, 'tipo' => 'institucional']);
        return $next($request);//temporariamente retorna a tela normalmente
        return redirect()->route('dashboard');
    }
}
