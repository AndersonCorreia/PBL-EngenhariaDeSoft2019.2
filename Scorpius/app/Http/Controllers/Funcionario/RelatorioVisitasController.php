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

    public function agendamentosInstitucionais(){
        $sql1 = "SELECT ID FROM agendamento_institucional";
        $result1 = $this->dataBase->query($sql1);
        $DAO = new AgendamentoInstitucionalDAO();
        $agendamentos;
        $i = 0;
        while($row = mysqli_fetch_assoc($result1)){ 
            $agendamentos[$i] = $DAO->SELECT_AgendamentoInstitucionalById($row[ID]);
            $i++;
        }
        return $agendamentos;
    }
}
?>