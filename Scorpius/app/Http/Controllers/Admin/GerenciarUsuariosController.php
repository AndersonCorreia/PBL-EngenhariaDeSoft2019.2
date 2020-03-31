<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DB\PessoaDAO;
use GuzzleHttp\Psr7\Request;

class GerenciarUsuariosController extends Controller
{
    public function index()
    {
        
        $variaveis = [
            'usuarios' => $this->listaUsuario(),
            'tipos' => $this->getTipos()
        ];
        
        return view('telaGerenciamentoUsuarios.index', $variaveis);
        
    }
    public function listaUsuario(){
        $usuario = new PessoaDAO();
        return $usuario->listarUsuario(intval(session('ID')));   
    }
    public function mudarUsuario(){
        $ID = $_POST['usuario'];
        $tipo_ID = $_POST['tipo'];
        $usuario = new PessoaDAO();
        $tipo_nome = $usuario->getNomeTipo($tipo_ID);
        $usuario->setTipo(intval($ID), $tipo_ID, $tipo_nome);
        return redirect()->route('gerenciarUsuarios.show')->with('success', 'Usuário editado com sucesso!');
    }
    public function excluirUsuario(){
        $ID = intval($_POST['usuario']);
        $usuario = new PessoaDAO();
        $usuario->deletarUsuario($ID);
        return redirect()->route('gerenciarUsuarios.show')->with('success', 'Usuário excluído com sucesso!');
    }
    public function getTipos()
    {
        $usuario = new PessoaDAO();
        return $usuario->getTipos();
    }

}
