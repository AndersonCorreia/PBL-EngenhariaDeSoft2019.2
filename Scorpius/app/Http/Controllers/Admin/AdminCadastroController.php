<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Users\Empregado;
use App\DB\EmpregadoDAO;

class AdminCadastroController extends Controller
{
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    private $tipo;
    private $senha;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variaveis = [
            'paginaAtual' => "Cadastrar Usuário"
        ];
        
        return view('TelaAdmin.cadastroUsuario',$variaveis);
        
    }
    
    /**
     * Função que recebe do POST os dados inseridos e cria o usuário
     * Valida os dados e checa se cpf já existe. Se CPF já foi cadastrado,
     * a tela é redirecionada para a view de erro ao cadastrar usuário. Se
     * CPF não foi cadastrado anteriormente, o usuário é criado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view da tela de sucerro/erro de alterar dados
     */
    public function store(Request $request)
    {   $empregadoDAO = new EmpregadoDAO();
        $variaveis = [
            'paginaAtual' => "Cadastrar Usuário"
        ];

        $nome = $_POST['nome'];                
        $sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha'];
        $rptSenha = $_POST['rptSenha'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $tipo_usuario = $_POST['tipo_usuario'];

        $fullname = $nome." ".$sobrenome;
        $dadoExiste = $empregadoDAO->dadoJaExistente($cpf,$email);
        if($dadoExiste || !$tipo_usuario || !$nome || !$sobrenome || !$senha || !$rptSenha || !$telefone || !$cpf || !$email){     //Erro
            return view('TelaAdmin.cadastroUsuarioErro',$variaveis);
        }
        else if(!$dadoExiste && $tipo_usuario && $nome && $sobrenome && $senha && $rptSenha && $telefone && $cpf && $email){       //Sucesso
            //armazena na classe
            $pessoa = new Empregado($fullname, $senha, $tipo_usuario, $cpf, $telefone, $email);
            //armazena no banco
            $empregadoDAO->INSERT($pessoa);
            $_POST["ID"] = $pessoa->getID();
            return view('TelaAdmin.cadastroUsuarioSucesso',$variaveis);
        }
    }

}
