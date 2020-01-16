<?php
namespace App\Model\Users;

use App\DB\InstituicaoDAO;
use App\DB\Cidade_ufDAO;
require_once __DIR__."/../../DB/interfaces/DataObject.php";
class Instituicao extends \DataObject {
    private $nome;
    private $responsavel;
    private $endereco;
    private $numero;
    private $cidade_UF;
    private $cep;
    private $telefone;
    private $tipo_Instituicao;
	private $cidade_UF_ID;
	private $instituicao;

	function __Construct(){
		$this->instituicao = new InstituicaoDAO();
	}

    public function alterarDadosInstituicao($nome, $endereco,$numero, $cidade_UF, $cep,  $telefone, $tipo_Instituicao, $cidade_UF_ID): Instituicao{
        
    }

    public function agendaInstituicao($instituicao): boolean{

    }
    public function cadastraInstituicao($dados): Instituicao{
        $this->nome = $dados['nameInstituicao'];
        $this->responsavel = $dados['nameResponsavel'];
        $this->endereco = $dados['nameEndereco'];
        $this->numero = $dados['nameNumero'];
        $this->cidade_UF = $dados['nameCidade'];
        $this->cep = $dados['nameCEP'];
        $this->telefone = $dados['nameTelefone'];
        $this->tipo_Instituicao = $dados['tipo'];
		$this->cidade_UF_ID = $dados['select'];
		
        $this->instituicao->INSERT($this);
        return $this;
    }
    public function desvincularInstituicao($instituicao): boolean{

	}
	
	public function buscar($id){
		$result = $this->instituicao->SELECTbyID($id);
		return $result;
	}

	public function listarInstituicoes(){
		return $this->instituicao->SELECT_ALL();
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getResponsavel() {
		return $this->responsavel;
	}

	public function setResponsavel($responsalvel) {
		$this->responsavel = $responsavel;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
	}

	public function getCidade_UF() {
		return $this->cidade_UF;
	}

	public function setCidade_UF($cidade_UF) {
		$this->cidade_UF = $cidade_UF;
	}

	public function getCep() {
		return $this->cep;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}
	public function getTipo_Instituicao() {
		return $this->tipo_Instituicao;
	}
	public function setTipo_Instituicao($tipo_Instituicao) {
		$this->tipo_Instituicao = $tipo_Instituicao;
	}
	public function getCidade_UF_ID() {
		return $this->cidade_UF_ID;
	}
	public function setCidade_UF_ID($cidade_UF_ID) {
		$this->cidade_UF_ID= $cidade_UF_ID;
	}

	protected function save(){
		(new \app\DB\InstituicaoDAO)->INSERT($this);
	}
}
?>
