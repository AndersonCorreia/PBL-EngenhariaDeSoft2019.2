<?php

namespace App\Http\Controllers\Estagiario;

use App\Http\Controllers\Controller;
use App\DB\PessoaDAO;

class GeralController extends Controller
{
    public function index()
    {
        $variaveis = [
            'horarios' => $this->getHorarios()
        ];
        
        return view('TelaDashboardEstagiario.index', $variaveis);
    }
    public function getHorarios()
    {
        $user = new PessoaDAO();
        return $user->getHorarioEstagiario(intval(session('ID')));
    }

}
