<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RotasGetTest extends TestCase
{
    /**
     * Testa se a rota da tela inicial carrega normalmente.
     *
     * @return void
     */
    public function testTelaInicial()
    {
        $response = $this->get(route("paginaInicial"));

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
        $response = $this->get(route('entrar'));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaLoginAdministrativo()
    {
        $response = $this->get(route("loginAdm"));

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
        $response = $this->get(route("HorarioEstagiario.show"));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaInstituicao()
    {
        $response = $this->get(route("instituição.show"));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaInstituicaoCadastro()
    {
        $response = $this->get(route("CadastroIntituição.show"));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaInstituicaoEditar()
    {
        $response = $this->get(route('user.instituicoes.editar',201));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaAgendamentoUsuario()
    {
        $response = $this->get(route('AgendarDiurnoVisitante.show'));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaAgendamento()
    {
        $response = $this->get(route("AgendarDiurnoInstituição.show"));

        $response->assertStatus(200);
    }

    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaGerenciamentoDeVisita()
    {
        $response = $this->get(route("telaGerenciamentoDeVisitas.show"));

        $response->assertStatus(200);
    }
    /**
     * Testa se a rota carrega normalmente.
     *
     * @return void
     */
    public function testTelaGerenciamentoDeHorarios()
    {
        $response = $this->get(route("telaGerenciamentoDehorarios.show"));

        $response->assertStatus(200);
    }
    
}
