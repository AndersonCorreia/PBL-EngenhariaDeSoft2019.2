<?php

namespace Tests\Unit\DAOtests;

use PHPUnit\Framework\TestCase;

require_once __DIR__."/../../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\DB\InstituicaoDAO;
use App\DB\Professor_InstituicaoDAO;
use App\model\Instituicao;
use App\model\Professor_Instituicao;

class Professor_InstituicaoDAOTest extends TestCase
{
    protected static $DAO;
    protected static $instituicaoDAO;
    protected static $inst0;
    protected static $inst1;
    protected static $inst2;

    public static function setUpBeforeClass(): void{
        try {
            self::$instituicaoDAO = new InstituicaoDAO();
            self::$DAO = new Professor_InstituicaoDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
        }
        self::$inst0 = new Instituicao("colegio xy", "diretor", "endereço", "96A", "Feira de Santana", "BA",
                                        "44999000","tel", "federal");
        self::$inst1 = new Instituicao("colegio z", "diretor", "endereço", "96A", "Feira de Santana", "BA",
                                        "44999000","tel", "federal");
        self::$instituicaoDAO->INSERT(self::$inst0);
        self::$instituicaoDAO->INSERT(self::$inst1);
    }
    /**
     * Teste da função SELECTbyID
     *
     * @return void
     */
    public function testSELECTbyID(){

    }

    public function testDELETE(){

    }

    public function testUPDATE(){
     
    }

    public function testdesativarByID(){
        $universidade = self::$inst0;
        self::$DAO->INSERTbyID($universidade->getID(), 601);
        $issuperior = self::$DAO->desativarByID($universidade->getID(), 601);

        \assertTrue($issuperior, "Erro ao desativar Instituição" );
        $registros = self::$DAO->SELECTbyUsuario_ID(601);
        \assertNotContains( ["nome" =>"colegio xy"], $registros);

    }

    /**
     * testa se a função INSERT adiciona o ID do resgistro do banco no objeto
     *
     * @return void
     */
    public function testINSERT_acrescentaIDnoObjeto(){

    }
    /**
     * Teste para o INSERT na tabela professorInstituicao
     *
     * @return void
     */
    public function testINSERT_professorInstituicao(){
    
        $insert = self::$DAO->INSERTbyID(self::$inst1->getID(), 701);
        \assertTrue($insert);
        
    }

    public static function tearDownAfterClass(): void{
        //apagando os objetos do banco de dados
        $dados0 =self::$DAO->SELECTbyID(self::$inst0->getID(), 601, true, false);
        $dados1 =self::$DAO->SELECTbyID(self::$inst1->getID(), 701, true, false);
        self::$DAO->DELETEbyID($dados0["ID"]);
        self::$DAO->DELETEbyID($dados1["ID"]);
        self::$instituicaoDAO->DELETE(self::$inst0);
        self::$instituicaoDAO->DELETE(self::$inst1);
    }
}
