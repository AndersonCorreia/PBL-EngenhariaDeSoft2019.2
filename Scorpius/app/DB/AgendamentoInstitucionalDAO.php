<?php

namespace App\DB;

use App\Model\Agendamento;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados ou Data Access Object(DAO) relacionados à classe Agendamento.
 */

 class AgendamentoInstitucionalDAO extends \App\DB\interfaces\DataAccessObject
 {
    public function __Construct(){
        parent::__Construct("agendamento_institucional");
    }

    function INSERT($agendamento): bool
    {
        $visita = $agendamento->getVisita();
        $dataAgendamento = $agendamento->getData();
        $observacao = $agendamento->getObservacao();
        $statusAg = $agendamento->getStatusAg();
        $turmaID = $agendamento->getTurmaID(); 
        $professorInstituicaoID = $agendamento->getProfessorInstituicaoID(); 
        $sql = "INSERT INTO agendamento_institucional (visita, data_agendamento, observacao, status, turma_ID, professor_instituicao_ID) 
        VALUE (
            '$visita',
            '$dataAgendamento',
            '$observacao',
            '$statusAg',
            '$turmaID',
            '$professorInstituicaoID'           
        )";
        
        $resultado = $this->dataBase->query($sql);
        // dd($resultado)
        return $resultado;
    }

    function UPDATE($agendamento): bool
    {
        $sql = "UPDATE agendamento_institucional 
        SET visita = $agendamento->getVisita(),
            data_agendamento = $agendamento->getData(), observacao = $agendamento->getObservacao(),
            status = $agendamento->getStatusAg(), turmaID = $agendamento->getTurmaID(), professor_instituicao_ID = $agendamento->getProfessorInstituicaoID()
        WHERE ID = $agendamento->getID()";
        return $this->dataBase->query($sql);
    }
 }

