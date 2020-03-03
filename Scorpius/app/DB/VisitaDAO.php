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
    public function INSERTbyID(int $ID, $agendamentoID): bool{

    }

    public function confirmaAgendamento($nomeTabela,$status, $id){
        $sql="UPDATE $nomeTabela a SET a.Status = ? WHERE a.ID=?";
        //$this->dataBase->query($sql);
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss",$status,$id);       
        return $stmt->execute();
    }

    public function contAgendamento($tipoContAgendamento, $id_user){
        $sql = "UPDATE  professor_instituicao set $tipoContAgendamento = $tipoContAgendamento+1 where usuario_ID=$id_user";
        $stmt = $this->dataBase->query($sql);
        return $stmt; 
    }

    public function delete_visitante($nomeTabela,$coluna, $id_Agendamento){
        $result=$this->count_dados($nomeTabela, $coluna, "quant_agendamento");

        if($result){
            $sql= "DELETE FROM $nomeTabela where $coluna=?";
        $stmt = $this->dataBase->prepare($sql);
        $result = $stmt->bind_param("s", $id_Agendamento);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            throw new \Exception("Erro ao deletar horário");
        }
        }
        return;
        
    }

    private function count_dados($tabela, $coluna, $apelido){
        $sql = "SELECT COUNT($coluna) AS $apelido FROM $tabela";
        $stmt = $this->dataBase->query($sql);
        return $stmt;
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
        $sql = "SELECT Mensagem FROM notificacao WHERE usuario_ID=?";
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
            throw new \App\Exceptions\NenhumaVisitaEncontradaException();
        }
        
        return $ArrayResult;
    }

    /**
     * Seleciona a visita com o dia e turno passados por parâmetro
     *
     * @param string $data da visita
     * @param string $turno da visita
     * @return array visita com o dia e turno especificado 
     */
    public function SELECTbyData_Turno(string $dia, string $turno){
        //fazer abusca da visita com aquele dia e turno
        $sql = "SELECT * FROM visita WHERE data_visita = $dia AND turno = $turno";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ssi", $dia, $turno);
        $stmt->execute();
        $ArrayResult = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if($ArrayResult==[]){
            throw new \Exception("Nenhuma Visita encontrada no dia e turno especifico", 1);
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