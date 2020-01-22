<?PHP 

namespace App\DB;
use App\Model\Users\Pessoa;//falta inserir as outras classes
use App\Model\Users\Usuario;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe pessoa
 * e todas as subclasses.
 */
class PessoaDAO extends \App\DB\interfaces\DataAccessObject {

    function INSERT($pessoa): bool{
        //usa a variavel $dataBase para  fazer a query no banco
        $this->dataBase;
    }
    function UPDATE($pessoa): bool{
        return true;
    }
    function DELETE($pessoa): bool{

    }
    function SELECT_ALL(String $table="usuario"){
        return parent::SELECT_ALL($table);// inves de apenas retorna criar os objetos da classe
        //talvez nesse select all não seja util mas os selects de um usuario especifico devem criar o objeto
    }
    /**
     * Undocumented function
     *
     * @return Pessoa
     */
    function SELECTbyCPF(): Pessoa{

    }

    /**
     * Seleciona o ID do usuario com o nome passado, caso exista.
     * @param [string] $nome nome do usuario
     * @return id_user ID do usuario com o nome passado. 
     */
    function SELECTbyName($name): int{
        $sql = "SELECT ID FROM usuario WHERE nome = $name";
        $id_user = $this->dataBase->query($sql);
        return $id_user;
    }

    /**
     * Retorna todas as permissões de determinado tipo de usuario;
     *
     * @param string $tipoUsuario
     * @return Array
     */
    function getPermissoes(string $tipoUsuario): Array{
        $join = "permissao p LEFT JOIN tipo_usuario t ON p.tipo_usuario_ID = t.ID";
        $result = $this->dataBase->query("SELECT (permissao) FROM $join WHERE t.nome = '$tipoUsuario'");
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }

}