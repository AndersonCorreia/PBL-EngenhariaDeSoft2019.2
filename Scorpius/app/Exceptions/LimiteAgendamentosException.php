<?php

namespace App\Exceptions;

/**
 * Exception costumizada para quando o usuario ultrapassa o limite de agendamentos
 */
class LimiteAgendamentosException extends \Exception {

    public function __construct(int $cod=1){
        parent::__construct("Limite de agendamentos do usuario ultrapassado",$cod);
    }
}