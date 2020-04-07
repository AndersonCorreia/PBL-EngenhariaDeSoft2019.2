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
use App\Model\Visita;
use App\Http\Controllers\Visitante\AgendamentoController;

class VisitaController extends Controller{

    public function getTelaVisita(){
        //$id_user = $_SESSION["ID"]; 
        $id_user = 6;
        $DAO = new AgendamentoInstitucionalDAO();
        $lista_espera = $DAO->SELECT_VisitaInstitucionalByStatus("lista de espera");

        $visitasInst = $DAO->SELECTbyDateInicio_FIM("2020/04/06", "2020/04/15");
        $array = [];
        foreach($visitasInst as $v){
            $data = $v['data'];
            $this->preencherArrayDatas($array, date_create($data));
        }
        
        $array = [
            'datas' => $array['datas'],
            'visitas' => $visitasInst
        ];
        
        $agendamentos_cancelados_usuario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo usuario");
        $agendamentos_cancelados_funcionario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo funcionario");
        $variaveis = [
            'paginaAtual' => "Gerenciamento de Visitas",
            'lista_espera' => $lista_espera,
            'visitas_institucionais' => $array,
            'agendamentos_cancelados_usuario' => $agendamentos_cancelados_usuario,
            'agendamentos_cancelados_funcionario' => $agendamentos_cancelados_funcionario
        ];
        return view('telaGerenciamentoDeVisitas.telaGerenciamentoDeVisitas', $variaveis);
    }

    public function preencherArrayDatas(array &$array, \DateTime $data){
        $dm = $data->format("d/m");
        $dma= $data->format("d-m-Y");
        $d = $data->format("d");
        $day = $data->format("w");
        $mes = $data->format("m")-1;
        
        if( !isset($array["datas"]["dataInicio"]) ){
            $array["datas"]["dataInicio"] = "$d/$mes";
            $array["datas"]["data0"] = $data->format("d/m/Y");
        }
        $array["datas"]["dataFim"] = "$d/$mes";
        $array["datas"]["dataLimite"] = $data->format("d/m/Y");
        $array[$dma]["data"] = "$dm $day";
    }

    public function getListaEsperaDiaTurno($lista_espera){
        foreach($lista_espera as $agendamento){
            if($agendamento[data] == $data and $agendamento['turno'] == $turno){
                
            }
        }

    }
}
?>