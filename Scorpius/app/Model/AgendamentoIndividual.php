<?php

namespace App\Model;

use App\DB\AgendamentoIndividualDAO;

class AgendamentoIndividual extends \App\DB\interfaces\DataObject 
{
	private $visita;
    private $statusAg;
    private $usuario_ID;
    

    public function __Construct($usuario_ID, $visita, $status){
        $this->usuario_ID = $usuario_ID;
        $this->visita = $visita;
        $this->statusAg = $status;
    }
    
    protected function save()
    {
        (new \app\DB\AgendamentoIndividualDAO)->UPDATE($this);
    }

    public static function listarAgendamentos($id){
		return (new AgendamentoIndividualDAO)->SELECTbyAgendamentoID($id);
    }

    public static function listarNotificacao($id){
        return (new AgendamentoIndividualDAO)->SELECTbyNotificacaoID($id);
    }
    
    public static function listarAgendamentosInstitucionais($id){
        return (new AgendamentoIndividualDAO)->SELECTbyAgendamentoIndividual($id);
    }

    public function getVisita()
    {
        return $this->visita;
    }

	public function setID($usuario_ID)
    {
        //$this->setAlterado();
        $this->usuario_ID = $usuario_ID;
    }
    public function getID()
    {
        return $this->usuario_ID;
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