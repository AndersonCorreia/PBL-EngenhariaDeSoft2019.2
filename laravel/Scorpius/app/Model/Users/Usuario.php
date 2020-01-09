<?php
namespace app\Model\Users;
class Usuario extends Pessoa{
    public function alterarDados($nome, $email, $telefone){}
    
    public function cancelarAgendamento($agendamento){}

    public function notificaEmail($mensagem){}

    public function confirmarAgendamento($agendamento){}

}

?>