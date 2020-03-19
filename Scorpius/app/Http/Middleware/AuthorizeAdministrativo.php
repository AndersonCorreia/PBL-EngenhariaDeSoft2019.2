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
        $tipo = session('tipo');

        if( $tipo != 'funcionario' && $nameRota == "dashboardFuncionario.show"){
            $tipo = 'funcionario'; //padronizando o dashboard de funcionario como padrão para os novos tipos
        }

        if($permissao == $tipo || $DAO->asPermissao($tipo, $permissao) ){
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
        $this->RotasPermissoes["checkinVisitas" ] = 'realizar check-in';
        $this->RotasPermissoes["checkinUsuario" ] = 'realizar check-in';
        $this->RotasPermissoes["checkinAluno" ] = 'realizar check-in';
        $this->RotasPermissoes["concluirVisita" ] = 'realizar check-in';
        $this->RotasPermissoes["telaRelatorioVisitasAgendadas.show"] = 'relatorio dos agendamentos';
        $this->RotasPermissoes["telaGerenciamentoDeEventos.show"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["atualizarEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["editarEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["removeEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["cadastroAdm"] = 'criar usuarios';
        $this->RotasPermissoes["store.post"] = 'criar usuarios';
        $this->RotasPermissoes["cadastroEvento"] = 'cadastrar e modificar atividades' ;
        $this->RotasPermissoes["CadastroUsuario.post" ] = 'criar usuarios';
        $this->RotasPermissoes["dashboardFuncionario.show" ] = 'funcionario';
        $this->RotasPermissoes["dashboardEstagiario.show" ] = 'estagiario';
        $this->RotasPermissoes["dashboardAdm.show" ] = 'adm';
        $this->RotasPermissoes["backup" ] = 'realizar backup';
        $this->RotasPermissoes["realizarBackup" ] = 'realizar backup';
        //$this->RotasPermissoes["nome da rota" ] = 'permissão associada como ta escrito no banco';
    }
    
}
