<?php
// Controller das telas iniciais
namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";
class ControlerUsuario extends Controller
{
    /**
     * Retorna tela de instiuição
     * @return telaInstituicao
     */
    public function telaInstituicao()
    {
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional")
        ];
        return view('TelaInstituicaoEnsino.instituicaoEnsino', $variaveis);
    }

    public function telaDadosInstituicao(){
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional")
        ];
        return view('TelaInstituicaoEnsino.dadosInstituicaoEnsino', $variaveis);
    }
}
