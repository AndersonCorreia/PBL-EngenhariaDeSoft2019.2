<?php

namespace app\Model\users;

abstract class Pessoa extends \App\DB\interfaces\DataObject {
    private $nome;
    private $cpf;
    private $telefone;
    private $email;
	private $senha;
	private $tipo;

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
	public function alterarSenha($novaSenha){
        $this->senha = $novaSenha;
    }

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}

	public function getTelefone() {
		return $this->telefone;
	}

	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function getID() {
		return $this->ID;
	}

	public function getTipo() {
		return $this->tipo;
	}

	/**
	 * função abstrata, para que a implementação em usuario verifique se o tipo é correto.
	 * os tipos corretos em usuario são visitante ou institucional
	 *
	 * @param string $tipo
	 * @throws Exception caso seja setado o tipo incorreto;
	 * @return void
	 */
	public abstract function setTipo(string $tipo);

	protected function save(){
		(new \app\DB\PessoaDAO)->UPDATE($this);
	}
}

?>
