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







        $campos = "(nome, responsavel, endereco, numero, cidade_UF_id, cep, telefone, tipo_instituicao)";
        $select = "SELECT ?, ?, ?, ?, c.id, ?, ?, ? FROM cidade_UF c WHERE c.cidade = ? AND c.UF = ?";
        $sql = "INSERT INTO instituicao $campos $select";

        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("sssssssss", $nome, $resp, $endereco, $numero, $cep, $tel, $tipo, $cidade, $UF);
        $resultado = $stmt->execute();
        $instituicao->setID($this);//adcionando ID no objeto que acabou de ser inserido

        return $resultado;
    }

 }

