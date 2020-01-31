<?php

namespace App\Model;

use App\DB\TurmaDAO;

class Turma extends \App\DB\interfaces\DataObject
{
    private $nome;
    private $ano_escolar;
    private $ensino;
    private $professor_ID;
    private $turma;

    function __Construct()
    {
        $this->turma = new TurmaDAO();
    }
    public function novaTurma($turma, $alunos)   
    {
        $this->nome = $turma['nome'];
        $this->ano_escolar = $turma['ano_escolar'];
        $this->ensino = $turma['ensino'];
        $this->professor_ID = $turma['professor_ID'];

        $this->turma->INSERT($this, $alunos);
        return $this;
    }

    // protected function save(){
    //     (new \app\DB\TurmaDAO)->UPDATE($this);
    // }
    // Funcoes do BD
    public function atualizarDados($professor_ID, $nomeAntigo, $turma, $alunos)
    {
        return $this->turma->UPDATE($professor_ID, $nomeAntigo, $turma, $alunos);
    }
    public function excluirTurma($professor_ID, $nome){
        return $this->turma->DELETE($professor_ID, $nome);
    }
    // GETTERS E SETTERS
    public function setNome($nome)
    {
        $this->setAlterado();
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setAno_escolar($ano_escolar)
    {
        $this->setAlterado();
        $this->ano_escolar = $ano_escolar;
    }
    public function getAno_escolar()
    {
        return $this->ano_escolar;
    }

    public function setEnsito($ensino)
    {
        $this->setAlterado();
        $this->ensino = $ensino;
    }
    public function getEnsino()
    {
        return $this->ensino;
    }

    public function setProfessor_ID($professor_ID)
    {
        $this->setAlterado();
        $this->professor_ID = $professor_ID;
    }
    public function getProfessor_ID()
    {
        return $this->professor_ID;
    }
}