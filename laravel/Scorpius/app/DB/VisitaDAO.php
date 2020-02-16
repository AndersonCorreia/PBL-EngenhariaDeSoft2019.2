<?php

namespace App\DB;

use App\Model\Users\Usuario;
use \App\DB\interfaces\DataAccessObject;

class VisitaDAO extends DataAccessObject{ 
    
    public function __Construct(){
        parent::__Construct("visita");
    }
    
    public function INSERT($Visita): bool{

    }

    public function UPDATE($Visita): bool{

    }
}