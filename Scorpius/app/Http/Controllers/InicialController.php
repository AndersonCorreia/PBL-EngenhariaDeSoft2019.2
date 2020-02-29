<?php
// Controller das telas iniciais
namespace App\Http\Controllers;

use App\Model\Exposicao;
use Illuminate\Http\Request;
use App\DB\ExposicaoDAO;

class InicialController extends Controller
{
    public function inicio()
    {
        $DAO = new ExposicaoDAO();
        $eventos = $DAO->SELECT_ALL();
        $astronomia = array();
        $biodiversidade = array();
        $origem_do_humano = array();
        $atividades = array();
        foreach ($eventos as $evento) {
            if ($evento['tipo_evento'] == 'atividade permanente') {
                if ($evento['tema_evento'] == 'astronomia') {
                    $astronomia[] = $evento;
                } elseif ($evento['tipo_evento'] == 'biodiversidade') {
                    $biodiversidade[] = $evento;
                } else {
                    $origem_do_humano[] = $evento;
                }
            } else {
                $atividades[] = $evento;
            }
        }
        $variaveis = [
            'biodiversidade' => $biodiversidade,
            'astronomia' => $astronomia,
            'origem_do_humano' => $origem_do_humano,
            'atividades' => $atividades
        ];
        return view('paginaInicial', $variaveis);
    }
    //retorna a tela de entrar
    public function telaEntrar()
    {
        return view('telaEntrar.index', [ 'loginError' => false]);
    }
    //retorna a tela de entrar com o aviso de erro no login
    public function telaEntrarError()
    {
        return view('telaEntrar.index', [ 'loginError' => true]);
    }
}
