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

    /**
     * Método realiza confirmação de pessoas marcadas para uma visita em um turno.
     *
     * @param [type] $lista lista de pessoas inscritas em uma visita
     * @return void
     */
    public function checkin($lista){ 

    }

    /**
     * Gerencia e organiza visitas marcadas. Podendo atualizar informações, cancelar uma visita, confirmar 
     * ou efetuar o agendamento de uma escola na lista de espera.
     *
     * @return void
     */
    public function gerenciarVisitas(){

    }

    /**
     * Acessar relatorio completo de agendamentos com todas as visitas agendadas no sistema.
     *
     * @return void
     */
    public function acessarRelatorios(){

    }

    /**
     *  lista de visitantes para uma visita.
     *
     * @return void
     */
    public function listaVisitantes(){
        
    }

    /**
     * Estátisticas de visitas e agendamentos da semana para visualização. 
     *
     * @return void
     */
    public function resumoSemanal(){

    }

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