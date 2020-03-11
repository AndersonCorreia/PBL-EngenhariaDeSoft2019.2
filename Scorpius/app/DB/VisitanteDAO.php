<?php

namespace App\DB;

use App\Model\Visitante;
use PhpParser\Node\Expr\Cast\Bool_;

class VisitanteDAO extends \App\DB\interfaces\DataAccessObject{

    public function __Construct(){
        parent::__Construct("visitante");
    }

    public function INSERT($visitante): bool{
        $nome = $visitante->getNome();
        $idade = $visitante->getIdade();
        $rg = $visitante->getRg();
    
        $sql = "INSERT INTO visitante (nome, idade, RG) VALUE (
            '$nome',
            '$idade',
            '$rg'
        )";
        $resultado = $this->dataBase->query($sql);
        // dd($resultado)
        return $resultado;
    }
    public function UPDATE_VISITANTE($visitante): bool
    {
        $sql = "UPDATE visitante 
        SET nome = '$visitante->getNome()', idade = $visitante->getIdade(), RG = $visitante->getRg()
        WHERE ID = $visitante->getID()";
        return $this->dataBase->query($sql);
    }

    public function UPDATE_NOME_VISITANTE($visitante_ID, $novoNome): bool
    {
        $sql = "UPDATE visitante 
        SET nome = '$novoNome'
        WHERE ID = $visitante_ID";
        return $this->dataBase->query($sql);
    }

    public function UPDATE($visitante): bool
    {
        return $this->UPDATE_VISITANTE($visitante);
    }
}
