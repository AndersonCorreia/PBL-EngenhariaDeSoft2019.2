<?PHP 
namespace App\DB\interfaces;

abstract class DataObject{

    protected $alterado = false;
    protected $ID;
    
    function __destruct(){
        if($this->alterado){
            $this->save();
        }
    }
    
    /**
     * Função chamada no destruct para salvar as informações do objeto no banco
     * Todos as classes da model devem implementar este metodo
     * para garantir que as alterações são salvas no banco.
     *
     * @return void
     */
    abstract protected function save();

    /**
     * Setar a informação se o objeto foi alterado ou não, caso tenha sido alterarado sera salvo
     * no banco no desconstrutor;
     *
     * @param boolean $alterado informa se o objeto foi alterado ou não
     * @return void
     */
    protected function setAlterado(bool $alterado=true){
        $this->alterado= $alterado;
    }
    /**
     * retorna a informação se o objeto foi alterado ou não, caso tenha sido alterarado sera salvo
     * no banco no desconstrutor;
     *
     * @return boolean informa se o objeto foi alterado ou não
     */
    protected function getAlterado(bool $alterado=true){
       return $this->alterado;
    }
    /**
     * setar o ID deste objeto, tal ação só pode ser feita pelo objeto DAO que fez o INSERT no banco.
     *
     * @param DataAccessObject $dao
     * @return void
     */
    public function setID(DataAccessObject $dao ){ 
        $this->ID= $dao->getLastID();
    }
    public function getID(){
        return $this->ID;
    }
}
?>