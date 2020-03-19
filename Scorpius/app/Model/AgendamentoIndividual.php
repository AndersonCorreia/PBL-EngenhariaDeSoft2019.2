<?php

namespace App\Model;

use App\DB\AgendamentoIndividualDAO;

class AgendamentoIndividual extends \App\DB\interfaces\DataObject 
{
	private $visita;
    private $statusAg;
    private $usuario_ID;
    private $exposicaoID;
    private $visitantes;
    private $Exposicoes;

    public function __Construct($usuario_ID, $visita, $status = 'confirmado'){
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

	public function setStatusAg($statusAg)
    {
        $this->setAlterado();
        $this->statusAg = $statusAg;
    }
    public function getStatusAg()
    {
        return $this->statusAg;
    }
    
	public function setExposicaoID(int $exposicaoID=null){
        $this->exposicaoID = $exposicaoID;
    }
    public function getExposicaoID()
    {
        return $this->exposicaoID;
    }
    
    public function getUsuarioID()
    {
        return $this->usuario_ID;
    }
    
    public function getVisitantes()
    {
        return $this->visitantes;
    }

    public function setVisitantes(array $visitantes)
    {   
        $this->visitantes = $visitantes;
    }

    public function setExposicoes(array $Exposicoes)
    {   
        $this->Exposicoes = $Exposicoes;
    }

    public function getExposicoes()
    {
        return $this->Exposicoes;
    }
}