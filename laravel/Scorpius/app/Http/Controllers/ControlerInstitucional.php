<?php

namespace App\Http\Controllers;

use App\Model\Instituicao;
use Illuminate\Http\Request;
use App\DB\InstituicaoDAO;
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
            'paginaAtual' => "Instituições",
            'registros' => instituicao::listarInstituicoes()
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
        $DAO = new InstituicaoDAO();
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
            //id da instituição disponivel no post
        }
        
        return redirect()->route('instituição.show');
    }

    public function editarInstituicao($id){

        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições",
            'registros' => instituicao::buscar($id)
        ];
        return view('TelaInstituicaoEnsino.dadosInstituicaoEnsino', $variaveis);
       
    }

    public function atualizarInstituicao(Request $req, $id){
        //para atualizar os dados usar os sets do objeto e finalizar a função ( o deconstrutor salvar no banco)
    }

    public function deletarInstituicao($id){
        instituicao::deletar($id);

        return redirect()->route('instituição.show');
    }
  
    public function getInstituicao(string $nome, string $endereco){
        
        try {
            $DAO = new InstituicaoDAO();
            return $DAO->SELECT($nome, $endereco);
        }
        catch(\Exception $e){
            return ["error" => true, "Status"=> 500];
        }
    }
}
