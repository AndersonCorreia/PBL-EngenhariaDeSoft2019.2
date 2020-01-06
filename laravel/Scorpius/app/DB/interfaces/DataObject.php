<?PHP 

Namespace DB\interfaces;
abstract class DataObject {

    function __destruct(){
        $this->save();
    }
    /**
     * Função chamada no destruct para salvar as informações do objeto no banco
     * Todos os devem implementar este metodo para garantir que as alterações são salvas no banco.
     *
     * @return void
     */
    abstract protected function save();
}