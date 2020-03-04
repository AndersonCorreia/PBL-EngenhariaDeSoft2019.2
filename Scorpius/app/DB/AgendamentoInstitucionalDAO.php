<?php

namespace App\DB;

use App\Model\Agendamento;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados ou Data Access Object(DAO) relacionados à classe Agendamento.
 */

 class AgendamentoInstitucionalDAO extends AgendamentoDAO
 {
    public function __Construct(){
        parent::__Construct("agendamento_institucional");
    }

    function INSERT($agendamento): bool
    {
        $visitaID = $agendamento->getVisita()->getID();
        $observacao = $agendamento->getObservacao();
        $statusAg = $agendamento->getStatus();
        $turmaID = $agendamento->getTurmaID(); 
        $professorInstituicaoID = $agendamento->getProfessorInstituicaoID(); 
        $sql = "INSERT INTO agendamento_institucional (visita, observacao, status, turma_ID, professor_instituicao_ID) 
                VALUE ( $visitaID, $observacao, $statusAg, $turmaID, $professorInstituicaoID)";
        $resultado = $this->dataBase->query($sql);

        $agendamento->setID($this);
        $ID = $agendamento->getID();

        $this->INSERT_Alunos( $agendamento->getAlunos(), $ID);
        $this->INSERT_Responsaveis( $agendamento->getResponsaveis(), $ID);
        $this->INSERT_Exposicoes( $agendamento->getExposicoes(), $ID);

        return $resultado;
    }

    private function INSERT_Alunos( array $Alunos, int $ID){

    }

    private function INSERT_Exposicoes( array $Exposicoes, int $ID){
        
    }

    private function INSERT_Responsaveis( array $Responsaveis, int $ID){
        
    }
 }

