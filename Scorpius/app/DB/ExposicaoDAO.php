<?PHP

namespace App\DB;
use App\Model\Exposicao;

class ExposicaoDAO extends \App\DB\interfaces\DataAccessObject
{
    public function __Construct(){
        parent::__Construct("exposicao");
    }

    function INSERT($exposicao): bool
    {
        $titulo = $exposicao->getTitulo();
        $tipo_evento = $exposicao->getTipo_evento();
        $tema = $exposicao->getTema();
        $turno = $exposicao->getTurno();
        $descricao = $exposicao->getDescricao();
        $quantidade = $exposicao->getQuantidade();
        $data_inicial = $exposicao->getData_Inicial();
        $data_final = $exposicao->getData_Final();
        $imagem = $exposicao->getImage();

        $sql = "INSERT INTO exposicao
        (titulo, tipo_evento, tema_evento, turno, descricao, quantidade_inscritos, data_inicial, data_final, imagem)
        VALUES (
            '$titulo', 
            '$tipo_evento',
            '$tema',
            '$turno',
            '$descricao',
            '$quantidade' ,
            '$data_inicial', 
            '$data_final', 
            '$imagem'
        )";

        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
    public function UPDATE($exposicao): bool
    {
        $sql = "UPDATE exposicao SET titulo = ?, tipo_evento = ?, tema_evento = ?, turno= ?, descricao = ?, quantidade_inscritos = ?, data_inicial = ?, data_final = ? WHERE ID = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ssssssssi", $exposicao->titulo ,$exposicao->tipo, $exposicao->tema, 
        $exposicao->turno, $exposicao->descricao, $exposicao->quantidade, $exposicao->data_inicial, 
        $exposicao->data_final, $exposicao->id);
        $result1 = $stmt->execute();
        
        
        $result2 = true;
        if($exposicao->imagem != null){
            $sql = "UPDATE exposicao
            SET imagem = ? 
            WHERE ID = ?";
            $stmt->bind_param("b", $exposicao->imagem);
            $result2 = $stmt->execute();
        }
        
        return $result1 && $result2;
    }

    public function SELECT_ALL_AtividadePermanente(string $turno = "diurno"){

        $hoje =  now();
        $where = "tipo_evento = 'atividade permanente' AND turno = ?
                    AND ( data_final >= ? OR data_final IS NULL ) AND data_inicial <= ? ";

        $sql = "SELECT ID, titulo, tema_evento, descricao FROM $this->table WHERE $where";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("sss",$turno ,$hoje, $hoje);
        $stmt->execute();
        $ArrayResult = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if($ArrayResult==[]){
            throw new \App\Exceptions\NenhumaAtividadeEncontradaException();
        }

        return $ArrayResult;
    }

    public function SELECT_Eventos($colums= '*'){
        $sql="SELECT $colums FROM exposicao";
        $stmt = $this->dataBase->query($sql);
        $ArrayResult = $stmt->fetch_all(MYSQLI_ASSOC);
        foreach($ArrayResult as $key=>$value){
            $ArrayResult[$key]['imagem']= base64_encode($ArrayResult[$key]['imagem']);
        }
        if($ArrayResult==[]){
            throw new \App\Exceptions\NenhumaAtividadeEncontradaException();
        }

        return $ArrayResult;
    }
}