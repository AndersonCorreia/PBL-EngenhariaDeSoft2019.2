<?php
/**
 * @version 1.0.0
 */
namespace App\Model\Users;

use App\DB\PessoaDAO;

class Empregado extends Pessoa{
    private $permissoes = array();
    private $demandaWeb = [
        'guia',
        'horarios',
        'observacao'
    ];
    private $horario_estagiario;
    
    public function getDemandaWeb()
    {
        return $this->demandaWeb;
    }

    public function setDemandaWeb($demandaWeb)
    {
        $this->setAlterado();
        $this->demandaWeb = $demandaWeb;
    }

    public function novaDemandaWeb($id, $demandaWeb){
        $this->horario_estagiario = new PessoaDAO();
        return $this->horario_estagiario->INSERT_horario($id, $demandaWeb);
    }

    public function setTipo(string $tipo){
        $this->setAlterado();
        $this->tipo = $tipo;
    }
}
?>