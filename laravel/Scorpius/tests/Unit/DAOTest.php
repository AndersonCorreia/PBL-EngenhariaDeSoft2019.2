<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\DB\PessoaDAO;

class DAOTest extends TestCase
{
    protected static $DAO;

    
    /**
     * teste basico da conexão com o banco, em caso de erro informa o provavel motivo
     */
    public function testConexãoSGBD(){
        try {
            new PessoaDAO();
            \assertTrue(true);
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
            \assertTrue(false);
        }
    }
}