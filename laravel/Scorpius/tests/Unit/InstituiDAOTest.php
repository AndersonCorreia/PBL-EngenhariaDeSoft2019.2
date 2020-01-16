<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

require_once "vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use app\DB\InstituicaoDAO;
use app\model\users\Instituicao;
class InstituiDAOTest extends TestCase
{
    protected static $DAO;

    public static function setUpBeforeClass(): void{
        try {
            self::$DAO = new InstituicaoDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
        }
        
        self::$DAO->INSERT();//inserir umas duas instituições
    }
    /**
     * Teste da função SELECT
     *
     * @return void
     */
    public function testSELECT()
    {
        $this->assertTrue(true);
    }
}
