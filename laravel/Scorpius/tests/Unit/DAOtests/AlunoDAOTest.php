<?php

namespace Tests\Unit\DAOtests;

use PHPUnit\Framework\TestCase;

require_once __DIR__."/../../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\DB\AlunoDAO;

class AlunoDAOTest extends TestCase
{
    protected static $DAO;
    protected static $inst0;
    protected static $inst1;
    protected static $inst2;
    protected static $inst3;
    protected static $inst4;

    public static function setUpBeforeClass(): void{
        try {
            self::$DAO = new AlunoDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
        }
        self::$inst0 = new Aluno("Nadime", "20", "0");
        self::$inst1 = new Aluno("Kevin", "19", "1");
        self::$DAO->INSERT(self::$inst0);
        self::$DAO->INSERT(self::$inst1);
    }

    /**
     * Teste da função SELECTbyTurma
     *
     * @return void
     */
    public function testSELECTbyTurma(){
        $inst = self::$DAO->SELECTbyTurma("0");
        \assertEquals(self::$inst0->getNome(),$inst->getNome());

        $inst = self::$DAO->SELECTbyTurma("1");
        \assertEquals(self::$inst1->getNome(),$inst->getNome());
    }

    /**
     * Teste da função DELETE e DELETEbyTurma
     *
     * @return void
     */
    public function testDELETE(){
        $aluno = new Aluno("Ana", "10", "2");
        
        self::$DAO->INSERT($aluno);
        $var0 = self::$DAO->DELETE($aluno);
        \assertTrue($var0, "Erro ao deletar");

        self::$DAO->INSERT($aluno);
        $var0 = self::$DAO->DELETEbyTurma("2");
        \assertTrue($var0, "Erro ao deletar");
    }

    /**
     * Teste das funções UPDATE_ALUNO e UPDATE_NOME_ALUNO
     *
     * @return void
     */
    public function testUPDATE(){
        self::$inst2 = new Aluno("Ana", "10", "2");

        $var0 = self::$DAO->INSERT(self::$inst2);
        \assertTrue($var0, "Erro ao inserir");
        self::$inst2->setIdade("15");
        $var0 = self::$DAO->UPDATE_ALUNO(self::$inst2);
        \assertTrue($var0, "Erro ao atualizar");

        $testInst2 = self::$DAO->SELECTbyTurma(self::$inst2->getTurma());
        \assertEquals(self::$inst2->getIdade(), $testInst2->getIdade());

        
        $var0 = self::$DAO->UPDATE_NOME_ALUNO(self::$inst2->getID(), "Anna");
        \assertTrue($var0, "Erro ao atualizar");

        $testInst3 = self::$DAO->SELECTbyTurma(self::$inst2->getTurma());
        \assertEquals("Anna", self::$testInst3->getNome());
    }
}