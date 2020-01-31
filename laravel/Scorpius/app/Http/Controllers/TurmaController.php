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
            'professor_ID' =>$professor_ID,
            'itensMenu' => getMenuLinks("visitante"),
            'turmas' => $turmas
        ];
        return view('telaTurma.index', $variaveis);
    }
    public function excluirTurma($professor_ID){
        $turma = new Turma;
        $turma->excluirTurma(intval($_POST['turma']));
        $turmas = $turma->todasTurmas($professor_ID);
        $variaveis = [
            'professor_ID' =>$professor_ID,
            'itensMenu' => getMenuLinks("visitante"),
            'turmas' => $turmas
        ];
        return view('telaTurma.index', $variaveis);
    }
}
