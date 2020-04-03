<?php
/**
 * @version 1.0.0
 */
namespace App\Model\Users;

use App\DB\PessoaDAO;

class Empregado extends Pessoa{
   
    private $horario_estagiario;

    public function novaDemandaWeb($id, $demandaWeb){
        $this->horario_estagiario = new PessoaDAO();
        return $this->horario_estagiario->INSERT_horario($id, $demandaWeb);
    }
}
?>
