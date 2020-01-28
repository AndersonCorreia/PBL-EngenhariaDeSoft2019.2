<?php

namespace App\DB;

use App\Model\EmailVerificacao;
use PhpParser\Node\Expr\Cast\Bool_;

class EmailVerificacaoDAO extends \App\DB\interfaces\DataAccessObject{

    function INSERT($email_verificacao): bool{
        $usuario_email = $email_verificacao->getUsuario_email();
        $token = $email_verificacao->getToken();
        $sql = "INSERT INTO email_verificacao (usuario_email, token) VALUE (
            '$usuario_email',
            '$token'
        )";
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }

    function SEARCHbyEmail($email){
        $sql = "SELECT * FROM email_verificacao WHERE usuario_email='$email'";
        $resultado = $this->dataBase->query($sql);
        if($resultado->num_rows > 0){
            return TRUE;
        }
        return FALSE;
    }
    function SelectTokenbyEmail($email){
        $sql = "SELECT * FROM email_verificacao WHERE usuario_email='$email'";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();
        return $row['token'];
    }

    public function DELETEbyEmail($email)
    {
        return $this->dataBase->query("DELETE FROM email_verificacao WHERE usuario_email = '$email'");;
    }
    function SELECT_ALL(String $table = "email")
    {
        return parent::SELECT_ALL($table);
    }

    function UPDATE(object $object): bool{}
    
    function DELETE(object $object): bool{}

    function getLastID(): int{
        return $this->dataBase->insert_id;
    }
}
