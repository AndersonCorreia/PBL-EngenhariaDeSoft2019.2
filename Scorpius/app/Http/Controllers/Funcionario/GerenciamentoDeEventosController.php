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
use App\DB\ExposicaoDAO;
require_once __DIR__."/../../../../resources/views/util/layoutUtil.php";

class GerenciamentoDeEventosController extends Controller{
    public function getTelaGerenciamentoDeEventos(){
        //$id_user = $_SESSION["ID"]; //supondo que vai existir essa variavel
        $id_user = session('ID');
        $exposicoes = (new ExposicaoDAO)->SELECT_Eventos('ID, titulo, tipo_evento, tema_evento, turno, descricao, quantidade_inscritos, data_inicial, data_final');
        $variaveis = [
            'itensMenu' => getMenuLinks(), 
            'paginaAtual' => "Gerenciamento de Eventos",
            'exposicoes' => $exposicoes
        ];
        return view('TelaGerenciamentoDeEventos.telaGerenciamentoDeEventos', $variaveis);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    

    public function destroy($id)
    {
        //
    }
}
?>