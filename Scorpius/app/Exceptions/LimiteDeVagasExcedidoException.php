<?php

namespace App\Exceptions;

/**
 * Exception costumizada para quando o usuario ultrapassa o limite de agendamentos
 */
class LimiteDeVagasExcedidoException extends \Exception {

    public function __construct(int $cod=1){
        parent::__construct("Limite de vagas excedido",$cod);
    }
}