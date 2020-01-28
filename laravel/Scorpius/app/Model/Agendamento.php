<?php
namespace App\Model;
use App\Model\Users\Professor_instituicao;

class Agendamento extends \App\DB\interfaces\DataObject {

    
    protected function save(){
		(new InstituicaoDAO)->UPDATE($this);
	}
}