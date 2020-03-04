<?php 

namespace App\DB;

use App\Model\Agendamento;


class AgendamentoIndividualDAO extends AgendamentoDAO {

    public function __Construct(){
        parent::__Construct("agendamento_individual");
    }


    function INSERT($agendamento): bool
    {
        $visitaID = $agendamento->getVisita()->getID();
        $statusAg = $agendamento->getStatusAg();
        $usuario_ID = $agendamento->getUsuarioID();
         
        $sql = "INSERT INTO agendamento_individual (visita, data_agendamento, status, usuario_ID) 
        VALUE (
            '$visita',
            '$dataAgendamento',
            '$statusAg',
            '$usuario_ID'           
        )";
        
        $resultado = $this->dataBase->query($sql);

        $agendamento->setID($this);
        $ID = $agendamento->getID();
        //Fazer insert para lista de pessoas em um agendamento

        $this->dataBase->commit();
        // dd($resultado)
        return $resultado;
    }

    function UPDATE($agendamento): bool
    {
        $sql = "UPDATE agendamento_individual 
        SET status = $agendamento->getStatusAg()
        WHERE ID = $agendamento->getID()";
        return $this->dataBase->query($sql);
    }
}
