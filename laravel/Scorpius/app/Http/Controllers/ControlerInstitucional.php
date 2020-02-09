<?php

namespace App\Http\Controllers;

use App\Model\Instituicao;
use App\Model\Professor_instituicao;
use Illuminate\Http\Request;
use App\DB\InstituicaoDAO;
use App\DB\Professor_InstituicaoDAO;
use App\DB\PessoaDAO;
use App\Http\Requests\StoreUpdadeInstituicao;
use Symfony\Component\Mime\Message;

require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class ControlerInstitucional extends Controller {   
    /**
     * Retorna tela de instiuição
     * @return telaInstituicao
     */
    public function telaInstituicao() {
        //$id_user = $_SESSION["ID"]; //supondo que vai existir essa variavel
        $id_user = 601;
        $erro=null;
        $variaveis=null;
        $registro=null;
        $registro = Professor_instituicao::listarInstituicoes($id_user);

        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Ver Instituiçoes",
            'registros' => $registro, 
            'erros' => $erro
        ];

        return view('TelaInstituicaoEnsino.instituicaoEnsino', $variaveis);
    }

    public function nenhumaInstituicao(){
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Ver Instituiçoes",
        ];

        return view('TelaInstituicaoEnsino.errorNenhumaInstituicao', $variaveis);
    }
    public function nenhumaTurma(){
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Turma",
        ];

        return view('TelaInstituicaoEnsino.errorNenhumaTurma', $variaveis);
    }

    /**
     * retornar a tela de cadastro de instituições para o usuario
     *
     * @return void
     */
    public function telaCadastroInstituicao() {
        
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Cadastrar Instituição"   
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
        $instituicaoDAO = new InstituicaoDAO();
        $pro_instDAO = new Professor_InstituicaoDAO();
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
            $instituicaoDAO->INSERT($instituicao);
            $_POST["ID"] = $instituicao->getID();
        }
        //Vincula a instituicao ao representante, inserindo a relação na tabela professor_instituicao 
        //$id_user = $_SESSION["ID"];
        $id_user = 601;//temporario para evitar o erro na tela
        try{
            $pro_instDAO->INSERTbyID($_POST['ID'], $id_user);
        }
        catch(\MysqliException $e){
            $pro_instDAO->ativarbyID($_POST['ID'], $id_user);
        }   

        return redirect()->route('instituição.show');
    }

    public function editarInstituicao($id) {

        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Ver Instituiçoes",
            'registros' => instituicao::buscar($id)
        ];
        return view('TelaInstituicaoEnsino.dadosInstituicaoEnsino', $variaveis);
       
    }

    public function atualizarInstituicao(Request $req, $id) {
        //para atualizar os dados usar os sets do objeto e finalizar a função ( o deconstrutor salvar no banco)
        $DAO = new InstituicaoDAO();
        $nome = $_POST['Instituicao'];
        $responsavel = $_POST['Responsavel'];
        $telefone = $_POST['Telefone'];
        $endereco = $_POST['Endereco'];
        $numero = $_POST['Numero'];
        $cep = $_POST['CEP'];
        $cidade = $_POST['Cidade'];
        $estado = $_POST['Estado'];
        $tipo = $_POST['Tipo'];
  
        //armazena na classe
        $instituicao = new Instituicao( 
            $nome,
            $responsavel,
            $endereco,
            $numero,
            $cidade,
            $estado,
            $cep,
            $telefone,
            $tipo,
            $id
        );       
        //altera no banco
        $DAO->UPDATE($instituicao);
        return redirect()->route('instituição.show');
    
    }

    public function deletarInstituicao($id) {
        //$id_user = $_SESSION["ID"]; //supondo que vai existir essa variavel
        $id_user = 601;
        Professor_Instituicao::desativarByID($id ,$id_user);

        return redirect()->route('instituição.show');
    }
  
    public function getInstituicao(string $nome, string $endereco) {
        
        try {
            $DAO = new InstituicaoDAO();
            return $DAO->SELECT($nome, $endereco);
        }
        catch(\Throwable $e) {
            return ["error" => true];
        }
    }

}
