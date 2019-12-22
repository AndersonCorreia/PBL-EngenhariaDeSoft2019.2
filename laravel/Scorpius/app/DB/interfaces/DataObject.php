<?PHP 

abstract class DataObject {

    function __destruct(){
        $this->save();
    }

    abstract protected function save();
}