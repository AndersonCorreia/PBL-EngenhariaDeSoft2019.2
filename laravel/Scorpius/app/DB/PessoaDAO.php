<?PHP 


namespace DB;
require_once "./app/DB/interfaces/DataAccessObject.php";
require_once "./app/Model/Users/Pessoa.php";//falta inserir as outras classes

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe pessoa
 * e todas as subclasses.
 */
class PessoaDAO extends \DataAccessObject {

    function INSERT($pessoa): bool{
        //usa a variavel $dataBase para  fazer a query no banco
        $this->dataBase;
    }
    function UPDATE($pessoa): bool{
        
    }
    function DELETE($pessoa): bool{

    }
    function SELECT_ALL($table="usuario"){
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
}