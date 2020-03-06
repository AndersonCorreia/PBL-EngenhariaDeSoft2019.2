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
class GerenciamentoDeEventosController extends Controller{
    public function getTelaGerenciamentoDeEventos(){
        //$id_user = $_SESSION["ID"]; //supondo que vai existir essa variavel
        $id_user = session('ID');
        $exposicoes = (new ExposicaoDAO)->SELECT_Eventos('ID, titulo, tipo_evento, tema_evento, turno, descricao, quantidade_inscritos, data_inicial, data_final');
        $variaveis = [
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

    public function cadastrar(Request $request)
    {
        $titulo = $request->titulo;
        $tipoEvento = $request->evento;
        $tema = $request->tema;
        $descricao = $request->descricao;
        $quantidade = $request->quantidade;
        $data_inicial = $request->data_inicial;
        $data_final = $request->data_final;
        $token = $request->_token;


        try {

            $imagem = $_FILES['imagem']['tmp_name'];
            $tamanho = $_FILES['imagem']['size'];

            if ($imagem != "none") {
                $fp = fopen($imagem, "rb");
                $conteudo = fread($fp, $tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);
            }

            $newEvent = new Exposicao();
            $dadosEvent = [
                'titulo' => $titulo,
                'tipo' => $tipoEvento,
                'tema' => $tema,
                'descricao' => $descricao,
                'quantidade' => $quantidade,
                'data_inicial' => $data_inicial,
                'data_final' => $data_final,
                'imagem' => $conteudo
            ];
            if(($newEvent->novaExposicao($dadosEvent))){
                $try = 'TRUE';
                $log = 'SUCCESS';
            }else{
                $try = 'TRUE';
                $log = 'FALID';
            }

        } catch (Exception $e) {
            $log = $e->getMessage();
            $try = 'FALSE';
        }
        $dados = [
            'try' => $try,
            'log' => $log
        ];
        redirect('telaGerenciamentoDeEventos.show', $dados);
    }
}
?>