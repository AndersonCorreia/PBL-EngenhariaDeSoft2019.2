<?php

namespace App\Exceptions;

/**
 * Exception costumizada para erro de um usuario que não cadastrou nenhuma instituição
 */
class NenhumaAtividadeEncontradaException extends \Exception {

    public function __construct(int $cod=1){
        parent::__construct("Nenhuma Atividade encontrada no intervalo especificado",$cod);
    }
}