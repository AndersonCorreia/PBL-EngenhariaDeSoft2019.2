<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlterarDadosController extends Controller
{
    public function index(){
        $variaveis = [
            'itensMenu' => getMenuLinksAll()
        ];
        return view('TelaAlterarDadosCadastrais.telaAlterarDadosCadastrais',$variaveis);
    }
}
