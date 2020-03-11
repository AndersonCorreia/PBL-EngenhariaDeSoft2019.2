<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DB\PessoaDAO;

require_once __DIR__ . "/../../../resources/views/util/layoutUtil.php";

class GerenciarUsuariosController extends Controller
{
    public function index()
    {
        
        $variaveis = [
            'itensMenu' => getMenuLinks()
            
        ];
        
        return view('telaGerenciamentoUsuarios.index', $variaveis);
        
    }
    public function listaUsuario(){
        $usuario = new PessoaDAO();
        //dd($usuario->listarUsuario(session('ID')));
        
    }

}
