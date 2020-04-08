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
        if(!empty($_POST['instituicao'])){
            $agendamentos = $DAO->SELECT_AgendamentoInstitucionalByNomeInstituicao($nome_instituicao);
        }
        return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', ["agendamentos" => $agendamentos]);
    }

    /**Função que retorna todos os visitantes de todos os agendamentos institucionais */
    public function getVisitantes($id){
        $DAO = new AgendamentoInstitucionalDAO();
        $visitante = $DAO->getVisitantesByAgendamentoID($id);
        return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', ["visitante" => $visitante]);
    }
}
?>