<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DB\CheckinDAO;

require_once __DIR__ . "/../../../resources/views/util/layoutUtil.php";

class CheckinVisitasController extends Controller
{
    public function index()
    {
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'alunos' => $this->selectAlunos()
        ];
        if (session('tipo') == 'estagiario') {
            return view('TelaCheckinVisitas.checkinEstagiario', $variaveis);
        } else {
            return view('TelaCheckinVisitas.checkinFuncionario', $variaveis);
        }
    }
    public function selectAlunos()
    {
        $alunos = new CheckinDAO();
        dd($alunos->SELECT_VISITA());
        return $alunos->SELECT_VISITA();
    }
}
