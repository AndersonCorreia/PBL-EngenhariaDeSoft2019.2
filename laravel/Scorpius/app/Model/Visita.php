<?php
namespace App\Model;
use App\Model\Users\Empregado;

class Visita extends \App\DB\interfaces\DataObject {

    public $Data;
    public $Turno;
    public $Status;
    public $Agendamento;
    public $Acompanhante;
                                            //cor verde                     //cor vermelha              //cor azul
    private $btnClasses = ["disponivel" => "btn-success", "indisponivel" => "btn-danger", "proprio" => "btn-primary"];
    private $abrevDia = ["DOM", "SEG", "TER", "QUA", "QUI", "SEX", "SAB"];

    public function __Construct(\DateTime $data, string $turno, string $status, Agendamento $agend=null, Empregado $acomp=null){
        $this->Data = $data;
        $this->Turno = $turno;
        $this->Status = $status;
        $this->Agendamento = $agend;
        $this->Acompanhante = $acomp;
    }

    public function preencherArrayForCalendario(array &$array){
        $dm = $this->Data->format("d/m");
        $day = $this->abrevDia[$this->Data->format("w")];
        $btn;

        if($this->Agendamento != null){
            $btn = $this->btnClasses["indisponivel"];
        }
        else {
            $btn = $this->btnClasses["disponivel"];
        }
        $array[$dm]["data"] = "$dm $day";
        $array[$dm]["$this->Turno.btn"] = $btn;
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
		(new InstituicaoDAO)->UPDATE($this);
	}
}

