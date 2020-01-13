<?php
// Controller das telas iniciais
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users\Instituicao;
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
        ];
        return view('TelaInstituicaoEnsino.cadastroInstituicao', $variaveis);
    }
    /**
     * Função que deve cadastrar uma instituição e vincula-la ao usuario.
     * @param 
     * @return page redirecionar o usuario para a pagina de instituições
     */
    public function cadastrarInstituicao(Request $req){
        //codigo para cadastrar a instituição e vincular ao usuario
        $dados = $req->all();
        $instituicao = new Instituicao($dados);
        $instituicao->cadastraInstituicao();
       
        return redirect()->route('instituição.show');
    }
}
