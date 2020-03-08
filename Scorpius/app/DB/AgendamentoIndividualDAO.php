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
        //Fazer insert para lista de pessoas em um agendamento, usar getVisitantes
        //Inseri a exposição escolhida tambem, vai servi pra atividade diferenciada e o noturno tb.

        $this->dataBase->commit();
        return $resultado;
    }

    public function SELECT_VisitaIndividualByUserID(int $id){
        $select = "SELECT data, turno, agendamentoStatus";
        $sql = "$select FROM visita_individual WHERE usuarioID = $id";
        $result = $this->dataBase->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
