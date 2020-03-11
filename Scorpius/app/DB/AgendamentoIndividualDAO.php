<?php 

namespace App\DB;

use App\Model\Agendamento;


class AgendamentoIndividualDAO extends AgendamentoDAO {

    public function __Construct(){
        parent::__Construct("agendamento");
    }


    function INSERT($agendamento): bool {

        $this->dataBase->autocommit(false); //desativando modificações automaticas no banco

        $visitaID = $agendamento->getVisita()->getID();
        $statusAg = $agendamento->getStatusAg();
        $usuario_ID = $agendamento->getUsuarioID();
        
         
        $sql = "INSERT INTO agendamento (visita, status, usuario_ID) 
        VALUE ( '$visitaID', '$statusAg', '$usuario_ID')";
        
        $resultado = $this->dataBase->query($sql);

        $agendamento->setID($this);
        $ID = $agendamento->getID();

        $this->INSERT_Visitantes( $agendamento->getVisitantes(), $ID);
        //Inseri a exposição escolhida tambem, vai servi pra atividade diferenciada e o noturno tb.

        $this->dataBase->commit();
        return $resultado;
    }

    /**
     * Função para retornar os dados basicos de um agendamento individual.
     *
     * @param integer $id id do usuario
     * @param string $data data da pesquisa dos registro, combinada com o parametro op pode servir como
     *  uma data inicial, final ou a data exata procurada
     * @param string $op operação realizada no campo da data
     * @param string $opTurno operação realizada no campo do turno
     * @param string $turno turno do agendamento procurado
     * @return array com data, turno e agendamentoStatus do agendamento.
     */
    public function SELECT_VisitaIndividualByUserID(int $id, string $op ='>=', string $opTurno = '=',
        string $data = null, string $turno = 'noite', bool $incluirStatusCancelado = false): array{
        
        $data = $data ? $data : now() ;
        $status = $incluirStatusCancelado ? "" : "AND ( agendamentoStatus != 'cancelado pelo usuario' 
            AND agendamentoStatus != 'cancelado pelo funcionario' )";

        $select = "SELECT data, turno, agendamentoStatus";
        $where = "usuarioID = $id AND data $op '$data' AND turno $opTurno '$turno' $status";
        $sql = "$select FROM visita_individual WHERE $where";
        $result = $this->dataBase->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function INSERT_Visitantes( array $visitantes, int $ID){
        $count = count($visitantes);
        for($i = 0; $i < $count; $i++){
            $nome = $visitantes[$i]['nome'];
            $rg = $visitantes[$i]['RG'];
            $idade = $visitantes[$i]['idade'];
            $sql = "INSERT INTO visitante (nome, idade, RG, agendamento_ID) VALUE 
                ('$nome', $idade, '$rg', $ID)";
            $this->dataBase->query($sql);
        }
    }
}
