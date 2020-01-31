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
    public function testTelacadastrar()
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
    public function testTelaLogin_administrativo()
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
    public function testTelahorarioEstagiario()
    {
        $response = $this->get('/horarioEstagiario');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelainstituicao()
    {
        $response = $this->get('/instituicao');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelainstituicao_cadastro()
    {
        $response = $this->get('/instituicao/cadastro');

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelainstituicao_editar()
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
}
