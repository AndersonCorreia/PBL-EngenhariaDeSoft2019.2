<?PHP 
namespace App\DB;
use App\Model\Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class InstituicaoDAO extends \App\DB\interfaces\DataAccessObject {

    public function __Construct(){
        parent::__Construct("instituicao");
    }

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
        $resultado = $stmt->execute();
        
        $instituicao->setID($this);//adcionando ID no objeto que acabou de ser inserido
        
        return $resultado;
    }
    
    function UPDATE($instituicao): bool{
        $cidade =$instituicao->getCidade();
        $UF = $instituicao->getUF();
        
        $row = $this->SELECT_Cidade_UF_ID($cidade, $UF);
        $cidade_id;
        if($row==[]){
            $this-> INSERT_Cidade_UF($cidade, $UF);
            $cidade_id = $this->getLastID();
        } else{
            $cidade_id =$row['ID'];
        }
        $params =[
            $nome = $instituicao->getNome(),
            $resp = $instituicao->getResponsavel(),
            $endereco = $instituicao->getEndereco(),
            $numero = $instituicao->getNumero(),
            $cidade_id,
            $cep = $instituicao->getCep(),
            $tel = $instituicao->getTelefone(),
            $tipo = $instituicao->getTipo_Instituicao(),
            $id= $instituicao->getID()];

        $set  ="nome = ?, responsavel = ?, endereco = ?, numero = ?, cidade_UF_ID =? , 
                cep = ?, telefone = ?, tipo_Instituicao = ?";
        $sql  = "UPDATE instituicao i SET $set WHERE i.id = ?";

        $stmt = $this->dataBase->prepare($sql);
       
        $stmt->bind_param("ssssssssi", ...$params);
        
        return $stmt->execute();
    }

    /**
     * Função para retornar os dados de uma insituição a partir do seu ID.
     *
     * @param integer $id id da instituição
     * @param boolean $asArray seleciona se retorno é do tipo objeto ou array.
     */
    function SELECTbyID(int $id, bool $asArray=true){
        $select = "i.ID, nome, responsavel, endereco, numero, cep, telefone, tipo_instituicao, cidade, UF";
        $join = "instituicao i LEFT JOIN cidade_UF c ON i.cidade_UF_ID = c.ID";
        $sql = "SELECT $select FROM $join WHERE i.id=$id";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows == 1){//um select pelo ID, só vai encontrar no maximo um resultado
            if($asArray){
                return $row;
            }
            $obj = new Instituicao($row["nome"],$row["responsavel"],$row["endereco"],$row["numero"],$row["cidade"],
                                $row["UF"],$row["cep"],$row["telefone"],$row["tipo_instituicao"],$row["ID"]);
            return $obj;
        }
        throw new \Exception("Nenhuma instituição foi encontrada");
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
        $sql = "SELECT ID,nome,endereco FROM instituicao";
        $result = $this->dataBase->query($sql);
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
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

     /**
     * Retorna o id da cidade correspondente na tabela cidade_UF 
     * @param [type] $cidade
     * @param [type] $uf
     * @return array
     */
    private function SELECT_Cidade_UF_ID($cidade, $uf){
        $sql = "SELECT ID FROM cidade_UF c where c.cidade='$cidade' and c.uf='$uf'";
        $stmt = $this->dataBase->query($sql);    
        $row = $stmt->fetch_assoc();
        return $row;     
    }

    /**
     * Retorna a quantidade de estudantes de escola Estadual que realizaram visitas
     * @return int
     */
    function SELECT_COUNT_alunosEstadual (){
        $sql = 'SELECT COUNT(i.`tipo_instituicao`) AS `Escolas Estaduais`  FROM `visita` as v INNER JOIN `agendamento_institucional` as ai on v.`agendamento_institucional_ID` = ai.`ID` INNER JOIN `professor_instituicao` as pii on ai.`professor_instituicao_ID` = pii.`ID` INNER JOIN `instituicao` AS i ON pii.`instituicao_ID` = i.`ID` WHERE i.`tipo_instituicao`= "Estadual"';
        $stmt = $this->dataBase->query($sql);
        $row = $stmt->fetch_assoc();
        return $row; 
    }

    /**
     * Retorna a quantidade de estudantes de escola Municipal que realizaram visitas
     * @return int
     */
    function SELECT_COUNT_alunosMunicipal (){
        $sql = 'SELECT COUNT(i.`tipo_instituicao`) AS `Escolas Municipais` FROM `visita` as v INNER JOIN `agendamento_institucional` as ai on v.`agendamento_institucional_ID` = ai.`ID` INNER JOIN `professor_instituicao` as pii on ai.`professor_instituicao_ID` = pii.`ID` INNER JOIN `instituicao` AS i ON pii.`instituicao_ID` = i.`ID` WHERE i.`tipo_instituicao`= "Municipal"';
        $stmt = $this->dataBase->query($sql);
        $row = $stmt->fetch_assoc();
        return $row; 
    }

    /**
     * Retorna a quantidade de estudantes de escola Privada que realizaram visitas
     * @return int
     */
    function SELECT_COUNT_alunosPrivada (){
        $sql = 'SELECT COUNT(i.`tipo_instituicao`) AS `Escolas Privadas`  FROM `visita` as v INNER JOIN `agendamento_institucional` as ai on v.`agendamento_institucional_ID` = ai.`ID` INNER JOIN `professor_instituicao` as pii on ai.`professor_instituicao_ID` = pii.`ID` INNER JOIN `instituicao` AS i ON pii.`instituicao_ID` = i.`ID` WHERE i.`tipo_instituicao`= "Privada"';
        $stmt = $this->dataBase->query($sql);
        $row = $stmt->fetch_assoc();
        return $row; 
    }
}