<?php

namespace App\Http\Controllers;

use App\Model\Instituicao;
use Illuminate\Http\Request;
use App\DB\InstituicaoDAO;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";
class ControlerInstitucional extends Controller {   
    /**
     * Retorna tela de instiuição
     * @return telaInstituicao
     */
    public function telaInstituicao() {
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições",
            'registros' => instituicao::listarInstituicoes()
        ];
        return view('TelaInstituicaoEnsino.instituicaoEnsino', $variaveis);
    }

    public function telaDadosInstituicao() {
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
    public function telaCadastroInstituicao() {
        
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Cadastro de Instituições"   
        ];
        try{
            $DAO = new InstituicaoDAO();
            $variaveis['instituicoes'] =$DAO->getNomeEnderecoALL();
        }finally{
            return view('TelaInstituicaoEnsino.cadastroInstituicao', $variaveis);
        }
    }
    /**
     * Função que deve cadastrar uma instituição e vincula-la ao usuario.
     *
     * @return page redirecionar o usuario para a pagina de instituições
     */
    public function CadastrarInstituicao() {
        //codigo para cadastrar a instituição
        $DAO = new InstituicaoDAO();
        if($_POST["onlyLink"]==false){
            $responsavel = $_POST['Responsavel'];
            $nome = $_POST['Instituicao'];
            $telefone = $_POST['Telefone'];
            $endereco = $_POST['Endereco'];
            $numero = $_POST['Numero'];
            $cep = $_POST['CEP'];
            $cidade = $_POST['Cidade'];
            $estado = $_POST['Estado'];
            $tipo = $_POST['Tipo'];

            //armazena na classe
            $instituicao = new Instituicao($nome, $responsavel, $telefone, $endereco, $numero,
                        $cep, $cidade, $estado, $tipo);
            //armazena no banco
            $DAO->INSERT($instituicao);
        }
        //Vincula a instituicao ao representante, inserindo a relação na tabela professor_instituicao 
        $id_user = $_SESSION["ID"];//supondo que vai existir essa variavel
        $DAO->INSERT_Professor_Instituicao($_POST['ID'], $id_user);                
        return redirect()->route('instituição.show');
    }

    public function editarInstituicao($id) {

        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Instituições",
            'registros' => instituicao::buscar($id)
        ];
        return view('TelaInstituicaoEnsino.dadosInstituicaoEnsino', $variaveis);
       
    }

    public function atualizarInstituicao(Request $req, $id) {
        //para atualizar os dados usar os sets do objeto e finalizar a função ( o deconstrutor salvar no banco)
    }

    public function deletarInstituicao($id) {
        instituicao::deletar($id);

        return redirect()->route('instituição.show');
    }
  
    public function getInstituicao(string $nome, string $endereco) {
        
        try {
            $DAO = new InstituicaoDAO();
            return $DAO->SELECT($nome, $endereco);
        }
        catch(\Exception $e) {
            return ["error" => true];
        }
    }
}
