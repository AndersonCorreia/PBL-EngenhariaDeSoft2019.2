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

    public function confirmaAgendamento($id,$status){
        $sql="UPDATE agendamento a SET a.Status=? WHERE a.ID=?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss",$status,$id);
        return $stmt->execute();
    }

    public function confirmaAgendamentoInstituicao($id,$status){
        $sql="UPDATE agendamento_institucional a SET a.Status=? WHERE ID=?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss",$status,$id);
        return $stmt->execute();
    }

    public function SELECTbyAgendamentoID($id){
        
        $sql="SELECT a.ID,a.Data_Agendamento,a.Status FROM agendamento a WHERE usuario_ID=?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $ArrayResult = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $ArrayResult;

    }

    public function SELECTbyNotificacaoID($id){
        $sql = "SELECT Mensagem FROM Notificacao WHERE usuario_ID=?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $ArrayResult = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
       
    }

    public function SELECTbyAgendamentoInstitucional($id){
        $sql="SELECT a.Data_Agendamento, a.Status, a.ID, a.professor_instituicao_ID, t.nome, t.ano_escolar
              FROM agendamento_institucional a LEFT JOIN turma t ON a.turma_ID=t.ID 
              LEFT JOIN instituicao i ON a.professor_instituicao_ID=i.ID
              WHERE t.professor_ID=?";
        $stmt=$this->dataBase->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $ArrayResult=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        //dd($ArrayResult);
       return $ArrayResult;  
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
        $ArrayResult = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if($ArrayResult==[]){
            throw new \Exception("Nenhuma Visita encontrada no intervalo especificado", 1);
        }
        
        return $ArrayResult;
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