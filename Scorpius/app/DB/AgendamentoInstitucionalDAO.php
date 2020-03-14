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
        $this->dataBase->autocommit(false); //desativando modificações automaticas no banco

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
        for($i = 0; $i < $count; $i++){
            $nome = $Alunos[$i]['nome'];
            $idade = $Alunos[$i]['idade'];
            $sql = "INSERT INTO visitante_institucional (nome, idade, agendamento_institucional_ID) VALUE 
                ('$nome', $idade, $ID)";
            $this->dataBase->query($sql);
        }
    }

    private function INSERT_Exposicoes( array $Exposicoes, int $ID){
        $count = count($Exposicoes);
        for($i = 0; $i < $count; $i++){
            $expID = $Exposicoes[$i];
            $sql = "INSERT INTO exposicao_agendamento_institucional (exposicao_ID, agendamento_institucional_ID) VALUE 
                ( $expID, $ID)";
            $this->dataBase->query($sql);
        }
    }

    private function INSERT_Responsaveis( array $Responsaveis, int $ID){
        $count = count($Responsaveis);
        for($i = 0; $i < $count; $i++){
            $nome = $Responsaveis[$i]['nome'];
            $cargo = $Responsaveis[$i]['cargo'];
            $sql = "INSERT INTO Responsavel (nome, cargo, agendamento_institucional_ID) VALUE 
                ('$nome', '$cargo', $ID)";
            $this->dataBase->query($sql);
        }
    }

    /**
     * Função para retornar os dados basicos de um agendamento institucional.
     *
     * @param integer $id id do usuario
     * @param string $data data da pesquisa dos registro, combinada com o parametro op pode servir como
     *  uma data inicial, final ou a data exata procurada
     * @param string $op operação realizada no campo da data
     * @param bool $incluirStatusCancelado informa se os agendamentos cancelados devem ser incluidoss ou não
     * @return array com data, turno e agendamento status do agendamento.
     */
    public function SELECT_VisitaInstitucionalByUserID(int $id, string $data = null, string $op = '>=',
        bool $incluirStatusCancelado = false): array{
        
        $data = $data ? $data : now() ;
        $status = $incluirStatusCancelado ? "" : "AND ( agendamentoStatus != 'cancelado pelo usuario' 
            AND agendamentoStatus != 'cancelado pelo funcionario' )";

        $select = "SELECT *";
        $where = "usuarioID = $id AND data $op '$data' $status";
        $sql = "$select FROM visita_institucional WHERE $where";
        $result = $this->dataBase->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getExposicoesByAgendamentoID(int $id){

        $select = "titulo, descricao";
        $join = "exposicao_agendamento_institucional ea LEFT JOIN exposicao e ON ea.exposicao_ID = e.ID";
        $sql = "SELECT $select FROM $join WHERE agendamento_institucional_ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getVisitantesByAgendamentoID(int $id){

        $select = "nome, idade";
        $sql = "SELECT $select FROM visitante_institucional WHERE agendamento_institucional_ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getResponsaveisByAgendamentoID(int $id){

        $select = "nome, cargo";
        $sql = "SELECT $select FROM responsavel WHERE agendamento_institucional_ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    /**
     * Função que retorna os dados de um agendamento institucional, visita e instituicao
     * de acordo com o status do agendamento.
     * Serve para consultar os agendamentos com um determinado status, como por exemplo a lista de espera
     * 
     * @param string $status do agendamento 
     * @return array com dados selecionados de uma visita institucional com o status passado por parâmetro.  
     */
    public function SELECT_VisitaInstitucionalByStatus(string $status): array{
        $select = "SELECT instituicao, turma, ano_escolar, data, turno, tipo_instituicao, ensino";
        $where = "agendamentoStatus = 'lista de espera' ";
        $sql = "$select FROM visita_institucional WHERE $where ORDER BY data";
        $result = $this->dataBase->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);

    }
}

