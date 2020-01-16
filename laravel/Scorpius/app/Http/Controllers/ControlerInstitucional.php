<?php

namespace App\Http\Controllers;

use App\Model\Users\Instituicao;
use Illuminate\Http\Request;
require_once __DIR__."/../../DB/InstituicaoDAO.php";
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";
class ControlerInstitucional extends Controller
{   
    /**
     * Retorna tela de instiuição
     * @return telaInstituicao
     */
    public function telaInstituicao()
    {
        $instituicao = new Instituicao(); 
        
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições",
            'registros' => $instituicao->listarInstituicoes()
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
        $DAO = new \InstituicaoDAO();
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Cadastro de Instituições",
            'instituicoes' => $DAO->getNomeEnderecoALL()
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

    public function editarInstituicao($id){

        $instituicao = new Instituicao(); 
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições",
            'registros' => $instituicao->buscar($id)
        ];
        return view('TelaInstituicaoEnsino.dadosInstituicaoEnsino', $variaveis);
       
    }

    public function atualizarInstituicao(Request $req, $id){
       
    }

    public function deletarInstituicao(Request $req, $id){
    
    }
  
    public function getInstituicao(string $nome, string $endereco){
        $DAO = new \InstituicaoDAO();
        return $DAO->SEECT($nome, $endereco);
    }
}
