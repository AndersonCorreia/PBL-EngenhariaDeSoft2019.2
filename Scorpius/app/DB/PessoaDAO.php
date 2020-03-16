<?PHP

namespace App\DB;

use App\Model\Users\Pessoa; //falta inserir as outras classes
use App\Model\Users\Usuario;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe pessoa
 */
class PessoaDAO extends \App\DB\interfaces\DataAccessObject
{
    public function __Construct(){
        parent::__Construct("pessoa");
    }

    function INSERT($pessoa): bool
    {
        $nome = $pessoa->getNome();
        $senha = $pessoa->getSenha();
        $tipo_usuario = $pessoa -> getTipo();
        $email = $pessoa -> getEmail();
        $cpf = $pessoa -> getCPF();
        $telefone = $pessoa -> getTelefone();


        $campos = "(nome, senha, tipo_usuario_ID, email, cpf, telefone)";
        $select = "SELECT ?, ?, ?, ?, ?, ? FROM usuario";
        $sql = "INSERT INTO usuario $campos $select";

        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("ssssss", $nome, $senha, $tipo_usuario, $email, $cpf, $telefone);
        $resultado = $stmt->execute();
        $pessoa->setID($this);//adcionando ID no objeto que acabou de ser inserido

        return $resultado;
    }

    function UPDATE($usuario): bool
    {
        $sql = "UPDATE usuario
        SET nome = $usuario->nome, email = $usuario->email, telefone = $usuario->telefone,
        senha = $usuario->senha
        WHERE ID = usuario->id";

        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }

    function desativarByID(int $ID){
        $sql = "UPDATE usuario us SET us.ativo=0 WHERE us.ID = ? ";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("i",$ID);
        
        return $stmt->execute();
    }

    /**
     * Seleciona o ID do usuario com o nome passado, caso exista.
     * @param [string] $nome nome do usuario
     * @return ID do usuario com o nome passado. 
     */
    function SELECTbyName($name): int
    {
        $sql = "SELECT ID FROM usuario WHERE nome = $name";
        $result = $this->dataBase->query($sql);
        $row = $result->fetch_assoc();
        return $row["ID"];
    }

    function SELECTbyID(int $id, bool $filtrarAtivo = true)
    {
        $join = "usuario as u LEFT JOIN tipo_usuario as t ON u.tipo_usuario_ID = t.ID";
        $select = "u.ID, u.nome, u.email, u.senha, u.telefone, t.tipo";
        $filtrar =  $filtrarAtivo ? "AND u.ativo = 1 " : "";
        $sql = "SELECT $select FROM $join WHERE u.ID = ? $filtrar";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if ($row == []) {
            throw new \Exception("Usuario não encontrado");
        }
        return $row;
    }
    /**
     * Retorna todas as permissões de determinado tipo de usuario;
     *
     * @param string $tipoUsuario
     * @return Array
     */
    function getPermissoes(string $tipoUsuario): array
    {
        $join ="( permissao as p LEFT JOIN permissao_tipo as pt 
                ON p.ID = pt.permissao_ID ) LEFT JOIN tipo_usuario as t ON pt.tipo_usuario_ID = t.ID ";
        $result = $this->dataBase->query("SELECT (permissao) FROM $join WHERE t.tipo = '$tipoUsuario'");
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }

    function asPermissao($tipo, $permissao)
    {
        $join ="( permissao as p LEFT JOIN permissao_tipo as pt 
                ON p.ID = pt.permissao_ID ) LEFT JOIN tipo_usuario as t ON pt.tipo_usuario_ID = t.ID ";
        $result = $this->dataBase->query("SELECT (permissao) FROM $join WHERE p.permissao = '$permissao' AND t.tipo = '$tipo' ");

        if ($result->num_rows > 0) {
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
    function UserLogin(string $user, string $senha): array
    {
        $join = "usuario as u LEFT JOIN tipo_usuario as t ON u.tipo_usuario_ID = t.ID";
        $select = "u.ID, u.nome, t.tipo";
        $sql = "SELECT $select FROM $join WHERE ( u.email = ? OR u.cpf = ? ) AND u.senha = ? AND u.ativo = 1";
        $stmt = $this->dataBase->prepare($sql);
        $stmt->bind_param("sss", $user, $user, $senha);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if ($row == []) {
            throw new \App\Exceptions\UsuarioNaoEncontradoException();
        }

        return $row;
    }
    public function INSERT_horario($id_estagiario, $demandaWeb)
    {
        if($this->hasDemanda($id_estagiario)){
            $this->dataBase->query("DELETE FROM horario_estagiario WHERE estagiario_usuario_ID = $id_estagiario");
        }
        $guia = $demandaWeb['guia'];
        $observacao = $demandaWeb['observacao'];
        $sqlDemanda = "UPDATE estagiario SET hasDemanda = 1, guia_matricula = '$guia', observacao =  '$observacao'
        WHERE usuario_ID = $id_estagiario";
        $demanda = $this->dataBase->query($sqlDemanda);
        if (!(empty($demandaWeb['horarios']))) {
            foreach ($demandaWeb['horarios'] as $horario) {
                    $sql = "INSERT INTO horario_estagiario (dia_semana, turno, estagiario_usuario_ID) VALUES (
                    '$horario[0]',
                    '$horario[1]',
                    '$id_estagiario'
                )";
                $this->dataBase->query($sql);   
            }
        }
        return $demanda;
    }
    public function hasDemanda($id)
    {
        $sql = "SELECT hasDemanda FROM estagiario WHERE usuario_ID = $id";
        $result = $this->dataBase->query($sql);
        $row = $result->fetch_assoc();
        if ($row['hasDemanda'] == 1) {
            return true;
        }

        return false;
    }
    public function listarUsuario($id){
        $result = $this->dataBase->query("SELECT nome,telefone,tipo_usuario_ID FROM usuario WHERE ID <> $id");
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
    }

    
}
