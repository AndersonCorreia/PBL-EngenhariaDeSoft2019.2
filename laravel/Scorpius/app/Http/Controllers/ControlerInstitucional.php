<?php
// Controller das telas iniciais
namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";
class ControlerInstitucional extends Controller
{
    /**
     * Retorna tela de instiuição
     * @return telaInstituicao
     */
    public function telaInstituicao()
    {
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições"
        ];
        return view('TelaInstituicaoEnsino.instituicaoEnsino', $variaveis);
    }

    public function telaDadosInstituicao(){
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições"
        ];
        return view('TelaInstituicaoEnsino.dadosInstituicaoEnsino', $variaveis);
    }
    /**
     * retornar a tela de cadastro de instituições para o usuario
     *
     * @return void
     */
    public function telaCadastroInstituicao(){
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Cadastro de Instituições"
            //falta a variavel instituições, com nome e endereço das instiuições
        ];
        return view('TelaInstituicaoEnsino.cadastroInstituicao', $variaveis);
    }
    /**
     * Função que deve cadastrar uma instituição e vincula-la ao usuario.
     *
     * @return page redirecionar o usuario para a pagina de instituições
     */
    public function CadastrarInstituicao(){
        //codigo para cadastrar a instituição e vincular ao usuario
        if($_POST["onlyVincular"]==false){
            //cadastra e vincular
        }else {
            //apenas vincular
        }
        
        return redirect()->route('instituição.show');
    }
}
