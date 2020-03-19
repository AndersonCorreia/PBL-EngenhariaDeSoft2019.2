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

    /**
     * Função que busca e retorna todos os estagiários registrados no BD.
     * @return array retorna dados dos estagiarios;
     * @return object retorna dados dos estagiarios;
     */
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

    /**
     * Função busca horário de estagiários presentes na proposta de horário.
     * @param integer id identificação de estagiario.
     * @return array proposta de horário.
     */
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

    /**
     * Função que busca as observações direcionadas ao estagiario;
     * @param integer id identificador de usuário.
     * @return array registros de observações.
     */
    function buscaObservacaoEstagiario($id){
        $sql = 'SELECT e.observacao FROM estagiario e WHERE usuario_ID=?';
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


    /**
     * Função que salva os horários dos estagiários.
     * @param integer id identificador de usuario.
     * @param string dia dia da semana que estágiario irá trabalhar.
     * @param string turno turno na qual usuário irá trabalhar.
     */
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