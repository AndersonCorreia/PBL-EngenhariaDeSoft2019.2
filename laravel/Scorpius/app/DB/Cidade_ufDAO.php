<?PHP 
namespace App\DB;
require_once __DIR__."/interfaces/DataAccessObject.php";
require_once __DIR__."/../Model/Users/Instituicao.php";//falta inserir as outras classes

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao
 * e todas as subclasses.
 */
class Cidade_ufDAO extends \DataAccessObject {

    function INSERT($cidade): bool{
    
    }
    function UPDATE($cidade): bool{

    }
    function DELETE($cidade): bool{

    }
    function SELECT_ALL(String $table="cidade"){
        return parent::SELECT_ALL($table);// inves de apenas retorna criar os objetos da classe
        //talvez nesse select all não seja util mas os selects de um usuario especifico devem criar o objeto
    }
    /**
     * Undocumented function
     *
     * @return Pessoa
     */
    function SELECTbyCPF(): Cidade_ufDAO{

    }
    /**
     * Undocumented function
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