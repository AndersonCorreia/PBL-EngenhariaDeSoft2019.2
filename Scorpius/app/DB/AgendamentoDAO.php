<?php

namespace App\DB;

use App\Model\Agendamento;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados ou Data Access Object(DAO) relacionados à classe Agendamento.
 * Agrupar funções comuns ao agendamento institucional e agendamento individual
 */

abstract class AgendamentoDAO extends \App\DB\interfaces\DataAccessObject
 {
    public function __Construct($table){
        parent::__Construct($table);
    }

    abstract public function INSERT(object $object): bool;

    function UPDATE($agendamento): bool{

        $sql = "UPDATE $table SET status = $agendamento->getStatusAg()
                WHERE ID = $agendamento->getID()";
        return $this->dataBase->query($sql);
    }

    public function confirmaAgendamento($nomeTabela,$status, $id){
        $sql="UPDATE $nomeTabela a SET a.Status = ? WHERE a.ID=?";
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
                throw new \Exception("Erro ao deletar VISITANTE");
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
        
        $sql="SELECT a.ID,a.Status, v.data_visita, v.turno FROM agendamento a inner join visita v on a.visita = v.ID WHERE usuario_ID=?";
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
        $sql="SELECT a.Status, a.ID, a.professor_instituicao_ID, t.nome, t.ano_escolar, v.data_visita, v.turno
              FROM agendamento_institucional a LEFT JOIN turma t ON a.turma_ID=t.ID 
              LEFT JOIN instituicao i ON a.professor_instituicao_ID=i.ID
            LEFT JOIN visita v ON a.visita = v.ID
              WHERE t.professor_ID=?";
        $stmt=$this->dataBase->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $ArrayResult=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        //dd($ArrayResult);
       return $ArrayResult;  
    }
 }
