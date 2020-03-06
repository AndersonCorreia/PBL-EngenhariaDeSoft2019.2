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

        if($permissao == session('tipo') || $DAO->asPermissao(session('tipo'), $permissao) ){
            return $next($request);
        }
        return redirect()->route('paginaInicial');
    }

    public function setRotasPermissoes(){
        //"estagiario" representa as permissões especificas do estagiario
        $this->RotasPermissoes[ "enviaHorario" ]='designar horários para estagiarios';
        $this->RotasPermissoes[ "retornaProposta" ]='designar horários para estagiarios';
        $this->RotasPermissoes[ "telaGerenciamentoDehorarios.show" ] = 'designar horários para estagiarios';
        $this->RotasPermissoes[ "telaGerenciamentoDeVisitas.show" ] = 'gerenciamento de visitas';
        $this->RotasPermissoes["demandaWeb.show" ] = 'demanda web';
        $this->RotasPermissoes["telaRelatorioVisitasAgendadas.show"] = 'relatorio dos agendamentos';
        $this->RotasPermissoes["telaGerenciamentoDeEventos.show"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["atualizarEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["editarEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["removeEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["CadastroUsuario.show" ] = 'criar usuarios';
        $this->RotasPermissoes["CadastroUsuario.post" ] = 'criar usuarios';
        $this->RotasPermissoes["dashboardFuncionario.show" ] = 'funcionario';
        
        //$this->RotasPermissoes["nome da rota" ] = 'permissão associada como ta escrito no banco';
    }
    
}
