<?PHP

namespace App\DB;

require_once __DIR__ . "/interfaces/DataAccessObject.php";
require_once __DIR__ . "/../Model/Exposicao.php";

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class ExposicaoDAO extends \DataAccessObject
{

    function INSERT($exposicao): bool
    {
        $titulo = $exposicao->getTitulo();
        $tipo_evento = $exposicao->getTipo_evento();
        $descricao = $exposicao->getDescricao();
        $quantidade = $exposicao->getQuantidade();
        $data_inicial = $exposicao->getData_Inicial();
        $data_final = $exposicao->getData_Final();
        $link_imagem = $exposicao->getImage();

        $sql = "INSERT INTO exposicao
        (Titulo, Tipo_Evento, Descricao, Quantidade_Inscritos, Data_Inicial, Data_Final, Link_Imagem)
        VALUES (
            '$titulo', 
            '$tipo_evento',
            '$descricao',
            '$quantidade' ,
            '$data_inicial', 
            '$data_final', 
            '$link_imagem'
        )";
        //usa a variavel $dataBase para  fazer a query no banco
        $resultado = $this->dataBase->query($sql);
        dd($resultado);
        return $resultado;
    }
    function UPDATE($exposicao): bool
    {
        $sql = "UPDATE exposicao
        SET titulo = $exposicao->titulo, Tipo_Evento = $exposicao->tipo_evento, Descricao = $exposicao->descricao,
        Quantidade_Inscritos = $exposicao->quantidade, Data_Inicial = $exposicao->data_inicial, Data_Final = $exposicao->data_final
        WHERE id = $exposicao->id";

        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }

    function DELETEbyID($id)
    {
        $sql = "DELETE FROM exposicao WHERE id = $id ";
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
    function SELECT_ALL(String $table = "exposicao")
    {
        return parent::SELECT_ALL($table);
    }
    function DELETE($instituicao): bool{
        
    }
}
