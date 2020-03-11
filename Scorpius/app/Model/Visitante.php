<?php

namespace App\Model;

use App\DB\VisitanteDAO;

class Visitante extends \App\DB\interfaces\DataObject
{
    private $nome;
    private $idade;
    private $rg;
    private $visitante;

    public function __Construct($nome, $idade, $rg)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->rg = $rg;
        $this->visitante = new VisitanteDAO();
    }
    public function novoVisitante(): bool
    {
        //$this->nome = $dados['nome'];
        //$this->idade = $dados['idade'];
        //$this->rg = $dados['RG'];

        
        return $this->visitante->INSERT($this);
    }
    protected function save()
    {
        (new \app\DB\VisitanteDAO)->UPDATE($this);
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
        $this->idade = $idade;
        $this->setAlterado();
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
        $this->setAlterado();
    }
}