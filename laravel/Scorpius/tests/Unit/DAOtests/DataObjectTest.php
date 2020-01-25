<?php

namespace Tests\Unit\DAOtests;

use PHPUnit\Framework\TestCase;
use App\Model\Instituicao;
use App\DB\InstituicaoDAO as DAO;

require_once __DIR__."/../../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";

class DataObjectTest extends TestCase
{
    protected static $object;
    protected static $dao;

    public static function setUpBeforeClass(): void{
        
        self::$object = new Instituicao("colegio x", "diretor", "endereço", "96A", "Feira de Santana", "BA",
                                        "44999000","tel", "federal");
        self::$dao = new DAO();
        self::$dao->INSERT(self::$object);
    }
    /**
     * Testando se apos uma alteração no objeto os dados são salvos no banco automaticamente
     *  no destrutor do objeto.
     */
    public function testSave_no_destrutor(){
        try {
            self::$object->setNome("colegio Z");
            self::$object->setNumero("66B");
            $id = self::$object->getID();
            \assertTrue(self::$object->getAlterado());
            //apagando o objeto
            self::$object = null;

            self::$object = self::$dao->SELECTbyID($id, false);
            //testando al alterações
            \assertEquals("colegio Z",self::$object->getNome());
            \assertEquals("66B",self::$object->getNumero());
        }catch(\Throwable $e){
            \assertTrue(false,  $e);
        }
    }
    
    public static function tearDownAfterClass(): void{
        //apagando objeto do banco de dados
        self::$dao->DELETE(self::$object);
    }
}