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
    
    function downloadGuiaMatricula(){
        $msg = false;

        if(isset($_FILES['guia_matricula'])){
            $extensao = strtolower(substr($_FILES['guia_matricula']['name'], -4));
            $novo_nome = md5(time()) . $extensao;
            $diretorio = "guiaDeMatricula/";
            move_uploaded_file($_FILES['guia_matricula']['tmp_name'], $diretorio.@novo_nome);

            $sql_code = "INSERT INTO estagiario(guia_matricula, usuario_ID) VALUES($novo_nome, null)";
            
            if($mysql = $this->dataBase->query($sql))
                $msg = "Arquivo enviado com sucesso!";
            else
                $msg = "Falha ao enviar arquivo!";
        }
    }
    
    public function cadastrarHorario()
    {
        
        $guia = $_POST['guia'];
        $observacao = $_POST['observacao'];
        $horarios = array();

        if(isset($_POST['seg-manha'])){
            $horarios[] = ['Segunda', 'Manhã'];
        }
        if(isset($_POST['seg-tarde'])){
            $horarios = ['Segunda', 'Tarde'];
        }
        if(isset($_POST['seg-noite'])){
            $horarios[] = ['Segunda', 'Noite'];
        }

        if(isset($_POST['ter-manha'])){
            $horarios[] = ['Terça', 'Manhã'];
        }
        if(isset($_POST['ter-tarde'])){
            $horarios = ['Terça', 'Tarde'];
        }
        if(isset($_POST['ter-noite'])){
            $horarios[] = ['Terça', 'Noite'];
        }

        if(isset($_POST['qua-manha'])){
            $horarios[] = ['Quarta', 'Manhã'];
        }
        if(isset($_POST['qua-tarde'])){
            $horarios = ['Quarta', 'Tarde'];
        }
        if(isset($_POST['qua-noite'])){
            $horarios[] = ['Quarta', 'Noite'];
        }

        if(isset($_POST['qui-manha'])){
            $horarios[] = ['Quinta', 'Manhã'];
        }
        if(isset($_POST['qui-tarde'])){
            $horarios = ['Quinta', 'Tarde'];
        }
        if(isset($_POST['qui-noite'])){
            $horarios[] = ['Quinta', 'Noite'];
        }

        if(isset($_POST['sex-manha'])){
            $horarios[] = ['Sexta', 'Manhã'];
        }
        if(isset($_POST['sex-tarde'])){
            $horarios = ['Sexta', 'Tarde'];
        }
        if(isset($_POST['sex-noite'])){
            $horarios[] = ['Sexta', 'Noite'];
        }
        
    }
   
}
