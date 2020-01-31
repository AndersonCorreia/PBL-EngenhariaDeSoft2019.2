<?php

namespace App\DB;

use App\Model\Turma;
use App\Model\Aluno;

class TurmaDAO extends \App\DB\interfaces\DataAccessObject
{
    public function INSERT_CriarTurma($turma, $alunos): bool
    {
        $nome = $turma->getNome();
        $ano_escolar = $turma->getAno_escolar();
        $ensino = $turma->getEnsino;
        $professor_ID = $turma->getProfessor_ID();

        $sql = "INSERT INTO turma (nome, ano_escolar, ensino, professor_instituicao_ID) VALUES (
            '$nome',
            '$ano_escolar',
            '$ensino',
            '$professor_ID'
        )";
        $this->dataBase->query($sql);

        $turma_ID = $this->SELECT_IDbyNome($professor_ID, $nome);
        $turma->setID($turma_ID);
        foreach ($alunos as $aluno) {
            $aluno->setTurma($turma_ID);
            $aluno->novoAluno();
        }
    }
    public function UPDATE_TURMA($professor_ID, $nomeAntigo, $turma)
    {
        $turma_ID = $this->SELECT_IDbyNome($professor_ID, $nomeAntigo);

        $sql = "UPDATE turma 
        SET nome = '$turma->getNome()', 
        ano_escolar = '$turma->getAno_escolar()',
        ensino = '$turma->getEnsino()' 
        WHERE ID = $turma_ID";
        return $this->dataBase->query($sql);
    }

    public function SELECTbyNome($professor_ID, $nome)
    {
        $turma_ID = $this->SELECT_IDbyNome($professor_ID, $nome);
        $alunos = new AlunoDAO;
        $alunos->SELECTbyTurma($turma_ID);

        $sql = "SELECT * FROM turma WHERE ID = $turma_ID";
        $turma = $this->dataBase->query($sql);
        $dados = [
            'turma' => $turma->fetch_assoc(),
            'alunos' => $alunos
        ];
        return $dados;
    }
    public function DELETEbyNome($professor_ID, $nome)
    {
        $turma_ID = $this->SELECT_IDbyNome($professor_ID, $nome);
        $alunos = new AlunoDAO;
        $alunos->DELETEbyTurma($turma_ID);
        return $this->dataBase->query("DELETE FROM turma WHERE ID = $turma_ID");
    }
    public function DELETEbyID($turma_ID)
    {
        $alunos = new AlunoDAO;
        $alunos->DELETEbyTurma($turma_ID);
        return $this->dataBase->query("DELETE FROM turma WHERE ID = $turma_ID");
    }
    public function SELECT_IDbyNome($professor_ID, $nome)
    {
        $sql = "SELECT ID FROM turma WHERE professor_instituicao_ID = $professor_ID AND nome = '$nome'";
        $resultado = $this->dataBase->query($sql);
        return $resultado->fetch_assoc();
    }
    public function SELECT_ALL_byProfessorID($professor_ID)
    {
        $sql = "SELECT * FROM turma WHERE professor_instituicao_ID = $professor_ID";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado; //$resultado->fetch_assoc();
        $rowAlunos = new AlunoDAO;
        $alunos = array();

        foreach ($row as $turma) {
            foreach ($rowAlunos->SELECTbyTurma($turma['ID']) as $aluno) {
                $alunos[] = $aluno;
            }
        }
        $dados = [
            'turmas' => $row,
            'alunos' => $alunos
        ];
        return $dados;
    }
    public function UPDATE_ALUNO($turma_ID, $aluno)
    {
        $sql = "UPDATE aluno 
        SET nome = '$aluno->getNome()', 
        idade = '$aluno->getIdade()'
        WHERE turma_ID = $turma_ID";
        return $this->dataBase->query($sql);
    }
    function SELECT_ALL(String $table = "turma")
    {
        return parent::SELECT_ALL($table);
    }
    function DELETE($turma): bool
    { }
    public function INSERT($turma): bool
    { }
    public function UPDATE($turma): bool
    { }
}
