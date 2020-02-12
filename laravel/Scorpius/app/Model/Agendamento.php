<?php

namespace App\Model;

/*use App\Model\Users\Professor_instituicao;*/ //nao entendi mto bem o que essa classe estava fazendo antes
use App\DB\AgendamentoDAO;

class Agendamento extends \App\DB\interfaces\DataObject 
{
	private $turma;
	private $visita;
	private $dataAgendamento;
	private $exposicao;
	private $statusAg;
	private $turmaID;
	private $agendamento;

	public function __Construct(){
		$this->agendamento = new AgendamentoDAO();
	}

	public function novoAgendamento($dados): Agendamento
    {
        $this->turma = $dados['turma'];
        $this->visita = $dados['visita'];
		$this->dataAgendamento = $dados['dataAgendamento'];
		$this->exposicao = $dados['exposicao'];
        $this->statusAg = $dados['statusAg'];
        $this->turmaID = $dados['turmaID'];
		$this->agendamento->INSERT($this);
        return $this;
	}
	
	protected function save()
    {
        (new \app\DB\AgendamentoDAO)->UPDATE($this);
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
	
	public function setDataAgendamento($dataAgendamento)
    {
        $this->setAlterado();
        $this->dataAgendamento = $dataAgendamento;
    }
    public function getDataAgendamento()
    {
        return $this->dataAgendamento;
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
	
    /*protected function save(){
		(new InstituicaoDAO)->UPDATE($this);
	}*/ //na classe so tinha essa funcao
}