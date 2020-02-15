<?php

namespace App\Model;

use App\DB\AgendamentoInstitucionalDAO;

class AgendamentoInstitucional extends \App\DB\interfaces\DataObject 
{
	private $visita;
	private $data;
	private $exposicao;
	private $statusAg;
    private $turmaID;
    private $instituicaoID;
	private $agendamentoDAO;

	public function __Construct(){
		$this->agendamentoDAO = new AgendamentoInstitucionalDAO();
	}

	public function novoAgendamento($dados): Agendamento
    {
        $this->visita = $dados['visita'];
		$this->data = $dados['data'];
		$this->exposicao = $dados['exposicao'];
        $this->statusAg = $dados['statusAg'];
        $this->turmaID = $dados['turmaID'];
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
	
	public function setExposicao($exposicao)
    {
        $this->setAlterado();
        $this->exposicao = $exposicao;
    }
    public function getExposicao()
    {
        return $this->exposicao;
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
}