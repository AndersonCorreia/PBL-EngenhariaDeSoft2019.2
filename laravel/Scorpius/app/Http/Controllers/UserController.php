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

        $exposicoes = [];
        $atividades = [];
        
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
            $atividades[]= ["titulo"=> "atividade$i", "descrição" => "ferias divertidas De 07 a 09 de janeiro"];
        }
        //fim da parte para testes
        $visitante = ["leg.disponivel" => "Disponivel:(de acordo limite de participantes)", "leg.indisponivel" => "Disponivel:(havera visita escolar)", "tipo" => "visitante"];
        $institucional = ["leg.disponivel" => "Disponivel", "leg.indisponivel" => "Lista de Espera", "tipo" => "institucional"];
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Agendar visita",
            'visitas' => $array,
            'legenda' => $visitas[0]->getBtnClasses(),
            'tipoUser'=> $institucional,
            'exposicoes'=> $exposicoes,
            'atividades'=> $atividades
        ];

        return view('TelasUsuarios.calendar', $variaveis);
    }

    /**
     * Exibir tela de agendamento de uma instituicao
     *
     * @return void
     */
    public function agendamento(){
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Agendar visita"
        ];

        return view('telasUsuarios.formularioAgendamento', $variaveis);
    }

    public function agendamentoIndividual(){
        $variaveis = [
            'itensMenu' => getMenuLinks("visitante"),
            'paginaAtual' => "Agendar visita"
        ];

        return view('telasUsuarios.formularioAgendamentoIndividual', $variaveis);
    }

    //inserir dados do agendamento pelo POST na classe e no banco de dados
    public function agendarInstituicao(){

        
    }

    //inserir dados do agendamento pelo POST na classe e no banco de dados
    public function agendarContaIndividual(){

        
    }
}
