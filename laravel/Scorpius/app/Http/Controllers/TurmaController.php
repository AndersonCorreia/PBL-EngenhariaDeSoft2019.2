<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Turma;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class TurmaController extends Controller
{
    public function index($professor_ID)
    {   
        $turma = new Turma();
        $turmas = $turma->todasTurmas($professor_ID);
        $variaveis = [
            'professor_ID' =>$professor_ID,
            'itensMenu' => getMenuLinks("visitante"),
            'turmas' => $turmas,
            'msg' => NULL
        ];
        return view('telaTurma.index', $variaveis);
    }
    public function returnProcedimento($professor_ID, $msg)
    {   
        $turma = new Turma();
        $turmas = $turma->todasTurmas($professor_ID);
        $variaveis = [
            'professor_ID' =>$professor_ID,
            'itensMenu' => getMenuLinks("visitante"),
            'turmas' => $turmas,
            'msg' => $msg
        ];
        return view('telaTurma.index', $variaveis);
    }
    public function excluirTurma($professor_ID){
        $turma = new Turma();
        
        if($turma->excluirTurma(intval($_POST['turma_ID']))){
            return $this->returnProcedimento($professor_ID, ['ERRO'=>'FALSE', 'MSG'=> 'Turma excluída com sucesso!']);
        }
        return $this->returnProcedimento($professor_ID, ['ERRO'=>'TRUE', 'MSG'=> 'Erro ao excluir turma!']);
    }
    public function editarTurma($professor_ID){
        $turma = new Turma();
        $turma_ID = intval($_POST['turma_ID']);
        $novaTurma = [
            'nome'=> $_POST['nomeTurma'],
            'ano'=> $_POST['anoEscolar'],
            'ensino'=> $_POST['ensino']
        ];
        if($turma->editarTurma($turma_ID, $novaTurma) == FALSE){
            return $this->returnProcedimento($professor_ID, ['ERRO'=>'FALSE', 'MSG'=> 'Turma editada com sucesso!']);
        }
        return $this->returnProcedimento($professor_ID, ['ERRO'=>'TRUE', 'MSG'=> 'Erro ao editar turma!']);
    }
    public function excluirAluno($professor_ID)
    {
        $turma = new Turma();
        $aluno_ID = intval($_POST['aluno_ID']);
        
        if($turma->excluirAluno($aluno_ID) == FALSE){
            return $this->returnProcedimento($professor_ID, ['ERRO'=>'FALSE', 'MSG'=> 'Aluno excluido com sucesso!']);
        }
        return $this->returnProcedimento($professor_ID, ['ERRO'=>'TRUE', 'MSG'=> 'Erro ao excluir aluno!']);
    }
    public function adicionarAluno($professor_ID)
    {
        $turma = new Turma();
        $turma_ID = intval($_POST['turma_ID']);
        if($turma->adicionaAluno($turma_ID, ['nome'=>$_POST['nomeAluno'], 'idade'=>intval($_POST['idadeAluno'])]) == TRUE){
            return $this->returnProcedimento($professor_ID, ['ERRO'=>'FALSE', 'MSG'=> 'Aluno adicionado com sucesso!']);
        }
        return $this->returnProcedimento($professor_ID, ['ERRO'=>TRUE, 'MSG'=> 'Erro ao adicionar aluno!']);
    }
}
