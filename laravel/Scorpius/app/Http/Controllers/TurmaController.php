<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Turma;

require_once __DIR__ . "/../../../resources/views/util/layoutUtil.php";

class TurmaController extends Controller
{
    public function index($professor_ID, $variaveis = null)
    {
        $turma = new Turma();
        $turmas = $turma->todasTurmas($professor_ID);
        $variaveis = [
            'professor_ID' => $professor_ID,
            'itensMenu' => getMenuLinks("visitante"),
            'turmas' => $turmas
        ];
        return view('telaTurma.index', $variaveis);
    }

    public function excluirTurma($professor_ID)
    {
        $turma = new Turma();

        $turma->excluirTurma(intval($_POST['turma_ID']));
        return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('success', 'Turma excluida com sucesso!');
    }
    public function editarTurma($professor_ID)
    {
        $turma = new Turma();
        $turma_ID = intval($_POST['turma_ID']);
        $nome = $_POST['nomeTurma'];
        $ano = $_POST['anoEscolar'];
        $ensino = $_POST['ensino'];
        if ($nome == "") {
            return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('erro', 'Insira um Nome para a turma!');
        }
        if ($ano == "") {
            return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('erro', 'Insira o Ano escolar para a turma!');
        }
        $novaTurma = [
            'nome' => $nome,
            'ano' => $ano,
            'ensino' => $ensino
        ];
        if ($nome == $turma->pegarTurmaPeloID($turma_ID)['nome']) {
            $turma->editarTurma($turma_ID, $novaTurma);
        } else {
            if ($turma->verificaTurmaExistente($professor_ID, $nome)) {
                return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('erro', 'Este nome de turma já existe, por favor escolha outro!');
            }
            $turma->editarTurma($turma_ID, $novaTurma);
        }
        
        return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('success', 'Turma editada com sucesso!');
    }
    public function excluirAluno($professor_ID)
    {
        $turma = new Turma();
        $aluno_ID = intval($_POST['aluno_ID']);

        $turma->excluirAluno($aluno_ID);
        return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('success', 'Aluno excluido com sucesso!');
    }
    public function adicionarAluno($professor_ID)
    {
        $turma = new Turma();
        $turma_ID = intval($_POST['turma_ID']);
        if ($_POST['nomeAluno'] == "") {
            return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('erro', 'Insira um nome para o aluno!');
        }
        if ($_POST['idadeAluno'] == "") {
            return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('erro', 'Insira uma idade para o aluno!');
        }
        $turma->adicionaAluno($turma_ID, ['nome' => $_POST['nomeAluno'], 'idade' => intval($_POST['idadeAluno'])]);
        return redirect()->route('telaTurmas', ['professor_ID' => $professor_ID])->with('success', 'Aluno adicionado com sucesso!');
    }
}
