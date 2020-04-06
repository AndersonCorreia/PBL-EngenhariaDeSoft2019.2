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
        //return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', $agendamentos);
    }

    /**Função que retorna todos os visitantes de todos os agendamentos institucionais */
    public function getVisitantes(){
        $sql1 = "SELECT ID FROM agendamento_institucional";
        $result1 = $this->dataBase->query($sql1);
        $DAO = new AgendamentoInstitucionalDAO();
        $visitantes;
        $i = 1;
        while($row = mysqli_fetch_assoc($result1)){ 
            $visitantes[$i] = $DAO->getVisitantesByAgendamentoID($row['ID']);
            $i++;
        }
        $visitantes[0] = $i;
        //return view('TelaRelatoriosFuncionario.telaRelatorioVisitasAgendadas', $visitantes);
    }
}
?>