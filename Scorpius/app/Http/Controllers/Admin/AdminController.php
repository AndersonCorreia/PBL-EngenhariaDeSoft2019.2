<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getDashboardAdm()
    {
        $id_user = session('ID');
        
        $variaveis = [
        ];

        return view("Dashboard_Adm.Dashboard_Adm", $variaveis);
    }
}
