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

    function SELECTbyID($id): array
    {

        $sql = "SELECT * FROM exposicao WHERE id=$id";
        $resultado = $this->dataBase->query($sql);

        $registros = [];

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }
        }

        return $registros;
    }
}
