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
        $variaveis = [
            'exposicoes' => $DAO->SELECT_ALL()
        ];
        return view('paginaInicial', $variaveis);
    }
    // retorna a tela de cadastro
    public function telaCadastro(){
        return view('telaCadastro.index');
    }
    //retorna a tela de entrar
    public function telaEntrar(){
        return view('telaEntrar.index');
    }

    public function loginAdm(){
        return view('loginAdministrativo.index');
    }

}
