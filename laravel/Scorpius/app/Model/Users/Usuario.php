<?php
namespace app\Model\Users;
class Usuario extends Pessoa{
    public function alterarDados($nome, $email, $telefone){}
    
    public function cancelarAgendamento($agendamento){}

    public function notificaEmail($mensagem){}

    public function confirmarAgendamento($agendamento){}
    
    public function setTipo(string $tipo){

        if($tipo == "institucional" || $tipo == "visitante"){
            $this->tipo= $tipo;
            return ;
        }

        throw new Exception("Tipo de usuario incorreto para uma instancia de Usuario");
        
    }
}

?>