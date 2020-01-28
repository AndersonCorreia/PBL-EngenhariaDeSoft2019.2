<?php

namespace Tests\Unit\ModelTests;

use PHPUnit\Framework\TestCase;

require_once __DIR__."/../../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php";
use App\model\Visita;
use App\model\Agendamento;

class VisitaTest extends TestCase {

    public function test_preencherArrayForCalendario(){
        $visitas= [];
        $agen = new Agendamento();
        $visitas[] = new Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $visitas[] = new Visita( new \DateTime("27-01-2020"), "noite", "realizada", $agen);
        $visitas[] = new Visita( new \DateTime("30-01-2020"), "tarde", "realizada");
        $array = [];

        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }

        \assertContains(["27/01" =>["data" => "27/01 SEG", "manha.btn" => "btn-success"]],$array);
        \assertContains(["27/01" =>["data" => "27/01 SEG", "noite.btn" => "btn-danger"]],$array);
        \assertContains(["30/01" =>["data" => "30/01 QUI", "tarde.btn" => "btn-success"]],$array);
    }

    public function test_preencherArrayForCalendario_turnosVazios(){
        $v = new Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $array = [];

        $v->preencherArrayForCalendario($array);
        
        //testa se é prenchido apenas com o turno que deveria existir
        \assertNotContains(["30/01" =>["data" => "27/01 SEG", "tarde.btn" => "btn-success"]],$array);
        \assertNotContains(["30/01" =>["data" => "27/01 SEG", "noite.btn" => "btn-success"]],$array);
    }
}