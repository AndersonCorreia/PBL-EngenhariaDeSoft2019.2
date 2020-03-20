<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DB\PessoaDAO;

class PermissoesController extends Controller
{
    public function index(){

        $DAO = new PessoaDAO();
        $p_t = $DAO->getPermissoes_tipoAll();
        $tipos = $DAO->getTipos();
        $permissoes = $DAO->getPermissoesAll();
        $permissaoTipo = $this->getPermissaoTipo($permissoes, $tipos, $p_t);

        $variaveis = [
            'tipos' => $tipos,
            'permissoes' => $permissoes,
            'permissaoTipo' => $permissaoTipo,
        ];

        return view('TelaAdmin.gerenciamentoPermissoes', $variaveis);
    }

    public function getPermissaoTipo($permissoes, $tipos, $p_t){

        $permissaoTipo = [];

        foreach ($permissoes as $p) {
            $permissaoTipo[$p['ID']] = [];

            foreach ($tipos as $t) {
                $permissaoTipo[$p['ID']][$t['ID']] = false;
            }
        }

        foreach ($p_t as $value) {
            $permissaoTipo[$value['permissao_ID']][$value['tipo_usuario_ID']] = true;
        }

        return $permissaoTipo;
    }
}
