<?php

namespace App\DB;
use App\Model\Visita;
use \App\DB\interfaces\DataAccessObject;

class VisitaDAO extends DataAccessObject{ 
    
    public function __Construct(){
        parent::__Construct("visita");
    }
    
    public function INSERT($Visita): bool{

    }

    public function UPDATE($Visita): bool{

    }

    /**
     * Retorna registros da tabela visita num array, com filtros de data inicial, data final
     * e limita a quantidade de resultados;
     *
     * @param string $dateInicio
     * @param string $dateFim
     * @param integer $limite
     * @return array
     */
    public function SELECTbyDateInicio_FIM(string $dateInicio, string $dateFim, bool $isDiurno, int $limite=20): array{

        $filtroTurno = $isDiurno ? " AND turno != 'noite'" : " AND turno = 'noite'";
        $sql = "SELECT * FROM visita WHERE data_visita > ? AND data_visita <= ? $filtroTurno LIMIT ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ssi",$dateInicio, $dateFim, $limite);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if($result==[]){
            throw new \App\Exceptions\NenhumaVisitaEncontradaException();
        }
        
        return $result;
    }

    /**
     * Seleciona a visita com o dia e turno passados por parâmetro
     *
     * @param string $data da visita
     * @param string $turno da visita
     * @return array visita com o dia e turno especificado 
     */
    public function SELECTbyData_Turno(string $dia, string $turno, bool $asObject = false){
        //fazer abusca da visita com aquele dia e turno
        $sql = "SELECT * FROM visita WHERE data_visita = ? AND turno = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss", $dia, $turno);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if($result==[]){
            throw new \Exception("Nenhuma Visita encontrada no dia e turno especifico", 1);
        }

        if($asObject){
            $data = new \DateTime($result['data_visita']);
            $agenID = $result["agendamento_institucional_ID"];
            $agendamentoInst = (new AgendamentoInstitucionalDAO())->SELECTbyID($agenID);
            return new Visita($data, $result['turno'], $result["status"],$agendamentoInst, $result["acompanhante_ID"], $result['ID']);
        }

        return $result;
    }

    public function getVistasObjectsByDateInicio_FIM(string $dateInicio, string $dateFim,bool $isDiurno, int $limite=20): array {
        
        $arrayVisitas = $this->SELECTbyDateInicio_FIM($dateInicio, $dateFim, $isDiurno, $limite);
        
        $arrayObjects = array_map(function ($elemento){

            if($elemento['agendamento_institucional_ID'] == null){
                $agendamentoInst= null;
            }else {
                //$agendamentoInst = terminar depois
            }
            $data = new \DateTime($elemento['data_visita']);

            return new Visita($data, $elemento['turno'], $elemento["status"],$agendamentoInst);

        }, $arrayVisitas);

        return $arrayObjects;
    }
}