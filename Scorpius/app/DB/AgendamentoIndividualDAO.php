<?php 

namespace App\DB;

use App\Model\Agendamento;


class AgendamentoIndividualDAO extends AgendamentoDAO {

    public function __Construct(){
        parent::__Construct("agendamento_individual");
    }


    function INSERT($agendamento): bool
    {
        $visita = $agendamento->getVisita();
        $dataAgendamento = $agendamento->getData();
        $observacao = $agendamento->getObservacao();
        $statusAg = $agendamento->getStatusAg();
        $usuario_ID = $agendamento->getUsuarioID();
         
        $sql = "INSERT INTO agendamento_individual (visita, data_agendamento, observacao, status, usuario_ID) 
        VALUE (
            '$visita',
            '$dataAgendamento',
            '$observacao',
            '$statusAg',
            '$usuario_ID'           
        )";
        
        $resultado = $this->dataBase->query($sql);
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
