<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Testa se a rota da tela inicial carrega normalmente.
     *
     * @return void
     */
    public function testTelaInicial()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaCadastrar()
    {
        $response = $this->get('/cadastrar');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaEntrar()
    {
        $response = $this->get('/entrar');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaLoginAdministrativo()
    {
        $response = $this->get('/login-administrativo');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaAlterarDadosUsuario()
    {
        $response = $this->get('/AlterarDadosUsuario');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaHorarioEstagiario()
    {
        $response = $this->get('/horarioEstagiario');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaInstituicao()
    {
        $response = $this->get('/instituicao');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaInstituicaoCadastro()
    {
        $response = $this->get('/instituicao/cadastro');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaInstituicaoEditar()
    {
        $response = $this->get('/instituicao/editar/201');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaAgendamentoUsuario()
    {
        $response = $this->get('/agendamentoUsuario');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaAgendamento()
    {
        $response = $this->get('/agendamento');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaGerenciamentoDeVisita()
    {
        $response = $this->get('/gerenciamentoDeVisita');

        $response->assertStatus(200);
    }
    
}
