<?php

namespace App\DB;

use App\Model\Users\Usuario;
use \App\DB\interfaces\DataAccessObject;
class UsuarioDAO extends DataAccessObject{
    function INSERT($usuario): bool
    {
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $cpf = $usuario->getCpf();
        $telefone = $usuario->getTelefone();
        $tipo = $usuario->getTipo();
        $senha = $usuario->getSenha();

        $sql = "INSERT INTO usuario
        (nome, email, senha, CPF, telefone, ativo, tipo_usuario_ID)
        VALUES (
            '$nome', 
            '$email', 
            '$senha', 
            '$cpf', 
            '$telefone',
            0,
            '$tipo'
            
        )";
        //usa a variavel $dataBase para  fazer a query no banco
        $resultado = $this->dataBase->query($sql);
        // dd($resultado);
        return $resultado;
    }
    function SELECTbyEmail($email){
        $sql = "SELECT * FROM usuario WHERE email='$email'";
        $resultado = $this->dataBase->query($sql);
        // $row = $resultado->fetch_assoc();
        if($resultado->num_rows > 0){
            return TRUE;
        }
        return FALSE;
    }
    function SELECTbyCpf($cpf){
        $sql = "SELECT * FROM usuario WHERE cpf='$cpf'";
        $resultado = $this->dataBase->query($sql);
        // $row = $resultado->fetch_assoc();
        if($resultado->num_rows > 0){
            return TRUE;
        }
        return FALSE;
    }
    function SELECTbyTipo($tipo){
        $sql = "SELECT * FROM tipo_usuario WHERE nome='$tipo'";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();
        return $row['ID'];
    }
    public function DELETEbyEmail($email)
    {
        return $this->dataBase->query("DELETE FROM email_verificacao WHERE usuario_email = '$email'");;
    }
    function UPDATE(object $object): bool{}
    
    function DELETE(object $object): bool{}
    function UPDATEATIVO($email): bool
    {
        $sql = "UPDATE usuario SET ativo = 1 WHERE email='$email'";
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
}