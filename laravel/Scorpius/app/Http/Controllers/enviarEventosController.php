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
        return view('enviarEventos',$dados = ['try' => 'ND', 'log' => 'ND']);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $titulo = $request->titulo;
        $tipoEvento = $request->evento;
        $descricao = $request->descricao;
        $quantidade = $request->quantidade;
        $data_inicial = $request->data_inicial;
        $data_final = $request->data_final;
        $rawImagem = $request->imagem;
        $token = $request->_token;
       
        
        try{
            /*
            $newEvent = new Exposicao();
            $newEvent->novaExposicao([
                'titulo' => $titulo,
                'tipo' => $tipoEvento,
                'descricao' => $descricao,
                'quantidade' => $quantidade,
                'data_inicial' => $data_inicial,
                'data_final' => $data_final,
                'imagem' => $rawImagem
            ]);
            */
            $try = 'TRUE';
            $log = '';
        }catch(Exception $e){
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
