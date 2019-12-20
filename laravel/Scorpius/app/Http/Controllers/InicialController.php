<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicialController extends Controller
{
    public function index(){
        return view('telaCadastro.index');
    }
}
