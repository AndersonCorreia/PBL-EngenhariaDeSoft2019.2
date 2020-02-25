<?php

namespace App\Model;
use App\DB\Professor_InstituicaoDAO;
use app\Model\Users\Usuario;
use app\Model\Instituicao;

class Professor_Instituicao extends \App\DB\interfaces\DataObject {
    private $Usuario;
    private $Instituicao;
    private $Qtd_agendamentos;
    private $Qtd_cancelamentos;

    public function __Construct(Usuario $user, Instituicao $instituição, int $qtd_a=0, int $qtd_c=0, int $id=null){
        if($user->getTipo()=="institucional"){
            $this->ID = $id;
            $this->Usuario = $user;
            $this->Instituicao = $instituicao;
            $this->Qtd_agendamentos = $qtd_a;
            $this->Qtd_cancelamentos = $qtd_c;
        }
        else {
            throw new Exception("O usuario não é do tipo institucional");
        }
    }

    
	public static function desativarByID(int $id, $user_ID){
		$result = (new Professor_InstituicaoDAO)->desativarByID($id, $user_ID);
		return $result;
	}

	public static function listarInstituicoes($id){
		return (new Professor_InstituicaoDAO)->SELECTbyUsuario_ID($id);
    }
    
    public function getProfessor(){
        return $this->Usuario;
    }

    public function getInstituicao(){
        return $this->Instituicao;
    }

    public function getQtdAgendamentos(){
        return $this->Qtd_agendamentos;
    }
    /**
     * Função para incrementar a qtd de agendamentos, também pode ser utilizada para reduzir a qtd
     * de agendamentos realizados. No caso do cancelamento de um agendamento ser feito por um funcionario.
     *
     * @param integer $incremento da quantidade, valor default igual a 1
     * @return void
     */
    public function incrementarQtdAgendamentos(int $incremento=1){
        $this->setAlterado();
        $this->Qtd_agendamentos += $incremento;
    }
    public function getQtdCancelamentos(){
        return $this->Qtd_cancelamentos;
    }
    /**
     * Função para incrementar a qtd de agendamentos cancelados pelo usuario, ou que o mesmo tenha faltado;
     * @return void
     */
    public function incrementarQtdCancelamentos(){
        $this->setAlterado();
        $this->Qtd_cancelamentos += $incremento;
    }
    /**
     * retorna a porcentagem dos cancelamentos ou ausencias do usuario em visitas
     *
     * @return double com valores de 0 a 100 representando a porcentagem;
     */
    public function getPorcentagemCancelamentos(){
        return $this->Qtd_cancelamentos/$this->Qtd_agendamentos*100;
    }

    protected function save(){
		(new Professor_InstituicaoDAO)->UPDATE($this);
	}
}