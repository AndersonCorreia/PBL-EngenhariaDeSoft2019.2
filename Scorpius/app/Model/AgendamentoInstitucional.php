<?php

namespace App\Model;

use App\DB\AgendamentoInstitucionalDAO;

class AgendamentoInstitucional extends \App\DB\interfaces\DataObject 
{
	private $visita;
    private $data;
    private $observacao;
	private $statusAg;
    private $turmaID;
    private $professorInstituicaoID;
    private $agendamentoDAO;

	public function __Construct(){
		$this->agendamentoDAO = new AgendamentoInstitucionalDAO();
	}

	public function novoAgendamento($dados): Agendamento
    {
        $this->visita = $dados['visita'];
		$this->data = $dados['data'];
		$this->observacao = $dados['obs'];
        $this->statusAg = $dados['status'];
        $this->turmaID = $dados['turmaID'];
        $this->professorInstituicaoID = $dados['professor_instituicao_ID'];
		$this->agendamentoDAO->INSERT($this);
        return $this;
	}
	
	protected function save()
    {
        (new \app\DB\AgendamentoInstitucionalDAO)->UPDATE($this);
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

	public function setTurma($turma)
    {
        $this->setAlterado();
        $this->turma = $turma;
    }
    public function getTurma()
    {
        return $this->turma;
	}
	
	public function setVisita($visita)
    {
        $this->setAlterado();
        $this->visita = $visita;
    }
    public function getVisita()
    {
        return $this->visita;
	}
	
	public function setdata($data)
    {
        $this->setAlterado();
        $this->data = $data;
    }
    public function getdata()
    {
        return $this->data;
	}
	
	public function setObservacao($observacao)
    {
        $this->setAlterado();
        $this->observacao = $observacao;
    }
    public function getObservacao()
    {
        return $this->observacao;
	}
	
	public function setStatusAg($statusAg)
    {
        $this->setAlterado();
        $this->statusAg = $statusAg;
    }
    public function getStatusAg()
    {
        return $this->statusAg;
	}
	
	public function setTurmaID($turmaID)
    {
        $this->setAlterado();
        $this->turmaID = $turmaID;
    }
    public function getTurmaID()
    {
        return $this->turmaID;
    }

    public function setProfessorInstituicaoID($professorInstituicaoID)
    {
        $this->setAlterado();
        $this->professorInstituicaoID = $professorInstituicaoID;
    }
    public function getProfessorInstituicaoID()
    {
        return $this->professorInstituicaoID;
    }
}