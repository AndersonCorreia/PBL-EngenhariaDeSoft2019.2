<?PHP 
namespace App\DB;
use App\Model\Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class Proposta_horarioDAO extends \App\DB\interfaces\DataAccessObject {
    function INSERT(object $object): bool{

    }

   function UPDATE(object $object): bool{

   }
    
    function DELETE(object $object): bool{

    }

    function buscaEstagiarioALL( ){
        $sql = 'SELECT a.nome, a.ID  from estagiario e join usuario a on a.ID = e.usuario_ID';
        $resultado = $this->dataBase->query($sql);
        if($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }  
            return $registros;
        }

        throw new \Exception("Nenhum estagiario encontrado");
    }

    function buscaHorarioEstagiario($id){
        $sql = 'SELECT p.dia_semana, p.turno FROM proposta_horario p WHERE estagiario_usuario_ID=?';
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }  
            return $registros;
        }
        throw new \Exception("Nenhum estagiario encontrado");
    }

    function salvaHorarioEstagiario($id, $dia, $turno){
        $sql = "INSERT IGNORE INTO horario_estagiario(dia_semana, turno, estagiario_usuario_ID) VALUES (?, ?, ?)";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("sss", $dia, $turno,$id);
        $result = $stmt->execute();
        if($result){
            return $result; 
        }
        throw new \Exception("Erro ao inserir");
    }



}