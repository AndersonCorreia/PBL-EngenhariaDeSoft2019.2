<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class UserController extends Controller
{

    //
    public function calendario() {
        $variaveis = [
            'itensMenu' => getMenuLinks("visitante"),
            'paginaAtual' => "Agendar visita"
        ];

        return view('telasUsuarios.calendar', $variaveis);
    }

    
}
