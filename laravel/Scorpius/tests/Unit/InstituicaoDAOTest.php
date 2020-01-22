<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

require_once __DIR__."/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\DB\InstituicaoDAO;
use App\model\users\Instituicao;
class InstituicaoDAOTest extends TestCase
{
    protected static $DAO;
    protected static $inst0;
    protected static $inst1;

    public static function setUpBeforeClass(): void{
        try {
            self::$DAO = new InstituicaoDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
        }
        self::$inst0 = new Instituicao("colegio x", "diretor", "endereço", "96A", "Feira", "BA",
                                        "44999000","tel", "federal");
        self::$inst1 = new Instituicao("colegio z", "diretor", "endereço", "96A", "Feira", "BA",
                                        "44999000","tel", "federal");
        self::$DAO->INSERT($inst0);
        self::$DAO->INSERT($inst1);
    }
    /**
     * Teste da função SELECT
     *
     * @return void
     */
    public function testSELECT()
    {
        
        \assertTrue(true);
    }

    public static function tearDownAfterClass(): void{
        //apagando os objetos do banco de dados
        self::$dao->DELETE(self::$inst0);
        self::$dao->DELETE(self::$inst1);
    }
}
