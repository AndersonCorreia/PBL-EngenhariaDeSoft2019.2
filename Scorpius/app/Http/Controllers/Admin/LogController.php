<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DB\PessoaDAO;
use GuzzleHttp\Psr7\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = $this->listaLogs();
        // dd($logs);
        $variaveis = [
            'logs' => $logs['log'],
            'acoes' => $logs['acoes']
        ];
        
        return view('telaLogSistema.index', $variaveis);
        
    }
    public function listaLogs(){
        $logs = new PessoaDAO();
        return $logs->logSistema();
    }

}
