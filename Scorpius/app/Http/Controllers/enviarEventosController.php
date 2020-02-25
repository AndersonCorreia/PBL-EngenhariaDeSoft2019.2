<?php

namespace App\Http\Controllers;

use App\Model\Exposicao;
use Illuminate\Http\Request;
use App\DB\ExposicaoDAO;
use Exception;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class enviarEventosController extends Controller
{

    public function index()
    {
        return view('enviarEventos', $dados = ['try' => 'ND', 'log' => 'ND']);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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
        return view('enviarEventos', $dados);
    }


    public function show($id)
    {
        //
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