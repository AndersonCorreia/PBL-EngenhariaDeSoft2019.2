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
use App\Model\Professor_instituicao;
use App\Model\AgendamentoInstitucional;

class DashboardController extends Controller{
    
    /**
    * Retorna Dashboard do Funcionário;
    * @return dashboardFuncionario
    */
    public function getTelaDashboardFuncionario(){
        /**$id_user = session('ID');
        $erro=null;
        $registro=null;
        $registro = Professor_instituicao::listarInstituicoes($id_user);**/
        $variaveis = [
            'paginaAtual' => "Painel de Controle do Funcionário",   
            /**'registros' => $registro,
            'erros' => $erro**/
        ];
        return view('TelaDashboardFuncionario.telaDashboardFuncionario', $variaveis);
    }

}
?>