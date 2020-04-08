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
        $permissaoTipo = $this->preencherMatrizPermissaoTipo( $request->get('p_t',[]) );
        $msg = $this->getMensagens($request->alteracoes);
        $DAO->setPermissoes($permissaoTipo, $msg);

        return redirect()->back();
    }
    
    public function defaultPermissoes(Request $request){

        $DAO = new PessoaDAO();
        $permissaoTipo = $this->getDefaultPermissaoTipo();
        $DAO->setPermissoes($permissaoTipo, ["As permissões do sistema voltaram ao padrão"]);

        return redirect()->back();
    }
    /**
     * Função para preencher uma matriz com as relações de permissoes e tipos
     * para serem inseridas no banco
     *
     * @param array $p_t relação de permissoes com os tipos
     * @return array
     */
    public function preencherMatrizPermissaoTipo(array $p_t){

        $permissaoTipo = [];

        foreach ($p_t as $value) {
            $pt = \explode("|", $value);
            $permissaoTipo[] = ['permissao_ID' => $pt[0], 'tipo_ID' => $pt[1]];
        }

        return $permissaoTipo;
    }

    /**
     * Retornar um array com mensagens para exibir num log
     * O tamanho maximo de uma mensagem é de 400 caracteres. Quando o limite é ultrapassado
     * outra mensagem é criada.
     *
     * @param array $alteracoes array com as alterações realizadas nas permissões
     * @return array
     */
    public function getMensagens(array $alteracoes):array{

        $alterou = false;
        $msgs=[];
        $msg = "--- Alteração das permissões do sistema: --- ";

        foreach ($alteracoes as $value) {
            $alt = \explode("|", $value);
            if( strlen($msg) >= 400){
                $msgs[] = $msg;
                $msg = "--- Alteração das permissões do sistema: --- ";
                $alterou = false;//só salva a proxima mensagem se alguma permissao foi alterada
            }
            
            if($alt[2] != "naoAlterado"){
                $alterou = true;
                $msg .= " $alt[2] acesso do ".strtoupper($alt[1])." à ".strtoupper($alt[0])." ; ";
            }
        }
        
        if($alterou){//salvando ultima mensagem caso tenha ocorrido uma alteração
            $msgs[] = $msg;
        }

        return $msgs;
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
                    [ 'permissao_ID' => 10, 'tipo_ID' => 10 ],
                    [ 'permissao_ID' => 11, 'tipo_ID' => 10 ],
        ];
    }
}
