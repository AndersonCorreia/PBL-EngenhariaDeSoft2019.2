<?php
/**
 * @version 1.0.0
 */
namespace App\Model\Users;
class Empregado extends Pessoa{
    private $permissoes = array();

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

    public function setTipo(string $tipo){
        $this->setAlterado();
        $this->tipo = $tipo;
    }
}
?>