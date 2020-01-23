<?PHP 
namespace App\DB;
use App\Model\Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class InstituicaoDAO extends \App\DB\interfaces\DataAccessObject {

    function INSERT($instituicao): bool{

        $nome = $instituicao->getNome(); 
        $resp = $instituicao->getResponsavel();
        $endereco = $instituicao->getEndereco();
        $numero = $instituicao->getNumero();
        $cidade =$instituicao->getCidade();
        $UF = $instituicao->getUF(); 
        $cep = $instituicao->getCep(); 
        $tel = $instituicao->getTelefone();
        $tipo = $instituicao->getTipo_Instituicao();

        $this->INSERT_Cidade_UF($cidade, $UF);

        $campos = "(nome, responsavel, endereco, numero, cidade_UF_id, cep, telefone, tipo_instituicao)";
        $select = "SELECT ?, ?, ?, ?, c.id, ?, ?, ? FROM cidade_UF c WHERE c.cidade = ? AND c.UF = ?";
        $sql = "INSERT INTO instituicao $campos $select";

        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("sssssssss", $nome, $resp, $endereco, $numero, $cep, $tel, $tipo, $cidade, $UF);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $instituicao->setID($this);//adcionando ID no objeto que acabou de ser inserido

        return $resultado;
    }
    function UPDATE($instituicao): bool{
        $id= $instituicao->getID();
        $nome = $instituicao->getNome(); 
        $resp = $instituicao->getResponsavel();
        $endereco = $instituicao->getEndereco();
        $numero = $instituicao->getNumero();
        $cidade =$instituicao->getCidade();
        $UF = $instituicao->getUF(); 
        $cep = $instituicao->getCep(); 
        $tel = $instituicao->getTelefone();
        $tipo = $instituicao->getTipo_Instituicao();

        $this->INSERT_Cidade_UF($cidade, $UF);

        $join ="instituicao i LEFT JOIN cidade_UF c ON c.cidade = ? AND c.UF = ?";
        $set  ="nome = ?, responsavel = ?, endereco = ?, numero = ?, cidade_UF_ID =c.id , 
                cep = ?, telefone = ?, tipo_Instituicao = ?";
        $sql  = "UPDATE $join SET $set WHERE i.id = ?";

        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ssssssssss", $cidade, $UF, $nome, $resp, $endereco, $numero, $cep, $tel, $tipo, $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado;
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
        $select = "i.ID, nome, responsavel, endereco, numero, cep, telefone, tipo_instituicao, cidade, UF";
        $join = "instituicao i LEFT JOIN cidade_UF c ON i.cidade_UF_ID = c.ID";
        $sql = "SELECT $select FROM $join WHERE i.id=$id";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows == 1){//um select pelo ID, só vai encontrar no maximo um resultado
            if($asArray){
                return [$row];
            }
            $obj = new Instituicao($row["nome"],$row["responsavel"],$row["endereco"],$row["numero"],$row["cidade"],
                                $row["UF"],$row["cep"],$row["telefone"],$row["tipo_instituicao"],$row["ID"]);
            return $obj;
        }
        throw new \Exception("Nenhuma instituição foi encontrada com o id $id");
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
        $select = "i.ID, nome, responsavel, endereco, numero, cep, telefone, tipo_instituicao, cidade, UF";
        $sql = "SELECT $select FROM $join WHERE i.nome = ? AND i.endereco = ?";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss", $nome, $endereco);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if($row==[]){
            throw new \Exception("Nenhuma instituição foi encontrada");
        }

        if($array){
            return $row;
        }
        else {
            $obj = new Instituicao($row["nome"],$row["responsavel"],$row["endereco"],$row["numero"],$row["cidade"],
                                $row["UF"],$row["cep"],$row["telefone"],$row["tipo_instituicao"],$row["ID"]);
            return $obj;
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

    /**
     * Insere na tabela professor_instituicao, vinculando uma instituicao a um responsavel
     * @param $ID ID da tabela
     * @param $cont_A quantidade de agendamentos
     * @param $contAC quantidade de agendamentos cancelados
     * @param $ativo 
     * @param $instituicao_ID ID da instituicao vinculada ao professor
     * @param $usuario_ID ID do usuario do responsavel pela instituicao
     */
    function INSERT_Professor_Instituicao( $instituicao_ID, $usuario_ID): bool{
        $sql = "INSERT INTO professor_instituicao (cont_agendamento, cont_agendamento_cancelado, ativo, instituicao_ID, usuario_ID) 
        VALUES (
            0, 
            0, 
            1, 
            '$instituicao_ID', 
            '$usuario_ID'
        )";
        return $this->dataBase->query($sql);
    }
    /**
     * Tenta inserir uma cidade e estado na tabela, caso a mesma já exita o erro é ignorado.
     * O objetivo é garantir que a cidade e estado exista na tabela antes de um inserção de instituição
     * @param [type] $cidade
     * @param [type] $uf
     * @return void
     */
    private function INSERT_Cidade_UF($cidade, $uf){
        
        $sql = "INSERT IGNORE INTO cidade_UF (cidade, uf) VALUES (?, ?)";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ss", $cidade, $uf);
        $stmt->execute();
    }
}