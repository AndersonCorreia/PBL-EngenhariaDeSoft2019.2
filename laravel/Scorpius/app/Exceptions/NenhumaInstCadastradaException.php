<?php

namespace App\Exceptions;

/**
 * Exception costumizada para erro de um usuario que não cadastrou nenhuma instituição
 */
class NenhumaInstCadastradaException extends \Exception {

    public function __construct(int $cod=0){
        parent::__construct("Não ha nenhuma instituição vinculada ao usuario",$cod);
    }
}