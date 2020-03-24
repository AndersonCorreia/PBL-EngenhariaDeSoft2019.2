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

    public function alterarPermissoes(Request $request){

        $DAO = new PessoaDAO();
        $permissaoTipo = $this->preencherMatrizPermissaoTipo($request->get('p_t',[]), $msg);
        $DAO->setPermissoes($permissaoTipo, $msg);

        return redirect()->back();
    }
    
    public function defaultPermissoes(Request $request){

        $DAO = new PessoaDAO();
        $permissaoTipo = $this->getDefaultPermissaoTipo();
        $DAO->setPermissoes($permissaoTipo, "as permissões do sistema voltaram ao padrão");

        return redirect()->back();
    }

    public function preencherMatrizPermissaoTipo($p_t, &$msg ){

        $permissaoTipo = [];
        $msg = "--- Alteração das permissões do sistema. --- Estado atual das permissões:";

        foreach ($p_t as $value) {
            $pt = \explode("|", $value);
            $msg .= " $pt[3] tem acesso à $pt[2];";
            $permissaoTipo[] = ['permissao_ID' => $pt[0], 'tipo_ID' => $pt[1]];

        }
        
        return $permissaoTipo;
    }

    /**
     * retornar um array com a relação padrão de permissoes do sistema
     *
     * @return void
     */
    public function getDefaultPermissaoTipo(){

        return [   
                    [ 'permissao_ID' => 1, 'tipo_ID' => 10 ],
                    [ 'permissao_ID' => 1, 'tipo_ID' => 8 ],
                    [ 'permissao_ID' => 1,'tipo_ID' => 9 ],
                    [ 'permissao_ID' => 2, 'tipo_ID' => 8 ],
                    [ 'permissao_ID' => 3, 'tipo_ID' => 9 ],
                    [ 'permissao_ID' => 4, 'tipo_ID' => 9 ],
                    [ 'permissao_ID' => 5, 'tipo_ID' => 9 ],
                    [ 'permissao_ID' => 6, 'tipo_ID' => 9 ],
                    [ 'permissao_ID' => 7, 'tipo_ID' => 10 ],
                    [ 'permissao_ID' => 8, 'tipo_ID' => 10 ],
                    [ 'permissao_ID' => 9, 'tipo_ID' => 10 ],
                    [ 'permissao_ID' => 10, 'tipo_ID' => 10 ],
                    [ 'permissao_ID' => 11, 'tipo_ID' => 10 ],
        ];
    }
}
