<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Erros extends Controller
{
    public function visitante(){

        $viewError = session('viewErro',false);
        if( $viewError ){

            return view($viewError, ['paginaAtual' => 'Agendar Visita']);
        }
        else {
            
            return redirect()->route('dashboard');
        }
    }
}
