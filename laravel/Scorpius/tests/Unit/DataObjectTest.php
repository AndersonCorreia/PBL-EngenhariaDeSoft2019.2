<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Model\Instituicao;
use App\DB\InstituicaoDAO as DAO;

require_once __DIR__."/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";

class DataObjectTest extends TestCase
{
    protected static $object;
    protected static $dao;

    public static function setUpBeforeClass(): void{
        
        self::$object = new Instituicao("colegio x", "diretor", "endereço", "96A", "Feira", "BA",
                                        "44999000","tel", "federal");
        self::$dao = new DAO();
        self::$dao->INSERT(self::$object);
    }

    public function testSave_no_destrutor(){
        try {
            self::$object->setNome("colegio Z");
            self::$object->setNumero("66B");
            $id = self::$object->getID();
            self::$object=null;

            $objAtualizado = self::$dao->SELECTbyID($id, false);
            //testando al alterações
            \assertEquals("colegio Z",$objAtualizado->getNome());
            \assertEquals("66B",$objAtualizado->getNumero());
        }catch(\Throwable $e){
            \assertTrue(false,  $e);
        }
    }
    
}