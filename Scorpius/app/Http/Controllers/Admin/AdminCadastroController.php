<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Users\Usuario;
use App\Model\Users\Pessoa;
use App\DB\PessoaDAO;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $pessoaDAO = new PessoaDAO();
        
        $nome = $_POST['nome'];                
        $sobrenome = $_POST['sobrenome'];
        $fullname = $nome." ".$sobrenome;
        $senha = $_POST['senha'];
        $rptSenha = $_POST['rptSenha'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $tipo_usuario = $_POST['tipo_usuario'];

        echo($nome." "); echo($sobrenome." "); echo($fullname." ");  echo($senha." ");  echo($rptSenha." ");  echo($telefone." ");  echo($cpf." "); 
        echo($email." ");  echo($tipo_usuario." ");

        //armazena na classe
        $pessoa = new Pessoa($fullname, $senha, $tipo_usuario, $cpf, $telefone, $email);
        //armazena no banco
        $pessoaDAO->INSERT($pessoa);
        $_POST["ID"] = $pessoa->getID();
    }

}
