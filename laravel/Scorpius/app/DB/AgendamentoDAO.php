<?php

namespace App\DB;

use App\Model\Agendamento;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados ou Data Access Object(DAO) relacionados à classe Agendamento.
 */

 class AgendamentoDAO extends \App\DB\interfaces\DataAccessObject
 {
    function INSERT($agendamento): bool
    {
        $turma = $agendamento->getTurma(); 
        $visita = $agendamento->getVisita();
        $dataAgendamento = $agendamento->getDataAgendamento();
        $exposicao = $agendamento->getExposicao();
        $statusAg = $agendamento->getStatusAg();
        $turmaID = $agendamento->getTurmaID(); 

        $sql = "INSERT INTO agendamento (turma, visita, dataAgendamento, exposicao, statusAg, turmaID) VALUE (
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
        $sql = "UPDATE agendamento 
        SET turma = '$agendamento->getTurma()', visita = $agendamento->getVisita(),
            dataAgendamento = $agendamento->getDataAgendamento(), exposicao = $agendamento->getExposicao(),
            statusAg = $agendamento->getStatusAg(), turmaID = $agendamento->getTurmaID()
        WHERE ID = $agendamento->getID()";
        return $this->dataBase->query($sql);
    }

    public function DELETE($agendamento): bool
    {
        return $this->DELETEbyID($agendamento->getID());
    }

    public function DELETEbyID($id)
    {
        return $this->dataBase->query("DELETE FROM agendamento WHERE ID = $id");
    }

    function SELECT_ALL(String $table = "agendamento")
    {
        return parent::SELECT_ALL($table);
    }
 }

