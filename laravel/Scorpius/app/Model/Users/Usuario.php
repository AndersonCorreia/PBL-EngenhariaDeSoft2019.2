<?php
namespace App\Model\Users;

use App\DB\UsuarioDAO;

class Usuario extends Pessoa{
    private $usuario;

    function __Construct(){
        $this->usuario = new UsuarioDAO();
    }
    public function novoUsuario($usuario){
        $this->nome = $usuario['nome'];
        $this->email = $usuario['email'];
        $this->cpf = $usuario['cpf'];
        $this->telefone = $usuario['telefone'];
        $this->senha = $usuario['senha'];
        $this->tipo = $usuario['tipo'];
        
        $this->usuario->INSERT($this);
        return $this;
    }
    public function pesquisaEmail($email){
        return $this->usuario->SELECTbyEmail($email);
    }
    public function pesquisaCpf($cpf){
        return $this->usuario->SELECTbyCpf($cpf);
    }
    public function tipoUsuario($tipo){
        return $this->usuario->SELECTbyTipo($tipo);
    }
    public function ativarUsuario($email){
        return $this->usuario->UPDATEATIVO($email);
    }
    public function deletarDesativo($email){
        return $this->usuario->DELETEbyEmail($email);
    }
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