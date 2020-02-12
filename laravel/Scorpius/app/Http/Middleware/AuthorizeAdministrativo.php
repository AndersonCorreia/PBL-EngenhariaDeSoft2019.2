<?php

namespace App\Http\Middleware;

use Closure;
use App\DB\PessoaDAO;

class AuthorizeAdministrativo{
    
    private $RotasPermissoes = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $this->setRotasPermissoes();
        $nameRota = \Route::currentRouteName();
        $permissao = $this->RotasPermissoes[$nameRota];
        $DAO = new PessoaDAO();
        $user = $DAO->SELECTbyID(session("ID",601));//pegando um user visitante por default pra evitar erro

        if($permissao = $user['tipo'] || $DAO->asPermissao($user["tipo"], $permissao) ){
            return $next($request);
        }
        
        print_r("            Esse usuario não tem permissão para acessar essa pagina");
        return $next($request);
        return redirect()->route('dashboard');
    }

    public function setRotasPermissoes(){
        //"estagiario" representa as permissões especificas do estagiario
        $this->RotasPermissoes[ "HorarioEstagiario.show" ] = "estagiario";
        $this->RotasPermissoes["retornaProposta"]='rota ajax';
        $this->RotasPermissoes[ "telaGerenciamentoDehorarios.show" ] = 'designar horários para estagiarios';
        $this->RotasPermissoes[ "telaGerenciamentoDeVisitas.show" ] = 'gerenciamento de visitas';
        //$this->RotasPermissoes["nome da rota" ] = 'permissão associada como ta escrito no banco';
    }
}
