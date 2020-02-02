<?php
namespace App\Model;
use App\Model\Users\Empregado;

class Visita extends \App\DB\interfaces\DataObject {

    public $Data;
    public $Turno;
    public $Status;
    public $Agendamento;
    public $Acompanhante;
                                            //cor verde                     //cor amarela              //cor azul
    private $btnClasses = ["disponivel" => "btn-success", "indisponivel" => "btn-warning", "proprio" => "btn-primary"];
    private $abrevDia = ["DOM", "SEG", "TER", "QUA", "QUI", "SEX", "SAB"];
    private $mes = ["Janeiro", "Fevereiro", "Março", "Abril","Maio", "Junho", "Julho",
                    "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
                    
    public function __Construct(\DateTime $data, string $turno, string $status, Agendamento $agend=null, Empregado $acomp=null){
        $this->Data = $data;
        $this->Turno = $turno;
        $this->Status = $status;
        $this->Agendamento = $agend;
        $this->Acompanhante = $acomp;
    }
    
    /**
     * Preenche o array recebido como parametro com informações sobre esta visita.
     * As informações são utilizadas no calendario no front-end;
     *
     * @param array $array a ser prenchido
     * @return void
     */
    public function preencherArrayForCalendario(array &$array){
        $dm = $this->Data->format("d/m");
        $d = $this->Data->format("d");
        $day = $this->abrevDia[$this->Data->format("w")];
        $mes = $this->mes[$this->Data->format("m")-1];
        $btn = $this->verificarDisponibilidade();

        if( !isset($array["dataInicio"]) ){
            $array["dataInicio"] = "$d de $mes";
        }
        $array["dataFim"] = "$d de $mes";
        $array[$dm]["data"] = "$dm $day";
        $array[$dm]["$this->Turno.btn"] = $btn;
    }

    private function verificarDisponibilidade(){
        
        if($this->Agendamento != null){
            return $this->btnClasses["indisponivel"];
        }
        elseif( $this->isAgendamentoDoUsuarioLogado() ){
            return $this->btnClasses["proprio"];
        }
        else {
            return $this->btnClasses["disponivel"];
        }
    }

    private function isAgendamentoDoUsuarioLogado(){
        return false; //concluir despois da sessão esta funcionando e classe de agendamento completa
    }

    /**
     * Get the value of data
     */ 
    public function getData(){
        return $this->Data;
    }

    /**
     * Get the value of turno
     */ 
    public function getTurno(){
        return $this->Turno;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus(){
        return $this->Status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status){
        $this->setAlterado();
        $this->Status = $status;

        return $this;
    }

    /**
     * Get the value of Agendamento
     */ 
    public function getAgendamento(){
        return $this->Agendamento;
    }

    /**
     * Set the value of Agendamento
     *
     * @return  self
     */ 
    public function setAgendamento(Agendamento $Agendamento){
        
        if ($Agendamento!=null){
            $this->Agendamento = $Agendamento;
            $Agendamento->setVisita($this);
        }
        $this->setAlterado();

        return $this;
    }

    /**
     * Get the value of acompanhante
     */ 
    public function getAcompanhante(){
        return $this->Acompanhante;
    }

    /**
     * Set the value of acompanhante
     *
     * @return  self
     */ 
    public function setAcompanhante(Empregado $acompanhante){

        $this->Acompanhante = $acompanhante;
        $this->setAlterado();

        return $this;
    }

    protected function save(){
		//(new InstituicaoDAO)->UPDATE($this);
	}

    /**
     * Get the value of btnClasses
     */ 
    public function getBtnClasses()
    {
        return $this->btnClasses;
    }
}

