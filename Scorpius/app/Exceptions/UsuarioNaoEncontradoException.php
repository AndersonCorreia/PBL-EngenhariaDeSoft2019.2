<?php

namespace App\Exceptions;

/**
 * Exception costumizada para erro de um usuario que não cadastrou nenhuma instituição
 */
class UsuarioNaoEncontradoException extends \Exception {

    public function __construct(int $cod=1){
        parent::__construct("Não ha nenhuma instituição vinculada ao usuario",$cod);
    }
}