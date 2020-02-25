<?php

namespace App\Model;

use App\DB\EmailVerificacaoDAO;

class EmailVerificacao extends \App\DB\interfaces\DataObject
{
    private $usuario_email;
    private $token;
    private $emailVerificacao;

    public function __Construct()
    {
        $this->emailVerificacao = new EmailVerificacaoDAO();
    }
    public function novaVerificacao($dados): EmailVerificacao
    {
        $this->usuario_email = $dados['usuario_email'];
        $this->token = $dados['token'];
        
        $this->emailVerificacao->INSERT($this);
        return $this;
    }
    function verificaEmailToken($email, $token){
        if($this->emailVerificacao->SEARCHbyEmail($email)){
            if($token == $this->emailVerificacao->SelectTokenbyEmail($email)){
                return TRUE;
            }
        }
        return FALSE;
    }
    function deletarEmailVerificacao($email){
        return $this->emailVerificacao->DELETEbyEmail($email);
    }
    protected function save()
    {
        (new \app\DB\EmailVerificacaoDAO)->UPDATE($this);
    }
    
    public function setUsuario_email($usuario_email)
    {
        $this->setAlterado();
        $this->usuario_email = $usuario_email;
    }
    
    public function getUsuario_email()
    {
        return $this->usuario_email;
    }

    public function setToken($token)
    {
        $this->setAlterado();
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }
}


