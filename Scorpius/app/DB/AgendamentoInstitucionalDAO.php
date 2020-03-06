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
        $this->dataBase->autocommit(FALSE); //desativando modificações automaticas no banco

        $visitaID = $agendamento->getVisita()->getID();
        $observacao = $agendamento->getObservacao();
        $statusAg = $agendamento->getStatus();
        $turmaID = $agendamento->getTurmaID(); 
        $professorInstituicaoID = $agendamento->getProfessorInstituicaoID(); 
        $sql = "INSERT INTO agendamento_institucional (visita, observacao, status, turma_ID, professor_instituicao_ID) 
                VALUE ( '$visitaID', '$observacao', '$statusAg', '$turmaID', '$professorInstituicaoID')";
        $resultado = $this->dataBase->query($sql);

        $agendamento->setID($this);
        $ID = $agendamento->getID();

        $this->INSERT_Alunos( $agendamento->getAlunos(), $ID);
        $this->INSERT_Responsaveis( $agendamento->getResponsaveis(), $ID);
        $this->INSERT_Exposicoes( $agendamento->getExposicoes(), $ID);

        $this->dataBase->commit();

        return $resultado;
    }

    private function INSERT_Alunos( array $Alunos, int $ID){
        $count = count($Alunos);
        for($i = 0; i < $count; $i++){
            $sql = "INSERT INTO visitante_institucional (nome, idade, agendamento_institucional_ID) VALUE 
                ('$Alunos[$i]['nome']', '$Alunos[$i]['idade']', '&ID')";
            $resultado[] = $this->dataBase->query($sql);
        }
        return $resultado;
        
    }

    private function INSERT_Exposicoes( array $Exposicoes, int $ID){
        
    }

    private function INSERT_Responsaveis( array $Responsaveis, int $ID){
        $count = count($Responsaveis);
        for($i = 0; i < $count; $i++){
            $sql = "INSERT INTO Responsavel (nome, cargo, agendamento_institucional_ID) VALUE 
                ('$Responsaveis[$i]['nome']', '$Responsaveis[$i]['cargo']', '$ID')";
            $resultado[] = $this->dataBase->query($sql);
        }
        return $resultado;
    }
 }

