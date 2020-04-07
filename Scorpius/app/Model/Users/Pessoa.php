<?php

namespace app\Model\users;
use App\DB\PessoaDAO;
abstract class Pessoa extends \App\DB\interfaces\DataObject {
    private $nome;
    private $cpf;
    private $telefone;
    private $email;
	private $senha;
	private $tipo_usuario;
	protected $ID;

	public function __Construct($nome, $senha, $tipo_usuario, $cpf, $telefone, $email, $ID = null)
    {
        $this->nome = $nome;
		$this->senha = $senha;
		$this->tipo_usuario = $tipo_usuario;
		$this->cpf = $cpf;
		$this->telefone = $telefone;
		$this->email = $email;
		$this->ID = $ID;
    }

	/**
	 * Metodo de login do usuario do sistema. 
	 *
	 * @return Pessoa
	 */
	public static function login(): Pessoa{
        
    }

    /**
	 * Validação de acesso do usuario ao sistema.
	 */
	public function validarAcesso($token) {}

	/**
	 * Alterar senha anterior da pessoa por uma nova.
	 *
	 * @param [type] $novaSenha nova senha da pessoa
	 * @return void
	 */
	public function setSenha($novaSenha){
		$this->setAlterado();
        $this->senha = $novaSenha;
    }

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->setAlterado();
		$this->nome = $nome;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function getTelefone() {
		return $this->telefone;
	}

	public function setTelefone($telefone) {
		$this->setAlterado();
		$this->telefone = $telefone;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->setAlterado();
		$this->email = $email;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function getID() {
		return $this->ID;
	}

	public function getTipo() {
		return $this->tipo_usuario;
	}

	public static function desativarByID(int $ID){
		$result = (new \app\DB\PessoaDAO)->desativarByID($ID);
		return $result;
	}

	protected function save(){
		(new \app\DB\PessoaDAO)->UPDATE($this);
	}
}

?>
