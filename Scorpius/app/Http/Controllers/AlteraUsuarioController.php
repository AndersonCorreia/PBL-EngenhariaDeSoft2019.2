<?php

namespace App\Http\Controllers;

use App\DB\PessoaDAO;
use App\Model\Users\Pessoa;
use App\DB\UsuarioDAO;
use App\Model\Users\Usuario;
use Illuminate\Http\Request;
class AlteraUsuarioController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $usuario = new UsuarioDAO();
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
            'dadosUsuario' => ['sobrenome'=> $surname, 'nome' => $primeiroNome,'senha'=>$dadosUsuario['senha'],'cpf'=>$dadosUsuario['cpf'], 
                'email'=>$dadosUsuario['email'], 'telefone'=>$dadosUsuario['telefone']]
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
    {   $nome = $_POST['nome'];                     echo($nome." ");
        $sobrenome =$_POST['sobrenome'];            echo($sobrenome." ");
        $telefone =$_POST['telefone'];               echo($telefone." ");
        $cpf =$_POST['cpf'];                         echo($cpf." ");
        $senhaAtual =$_POST['senhaAtual'];           echo($senhaAtual." ");
        $novaSenha =$_POST['novaSenha'];             echo($novaSenha." ");
        $rptNovaSenha =$_POST['rptNovaSenha'];       echo($rptNovaSenha." ");
      
        
        $u = (new Usuario)->getDados(session('ID'));
        $variaveis = [
            'arrayDados'=>$u,
            'paginaAtual' => "Ver Instituiçoes Cadastradas"
        ];
        if($senhaAtual != $u['senha']){
           return view('TelaAlterarDadosCadastrais.telaErroAlterarDadosCadastrais',$variaveis);
        }
        else if($senhaAtual == $u['senha'] && $novaSenha==$rptNovaSenha){
            if( $novaSenha==null && $rptNovaSenha == null || ($rptNovaSenha==' ' && $novaSenha==' ')){
                $novaSenha = $senhaAtual; $rptNovaSenha = $senhaAtual;
            }
            
            $fullName = $nome." ".$sobrenome;
            $idx = $u['id'];
            (new Usuario)->alterarDados($fullName,$telefone,$cpf,$novaSenha,$idx);
            return redirect()->route('alterarDados.show');
        }
        return view('TelaAlterarDadosCadastrais.telaErroAlterarDadosCadastrais',$variaveis);
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
