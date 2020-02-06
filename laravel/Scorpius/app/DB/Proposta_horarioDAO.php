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
        $sql = 'SELECT a.nome  from estagiario e join usuario a on a.ID = e.usuario_ID';
        $resultado = $this->dataBase->query($sql);
        if($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }  
            return $registros;
        }

        throw new \Exception("Nenhum estagiario encontrado");
    }

}