<?php 

namespace App\DB;

use App\Model\Agendamento;


class AgendamentoIndividualDAO extends AgendamentoDAO {

    public function __Construct(){
        parent::__Construct("agendamento");
    }


    function INSERT($agendamento): bool
    {
        $visitaID = $agendamento->getVisita()->getID();
        $statusAg = $agendamento->getStatusAg();
        $usuario_ID = $agendamento->getUsuarioID();
        
         
        $sql = "INSERT INTO agendamento (visita, status, usuario_ID) 
        VALUE (
            '$visitaID',
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
