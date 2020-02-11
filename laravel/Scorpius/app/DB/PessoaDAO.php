<?PHP 

namespace App\DB;
use App\Model\Users\Pessoa;//falta inserir as outras classes
use App\Model\Users\Usuario;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe pessoa
 * e todas as subclasses.
 */
class PessoaDAO extends \App\DB\interfaces\DataAccessObject {

    function INSERT($pessoa): bool{
        //usa a variavel $dataBase para  fazer a query no banco
        $this->dataBase;
    }
    
    function UPDATE($usuario): bool{
        $sql = "UPDATE usuario
        SET nome = $usuario->nome, email = $usuario->email, telefone = $usuario->telefone,
        senha = $usuario->senha
        WHERE id = usuario->id";

        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
    
    function DELETE($pessoa): bool{

    }
    function SELECT_ALL(String $table="usuario"){
        return parent::SELECT_ALL($table);// inves de apenas retorna criar os objetos da classe
    }
    /**
     * Seleciona o ID do usuario com o nome passado, caso exista.
     * @param [string] $nome nome do usuario
     * @return ID do usuario com o nome passado. 
     */
    function SELECTbyName($name): int{
        $sql = "SELECT ID FROM usuario WHERE nome = $name";
        $result = $this->dataBase->query($sql);
        $row = $result->fetch_assoc();
        return $row["ID"];
    }

    function SELECTbyID(int $id, bool $filtrarAtivo = true){
        $join = "usuario as u LEFT JOIN tipo_usuario as t ON u.tipo_usuario_ID = t.ID";
        $select = "u.ID, u.nome, u.email, u.senha, u.telefone, t.tipo";
        $filtrar =  $filtrarAtivo ? "AND u.ativo = 1 " : "";
        $sql = "SELECT $select FROM $join WHERE u.ID = ? $filtrar";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if($row==[]){
            throw new \Exception("Usuario não encontrado ou senha errada");
        }
        return $row;
    }
    /**
     * Retorna todas as permissões de determinado tipo de usuario;
     *
     * @param string $tipoUsuario
     * @return Array
     */
    function getPermissoes(string $tipoUsuario): Array{
        $join = "permissao p LEFT JOIN tipo_usuario t ON p.tipo_usuario_ID = t.ID";
        $result = $this->dataBase->query("SELECT (permissao) FROM $join WHERE t.tipo = '$tipoUsuario'");
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }

    function asPermissao($tipo, $permissao){
        $join = "permissao p LEFT JOIN tipo_usuario t ON p.tipo_usuario_ID = t.ID";
        $result = $this->dataBase->query("SELECT (permissao) FROM $join WHERE p.permissao = '$permissao' AND t.tipo = '$tipo' ");
        
        if($result->num_rows > 0){
            return true;
        }
        return false;
    }
    /**
     * função para realizar a consulta no banco de determinado usuario para o login;
     *
     * @param string $user
     * @param string $senha
     * @return array
     */
    function UserLogin(string $user, string $senha): array{
        $join = "usuario as u LEFT JOIN tipo_usuario as t ON u.tipo_usuario_ID = t.ID";
        $select = "u.ID, u.nome, t.tipo";
        $sql = "SELECT $select FROM $join WHERE ( u.email = ? OR u.cpf = ? ) AND u.senha = ? AND u.ativo = 1";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("sss", $user, $user, $senha);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if($row==[]){
            throw new \Exception("Usuario não encontrado ou senha errada");
        }

        return $row;
    }
    public function INSERT_horario($id, $demandaWeb)
    {
        foreach($demandaWeb['horarios'] as $horarios){
            foreach($horarios as $horario){
                $sql = "INSERT INTO horario_estagiario (dia_semana, turno, estagiario_usuario_ID) VALUES (
                    '$horario[0]',
                    '$horario[1]',
                    '$id'
                    
                )";
                
            }
        }
    }
}