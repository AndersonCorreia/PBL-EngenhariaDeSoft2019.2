<?php

namespace App\DB;
use DateTime;
use DatePeriod;
use DateInterval;
use App\Model\Visita;
use App\Model\AgendamentoInstitucional;
use \App\DB\interfaces\DataAccessObject;

class VisitaDAO extends DataAccessObject{ 
    
    private static $abrevDia = ["domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sabado"];

    public function __Construct(){
        parent::__Construct("visita");
    }
    
    public function INSERT($visita): bool{

        $data = $visita->getData()->format('Y-m-d');
        $turno = $visita->getTurno();
        $status = $visita->getStatus();
        
        $sql = "INSERT IGNORE INTO visita (data_visita, turno, status) 
            VALUES ( '$data', '$turno', '$status')";

        $resultado = $this->dataBase->query($sql);
        $visita->setID($this);

        return true;
    }

    public function UPDATE($Visita): bool{

        $agID = null;
        $agendamento = $Visita->getAgendamento();
        if ( $agendamento != null) {
            $agID = $agendamento->getID();
        }
        $status = $Visita->getStatus();
        $sql = "UPDATE $this->table SET status = '$status' , agendamento_institucional_ID = $agID
                WHERE ID =".$Visita->getID();
        return $this->dataBase->query($sql);
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
        $sql = "SELECT * FROM visita WHERE data_visita > ? AND data_visita <= ? AND status != 'atividade diferenciada' $filtroTurno LIMIT ?";
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
        
        $sql = "SELECT * FROM visita WHERE data_visita = ? AND turno = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss", $dia, $turno);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if($result==[]){
            throw new \App\Exceptions\NenhumaVisitaEncontradaException(2);
        }

        if($asObject){
            $data = new \DateTime($result['data_visita']);
            $agenID = $result["agendamento_institucional_ID"];
            if($agenID == null){
                $agendamentoInst= null;
            }else {
                $array = (new AgendamentoInstitucionalDAO())->SELECTbyID($agenID);
                $agendamentoInst = new AgendamentoInstitucional(
                            $array['observacao'], $array['turma_ID'], $array['professor_instituicao_ID'], 
                            null, $array['status'], $array["ID"] 
                        );
            }
            return new Visita($data, $result['turno'], $result["status"],$agendamentoInst, $result['ID']);
        }

        return $result;
    }

    public function getVistasObjectsByDateInicio_FIM(string $dateInicio, string $dateFim,bool $isDiurno, int $limite=20): array {
        
        $arrayVisitas = $this->SELECTbyDateInicio_FIM($dateInicio, $dateFim, $isDiurno, $limite);
        
        $arrayObjects = array_map(function ($elemento){

            $agenID = $elemento["agendamento_institucional_ID"];
            if($agenID == null){
                $agendamentoInst = null;
            }else {
                $array = (new AgendamentoInstitucionalDAO())->SELECTbyID($agenID);
                $agendamentoInst = new AgendamentoInstitucional(
                            $array['observacao'], $array['turma_ID'], $array['professor_instituicao_ID'], 
                            null, $array['status'], $array["ID"] 
                        );
            }
            $data = new \DateTime($elemento['data_visita']);

            return new Visita($data, $elemento['turno'], $elemento["status"],$agendamentoInst);

        }, $arrayVisitas);

        return $arrayObjects;
    }
    

    public function getQtdVisitantesIndividual(int $visitaID){

        $sql = "SELECT COUNT(*) as qtd FROM visitante as v INNER JOIN visita_individual vi
        ON v.agendamento_ID = vi.agendamentoID WHERE visitaID = $visitaID";

        $result = $this->dataBase->query($sql);
        
        return $result->fetch_assoc()['qtd'];
    }
    /**
     * Apaga todas as visitas a partir da data inicial que não tenham agendamento,
     * e insere novas visitas de acordo a tabela de horarios dos estagiarios.
     *
     * @param string $dataInicial data inicial do novo periodo de visitações
     * @param string $dataFinal ultimo dia do novo periodo de visitações
     * @return void
     */
    public function INSERT_periodoVisitas(string $dataInicial, string $dataFinal){

        $this->dataBase->query("DELETE IGNORE FROM visita WHERE data_visita >= '$dataInicial'");
        $diasTurnos = $this->getDiasTurnosPermitidos();
        $turnos = ['manhã', 'tarde', 'noite'];
        $dataI =  new DateTime($dataInicial);
        $dataF =  new DateTime($dataFinal);
        $dataRange = new DatePeriod($dataI, new DateInterval('P1D'), $dataF);
        foreach($dataRange as $data){
            $day = self::$abrevDia[$data->format("w")];
            
            foreach($turnos as $turno){
                $d = $data->format('Y-m-d'); 
                if(isset($diasTurnos[$day][$turno])){
                    $this->dataBase->query("INSERT INTO visita(data_visita, turno) 
                        VALUES ( '$d', '$turno')");
                }
            }
        }

    }
    /**
     * Retornar um array com os dias e turnos abertos a visitação. 
     * De acordo a tabela de horarios dos estagiarios.
     *
     * @return array com os dias nas linhas e turnos nas colunas
     */
    private function getDiasTurnosPermitidos(): array{

        $diasTurno = $this->dataBase->query("SELECT * FROM horario_estagiario")->fetch_all(MYSQLI_ASSOC);
        $diasTurnoPermitidos = [];

        foreach($diasTurno as $dt){
            $diasTurnoPermitidos[$dt['dia_semana']][$dt['turno']]=true;
        }

        return $diasTurnoPermitidos;
    }

    public function SELECT_visita_institucional_byID(int $ID){
        
        $sql = "SELECT * FROM visita_institucional WHERE agendamentoID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("s", $ID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if($result==[]){
            throw new \App\Exceptions\NenhumaVisitaEncontradaException(2);
        }
        return $result;
    }
}
