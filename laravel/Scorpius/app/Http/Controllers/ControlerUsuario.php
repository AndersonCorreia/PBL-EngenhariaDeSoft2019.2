<?php
// Controller das telas iniciais
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlerUsuario extends Controller
{
    /**
     * Retorna tela de instiuição
     * @return telaInstituicao
     */
    public function telaInstituicao(){
        return view('TelaInstituicaoEnsino.instituicaoEnsino');
    }

}
