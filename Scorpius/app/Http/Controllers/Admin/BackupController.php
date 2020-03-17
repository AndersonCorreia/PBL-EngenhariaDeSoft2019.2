<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class BackupController extends Controller{
    public function index(){
        $variaveis = [
            'paginaAtual' => "Realizar Backup"
        ];
        
       return view('telaBackup.telaBackup',$variaveis );
    }
}

?>