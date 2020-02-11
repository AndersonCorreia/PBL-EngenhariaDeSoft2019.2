<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class horarioEstagiarioController extends Controller
{
    public function index()
    {
        $variaveis = [
            'itensMenu' => getMenuLinks()
        ];
        return view('TeladoHorarioEstagiario.HorarioEstagiario',$variaveis);
    }
    public function cadastrarHorario()
    {
        $seg_manha = $_POST['seg-manha'];
        $seg_tarde = $_POST['seg-tarde'];
        $seg_noite = $_POST['seg-noite'];
        
        $ter_manha = $_POST['ter-manha'];
        $ter_tarde = $_POST['ter-tarde'];
        $ter_noite = $_POST['ter-noite'];
        
        $qua_manha = $_POST['qua-manha'];
        $qua_tarde = $_POST['qua-tarde'];
        $qua_noite = $_POST['qua-noite'];
        
        $qui_manha = $_POST['qui-manha'];
        $qui_tarde = $_POST['qui-tarde'];
        $qui_noite = $_POST['qui-noite'];
        
        $sex_manha = $_POST['sex-manha'];
        $sex_tarde = $_POST['sex-tarde'];
        $sex_noite = $_POST['sex-noite'];
        
        $guia = $_POST['guia'];
        $observacao = $_POST['observacao'];
        $horarios = array();

        if($seg_manha == 'on'){
            $horarios[] = ['Segunda', 'Manhã'];
        }

        
    }
   
}
