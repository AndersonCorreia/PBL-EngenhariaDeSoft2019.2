<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

require_once __DIR__ . "/../../../resources/views/util/layoutUtil.php";

class CheckinVisitasController extends Controller
{
    public function index()
    {
        $variaveis = [
            'itensMenu' => getMenuLinks(),
        ];
        if (session('tipo') == 'estagiario') {
            return view('TelaCheckinVisitas.checkinEstagiario', $variaveis);
        } else {
            return view('TelaCheckinVisitas.checkinFuncionario', $variaveis);
        }
    }
}
