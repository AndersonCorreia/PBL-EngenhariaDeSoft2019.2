<?php

namespace App\Http\Controllers\Visitante;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Instituicao;
use App\Model\Visita;
use App\DB\VisitaDAO;
use App\DB\TurmaDAO;
use App\Model\AgendamentoInstitucional;
use App\DB\AgendamentoInstitucionalDAO;
use App\DB\AgendamentoIndividualDAO;
use App\DB\interfaces\DataAccessObject;

class UserController extends Controller
{

    public function getDashboard()
    {

        $array = $this->getVisitas("diurno", "now", "anterior", session("tipo"));
        $id_user = session('ID');
        $tipo = session('tipo');
        $agendamento = AgendamentoInstitucional::listarAgendamentos($id_user);
        $notificacao = AgendamentoInstitucional::listarNotificacao($id_user);
        $agenda_institucional = AgendamentoInstitucional::listarAgendamentosInstitucionais($id_user);
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Lista de Espera disponivel", "tipo" => "institucional"];
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'registros' => ['agendamento' => $agendamento, 'agendamento_institucional' => $agenda_institucional],
            'notificacoes' => $notificacao,
            'agenda_institucional' => $agenda_institucional,
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda' => $$tipo
        ];

        return view("Dashboard_visitante.Dashboard_visitante", $variaveis);
    }

    public function historicoDeVisitas()
    {

        $idUser = session('ID');
        
        if (session('tipo') != 'visitante'){
            $DAO = new AgendamentoInstitucionalDAO();
            $agendamentosI = $DAO->SELECT_VisitaInstitucionalByUserID($idUser, now(), '<', true);
            $this->completarDadosAgend($agendamentosI, $DAO);
        }
        else {
            $agendamentosI = false;
        }

        $DAO = new AgendamentoIndividualDAO();
        $agendamentos = $DAO->SELECT_VisitaIndividualByUserID($idUser, '<', '!=', now(), 'qualquer', true);
        $this->completarDadosAgend($agendamentos, $DAO);

        $variaveis = [
            'paginaAtual' => "Histórico de Visitas",
            'agendamentosInstitucionais' => $agendamentosI,
            'agendamentos' => $agendamentos,
        ];

        return \view('telasUsuarios.HistoricoDeVisitas.index', $variaveis);
    }

    public function detalhamentoDeVisitas(){

        $idUser = session('ID');
        
        if (session('tipo') != 'visitante'){
            $DAO = new AgendamentoInstitucionalDAO();
            $agendamentosI = $DAO->SELECT_VisitaInstitucionalByUserID($idUser, now(), '>=', true);
            $this->completarDadosAgend($agendamentosI, $DAO);
        }
        else {
            $agendamentosI = false;
        }

        $DAO = new AgendamentoIndividualDAO();
        $agendamentos = $DAO->SELECT_VisitaIndividualByUserID($idUser, '>=', '!=', now(), 'qualquer', true);
        $this->completarDadosAgend($agendamentos, $DAO);

        $variaveis = [
            'paginaAtual' => "Detalhamento Das Proximas Visitas",
            'agendamentosInstitucionais' => $agendamentosI,
            'agendamentos' => $agendamentos,
        ];

        return \view('telasUsuarios.HistoricoDeVisitas.visitasFuturas', $variaveis);
    }

    private function completarDadosAgend(array &$agendamentos, DataAccessObject $DAO){

        foreach ($agendamentos as $key => $value) {
            $agendamentos[$key]['exposicoes'] = $DAO->getExposicoesByAgendamentoID($value['agendamentoID']);
            $agendamentos[$key]['visitantes'] = $DAO->getVisitantesByAgendamentoID($value['agendamentoID']);
            $agendamentos[$key]['totalVisitantes'] = count($agendamentos[$key]['visitantes']);
            $agendamentos[$key]['responsaveis'] = $DAO->getResponsaveisByAgendamentoID($value['agendamentoID']);
        }
    }

    public function getVisitas($turno, $data, $sentido, $tipo)
    {

        $DAO = new VisitaDAO();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));
        if ($sentido == "anterior") {
            $dataAtual = now();
        } else {
            $dataAtual = $data;
        }
        $visitas = $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim, ($turno == "diurno"), 20);
        $array = [];
        foreach ($visitas as $v) {
            if (count($array) < 12) {
                $v->preencherArrayForCalendario($array, $tipo);
            }
        }
        $dataFinalReal = new \DateTime($array["datas"]["dataLimite"]);
        if (count($array) > 11) {
            $dataFinalReal->sub(new \DateInterval("P1D"));
        }
        $array["datas"]["dataLimite"] = $dataFinalReal->format("Y-m-d");
        return $array;
    }
}
