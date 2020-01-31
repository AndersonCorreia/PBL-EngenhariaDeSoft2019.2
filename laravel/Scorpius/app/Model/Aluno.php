<?php

namespace App\Model;

use App\DB\AlunoDAO;

class Aluno extends \App\DB\interfaces\DataObject
{
    private $nome;
    private $idade;
    private $turma;
    private $aluno;

    public function __Construct($nome, $idade, $ID=null )
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->aluno = new AlunoDAO();
        $this->ID = $ID;
    }
    // public function __Construct($nome, $idade)
    // {
    //     $this->nome = $nome;
    //     $this->idade = $idade;
    //     $this->aluno = new AlunoDAO();
    // }
    public function novoAluno(): Aluno
    {
        // $this->nome = $dados['nome'];
        // $this->idade = $dados['idade'];
        // $this->turma = $dados['turma'];

        $this->aluno->INSERT($this);
        return $this;
    }
    protected function save()
    {
        (new \app\DB\AlunoDAO)->UPDATE($this);
    }
    public function setID($ID)
    {
        $this->setAlterado();
        $this->ID = $ID;
    }
    public function getID()
    {
        return $this->ID;
    }

    public function setNome($nome)
    {
        $this->setAlterado();
        $this->nome = $nome;
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function setIdade($idade)
    {
        $this->setAlterado();
        $this->idade = $idade;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setTurma($turma)
    {
        $this->turma = $turma;
    }

    public function getTurma()
    {
        return $this->turma;
    }
}


