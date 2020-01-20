<?PHP 
namespace App\DB;
use App\Model\Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class InstituicaoDAO extends \App\DB\interfaces\DataAccessObject {

    function INSERT($instituicao): bool{

        $nome = $instituicao->getNome(); 
        $responsavel = $instituicao->getResponsavel();
        $endereco = $instituicao->getEndereco();
        $numero = $instituicao->getNumero();
        $cidade =$instituicao->getCidade(); 
        $cep = $instituicao->getCep(); 
        $telefone = $instituicao->getTelefone();
        $tipo_Instituicao = $instituicao->getTipo_Instituicao();
        $sql;

        $resultado = $this->dataBase->query($sql);
        $instituicao->setID($this);
        return $resultado;
    }
    function UPDATE($instituicao): bool{
        /**$sql = "UPDATE instituicao
        SET nome = $instituicao->getNome, endereco = $instituicao->endereco, numero = $instituicao->numero,
        cidade_UF = $instituicao->cidade_UF, cep = $instituicao->cep, telefone = $instituicao->telefone,
        tipo_Instituicao = $instituicao->tipo_Instituicao
        WHERE id = $instituicao->id";
        
        $resultado = $this->dataBase->query($sql);**/
        return true;
    }
    function DELETE($instituicao): bool{
        return $this->DELETEbyID($instituicao->getID());
    }
    
    function DELETEbyID(int $id){
        $sql = "DELETE FROM instituicao WHERE id = $id ";
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }

    function SELECTbyID(int $id, bool $asArray=true){

        $sql = "SELECT * FROM instituicao i LEFT JOIN cidade_UF c ON i.cidade_UF_ID = c.ID WHERE i.id=$id";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows == 1){
            if($asArray){
                $registros = [];
                $registros[] = $row;

                return $registros;
            }
        
            $obj = new Instituicao($row["nome"],$row["responsavel"],$row["endereco"],$row["numero"],$row["cidade"],
                                $row["UF"],$row["CEP"],$row["tipo_instituicao"],$row["ID"]);
            return $obj;
        }
        return [];
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
        $result = $stmt->get_result()->fetch_assoc();

        if($result==[]){
            throw new \Exception("Nenhuma instituição foi encontrada");
        }

        if($array){
            return $result;
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