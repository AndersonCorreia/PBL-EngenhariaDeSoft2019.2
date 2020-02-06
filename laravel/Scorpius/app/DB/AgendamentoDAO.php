<?PHP 
namespace App\DB;
use App\Model\Agendamento;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados ou Data Access Object(DAO) relacionados à classe Agendamento.
 */

 class AgendamentoDAO extends \App\DB\interfaces\DataAccessObject {

    function INSERT($agendamento): bool{

        $turma = $agendamento->getTurma(); 
        $visita = $agendamento->getAgendamento();
        $dataAgendamento = $agendamento->getDataAgendamento();
        $exposicao = $agendamento->getExposicao();
        $statusAg =$agendamento->getStatusAg();
        $turmaID = $agendamento->getTurmaID(); 

        $sql = "INSERT INTO agendamento (turma, visita, dataAgendamento, exposicao, statusAg, turmaID) VALUE (
            '$turma',
            '$visita',
            '$dataAgendamento',
            '$exposicao',
            '$statusAg',
            '$turmaID'
        )";
        
        $resultado = $this->dataBase->query($sql);
        // dd($resultado)
        return $resultado;

    }

    function UPDATE($Agendamento): bool{

    }

    function DELETE($agendamento): bool{

    }
 }

