<?php
/**
 * Esse controller está na pasta Funcionario pois mexe com informações que devem ser mantidas
 * em segurança, como email, cpf, telefone, etc. Os metodos desta classe também poderiam
 * estar no InicialController em vez daqui, mas não é de bom tom, pois como falei acima 
 * é uma questão de segurança
 */
namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\DB\AgendamentoInstitucionalDAO;

class VisitaController extends Controller{

    public function getTelaVisita(){
        //$id_user = $_SESSION["ID"]; //supondo que vai existir essa variavel
        $id_user = 601;
        $DAO = new AgendamentoInstitucionalDAO();
        $lista_espera = $DAO->SELECT_VisitaInstitucionalByStatus("lista de espera");
        $agendamentos_pendentes = $DAO->SELECT_VisitaInstitucionalByStatus("pendente");
        $agendamentos_confirmados = $DAO->SELECT_VisitaInstitucionalByStatus("confirmado");
        $agendamentos_cancelados_usuario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo usuario");
        $agendamentos_cancelados_funcionario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo funcionario");
        $variaveis = [
            'paginaAtual' => "Gerenciamento de Visitas",
            'lista_espera' => $lista_espera,
            'agendamentos_pendentes' => $agendamentos_pendentes,
            'agendamentos_confirmados' => $agendamentos_confirmados,
            'agendamentos_cancelados_usuario' => $agendamentos_cancelados_usuario,
            'agendamentos_cancelados_funcionario' => $agendamentos_cancelados_funcionario
        ];
        return view('telaGerenciamentoDeVisitas.telaGerenciamentoDeVisitas', $variaveis);
    }
    public function getListaEsperaDiaTurno($lista_espera){
        foreach($lista_espera as $agendamento){
            if($agendamento[data] == $data and $agendamento['turno'] == $turno){
                
            }
        }

    }
}
?>