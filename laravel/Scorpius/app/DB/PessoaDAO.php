<?PHP 

require_once "./interfaces/DataAccessObject.php";
require_once "./../Model/Users/Pessoa.php";//falta inserir as outras classes

class PessoaDAO extends DataAccessObject {

    function INSERT($pessoa): bool{
        //usa a variavel $dataBase para fazer a query no banco
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
}