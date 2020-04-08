<?php

namespace App\Http\Controllers\Geral;

use App\Http\Controllers\Controller;
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

    /**
     * Função que recebe os dados inseridos do usuário e faz a modifiação.
     * Valida a senha inserida:
     * Se senha atual inserida for diferente da senha atual *, a tela é redirecionada para tela de erro. 
     * Se forem iguais ** e a nova senha e a repetição da senha são iguais entre 
     * elas. Neste caso, checa se a senha nova e sua repetição são null ou vazias e,
     * se forem, elas recebem o valor de $senhaAtual. Se não forem null ou vazias, os  dados são alterados. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view da tela de sucerro/erro de alterar dados
     */
    public function store(Request $request)
    {   $nome = $_POST['nome'];
        $sobrenome =$_POST['sobrenome'];
        $telefone =$_POST['telefone'];
        $cpf =$_POST['cpf'];
        $senhaAtual =$_POST['senhaAtual'];
        $novaSenha =$_POST['novaSenha'];
        $rptNovaSenha =$_POST['rptNovaSenha'];
      
        $u = (new Usuario)->getDados(session('ID'));
        $variaveis = [
            'arrayDados'=>$u,
            'paginaAtual' => "Alterar Meus Dados"
        ];

        if($senhaAtual != $u['senha']){                                 //Se senha atual inserida for diferente da senha inserida *
            return view('TelaAlterarDadosCadastrais.telaErroAlterarDadosCadastrais',$variaveis);    //erro
        }
        else if($senhaAtual == $u['senha'] && $novaSenha==$rptNovaSenha){                       //Se senha inserida for a mesma que a senha do usuário**
            if( $novaSenha==null && $rptNovaSenha == null || ($rptNovaSenha==' ' && $novaSenha==' ')){
                $novaSenha = $senhaAtual; $rptNovaSenha = $senhaAtual;
            }
            
            $fullName = $nome." ".$sobrenome;
            $idx = $u['id'];
            (new Usuario)->alterarDados($fullName,$telefone,$cpf,$novaSenha,$idx);          //Chama funcao que da UPDATE dos dados do usuario
            $variaveis['isDadosAlterados'] = true;
            return view('TelaAlterarDadosCadastrais.telaConfirmaAlterarDadosCadastrais',$variaveis);    //SUCESSO
        }
    }

    public function update(Request $request, $id)
    {
        
        return 'cheguei update';
    }
}
