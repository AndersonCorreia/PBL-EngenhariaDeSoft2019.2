<?php

namespace App\Http\Controllers;

use App\DB\PessoaDAO;
use App\Model\Users\Pessoa;
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
        $variaveis = [
            'itensMenu' => getMenuLinksAll()
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
    {/*request são os dados do formulario
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $senha_nova = $_POST['senha_nova'];
        $senha_antiga = $_POST['senha_antiga'];

        while(1){

            $variavel = 
            $variavel = 
            $variavel = 

        }*/

//tem que fazer a condicional se a senha antiga estiver errada não poder fazer a alteração
        //if($senha_antiga for diferente da senha do bd)
            //retorna que não pode alterar dados
        $variavel = $_POST['aria-pressed'] == true;
        $usuario = new PessoaDAO();
        $id_user = $usuario->SELECTbyName($nome);
        $dadosUsuario = [
            'email' => $email,
            'nome' => $nome,
            'telefone' => $telefone,
            'senha' => $senha_nova,
            'id' =>$id_user
        ];
            
        $usuario->UPDATE($dadosUsuario);
        return 'dados alterados com sucesso!';
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
