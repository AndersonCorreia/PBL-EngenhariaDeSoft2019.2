<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users\Usuario;
use App\Model\Users\Pessoa;
use App\DB\PessoaDAO;

require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoaDAO = new PessoaDAO();
        
        $nome = $_POST['Nome'];
        $senha = $_POST['Senha'];
        $telefone = $_POST['Telefone'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $tipo_usuario = $_POST['tipo_usuario'];
        

        //armazena na classe
        $pessoa = new Pessoa($nome, $senha, $tipo_usuario, $cpf, $telefone, $email);
        //armazena no banco
        $pessoaDAO->INSERT($pessoa);
        $_POST["ID"] = $pessoa->getID();
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CadastroUsuario() {
        //codigo para cadastrar a Pessoa no User ADM
       
    
        
        // return redirect()->route('pessoa.show');
    }



}
