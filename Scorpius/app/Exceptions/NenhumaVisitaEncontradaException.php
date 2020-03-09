<?php

namespace App\Exceptions;

/**
 * Exception costumizada para erro quando nenhuma visita é encontrada para os dados informados
 * Para Cod = 2 , significa que a buscar por uma visita especifica não obteve resultados.
 */
class NenhumaVisitaEncontradaException extends \Exception {

    public function __construct(int $cod=1){
        parent::__construct("Nenhuma Visita encontrada no intervalo especificado",$cod);
    }
}