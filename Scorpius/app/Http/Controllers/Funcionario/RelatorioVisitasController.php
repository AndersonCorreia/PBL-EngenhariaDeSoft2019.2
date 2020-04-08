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

class RelatorioVisitasController extends Controller{
    public function getTelaRelatorioVisitas(){
        $DAO = new AgendamentoInstitucionalDAO();
        $agendamentos = $DAO->SELECTall_AgendamentoInstitucional();
        $nome_instituicao = $_POST['instituicao'];
        if(!empty($_POST['$nome_instituicao'])){
            $agendamentos = $DAO->SELECT_AgendamentoInstitucionalByNomeInstituicao($nome_instituicao);
        }
        foreach ($agendamentos as $agendamento) {
            $id = $agendamento['agendamentoID'];
            $visitante[$id] = $DAO->getVisitantesByAgendamentoID($id);
            $quant_visitantes[$id] = count($visitante[$id]);
        }
        $variaveis = ['agendamentos' => $agendamentos, 'visitante' => $visitante, 'quant_visitantes' => $quant_visitantes];
        return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', $variaveis);
    }
}
?>