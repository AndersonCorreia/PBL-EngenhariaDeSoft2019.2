<?php
/**
 * Esse controller está na pasta Administrador pois mexe com informações que devem ser mantidas
 * em segurança, como email, cpf, telefone, etc. Os metodos desta classe também poderiam
 * estar no InicialController em vez daqui, mas não é de bom tom, pois como falei acima 
 * é uma questão de segurança
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\DB\InstituicaoDAO;

class AdminController extends Controller
{

    public function getDashboardAdm()
    {
        //$id_user = session('ID');
        $visitantes = $this->selectEscolas();

        dd($visitantes);
        $variaveis = [
            'visitantes' => $visitantes,

        ];

        return view("Dashboard_Adm.Dashboard_Adm", $variaveis);
    }

    public function selectEscolas(){
        $escolas = new InstituicaoDAO();
        $totais = [];
        $municipais = $escolas->SELECT_COUNT_alunosMunicipal();
        $totais.push($municipais);
        $estaduais = $escolas->SELECT_COUNT_alunosEstadual();
        $totais.push($estaduais);
        $particulares = $escolas->SELECT_COUNT_alunosPrivada();
        $totais.push($particulares);
        
        return $totais;
    }
}
