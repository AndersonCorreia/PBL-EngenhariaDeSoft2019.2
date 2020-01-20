<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class AlterarDadosController extends Controller
{
    public function index(){
        $variaveis = [
            'itensMenu' => getMenuLinksAll()
        ];
        return view('TelaAlterarDadosCadastrais.telaAlterarDadosCadastrais',$variaveis);
    }
}
