<?php
// Controller das telas iniciais
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicialController extends Controller
{
    // retorna a tela de cadastro
    public function telaCadastro(){
        return view('telaCadastro.index');
    }

    // retorna a tela de prosseguir da verificacao de email
    // é apenas uma tela de exibição
    public function prosseguirVerificacaoEmail(){
        return view('telaCadastro.prosseguirVerificacaoEmail');
    }

    //retorna a tela de entrar
    public function telaEntrar(){
        return view('telaEntrar.index');
    }

}
