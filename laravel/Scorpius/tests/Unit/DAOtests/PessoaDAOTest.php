<?php

namespace Tests\Unit\DAOtests;

use PHPUnit\Framework\TestCase;
// o require abaixo é para não ser necessario escrever $this->assert podendo escrever apenas assert
//se for adcionado na classe do phpunit tira a necessidade de colocar esse require nos testes,
// contudo todos teriam que fazer isso manualmente pois o  framework esta no .gitignore
require_once __DIR__."/../../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\DB\PessoaDAO;

class PessoaDAOTest extends TestCase
{   
    protected static $DAO;

    public static function setUpBeforeClass(): void{
        try {
            self::$DAO = new PessoaDAO();
        }
        catch(\mysqli_sql_exception $e){
            print("\n erro na conexão com o SGBD, O banco de dados foi iniciado ?? \n");
        }
    }
    public static function tearDownAfterClass(): void{
        self::$DAO = null;
    }
    /**
     * Teste de inserção de um objeto da classe visitante no banco de dados
     *
     * @return void
     */
    public function testINSERT_Visitante(){
        $this->markTestIncomplete();
    }
    /**
     * Teste de inserção de um objeto da classe Professor no banco de dados
     *
     * @return void
     */
    public function testINSERT_Professor(){
        $this->markTestIncomplete();
    }
    /**
     * Teste de inserção de um objeto da classe Estagiario no banco de dados
     *
     * @return void
     */
    public function testINSERT_Estagiario(){
        $this->markTestIncomplete();
    }
    /**
     * Teste de inserção de um objeto da classe Funcionario no banco de dados
     *
     * @return void
     */
    public function testINSERT_Funcionario(){
        $this->markTestIncomplete();
    }
    /**
     * Teste de inserção de um objeto da classe ADM no banco de dados
     *
     * @return void
     */
    public function testINSERT_ADM(){
        $this->markTestIncomplete();
    }
    /**
     * Testando se as permissões padrões de estagiario são retornadas corretamente ao 
     * fazer a query no banco de dados, atraves do DAO;
     *
     * @return void
     */
    public function testGetPermissoesPadraoEstagiario(){
        $permissoes = self::$DAO->getPermissoes("estagiario");

        \assertEquals(["permissao"=>"realizar check-in"], $permissoes[0]);
    }
    /**
     * Testando se as permissões padrões de funcionario são retornadas corretamente ao 
     * fazer a query no banco de dados, atraves do DAO;
     *
     * @return void
     */
    public function testGetPermissoesPadraoFuncionario(){
        $permissoes = self::$DAO->getPermissoes("funcionario");
        
        \assertContains(["permissao"=>"realizar check-in"], $permissoes);
        \assertContains(["permissao"=>"gerenciamento de visitas"],$permissoes);
        \assertContains(["permissao"=>"designar horários para estagiarios"],$permissoes);
        \assertContains(["permissao"=>"relatorio dos agendamentos"],$permissoes);
        \assertContains(["permissao"=>"cadastrar e modificar atividades"],$permissoes);
    }
    /**
     * Testando se as permissões padrões do adm são retornadas corretamente ao 
     * fazer a query no banco de dados, atraves do DAO;
     *
     * @return void
     */
    public function testGetPermissoesPadraoADM(){
        $permissoes = self::$DAO->getPermissoes("adm");
        
        \assertContains(["permissao"=>"criar usuarios"], $permissoes);
        \assertContains(["permissao"=>"gerenciar usuarios"],$permissoes);
        \assertContains(["permissao"=>"ver confiabilidade das Instituições"],$permissoes);
        \assertContains(["permissao"=>"ver log de atividade"],$permissoes);
        \assertContains(["permissao"=>"realizar backup"],$permissoes);
        \assertContains(["permissao"=>"gerenciar permissões"],$permissoes);
    }
    /**
     * Testa se a quantidade de permissoes para cada tipo de usuario estão corretas.
     * junto com os demais testes garante que não ha permissões alêm do padrão.
     *
     * @return void
     */
    public function testGetPermissoesQtdPadrao(){
        $permissoes = self::$DAO->getPermissoes("adm");
        \assertCount(6,$permissoes);//o array tem 6 linhas

        $permissoes = self::$DAO->getPermissoes("funcionario");
        \assertCount(5,$permissoes);
        
        $permissoes = self::$DAO->getPermissoes("estagiario");
        \assertCount(1,$permissoes);
    }

}
