<?PHP 
namespace App\DB;
require_once __DIR__."/interfaces/DataAccessObject.php";
require_once __DIR__."/../Model/Users/Instituicao.php";

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao
 * e todas as subclasses.
 */
class InstituicaoDAO extends \DataAccessObject {

    function INSERT($instituicao): bool{
       // dd($instituicao);
       $nome = $instituicao->getNome(); 
       $responsavel = $instituicao->getResponsavel();
       $endereco = $instituicao->getEndereco();
       $numero = $instituicao->getNumero();
       $cidade_UF =$instituicao->getCidade_UF(); 
       $cep = $instituicao->getCep(); 
       $telefone = $instituicao->getTelefone();
       $tipo_Instituicao = $instituicao->getTipo_Instituicao(); 
       $cidade_UF_ID = $instituicao->getCidade_UF_ID();
       //dd($nome,$responsavel, $endereco, $numero, $cidade_UF, $cep, $telefone, $tipo_Instituicao, $cidade_UF_ID);
        $sql = "INSERT INTO instituicao
        (nome, responsavel, endereco, numero, cidade_UF, cep, telefone, tipo_Instituicao, cidade_UF_ID)
        VALUES (
            '$nome', 
            '$responsavel',
            '$endereco',
            '$numero' , 
            1, 
            '$cep', 
            '$telefone', 
            '$tipo_Instituicao', 
            3
    )";
        //usa a variavel $dataBase para  fazer a query no banco
        $resultado = $this->dataBase->query($sql);
        dd($resultado);
        return $resultado;
    }
    function UPDATE($instituicao): bool{
        $sql = "UPDATE instituicao
        SET nome = $instituicao->nome, endereco = $instituicao->endereco, numero = $instituicao->numero,
        cidade_UF = $instituicao->cidade_UF, cep = $instituicao->cep, telefone = $instituicao->telefone,
        tipo_Instituicao = $instituicao->tipo_Instituicao, cidade_UF_ID = $instituicao->cidade_UF_ID
        WHERE id = $instituicao->id";
        
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
    function DELETE($instituicao): bool{
        
    }
    function DELETEbyID($id){
        $sql = "DELETE FROM instituicao WHERE id = $id ";
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }

    function SELECTbyID($id): Array{
     
        $sql = "SELECT * FROM instituicao WHERE id=$id";
        //$sql = "SELECT * FROM instituicao";
        $resultado = $this->dataBase->query($sql);

        $registros = [];

        if($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }
        } 

        return $registros;
    }
    function SELECT_ALL(String $table="instituicao"){
        return parent::SELECT_ALL($table);
    }

    /**
     * Realizar a busca de uma instituição no banco com base no nome e endereço;
     * Podendo retorna em forma de array ou um objeto do tipo Instituicao;
     *
     * @param string $nome
     * @param string $endereco
     * @param bool $array se true a informação é retornada na forma de array, do contrario como objeto
     * @return array|Instituicao retornar um array ou objeto do tipo Instituicao com os dados;
     */
    function SELECT(string $nome, string $endereco, bool $array=true){
        $join = "instituicao i LEFT JOIN cidade_UF c ON i.cidade_UF_ID = c.ID";
        $sql = "SELECT * FROM $join WHERE i.nome = ? AND i.endereco = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss", $nome, $endereco);
        $stmt->execute();
        
        if($array){
            return $stmt->get_result()->fetch_assoc();
        }
        else {
            //construir o objeto e retornar
        }
    }
    /**
     * Função para retorna o nome e endereço de todas as instituições;
     * Retorna apenas nome e endereço.
     * @return array array associativo com os dados;
     */
    function getNomeEnderecoALL(){
        $sql = "SELECT nome,endereco FROM instituicao";
        $result = $this->dataBase->query($sql);
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }

}