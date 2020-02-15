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
        $turma = $agendamento->getTurma(); 
        $visita = $agendamento->getVisita();
        $dataAgendamento = $agendamento->getDataAgendamento();
        $exposicao = $agendamento->getExposicao();
        $statusAg = $agendamento->getStatusAg();
        $turmaID = $agendamento->getTurmaID(); 

        $sql = "INSERT INTO agendamento_institucional (turma, visita, dataAgendamento, exposicao, statusAg, turmaID) VALUE (
            '$turma',
            '$visita',
            '$dataAgendamento',
            '$exposicao',
            '$statusAg',
            '$turmaID'
        )";
        
        $resultado = $this->dataBase->query($sql);
        // dd($resultado)
        return $resultado;
    }

    function UPDATE($agendamento): bool
    {
        $sql = "UPDATE agendamento_institucional 
        SET turma = '$agendamento->getTurma()', visita = $agendamento->getVisita(),
            dataAgendamento = $agendamento->getDataAgendamento(), exposicao = $agendamento->getExposicao(),
            statusAg = $agendamento->getStatusAg(), turmaID = $agendamento->getTurmaID()
        WHERE ID = $agendamento->getID()";
        return $this->dataBase->query($sql);
    }
 }

