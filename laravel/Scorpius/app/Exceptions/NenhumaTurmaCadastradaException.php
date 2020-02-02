<?php

namespace App\Exceptions;

/**
 * Exception costumizada para erro de um usuario que não cadastrou nenhuma turma
 */
class NenhumaTurmaCadastradaException extends \Exception {

    public function __construct(int $cod=0){
        parent::__construct("Não ha nenhuma turma cadastrada pelo usuario",$cod);
    }
}