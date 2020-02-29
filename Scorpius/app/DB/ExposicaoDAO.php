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
        $descricao = $exposicao->getDescricao();
        $quantidade = $exposicao->getQuantidade();
        $data_inicial = $exposicao->getData_Inicial();
        $data_final = $exposicao->getData_Final();
        $imagem = $exposicao->getImage();

        $sql = "INSERT INTO exposicao
        (titulo, tipo_evento, tema_evento, descricao, quantidade_inscritos, data_inicial, data_final, imagem)
        VALUES (
            '$titulo', 
            '$tipo_evento',
            '$tema',
            '$descricao',
            '$quantidade' ,
            '$data_inicial', 
            '$data_final', 
            '$imagem'
        )";

        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
    function UPDATE($exposicao): bool
    {
        $sql = "UPDATE exposicao
        SET titulo = $exposicao->titulo, tipo_evento = $exposicao->tipo_evento, tema = $exposicao->tema, descricao = $exposicao->descricao,
        quantidade_inscritos = $exposicao->quantidade, data_inicial = $exposicao->data_inicial, data_final = $exposicao->data_final
        WHERE id = $exposicao->id";

        $resultado = $this->dataBase->query($sql);
        return $resultado;
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
            throw new \Exception("Nenhum registro foi encontrado");
        }

        return $ArrayResult;
    }
}
