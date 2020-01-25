<?PHP 
namespace App\DB;
use App\Model\Instituicao;
use App\Model\Usuario;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class Professor_InstituicaoDAO extends \App\DB\interfaces\DataAccessObject {

    function INSERT($Professor_instituicao): bool{
        
    }
    function UPDATE($Professor_instituicao): bool{
        $join ="instituicao i LEFT JOIN cidade_UF c ON c.cidade = ? AND c.UF = ?";
        $set  ="nome = ?, responsavel = ?, endereco = ?, numero = ?, cidade_UF_ID =c.id , 
                cep = ?, telefone = ?, tipo_Instituicao = ?";
        $sql  = "UPDATE $join SET $set WHERE i.id = ?";

        $stmt = $this->dataBase->prepare($sql);
       
        $stmt->bind_param("sssssssssi", ...$params);
        
        return $stmt->execute();
    }

    function DELETE($Professor_instituicao): bool{
        return $this->DELETEbyID($Professor_instituicao->getID());
    }
    
    /**
     * Atualiza o campo ativo da tabela professor_instituicao para falso, para simular exclusão de uma instiuição;
     * @param integer $id ID da instiuicao;
     * @param integer $user_ID ID do usuário;
     * @return boolean true caso operação ocorra com sucesso, caso contrário retorna false;
     */
    function DesativarByID(int $Instituicao_id, int  $user_ID){
        $sql = "UPDATE professor_instituicao pf SET pf.ativo=0 WHERE pf.instituicao_ID = ? and pf.usuario_ID = ? ";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ii",$id,$user_ID);
        
        return $stmt->execute();
    }

    /**
     * Atualiza o campo ativo da tabela professor_instituicao para true;
     * @param integer $id ID da instiuicao;
     * @param integer $user_ID ID do usuário;
     * @return boolean true caso operação ocorra com sucesso, caso contrário retorna false;
     */
    function AtivarByID(int $Instituicao_id, int  $user_ID){
        $sql = "UPDATE professor_instituicao pf SET pf.ativo=1 WHERE pf.instituicao_ID = ? and pf.usuario_ID = ? ";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ii",$id,$user_ID);
        
        return $stmt->execute();
    }

    function SELECTbyID(int $id, bool $asArray=true){
        $select ;
        $join ;
        $sql = "SELECT $select FROM $join WHERE i.id=$id";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows == 1){//um select pelo ID, só vai encontrar no maximo um resultado
            if($asArray){
                return [$row];
            }
            $obj;//criar os objetos do usuario e instituição usando os demais DAO;
            return $p_i;
        }
        throw new \Exception("Nenhum registro foi encontrado com o id $id");
    }


    function SELECT_ALL(String $table="professor_instituicao"){
        return parent::SELECT_ALL($table);
    }

    /**
     * Realiza uma busca de instituições relacionadas ao número de ID do usuário;
     * Retornando apenas as intituições que estão relacionadas ao usuário em questão;
     * @param integer $id do usuário;
     * @return array associativo com os dados;
     */
    function SELECTbyUsuario_ID($U_id, $ativo= true){
        $select = "instituicao_ID";
        $filtrar = $filtrar_ativo ? "AND ativo = 1" : "";
        $sql="SELECT $select FROM professor_instituicao pi WHERE usuario_ID = '$I_id' $filtrar";
        $resultado = $this->dataBase->query($sql);

        if($resultado->num_rows == 1){
            if($asArray){
                return [$row];
            }
            return $registros;
        } 

    }
    /**
     * Realiza uma busca de instituições relacionadas ao número de ID do usuário;
     * Retornando apenas as intituições que estão relacionadas ao usuário em questão;
     * @param integer $id do usuário;
     * @param bool $ativo se verdadeiro filtrar apenas entre os registro com a coluna ativo = true,
     * se false retorna todos os registros
     * @return array associativo com os dados;
     */
    function SELECTbyInstituicao_ID($I_id,bool $filtrar_ativo= true){
        $select = "usuario_ID";
        $filtrar = $filtrar_ativo ? "AND ativo = 1" : "";
        $sql="SELECT $select FROM professor_instituicao pi WHERE instituicao_ID = '$I_id' $filtrar";
        $resultado = $this->dataBase->query($sql);

        if($resultado->num_rows == 1){
            if($asArray){
                return [$row];
            }
            return $registros;
        }

    }
    /**
     * Insere na tabela professor_instituicao, vinculando uma instituicao a um responsavel
     * @param $ID ID da tabela
     * @param $cont_A quantidade de agendamentos
     * @param $contAC quantidade de agendamentos cancelados
     * @param $ativo 
     * @param $Professor_instituicao_ID ID da instituicao vinculada ao professor
     * @param $usuario_ID ID do usuario do responsavel pela instituicao
     */
    function INSERT_Professor_Instituicao( $Professor_instituicao_ID, $usuario_ID): bool{
        $sql = "INSERT INTO professor_instituicao (cont_agendamento, cont_agendamento_cancelado, ativo, instituicao_ID, usuario_ID) 
        VALUES ( 0,0, 1, '$Professor_instituicao_ID', '$usuario_ID')";
        return $this->dataBase->query($sql);
    }
    /**
     * Deletar um elemento da tabela professor_instituicao
     *
     * @param integer $id da tabela
     * @return result
     */
    function DELETE_Professor_Instituicao(int $id){
        $sql = "DELETE FROM professor_instituicao WHERE ID = $id ";
        $result = $this->dataBase->query($sql);
        return $result;
    }
}