<?php

namespace App\DB;

use App\Model\Aluno;
use PhpParser\Node\Expr\Cast\Bool_;

class AlunoDAO extends \App\DB\interfaces\DataAccessObject{

    function INSERT($aluno): bool{
        $nome = $aluno->getNome();
        $idade = $aluno->getIdade();
        $turma = $aluno->getTurma();

        $sql = "INSERT INTO aluno (nome, idade, turma_ID) VALUE (
            '$nome',
            '$idade',
            '$turma'
        )";
        $resultado = $this->dataBase->query($sql);
        dd($resultado);
        return $resultado;
    }
    public function UPDATE($aluno): bool
    {
        $sql = "UPDATE aluno SET nome = $aluno->getNome(), idade = $aluno->getIdade()";
        return $this->dataBase->query($sql);;
    }

    public function DELETEbyID($id)
    {
        return $this->dataBase->query("DELETE FROM aluno WHERE ID = $id");;
    }
    function SELECT_ALL(String $table = "aluno")
    {
        return parent::SELECT_ALL($table);
    }
}
