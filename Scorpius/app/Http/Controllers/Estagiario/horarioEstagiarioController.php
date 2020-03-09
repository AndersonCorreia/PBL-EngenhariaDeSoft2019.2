<?php

namespace App\Http\Controllers\Estagiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Users\Empregado;
require_once __DIR__."/../../../../resources/views/util/layoutUtil.php";

class horarioEstagiarioController extends Controller
{
    public function index()
    {
        return view('TeladoHorarioEstagiario.HorarioEstagiario');
    }
    
    public function cadastrarHorario()
    {
        $guia = $_POST['guia'];
        
        // try {

        //     $guiaRAW = $_FILES['guia']['tmp_name'];
        //     $tamanho = $_FILES['guia']['size'];

        //     if ($guiaRAW != "none") {
        //         $fp = fopen($guiaRAW, "rb");
        //         $guia = fread($fp, $tamanho);
        //         $guia = addslashes($guia);
        //         fclose($fp);
        //     }
        // }catch(Exception $e){
        //     $message['success'] = false;
        //     $message['error'] = 'Erro na guia de matricula';
        //     echo json_encode($message);
        // }
        // $horarios = array();

        if(isset($_POST['horarios'])){
            if(isset($_POST['horarios']['seg'])){
                foreach($_POST['horarios']['seg'] as $horario){
                    $horarios[] = ['Segunda', $horario];
                }
            }
            if(isset($_POST['horarios']['ter'])){
                foreach($_POST['horarios']['ter'] as $horario){
                    $horarios[] = ['Terca', $horario];
                }
            }
            if(isset($_POST['horarios']['qua'])){
                foreach($_POST['horarios']['qua'] as $horario){
                    $horarios[] = ['Quarta', $horario];
                }
            }
            if(isset($_POST['horarios']['qui'])){
                foreach($_POST['horarios']['qui'] as $horario){
                    $horarios[] = ['Quinta', $horario];
                }
            }
            if(isset($_POST['horarios']['sex'])){
                foreach($_POST['horarios']['sex'] as $horario){
                    $horarios[] = ['Sexta', $horario];
                }
            }
        }else{
            $horarios = array();
        }
        
        if(isset($_POST['observacao'])){
            $obs = $_POST['observacao'];
        }

        $demandaWeb = [
            'guia' => $guia,
            'horarios' => $horarios,
            'observacao' => $obs
        ];

        $ID = session('ID');
        $estagiario = new Empregado();
        $resultado = $estagiario->novaDemandaWeb($ID, $demandaWeb);

        $message['success'] = $resultado;
        $message['error'] = 'Erro ao enviar proposta de horário';
        echo json_encode($message);
    }
   
}
