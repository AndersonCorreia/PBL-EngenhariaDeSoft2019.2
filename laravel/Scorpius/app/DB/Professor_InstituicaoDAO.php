<?PHP 
namespace App\DB;
use App\Model\Instituicao;
use App\Model\Usuario;
use App\Model\Professor_Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class Professor_InstituicaoDAO extends \App\DB\interfaces\DataAccessObject {

    public function __Construct(){
        parent::__Construct("professor_instituicao");
    }

    function INSERT($Professor_instituicao): bool{
        $p_id = $Professor_instituicao->getProfessor()->getID();
        $i_id = $Professor_instituicao->getInstituicao()->getID();
        $result = $this->INSERTbyID($i_id, $p_id);
        $Professor_instituicao->setID($this);
        return $result;
    }
    /**
     * Insere na tabela professor_instituicao, vinculando uma instituicao a um usuario
     * @param $instituicao_ID ID da instituicao vinculada ao professor
     * @param $usuario_ID ID do usuario 
     */
    function INSERTbyID( $instituicao_ID, $usuario_ID): bool{
        $sql = "INSERT INTO professor_instituicao (cont_agendamento, cont_agendamento_cancelado, ativo, instituicao_ID, usuario_ID) 
        VALUES ( 0,0, 1, '$instituicao_ID', '$usuario_ID')";
        return $this->dataBase->query($sql);
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
    function desativarByID(int $Instituicao_id, int  $user_ID){
        $sql = "UPDATE professor_instituicao pf SET pf.ativo=0 WHERE pf.instituicao_ID = ? and pf.usuario_ID = ? ";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ii",$Instituicao_id,$user_ID);
        
        return $stmt->execute();
    }

    /**
     * Atualiza o campo ativo da tabela professor_instituicao para true;
     * @param integer $id ID da instiuicao;
     * @param integer $user_ID ID do usuário;
     * @return boolean true caso operação ocorra com sucesso, caso contrário retorna false;
     */
    function ativarByID(int $Instituicao_id, int  $user_ID){
        $sql = "UPDATE professor_instituicao pf SET pf.ativo=1 WHERE pf.instituicao_ID = ? and pf.usuario_ID = ? ";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ii",$Instituicao_id,$user_ID);
        
        return $stmt->execute();
    }

    function SELECTbyInstituicaoID_UserID(int $I_id,int $U_id, bool $asArray=true, $filtrar_ativo=true){
        $select = "*";
        $join = "professor_instituicao pi";
        $filtrar = $filtrar_ativo ? "AND pi.ativo = 1" : "";
        $sql = "SELECT $select FROM $join WHERE pi.instituicao_ID = $I_id AND pi.usuario_id = $U_id $filtrar";
        $resultado = $this->dataBase->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows == 1){//um select pelo ID, só vai encontrar no maximo um resultado
            if($asArray){
                return $row;
            }
            $obj;//criar os objetos do usuario e instituição usando os demais DAO;
            return $p_i;
        }
        throw new \Exception("Nenhum registro foi encontrado");
    }

    /**
     * Realiza uma busca de instituições relacionadas ao número de ID do usuário;
     * Retornando apenas as intituições que estão relacionadas ao usuário em questão;
     * @param integer $id do usuário;
     * @return array associativo com os dados;
     */
    function SELECTbyUsuario_ID($U_id, $filtrar_ativo= true){
        $select = "instituicao_ID, nome, endereco, responsavel, telefone";
        $filtrar = $filtrar_ativo ? "AND pi.ativo = 1" : "";
        $join = "professor_instituicao pi LEFT JOIN instituicao i ON pi.instituicao_id = i.id";
        $sql="SELECT $select FROM $join WHERE pi.usuario_ID = $U_id $filtrar";
        $resultado = $this->dataBase->query($sql);

        if($resultado->num_rows > 0){
            $registros = $resultado->fetch_all(MYSQLI_ASSOC);
            return $registros;
        } 
        throw new \App\Exceptions\NenhumaInstCadastradaException();
    }
}