<?PHP 
namespace App\DB;
use App\Model\Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class Proposta_horarioDAO extends \App\DB\interfaces\DataAccessObject {

    public function __Construct(){
        parent::__Construct("proposta_horario");
    }

    function INSERT(object $object): bool{

    }

   function UPDATE(object $object): bool{

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

    function buscaObservacaoEstagiario($id){
        $sql = 'SELECT e.observacao FROM estagiario e WHERE usuario_ID=?';
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado->rows != NULL) {
            while($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }  
            return $registros;
        }
        throw new \Exception("Nenhum Estagiário encontrado");
    }



    /**
     * Deletar uma horario de estagiario do banco com base no ID
     * @param $id ID da estagiario;
     * @return boolean true caso operação ocorra com sucesso, caso contrário retorna false;
     */
    function DELETEbyID($id){
        $sql = "DELETE FROM horario_estagiario WHERE estagiario_usuario_ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $result = $stmt->bind_param("s",$id);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            throw new \Exception("Erro ao deletar horário");
        }
    }

    function salvaHorarioEstagiario($id, $dia, $turno){
            $sql = "INSERT IGNORE INTO horario_estagiario(dia_semana, turno, estagiario_usuario_ID) VALUES (?, ?, ?)";
            $stmt = $this->dataBase->prepare($sql);
            $stmt->bind_param("sss", $dia, $turno,$id);
            $result = $stmt->execute();
            if($result){
                return $result; 
            }
            throw new \Exception("Erro ao inserir horário");
        
        
    }



}