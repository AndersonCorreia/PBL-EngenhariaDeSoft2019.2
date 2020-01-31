<?php

namespace App\DB;

use App\Model\Aluno;
use PhpParser\Node\Expr\Cast\Bool_;

class AlunoDAO extends \App\DB\interfaces\DataAccessObject{

    function INSERT($aluno): bool{
        $nome = $aluno->getNome();
        $idade = $aluno->getIdade();
        $turma_ID = $aluno->getTurma();

        $sql = "INSERT INTO aluno (nome, idade, turma_ID) VALUE (
            '$nome',
            $idade,
            $turma_ID
        )";
        $resultado = $this->dataBase->query($sql);
        // dd($resultado)
        return $resultado;
    }
    public function UPDATE_ALUNO($turma_ID, $aluno): bool
    {
        $sql = "UPDATE aluno 
        SET nome = '$aluno->getNome()', idade = $aluno->getIdade()
        WHERE turma_ID = $turma_ID";
        return $this->dataBase->query($sql);
    }
    public function SELECTbyTurma($turma_ID)
    {
        $sql = "SELECT * FROM aluno WHERE turma_ID = $turma_ID";
        $resultado = $this->dataBase->query($sql);
        return $resultado->fetch_assoc(); 
    }

    public function DELETEbyTurma($turma_ID){
        return $this->dataBase->query("DELETE FROM aluno WHERE turma_ID = $turma_ID");
    }
    public function DELETE_Aluno_ByTurma($aluno_ID)
    {
        return $this->dataBase->query("DELETE FROM aluno WHERE ID = $aluno_ID");
    }
    public function DELETE($aluno): bool{
        return $this->DELETEbyID($aluno->getID());
    }

    public function DELETEbyID($id)
    {
        return $this->dataBase->query("DELETE FROM aluno WHERE ID = $id");;
    }
    function SELECT_ALL(String $table = "aluno")
    {
        return parent::SELECT_ALL($table);
    }
    public function UPDATE($aluno): bool
    {
    }
}