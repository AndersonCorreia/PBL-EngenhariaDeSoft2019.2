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

require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class UserController extends Controller{   

    function getDashboard(){
        
        $array = $this->getVisitas("diurno", "now", "anterior");
        $id_user = session('ID');
        $agendamento = Visita::listarAgendamentos($id_user);
        $notificacao = Visita::listarNotificacao($id_user);
        $agenda_institucional = Visita::listarAgendamentosInstitucionais($id_user);
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Entrar na Lista de Espera", "tipo" => "institucional"];
        $leg_calend_dashboard = ["leg.disponivel" => "Disponível", "leg.indisponivel"=> "Aguardando Confirmação","tipo"=>"leg_calendario_dashboard"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'registros' => $agendamento,
            'notificacoes' => $notificacao,
            'agenda_institucional' => $agenda_institucional,
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $institucional,
            'leg_calend_dashboard'=>$leg_calend_dashboard
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

    public function getVisitas($turno, $data, $sentido){

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
                $v->preencherArrayForCalendario($array, "btn-danger");
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
