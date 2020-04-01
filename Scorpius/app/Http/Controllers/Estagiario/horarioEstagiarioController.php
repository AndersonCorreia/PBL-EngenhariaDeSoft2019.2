<?php

namespace App\Http\Controllers\Estagiario;

use App\DB\PessoaDAO;
use App\Http\Controllers\Controller;
require_once __DIR__."/../../../../resources/views/util/layoutUtil.php";

class horarioEstagiarioController extends Controller
{
    public function index()
    {
        return view('TeladoHorarioEstagiario.HorarioEstagiario');
    }
    
    public function cadastrarHorario()
    {
        $guiaRAW = $_FILES['guia']['tmp_name'];
        $tamanho = $_FILES['guia']['size'];
        if ($guiaRAW != "none") {
            $fp = fopen($guiaRAW, "rb");
            $guia = fread($fp, $tamanho);
            $guia = addslashes($guia);
            fclose($fp);
        }
        
        $horarios = array();
        // MANHÂ
        if($_POST['seg-manha'] == 'true'){
            $horarios[] = ['Segunda', 'manha'];
        }
        if($_POST['ter-manha'] == 'true'){
            $horarios[] = ['Terca', 'manha'];
        }
        if($_POST['qua-manha'] == 'true'){
            $horarios[] = ['Quarta', 'manha'];
        }
        if($_POST['qui-manha'] == 'true'){
            $horarios[] = ['Quinta', 'manha'];
        }
        if($_POST['sex-manha'] == 'true'){
            $horarios[] = ['Sexta', 'manha'];
        }
        // TARDE
        if($_POST['seg-tarde'] == 'true'){
            $horarios[] = ['Segunda', 'tarde'];
        }
        if($_POST['ter-tarde'] == 'true'){
            $horarios[] = ['Terca', 'tarde'];
        }
        if($_POST['qua-tarde'] == 'true'){
            $horarios[] = ['Quarta', 'tarde'];
        }
        if($_POST['qui-tarde'] == 'true'){
            $horarios[] = ['Quinta', 'tarde'];
        }
        if($_POST['sex-tarde'] == 'true'){
            $horarios[] = ['Sexta', 'tarde'];
        }
        // NOITE
        if($_POST['seg-noite'] == 'true'){
            $horarios[] = ['Segunda', 'noite'];
        }
        if($_POST['ter-noite'] == 'true'){
            $horarios[] = ['Terca', 'noite'];
        }
        if($_POST['qua-noite'] == 'true'){
            $horarios[] = ['Quarta', 'noite'];
        }
        if($_POST['qui-noite'] == 'true'){
            $horarios[] = ['Quinta', 'noite'];
        }
        if($_POST['sex-noite'] == 'true'){
            $horarios[] = ['Sexta', 'noite'];
        }
        $obs = "";
        if(!empty($_POST['observacao'])){
            $obs = $_POST['observacao'];
        }
        $demandaWeb = [
            'guia' => $guia,
            'horarios' => $horarios,
            'observacao' => $obs
        ];
        $ID = session('ID');
        $estagiario = new PessoaDAO();
        $result = $estagiario->INSERT_horario($ID, $demandaWeb);
        if($result['resultado']){
            if($result['operacao'] == 'criada'){
                return redirect()->back()->with('success', 'Proposta de horário enviada com sucesso!');
            }
            return redirect()->back()->with('success', 'Proposta de horário atualizada com sucesso!');
        }
        return redirect()->back()->with('erro', 'Não foi possível registrar a demanda!');
    }
   
}
