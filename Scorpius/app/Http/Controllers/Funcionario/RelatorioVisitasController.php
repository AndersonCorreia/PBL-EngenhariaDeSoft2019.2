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

class RelatorioVisitasController extends Controller{
    public function getTelaRelatorioVisitas(){
        return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas');
    }

    /**Função que retorna todos os agendamentos institucionais */
    public function getAgendamentosInstitucionais(){
        $nome_instituicao = $_POST['nomeInstituicao'];
        $DAO = new AgendamentoInstitucionalDAO();
        $agendamentos = $DAO->SELECT_AgendamentoInstitucionalByNomeInstituicao($nome_instituicao);
        return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', $agendamentos);
    }

    /**Função que retorna todos os visitantes de todos os agendamentos institucionais */
    public function getVisitantes(){
        $nome_instituicao = $_POST['nomeInstituicao'];
        $sql = "SELECT agendamentoID FROM visita_institucional WHERE instituicao  = '$nome_instituicao'";
        $result = $this->dataBase->query($sql);
        $array = $result->fetch_all(MYSQLI_ASSOC);
        $DAO = new AgendamentoInstitucionalDAO();
        $visitantes = $DAO->getVisitantesByAgendamentoID($array['agendamentoID']);
        return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', $visitantes);
    }
}
?>