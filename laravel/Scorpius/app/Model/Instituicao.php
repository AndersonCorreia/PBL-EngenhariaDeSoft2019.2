<?php
namespace App\Model;

use App\DB\InstituicaoDAO;
class Instituicao extends \App\DB\interfaces\DataObject {
    private $nome;
    private $responsavel;
    private $endereco;
    private $numero;
	private $cidade;
	private $UF;
    private $cep;
    private $telefone;
	private $tipo_Instituicao;

	public function __Construct(string $nome, string $resp, string $endereco, string $num, string $cidade,
								string $UF, string $cep, string $tel, string $tipo, int $id=null){
		$this->ID = $id;
		$this->nome = $nome;
		$this->responsavel = $resp;
		$this->endereco = $endereco;
		$this->numero = $num;
		$this->cidade = $cidade;
		$this->UF = $UF;
		$this->cep = $cep;
		$this->telefone = $tel;
		$this->tipo_Instituicao = $tipo;
	}
	
	public static function buscar(int $id){
		$result = (new InstituicaoDAO)->SELECTbyID($id);
		return $result;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome(string $nome) {
		$this->setAlterado();
		$this->nome = $nome;
	}
	public function getResponsavel() {
		return $this->responsavel;
	}

	public function setResponsavel(string $responsalvel) {
		$this->setAlterado();
		$this->responsavel = $responsavel;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco(string $endereco) {
		$this->setAlterado();
		$this->endereco = $endereco;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero(string $numero) {
		$this->setAlterado();
		$this->numero = $numero;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade(string $cidade) {
		$this->setAlterado();
		$this->cidade = $cidade;
	}
	public function getUF() {
		return $this->UF;
	}

	public function setUF(string $uf) {
		$this->setAlterado();
		$this->UF = $uf;
	}

	public function getCep() {
		return $this->cep;
	}
	public function setCep(string $cep) {
		$this->setAlterado();
		$this->cep = $cep;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setTelefone(string $telefone) {
		$this->setAlterado();
		$this->telefone = $telefone;
	}
	public function getTipo_Instituicao() {
		return $this->tipo_Instituicao;
	}
	public function setTipo_Instituicao(string $tipo_Instituicao) {
		$this->setAlterado();
		$this->tipo_Instituicao = $tipo_Instituicao;
	}
	
	protected function save(){
		(new InstituicaoDAO)->UPDATE($this);
	}
}
?>
