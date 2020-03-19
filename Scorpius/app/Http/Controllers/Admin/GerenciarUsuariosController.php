<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DB\PessoaDAO;

class GerenciarUsuariosController extends Controller
{
    public function index()
    {
        
        $variaveis = [           
        ];
        
        return view('telaGerenciamentoUsuarios.index', $variaveis);
        
    }
    public function listaUsuario(){
        $usuario = new PessoaDAO();
        //dd($usuario->listarUsuario(session('ID')));
        
    }

}
