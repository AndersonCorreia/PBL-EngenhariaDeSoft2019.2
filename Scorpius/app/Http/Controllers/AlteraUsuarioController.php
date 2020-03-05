<?php

namespace App\Http\Controllers;

use App\DB\PessoaDAO;
use App\Model\Users\Pessoa;
use App\Model\Users\Usuario;
use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class AlteraUsuarioController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = session('ID');
        $dadosUsuario =(new Usuario)->getDados($id_user);
        $arrayNome = explode(' ',$dadosUsuario['nome']);
        $primeiroNome = $arrayNome[0];
        $surname = null;
            for($i = 1; $i < count($arrayNome); $i++){
                if($surname == null){ 
                    $surname = $arrayNome[$i].'';
                }
                else{
                    $surname = $surname." ".$arrayNome[$i];
                }
            }

        $variaveis = [
            'itensMenu' => getMenuLinksAll(),
            'dadosUsuario' => ['sobrenome'=> $surname, 'nome' => $primeiroNome,'senha'=>$dadosUsuario['senha'],'cpf'=>$dadosUsuario['cpf'], 
                'email'=>$dadosUsuario['email'], 'telefone'=>$dadosUsuario['telefone'] ]
        ];
        return view('TelaAlterarDadosCadastrais.telaAlterarDadosCadastrais',$variaveis);
    }
   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $nome = $_POST['nomeUsuario'];
        $sobrenome =$_POST['sobrenomeUsuario'];
        $telefone=$_POST['telefoneUsuario'];
        $cpf=$_POST['cpfUsuario'];
        $senhaAtual=$_POST['senhaAtual'];
        $novaSenha=$_POST['novaSenha'];
        $rptNovaSenha=$_POST['rptNovaSenha'];
      
        if($senhaAtual != $dadosUsuario['senha']){
            die("Erro: Não foi possível atualizar os dados pessoais");
            return view('TelaAlterarDadosCadastrais.telaErroAlterarDadosCadastrais',$dadosUsuario);
        }
        else if($senhaAtual == $dadosUsuario['senha'] && $novaSenha==$rptNovaSenha){
            if( $novaSenha==null && $rptNovaSenha == null || ($rptNovaSenha==' ' && $novaSenha==' ')){
                $novaSenha = $senhaAtual; $rptNovaSenha = $senhaAtual;
            }

            $fullName = $nome." ".$sobrenome;
            $sql = "UPDATE usuario('nome','telefone','CPF','senha') 
                VALUES ($fullName,$telefone,$cpf,$novaSenha)";
            $stmt->bind_param("i",$id);
            $stmt->execute();
        }
        return view('TelaAlterarDadosCadastrais.telaConfirmaAlterarDadosCadastrais',$dadosUsuario);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        
        return 'cheguei update';
    }

    
    public function destroy($id)
    {
        //
    }
}
