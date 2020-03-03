<?php

namespace App\Model;

use App\DB\AgendamentoIndividualDAO;

class AgendamentoIndividual extends \App\DB\interfaces\DataObject 
{
	private $visita;
    private $data;
    private $observacao;
    private $statusAg;
    private $usuario_ID;
    private $agendamentoDAO;

    public function Construct(){
        $this->agendamentoDAO = new AgendamentoIndividualDAO();
    }

    public function novoAgendamento($dados): Agendamento {

        $this->visita = $dados['visita'];
		$this->data = $dados['data'];
		$this->observacao = $dados['obs'];
        $this->statusAg = $dados['status'];
        $this->usuario_ID = $dados['usuario_ID'];
		$this->agendamentoDAO->INSERT($this);
        return $this;
    }
    
    protected function save()
    {
        (new \app\DB\AgendamentoIndividualDAO)->UPDATE($this);
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
	

    public function setUsuarioID($usuario_ID)
    {
        $this->setAlterado();
        $this->usuario_ID = $usuario_ID;
    }
    public function getUsuarioID()
    {
        return $this->usuario_ID;
    }
}