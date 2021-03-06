<?php

namespace App\DB;

use App\Model\Turma;
use App\Model\Aluno;

class TurmaDAO extends \App\DB\interfaces\DataAccessObject
{
    public function __Construct(){
        parent::__Construct("turma");
    }

    public function INSERT_CriarTurma($turma, $alunos)
    {
        $nome = $turma->getNome();
        $ano_escolar = $turma->getAno_escolar();
        $ensino = $turma->getEnsino();
        $professor_ID = $turma->getProfessor_ID();

        $sql = "INSERT INTO turma (nome, ano_escolar, ensino, professor_ID) VALUES (
            '$nome',
            '$ano_escolar',
            '$ensino',
            '$professor_ID'
        )";
        $this->dataBase->query($sql);

        $turma_ID = $this->dataBase->insert_id;
        foreach ($alunos as $aluno) {
            $aluno->setTurma($turma_ID);
            $aluno->novoAluno();
        }
    }
    public function INSERT_ALUNO($turma_ID, $aluno)
    {
        $novoAluno = new Aluno($aluno['nome'], $aluno['idade']);
        $novoAluno->setTurma($turma_ID);
        return $novoAluno->novoAluno();
    }
    public function UPDATE_TURMA($turma_ID, $turma)
    {   
        $nome = $turma['nome'];
        $anoEscolar = $turma['ano'];
        $ensino = $turma['ensino'];
        $sql = "UPDATE turma 
        SET nome = '$nome', 
        ano_escolar = '$anoEscolar',
        ensino = '$ensino' 
        WHERE ID = $turma_ID";
        return $this->dataBase->query($sql);
    }
    public function UPDATE_NOME_TURMA($turma_ID, $novoNome)
    {
        $sql = "UPDATE turma 
        SET nome = '$novoNome', 
        WHERE ID = $turma_ID";
        return $this->dataBase->query($sql);
    }
    

    public function SELECTbyID($turma_ID)
    {
        $sql = "SELECT * FROM turma WHERE ID = $turma_ID AND status <> 0";
        $turma = $this->dataBase->query($sql);
        return $turma->fetch_assoc();
    }
    public function DELETEbyID($turma_ID)
    {
        $alunos = new AlunoDAO;
        $alunos->DELETEbyTurma($turma_ID);
        return $this->dataBase->query("UPDATE turma SET status = 0 WHERE ID = $turma_ID");
    }
    public function SELECTbyProfessorID($id){
        $sql = "SELECT * FROM turma WHERE professor_ID = ? AND status <> 0";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if($result == []){
            throw new \App\Exceptions\NenhumaTurmaCadastradaException();
        }

        return $result;
    }
    public function SEARCHbyNome($professor_ID, $nome)
    {
        $sql = "SELECT ID FROM turma WHERE professor_ID = $professor_ID AND nome = '$nome' AND status <> 0";
        $resultado = $this->dataBase->query($sql);
        return $resultado->num_rows > 0;
    }
    public function SELECT_ALL_byProfessorID($professor_ID)
    {
        $sql = "SELECT * FROM turma WHERE professor_ID = $professor_ID AND status <> 0";
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
    
    function DELETE_ALUNObyID($aluno_ID){
        $aluno = new AlunoDAO();
        $aluno->DELETEbyID($aluno_ID);
    }
    function UPDATE_NOME_ALUNObyID($aluno_ID, $novoNome){
        $aluno = new AlunoDAO();
        $aluno->UPDATE_NOME_ALUNO($aluno_ID, $novoNome);
    }
    public function INSERT($turma): bool
    { }
    public function UPDATE($turma): bool
    { }
}
