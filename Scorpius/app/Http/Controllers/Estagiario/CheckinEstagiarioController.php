<?php

namespace App\Http\Controllers\Estagiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Users\Empregado;
require_once __DIR__."/../../../../resources/views/util/layoutUtil.php";

class CheckinEstagiarioController extends Controller
{
    public function index()
    {
        $variaveis = [
            'itensMenu' => getMenuLinks()
        ];
        return view('TelaCheckinEstagiario.CheckinEstagiario',$variaveis);
    }
}