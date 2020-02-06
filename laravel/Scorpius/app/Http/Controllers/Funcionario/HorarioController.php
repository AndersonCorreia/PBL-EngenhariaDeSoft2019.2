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
use App\DB\Proposta_horarioDAO;
require_once __DIR__."/../../../../resources/views/util/layoutUtil.php";

class HorarioController extends Controller{


    public function getTelaHorarioEstagiario(){
        $DAO = new Proposta_horarioDAO();
      
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Gerenciamento de Visitas",
            'estagiarios'=> $DAO->buscaEstagiarioALL()
        ];
        try{
           
            
        }finally{
            return view('TelaPropostaHorarioFuncionario.telaGerenciamentoDehorarios', $variaveis);
        }

       
    }
}
?>