<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
// o require abaixo é para não ser necessario escrever $this->assert podendo escrever apenas assert
//se for adcionado na classe do phpunit tira a necessidade de colocar esse require nos testes,
// contudo todos teriam que fazer isso manualmente pois o  framework esta no .gitignore
require_once "vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use DB\PessoaDAO;

class PessoaDAOTest extends TestCase
{   
    /**
     * teste basico a conexão com o banco, em caso de erro informa o provavel motivo
     */
    public function testConexãoSGBD(){
        try {
            new PessoaDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
            \assertTrue(false);
        }
    }
    /**
     * Teste de inserção de um objeto da classe visitante no banco de dados
     *
     * @return void
     */
    public function testINSERT_Visitante(){

    }
    /**
     * Teste de inserção de um objeto da classe Professor no banco de dados
     *
     * @return void
     */
    public function testINSERT_Professor(){

    }
    /**
     * Teste de inserção de um objeto da classe Estagiario no banco de dados
     *
     * @return void
     */
    public function testINSERT_Estagiario(){

    }
    /**
     * Teste de inserção de um objeto da classe Funcionario no banco de dados
     *
     * @return void
     */
    public function testINSERT_Funcionario(){

    }
    /**
     * Teste de inserção de um objeto da classe ADM no banco de dados
     *
     * @return void
     */
    public function testINSERT_ADM(){

    }


}
