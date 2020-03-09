<?php

namespace App\DB;

use App\Model\Users\Usuario;
use \App\DB\interfaces\DataAccessObject;
class UsuarioDAO extends DataAccessObject{

    public function __Construct(){
        parent::__Construct("usuario");
    }

    function INSERT(Object $usuario): bool
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
    function SELECTbyNome($nome){
        $sql = "SELECT * FROM usuario WHERE nome='$nome'";
        $resultado = $this->dataBase->query($sql);
        // $row = $resultado->fetch_assoc();
        if($resultado->num_rows > 0){
            return TRUE;
        }
        return FALSE;
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
        $sql = "SELECT * FROM tipo_usuario WHERE tipo='$tipo'";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();
        return $row['ID'];
    }
    public function getDadosUsuario($id){
        $sql = "SELECT nome,cpf,telefone,email,senha,id FROM usuario WHERE id = $id";
        $resultado = $this->dataBase->query($sql);
        return $resultado->fetch_assoc(); 
    }
    public function alterarDadosUsuario($nome,$cpf,$telefone,$senha,$id){       
        $sql = "UPDATE usuario SET `nome`='$nome',`senha`='$senha',`CPF`='$cpf',
                      `telefone`='$telefone' WHERE ID=$id";
        $stmt = $this->dataBase->prepare($sql);
        //$stmt->bind_param("sssii",$nome,$senha,$cpf,$telefone,$id);
        return $stmt->execute();
    }
    public function DELETEbyEmail($email)
    {
        return $this->dataBase->query("DELETE FROM email_verificacao WHERE usuario_email = '$email'");;
    }
    function UPDATE(Object $user): bool{
        $params =[
            $nome = $user->pesquisaNome(),
            $email = $user->pesquisaEmail(),
            $cpf = $user->pesquisaCpf(),
            $tel = $user->tipoUsuario(),
            $id= $user->getID()
        ];

        $set  ="nome = ?, email = ?, cpf = ?, tel = ?, id = ?";
        $sql  = "UPDATE usuario i SET $set WHERE i.id = ?";

        $stmt = $this->dataBase->prepare($sql);
       
        $stmt->bind_param("ssssssssi", ...$params);
        
    }
    
    function UPDATEATIVO($email): bool
    {
        $sql = "UPDATE usuario SET ativo = 1 WHERE email='$email'";
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
}
