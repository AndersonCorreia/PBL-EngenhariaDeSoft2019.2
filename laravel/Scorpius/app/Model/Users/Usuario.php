<?php

namespace users;

class Usuario extends Pessoa{
    public function alterarDados($nome, $email, $telefone){}
    
    public function cancelarAgendamento($agendamento){}

    public function notificaEmail($mensagem){}

    public function confirmarAgendamento($agendamento){}

}

?>