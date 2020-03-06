<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Erros extends Controller
{
    public function visitante(){

        if( session('errorVisita',false) ){

            return view('telasUsuarios.Agendamentos.errorNenhumaVisita', ['paginaAtual' => 'Agendar Visita']);
        }
        else if( session('errorAtividade',false) ){

            return view('telasUsuarios.Agendamentos.errorNenhumaAtividade', ['paginaAtual' => 'Agendar Visita']);
        }
        else if( session('errorInstituicao',false) ){

            return view('TelaInstituicaoEnsino.errorNenhumaInstituicao', ['paginaAtual' => 'Agendar Visita']);
        }
        else if( session('errorTurma',false) ){

            return view('TelaInstituicaoEnsino.errorNenhumaTurma', ['paginaAtual' => 'Agendar Visita']);
        }
        else {
            return redirect()->route('dashboard');
        }
    }
}
