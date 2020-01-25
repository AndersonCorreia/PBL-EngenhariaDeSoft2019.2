<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

require_once __DIR__."/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\DB\InstituicaoDAO;
use App\model\Instituicao;
class InstituicaoDAOTest extends TestCase
{
    protected static $DAO;
    protected static $inst0;
    protected static $inst1;
    protected static $inst2;

    public static function setUpBeforeClass(): void{
        try {
            self::$DAO = new InstituicaoDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
        }
        self::$inst0 = new Instituicao("colegio xy", "diretor", "endereço", "96A", "Feira de Santana", "BA",
                                        "44999000","tel", "federal");
        self::$inst1 = new Instituicao("colegio z", "diretor", "endereço", "96A", "Feira de Santana", "BA",
                                        "44999000","tel", "federal");
        self::$DAO->INSERT(self::$inst0);
        self::$DAO->INSERT(self::$inst1);
    }
    /**
     * Teste da função SELECT
     *
     * @return void
     */
    public function testSELECT(){

        $inst = self::$DAO->SELECT("colegio xy", "endereço", false);//false é para retornar o objeto
        \assertEquals(self::$inst0->getID(),$inst->getID());

        $inst = self::$DAO->SELECT("colegio z", "endereço", false);
        \assertEquals(self::$inst1->getID(),$inst->getID());
    }

    public function testDELETE(){
        $universidade = new Instituicao("UEFS", "Evandro", "Avenida Transnordestina", "SN",
        "Feira de Santana", "Bahia", "57849241", "32458745", "Estadual");
        
        self::$DAO->INSERT($universidade);
        $issuperior = self::$DAO->DELETE($universidade);

        \assertNull($issuperior);
    }

    public function testUPDATE(){
        $testInst = new Instituicao("UEFS", "Evandro", "Avenida Transnordestina", "SN",
        "Feira de Santana", "Bahia", "57849241", "32458745", "Estadual");

        self::$DAO->UPDATE($testInst);
        
        \assertNotEquals('UEFS', $testInst->getNome());
        \assertNotEquals('Evandro', $testInst->getResponsavel());
        \assertNotEquals('Avenida Transnordestina', $testInst->getEndereco());
        \assertNotEquals('SN', $testInst->getNumero());
    }
    /**
     * Teste da função SELECT ao procurar uma instituição que não existe
     * uma exeption deve ser lançada.
     *
     * @return void
     */
    public function testSELECT_instituicaoInexistente(){
        try{
            self::$DAO->SELECT("não existe", "endereço", false);
        }
        catch(\Exception $e){
            \assertEquals("Nenhuma instituição foi encontrada", $e->getMessage());
        }
    }
    
    /**
     * teste da função getNomeEnderecoALL, que deve retornar uma array com o nome e endereço
     * de todas as instituições
     *
     * @return void
     */
    public function test_getNomeEnderecoALL(){

        $array = self::$DAO->getNomeEnderecoALL();
        $dados0 = ["nome" => self::$inst0->getNome(), "endereco" => self::$inst0->getEndereco()];
        $dados1 = ["nome" => self::$inst1->getNome(), "endereco" => self::$inst1->getEndereco()];

        \assertContainsEquals($dados0, $array);
        \assertContainsEquals($dados1, $array);
    }
    /**
     * testa se a função INSERT adiciona o ID do resgistro do banco no objeto
     *
     * @return void
     */
    public function testINSERT_acrescentaIDnoObjeto(){
        $inst = new Instituicao("colegio", "diretor", "endereço dif", "96A", "Feira", "BA",
                                        "44999000","tel", "federal");
        self::$DAO->INSERT($inst);
        self::$DAO->DELETE($inst);
        \assertNotNull(self::$inst1->getID());
    }
    /**
     * Testando o metodo INSERT com uma cidade que não estava no banco no povoamento
     *
     * @return void
     */
    public function testINSERT_CidadeNovaNoBanco(){

        self::$inst2 = new Instituicao("colegio y", "diretor", "alagoinhas", "96A", "Alagoinhas", "BA",
                                        "44999000","tel", "Estadual");
        $inst = self::$inst2;
        self::$DAO->INSERT($inst);
        $instDB = self::$DAO->SELECTbyID($inst->getID(), false);

        \assertEquals($inst->getCidade(),$instDB->getCidade(), "as cidades não são iguais" );
        \assertEquals($inst->getUF(),$instDB->getUF(), "os estados/UF não são iguais" );
    }

    /**
     * Teste para o INSERT na tabela professorInstituicao
     *
     * @return void
     */
    public function testINSERT_professorInstituicao(){
        
        $insert0 = self::$DAO->INSERT_Professor_Instituicao(self::$inst0->getID(), 601);
        $insert1 = self::$DAO->INSERT_Professor_Instituicao(self::$inst1->getID(), 701);
        \assertTrue($insert0);
        \assertTrue($insert1);
        
    }

    public static function tearDownAfterClass(): void{
        //apagando os objetos do banco de dados
        self::$DAO->DELETE(self::$inst0);
        self::$DAO->DELETE(self::$inst1);
        self::$DAO->DELETE(self::$inst2);
        self::$DAO->DELETE_professor_instituicao(self::$DAO->SELECT_Professor_Instituicao(self::$inst0->getID() ));
        self::$DAO->DELETE_professor_instituicao(self::$DAO->SELECT_Professor_Instituicao(self::$inst1->getID() ));

    }
}
