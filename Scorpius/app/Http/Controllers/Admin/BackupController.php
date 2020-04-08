<?php

namespace App\Http\Controllers\Admin;
use App\DB\Backup;
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

    public function realizaBackup(Request $req){
            // Como a geração do backup pode ser demorada, retiramos
            // o limite de execução do script
            set_time_limit(0);
            // Utilizando a classe para gerar um backup na pasta 'backups'
            // e manter os últimos dez arquivos
            
            $backup = new Backup($req->diretorio);
            $backup->generate();
    }
}

?>