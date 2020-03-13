<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Instituicao;
use App\Model\Visita;
use App\Model\Professor_instituicao;
use App\DB\PessoaDAO;
use App\DB\Professor_InstituicaoDAO;
use App\DB\VisitaDAO;
use App\DB\TurmaDAO;
use App\Model\AgendamentoInstitucional;

class UserController extends Controller{   

    public function getDashboard(){
        
        $array = $this->getVisitas("diurno", "now", "anterior", session("tipo"));
        $id_user = session('ID');
        $tipo = session('tipo');
        $agendamento = AgendamentoInstitucional::listarAgendamentos($id_user);
        $notificacao = AgendamentoInstitucional::listarNotificacao($id_user);
        $agenda_institucional = AgendamentoInstitucional::listarAgendamentosInstitucionais($id_user);
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Lista de Espera disponivel", "tipo" => "institucional"];
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'registros' => ['agendamento'=>$agendamento,'agendamento_institucional'=>$agenda_institucional],
            'notificacoes' => $notificacao,
            'agenda_institucional' => $agenda_institucional,
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $$tipo
        ];

        return view("Dashboard_visitante.Dashboard_visitante",$variaveis);
    }

    /**
     * Função para realizar o login do usuario, preencher a sessão com o ID, nome e Tipo do usuario
     *
     * @param [type] $request
     * @return void
     */
    public function login(Request $request){
        $user = $request["e-mail"];
        $senha = $request["senha"];
        $DAO = new PessoaDAO();
        $usuario = $DAO->UserLogin($user, $senha);//lança uma exception se as informações estiverem incorretas

        $request->session()->regenerate();//a documentação falava que era para previnir um ataque chamado "session fixation"
        session(["ID" => $usuario["ID"], "nome" => $usuario["nome"], "tipo" => $usuario["tipo"]]);

        return redirect()->route("dashboard");
    }

    /**
     * faz o logout do usuario apagando todos os dados da sessão
     *
     * @param [type] $request
     * @return void
     */
    public function logout(Request $request){

        $request->session()->flush();
        return redirect()->route("paginaInicial");
    }

    public function historicoDeVisitas(){

        $idUser = session('ID');
        $DAO = new AgendamentoInstitucionalDAO();
        $agendamentos = $DAO->SELECT_VisitaInstitucionalByUserID($idUser, now(), '<', true);
        $variaveis = [
            'pagina atual' => "Histórico de Visitas"
        ];

        return \view('telasUsuarios.HistoricoDeVisitas.institucional', $variaveis);
    }

    public function getVisitas($turno, $data, $sentido, $tipo){

        $DAO = new VisitaDAO();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));
        if($sentido=="anterior"){
            $dataAtual = now();  
        }
        else {
            $dataAtual = $data;
        }
        $visitas= $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim, ($turno=="diurno"), 20);
        $array = [];
        foreach ($visitas as $v) {
            if(count($array)<12){
                $v->preencherArrayForCalendario($array, $tipo);
            }
        }
        $dataFinalReal= new \DateTime($array["datas"]["dataLimite"]);
        if ( count($array)>11 ){
            $dataFinalReal->sub(new \DateInterval("P1D"));
        }
        $array["datas"]["dataLimite"] = $dataFinalReal->format("Y-m-d");
        return $array;
    }
}
