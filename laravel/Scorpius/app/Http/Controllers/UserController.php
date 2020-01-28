<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class UserController extends Controller
{

    //
    public function calendario() {
        //para testes
        $visitas= [];
        $agen = new \App\Model\Agendamento();
        $visitas[] = new \App\Model\Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("27-01-2020"), "noite", "realizada", $agen);
        $visitas[] = new \App\Model\Visita( new \DateTime("29-01-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("30-01-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("31-01-2020"), "noite", "realizada", $agen);
        $visitas[] = new \App\Model\Visita( new \DateTime("25-02-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("26-02-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("27-02-2020"), "noite", "realizada", $agen);
        $visitas[] = new \App\Model\Visita( new \DateTime("30-02-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("30-03-2020"), "tarde", "realizada");
        $array = [];

        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }
        //fim da parte para testes
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Agendar visita",
            'visitas' => $array
        ];

        return view('TelasUsuarios.calendar', $variaveis);
    }

    
}
