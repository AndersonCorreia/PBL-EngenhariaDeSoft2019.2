<?php

namespace Tests\Unit\ModelTests;

use PHPUnit\Framework\TestCase;

require_once __DIR__."/../../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\model\Visita;
use App\model\AgendamentoInstitucional;

class VisitaTest extends TestCase {

    public function test_preencherArrayForCalendario(){
        $visitas= [];
        $agen = new AgendamentoInstitucional();
        $visitas[] = new Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $visitas[] = new Visita( new \DateTime("27-01-2020"), "noite", "realizada", $agen);
        $visitas[] = new Visita( new \DateTime("30-01-2020"), "tarde", "realizada");
        $array = [];

        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }
        
        \assertEquals("27/01 SEG",$array["2020-01-27"]["data"]);
        \assertEquals("btn-success",$array["2020-01-27"]["manha.btn"]);
        \assertEquals("btn-warning",$array["2020-01-27"]["noite.btn"]);
        \assertEquals("btn-success",$array["2020-01-30"]["tarde.btn"]);
    }

    public function test_preencherArrayForCalendario_turnosVazios(){
        $v = new Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $array = [];

        $v->preencherArrayForCalendario($array);
        
        //testa se é prenchido apenas com o turno que deveria existir
        \assertNotContains(["30/01" =>["data" => "27/01 SEG", "tarde.btn" => "btn-success"]],$array);
        \assertNotContains(["30/01" =>["data" => "27/01 SEG", "noite.btn" => "btn-success"]],$array);
    }

    public function test_preencherArrayForCalendario_intervaloDatas(){
        $visitas= [];
        $visitas[] = new Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $visitas[] = new Visita( new \DateTime("27-01-2020"), "noite", "realizada");
        $visitas[] = new Visita( new \DateTime("03-02-2020"), "tarde", "realizada");
        $array = [];

        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }

        \assertEquals("27 de Janeiro", $array["dataInicio"]);
        \assertEquals("03 de Fevereiro", $array["dataFim"]);
    }
}