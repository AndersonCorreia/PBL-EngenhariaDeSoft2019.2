<?php
namespace App\DB\interfaces;

/**
 * Classe base para as demais classes que irão realizar a manipulação de dados no SGBD.
 * Ela realiza a conexão no banco de dados de acordo as variaveis contidas no php.ini na raiz do projeto.
 */
abstract class DataAccessObject {
    
    protected $dataBase;
    protected $table;
    
    /**
     * Cronstrutor da classe, realiza a conexão com o SGBD 
     * e portanto pode lançar exceptions em caso de falha na conexão.
     *
     * @param string $table nome da tabela principal do banco que o DAO manipula.
     * @return void
     * @throws Exception em falha de conexão ao banco
     */
    function __Construct(string $table){
        
        $this->table = $table;

        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);//faz o mysqli lançar exception no erro de conexão entre outros
        $ini = parse_ini_file(__DIR__."/../../../php.ini");
        $this->dataBase = new \mysqli(
            $ini["DB_HOST"],
            $ini["DB_USERNAME"],
            $ini["DB_PASSWORD"],
            $ini["DB_DATABASE"],
            $ini["DB_PORT"] );

        date_default_timezone_set('America/Bahia');
        $this->dataBase->autocommit(true);
    }
    /**
     * Realiza uma query SELECT retornando todos os dados de uma tabela em especifca
     *
     * @param string $table tabela onde será executada a query
     * @return mysqli_result|bool
     */
    public function SELECT_ALL($table = false){
        
        $table = $table ? $table : $this->table;
        $result = $this->dataBase->query(" SELECT * FROM ".$table);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function SELECTbyID(int $id){
        $sql = "SELECT * FROM $this->table WHERE ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if($row==[]){
            throw new \Exception("Nenhum registro foi encontrado");
        }

        return $row;
    }

    /**
     * Realiza uma ou mais querys de INSERT no banco de dados, para armazenar com o sucesso
     *  os dados provenientes do tipo objeto em especifico que o DAO é responsavel.
     *
     * @param [type] $object o objeto correspondente aos dados que devem ser inseridos no banco
     * @return boolean true se a query for realizada com sucesso, false se não for concluida com sucesso
     */
    abstract public function INSERT(object $object): bool;

    /**
     * Realiza uma ou mais querys de UPDATE no banco de dados, para alterar
     *  os dados provenientes do tipo objeto em especifico que o DAO é responsavel.
     *
     * @param [type] $object o objeto correspondente aos dados que devem ser atualizados no banco
     * @return boolean true se a query for realizada com sucesso, false se não for concluida com sucesso
     */
    abstract public function UPDATE(object $object): bool;
    
    /**
     * Realiza uma query de DELETE no banco de dados, para deletar
     * os dados provenientes do tipo objeto em especifico que o DAO é responsavel.
     *
     * @param [type] $object o objeto correspondente aos dados que devem ser deletados do banco
     * @return boolean true se a query for realizada com sucesso, false se não for concluida com sucesso
     */
    public function DELETE(DataObject $object): bool{
        return $this->DELETEbyID($object->getID());
    }
    
    /**
     * Deletar um registro do banco com base no ID
     * @param integer $id ID do registro na tabela;
     * @return boolean true caso operação ocorra com sucesso, caso contrário retorna false;
     */
    public function DELETEbyID(int $id){
        $sql = "DELETE FROM $this->table WHERE ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $result = $stmt->bind_param("i",$id);
        return $stmt->execute();
    }

    /**
     * Retorna o ID da ultima operação feita no banco
     * Util para saber o ID de um objeto que foi inserido recentemente no banco
     * @return int id da ultima operação realizzada no banco
     */
    public function getLastID(): int{
        return $this->dataBase->insert_id;
    }
    
    /**
     * Automaticamente cancelar qualquer transação que não foi commitada para o banco
     * util quando alguma query lançar exception durante uma serie de commits com o autocommit = false;
     */
    function __destruct(){
        $this->dataBase->rollback();
    }
    
}