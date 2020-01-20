<?php
namespace App\Model;

use App\DB\InstituicaoDAO;
class Instituicao extends \App\DB\interfaces\DataObject {
	private $ID = 0;
    private $nome;
    private $responsavel;
    private $endereco;
    private $numero;
	private $cidade;
	private $UF;
    private $cep;
    private $telefone;
	private $tipo_Instituicao;

	public function __Construct(string $nome, string $responsavel, string $endereco, string $numero, 
						string $cidade, string $UF, string $cep, string $telefone, string $tipo_Instituicao){
		$this->ID = $ID+1;
		$this->nome = $nome;
		$this->responsavel = $responsavel;
		$this->endereco = $endereco;
		$this->numero = $numero;
		$this->cidade = $cidade;
		$this->UF = $UF;
		$this->cep = $cep;
		$this->telefone = $telefone;
		$this->tipo_Instituicao = $tipo_Instituicao;
	}


    public function agendaInstituicao($instituicao): boolean{

	}
	
    public function desvincularInstituicao($instituicao): boolean{

	}
	
	public static function buscar(int $id){
		$result = (new InstituicaoDAO)->SELECTbyID($id);
		return $result;
	}

	public static function deletar(int $id){
		$result = (new InstituicaoDAO)->DELETEbyID($id);
		return $result;
	}

	public static function listarInstituicoes(){
		return (new InstituicaoDAO)->SELECT_ALL();
	}
	public function getID(){
		return $this->ID;
	}
	public function getNome() {
		return $this->nome;
	}

	public function setNome(string $nome) {
		$this->alterado();
		$this->nome = $nome;
	}
	public function getResponsavel() {
		return $this->responsavel;
	}

	public function setResponsavel(string $responsalvel) {
		$this->alterado();
		$this->responsavel = $responsavel;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco(string $endereco) {
		$this->alterado();
		$this->endereco = $endereco;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero(string $numero) {
		$this->alterado();
		$this->numero = $numero;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade(string $cidade) {
		$this->alterado();
		$this->cidade = $cidade;
	}

	public function getCep() {
		return $this->cep;
	}
	public function setCep(string $cep) {
		$this->alterado();
		$this->cep = $cep;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setTelefone(string $telefone) {
		$this->alterado();
		$this->telefone = $telefone;
	}
	public function getTipo_Instituicao() {
		return $this->tipo_Instituicao;
	}
	public function setTipo_Instituicao(string $tipo_Instituicao) {
		$this->alterado();
		$this->tipo_Instituicao = $tipo_Instituicao;
	}
	
	protected function save(){
		(new InstituicaoDAO)->UPDATE($this);
	}
}
?>
