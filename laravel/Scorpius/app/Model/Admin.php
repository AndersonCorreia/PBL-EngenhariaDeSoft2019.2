<?php
namespace App\Model;
// Essa Classe será apagada
use App\DB\AdminDAO;
class Admin extends \App\DB\interfaces\DataObject {
    private $nome;
    private $senha;
    private $tipo_usuario;
    
	public function __Construct(string $nome, string $senha, string $tipo_usuario, int $id=null){
		$this->ID = $id;
		$this->nome = $nome;
        $this->senha = $senha;
        $this->tipo_usuario = $tipo_usuario;
	}
	
	public static function buscar(int $id){
		$result = (new AdminDAO)->SELECTbyID($id);
		return $result;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome(string $nome) {
		$this->setAlterado();
		$this->nome = $nome;
	}
    
    public function getTipo() {
		return $this->tipo_usuario;
	}

	public function setTipo(string $tipo) {
		$this->setAlterado();
		$this->tipo_usuario = $tipo;
    }
    
    public function getSenha() {
		return $this->senha;
    }
    
    public function setSenha($novaSenha){
		$this->setAlterado();
        $this->senha = $novaSenha;
    }
	
	protected function save(){
		(new AdminDAO)->UPDATE($this);
	}
}
?>