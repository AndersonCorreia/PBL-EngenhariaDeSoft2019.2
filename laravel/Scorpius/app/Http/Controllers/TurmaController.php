<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Turma;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class TurmaController extends Controller
{
    public function index($professor_ID)
    {   
        $turma = new Turma;
        $turmas = $turma->todasTurmas($professor_ID);
        $variaveis = [
            'itensMenu' => getMenuLinks("visitante"),
            'turmas' => $turmas
        ];
        return view('telaTurma.index', $variaveis);
    }
}
