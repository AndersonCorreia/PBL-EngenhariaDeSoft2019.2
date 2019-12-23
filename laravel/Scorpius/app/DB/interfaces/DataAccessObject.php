<?php

/**
 * Classe base para as demais classes que irão realizar a manipulação de dados no SGBD.
 * Ela realiza a conexão no banco de dados de acordo as variaveis contidas no php.ini na raiz do projeto.
 */
abstract class DataAccessObject {
    
    protected $dataBase;
    
    /**
     * Cronstrutor da classe, realiza a conexão com o SGBD 
     * e portanto pode lançar exceptions em caso de falha na conexão.
     *
     * @return void
     * @throws Exception em falha de conexão ao banco
     */
    function __Construct(){
        $ini = parse_ini_file("./php.ini");// definir como variavel global posteriomente
        $this->dataBase = new mysqli(
            $ini["DB_HOST"],
            $ini["DB_USERNAME"],
            $ini["DB_PASSWORD"],
            $ini["DB_DATABASE"],
            $ini["DB_PORT"]         );

        if ($this->dataBase->connect_error) {// em caso de erro na conexão com o SGBD aplicação é interrompida
            $msg = 'Connect Error (' . $this->dataBase->connect_errno . ') '. $this->dataBase->connect_error ;
            throw new exception($msg);
        }
    }
    /**
     * Realiza uma query SELECT retornando todos os dados de uma tabela em especifca
     *
     * @param string $table tabela onde será executada a query
     * @return mysqli_result|bool
     */
    function SELECT_ALL(string $table){
        return $this->dataBase->query(" SELECT * FROM ".$table);
    }
    /**
     * Realiza uma ou mais querys de INSERT no banco de dados, para armazenar com o sucesso
     *  os dados provenientes do tipo objeto em especifico que o DAO é responsavel.
     *
     * @param [type] $object o objeto correspondente aos dados que devem ser inseridos no banco
     * @return boolean true se a query for realizada com sucesso, false se não for concluida com sucesso
     */
    abstract function INSERT($object): bool;

    /**
     * Realiza uma ou mais querys de UPDATE no banco de dados, para alterar
     *  os dados provenientes do tipo objeto em especifico que o DAO é responsavel.
     *
     * @param [type] $object o objeto correspondente aos dados que devem ser atualizados no banco
     * @return boolean true se a query for realizada com sucesso, false se não for concluida com sucesso
     */
    abstract function UPDATE($object): bool;
    
    /**
     * Realiza uma ou mais querys de DELETE no banco de dados, para deletar
     *  os dados provenientes do tipo objeto em especifico que o DAO é responsavel.
     *
     * @param [type] $object o objeto correspondente aos dados que devem ser deletados do banco
     * @return boolean true se a query for realizada com sucesso, false se não for concluida com sucesso
     */
    abstract function DELETE($object): bool;
}

//print_r((new DataAccessObject())->SELECTALL("usuario"));//para testes