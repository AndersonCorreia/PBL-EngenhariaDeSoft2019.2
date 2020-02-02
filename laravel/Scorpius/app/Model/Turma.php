<?php

namespace App\Model;

use App\DB\TurmaDAO;

class Turma extends \App\DB\interfaces\DataObject
{
    private $nome;
    private $ano_escolar;
    private $ensino;
    private $professor_ID;
    private $turma_ID;
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

        $this->turma->INSERT_CriarTurma($this, $alunos);
        return $this;
    }

    protected function save(){
    //     (new \app\DB\TurmaDAO)->UPDATE($this);
     }
    // Funcoes do BD
    public function atualizarDados($professor_ID, $nomeAntigo, $turma)
    {
        return $this->turma->UPDATE_TURMA($professor_ID, $nomeAntigo, $turma);
    }
    public function excluirTurma($turma_ID){
        return $this->turma->DELETEbyID($turma_ID);
    }
    public function todasTurmas($professor_ID){
        return $this->turma->SELECT_ALL_byProfessorID($professor_ID);
    }
    public function editarTurma($turma_ID, $novaTurma){
        $this->turma->UPDATE_TURMA($turma_ID, $novaTurma);
    }
    public function editarNomeTurma($turma_ID, $novoNome){
        $this->turma->UPDATE_NOME_TURMA($turma_ID, $novoNome);
    }
    public function editarAluno($turma_ID, $aluno){
        return $this->turma->UPDATE_ALUNO($turma_ID, $aluno);
    }
    public function excluirAluno($aluno_ID){
        return $this->turma->DELETE_ALUNObyID($aluno_ID);
    }
    public function editarNomeAluno($aluno_ID, $novoNome){
        return $this->turma->UPDATE_NOME_ALUNObyID($aluno_ID, $novoNome);
    }
    public function adicionaAluno($turma_ID, $aluno)
    {
        return $this->turma->INSERT_ALUNO($turma_ID, $aluno);
    }
    public function pegarTurmaPeloID($turma_ID){
        return $this->turma->SELECTbyID($turma_ID);
    }
    public function verificaTurmaExistente($professor_ID, $nome){
        return $this->turma->SEARCHbyNome($professor_ID, $nome);
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

    public function setEnsino($ensino)
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