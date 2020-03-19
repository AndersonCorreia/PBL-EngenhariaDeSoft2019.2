<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
