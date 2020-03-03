<?php

namespace App\DB;

use PhpParser\Node\Expr\Cast\Bool_;

class CheckinDAO extends \App\DB\interfaces\DataAccessObject{

    public function __Construct(){
        parent::__Construct("visitante");
    }

    public function SELECT_VISITA()
    {
        $result = $this->dataBase->query("SELECT * FROM visitante_institucional");
        $visitanteInst = $result->fetch_all();

        $visitanteInstFinal = array();
        $agendamentoChecados = array();
        foreach($visitanteInst as $visitante){
            if(!in_array($visitante[4], $agendamentoChecados)){
                $agendamentoChecados[] = $visitante[4];
                $idAgendamento = $visitante[4];
                $result = $this->dataBase->query("SELECT visita FROM agendamento_institucional WHERE ID = {$idAgendamento}");
                $row = $result->fetch_assoc();
                $idVisita = $row['visita'];
                $result = $this->dataBase->query("SELECT data_visita, turno FROM visita WHERE ID = {$idVisita} AND status = 'confirmado'");
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $dataVisita = $row['data_visita'];
                    $turno = $row['turno'];
                    $alunos = array();
                    foreach($visitanteInst as $aluno){
                        if($aluno[4] == $idAgendamento){
                            $alunos[] = $aluno;
                        }
                    }
                    $visitanteInstFinal[] = [
                        'agendamento_ID' => $idAgendamento,
                        'data' => $dataVisita,
                        'turno' => $turno,
                        'aluno' => $alunos
                    ];
                }
            }
        }
        return $visitanteInstFinal;
    }

    public function INSERT(object $object): bool{
        // return;
    }

    public function UPDATE(object $object): bool{
        // return;
    }
}