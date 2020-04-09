<?php

namespace App\Model;

use App\DB\AgendamentoInstitucionalDAO;

class AgendamentoInstitucional extends \App\DB\interfaces\DataObject 
{
	private $visita;
    private $observacao;
	private $status;
    private $turmaID;
    private $professorInstituicaoID;
    private $Alunos;
    private $Responsaveis;
    private $Exposicoes;

    public function __Construct($observacao, $turmaID, $professorInstituicaoID, $visita = null,
                    $status= "pendente", $ID = null){

        $this->observacao = $observacao;
        $this->turmaID = $turmaID;
        $this->professorInstituicaoID = $professorInstituicaoID;
        $this->status = $status;
        $this->visita = $visita;
        if ( $visita ){
            $this->visita->setAgendamento($this);
        }
	}

	
	protected function save()
    {
        (new \app\DB\AgendamentoInstitucionalDAO)->UPDATE($this);
    }
    

    public static function listarAgendamentos($id){
		return (new AgendamentoInstitucionalDAO)->SELECTbyAgendamentoID($id);
    }

    public static function listarNotificacao($id){
        return (new AgendamentoInstitucionalDAO)->SELECTbyNotificacaoID($id);
    }
    
    public static function listarAgendamentosInstitucionais($id){
        return (new AgendamentoInstitucionalDAO)->SELECTbyAgendamentoInstitucional($id);
    }

    public function getVisita()
    {
        return $this->visita;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }
    
    public function getStatusAg()
    {
        return $this->status;
    }

    public function setStatusAg($status, $alterar=true)
    {   
        $this->setAlterado($alterar);
        $this->status = $status;
    }

    public function getTurmaID()
    {
        return $this->turmaID;
    }

    public function getProfessorInstituicaoID()
    {
        return $this->professorInstituicaoID;
    }

    public function getAlunos()
    {
        return $this->Alunos;
    }

    public function setAlunos(array $alunos)
    {   
        $this->Alunos = $alunos;
    }

    public function getExposicoes()
    {
        return $this->Exposicoes;
    }

    public function setExposicoes(array $Exposicoes)
    {   
        $this->Exposicoes = $Exposicoes;
    }

    public function getResponsaveis()
    {
        return $this->Responsaveis;
    }

    public function setResponsaveis(array $Responsaveis)
    {   
        $this->Responsaveis = $Responsaveis;
    }
}