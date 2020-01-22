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
    {
        $email = $request->email;
        $nome = $request->nome;
        $telefone = $request->telefone;
        $senha = $request->senha;
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
