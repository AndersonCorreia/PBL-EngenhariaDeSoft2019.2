<?php
/**
 * Esse controller está na pasta Funcionario pois mexe com informações que devem ser mantidas
 * em segurança, como email, cpf, telefone, etc. Os metodos desta classe também poderiam
 * estar no InicialController em vez daqui, mas não é de bom tom, pois como falei acima 
 * é uma questão de segurança
 */
namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\DB\Proposta_horarioDAO;
require_once __DIR__."/../../../../resources/views/util/layoutUtil.php";

class HorarioController extends Controller{


    public function getTelaHorarioEstagiario(){
        $DAO = new Proposta_horarioDAO();
        $variaveis=['itensMenu' => getMenuLinks()];
        try{
            $estagiarios = $DAO->buscaEstagiarioALL();
            $variaveis = [
                'itensMenu' => getMenuLinks(),
                'estagiarios'=> $estagiarios
            ];
        }catch(\Exception $e){
            return view('TelaPropostaHorarioFuncionario.errorNenhumaProposta', $variaveis);
        }
       
        return view('TelaPropostaHorarioFuncionario.telaGerenciamentoDehorarios', $variaveis);
    }

    public function getProposta($id){
        $DAO = new Proposta_horarioDAO();
        $horario = $DAO->buscaHorarioEstagiario($id);
        $observacao = $DAO->buscaObservacaoEstagiario($id);
        return Response::json(['horario'=>$horario,'observacao'=>$observacao]);
    }

    public function getObservacao($id){
        $DAO = new Proposta_horarioDAO();
        $observacao = $DAO->buscaObservacaoEstagiario($id);
        return Response::json($observacao);
    }

    public function nenhumaProposta(){
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Horarios estagiarios",
        ];

        return view('TelaPropostaHorarioFuncionario.errorNenhumaProposta', $variaveis);
    }

    public function enviaHorario(Request $req){
       $DAO = new Proposta_horarioDAO();
        $horarios = $req->horario_definitivo; 
        $result;
        if(isset($horarios)){
            $result = $DAO->DELETEbyID($req->ID);
            if($result){
                foreach($horarios as $valor){
                    $result = $DAO->salvaHorarioEstagiario($req->ID ,$valor['dia'],$valor['turno']);
                }
            }
        }else{
            $DAO->DELETEbyID($req->ID);
        } 
        
    }
}