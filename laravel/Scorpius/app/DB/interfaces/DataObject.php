<?PHP 
abstract class DataObject{

    protected $alterado = false;
    
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
}
?>