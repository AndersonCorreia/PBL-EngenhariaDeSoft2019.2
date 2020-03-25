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
        parent::__Construct("usuario");
    }

    function INSERT($pessoa): bool
    {
        $nome = $pessoa->getNome();
        $senha = $pessoa->getSenha();
        $tipo_usuario = $pessoa -> getTipo();
        $email = $pessoa -> getEmail();
        $cpf = $pessoa -> getCPF();
        $telefone = $pessoa -> getTelefone();


        $campos = "(nome, senha, tipo_usuario_ID, email, cpf, telefone, ativo)";
        $values = "('$nome', '$senha', '$tipo_usuario', '$email', '$cpf', '$telefone', '1')";
        $sql = "INSERT INTO usuario $campos VALUES $values";

        $stmt = $this->dataBase->prepare($sql);
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
        $result = $this->dataBase->query("SELECT * FROM usuario WHERE ID <> $id AND tipo_usuario_ID <> 6 AND tipo_usuario_ID <> 7");
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function getTipos(){

        $sql = "SELECT * FROM tipo_usuario WHERE tipo != 'visitante' AND tipo != 'institucional'";
        $result = $this->dataBase->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getNomeTipo($tipo_ID)
    {
        $sql = "SELECT tipo FROM tipo_usuario WHERE ID = $tipo_ID";
        $result = $this->dataBase->query($sql);

        return $result->fetch_assoc()['tipo'];
    }
    public function setTipo($usuario_alterado_ID, $tipo_ID, $tipo_nome)
    {
        $sql = "UPDATE usuario SET tipo_usuario_ID = $tipo_ID WHERE ID = $usuario_alterado_ID";
        $resultTipo = $this->dataBase->query($sql);
        $ID_usuario = intval(session('ID'));
        $nome_modificador = $this->dataBase->query("SELECT nome FROM usuario WHERE ID = $ID_usuario")->fetch_assoc()['nome'];  
        $nome_alterado = $this->dataBase->query("SELECT nome FROM usuario WHERE ID = $usuario_alterado_ID")->fetch_assoc()['nome'];
        $msg = /*$nome_modificador.*/'Alterou o tipo de usuario de "' .$nome_alterado. '" para '.$tipo_nome;
        $result = $this->dataBase->query("SELECT ID FROM acoes WHERE atividade = '$msg'");
        if($result->num_rows < 1){
            $this->dataBase->query("INSERT INTO acoes (atividade) VALUES ('$msg')");
            $acoes_ID = intval($this->getLastID());
        }else{
            $acoes_ID = $result->fetch_assoc()['ID'];
        }
        date_default_timezone_set('America/Bahia');
        $data = date('Y-m-d');
        $hora = date('H:i:s');
        $datahora = $data.' '. $hora;
        $this->dataBase->query("INSERT INTO log (datahora, acoes_ID, usuario_made_ID, usuario_affected_ID) VALUES (
            '$datahora',
            $acoes_ID,
            $ID_usuario,
            $usuario_alterado_ID
        )");
        return $resultTipo;
    }
    public function logSistema(){
        $sql = "SELECT log.*, usuario.nome FROM log, usuario WHERE usuario.ID = usuario_made_ID";
        $logs = $this->dataBase->query($sql)->fetch_all(MYSQLI_ASSOC);
        $sql = "SELECT * FROM acoes";
        $acoes = $this->dataBase->query($sql)->fetch_all(MYSQLI_ASSOC);
        $logSistema = [
            'log' => $logs,
            'acoes' => $acoes
        ];
        return $logSistema;
    }
    public function getNomeUsuario($ID){
        $sql = "SELECT nome FROM usuario WHERE ID = $ID";
        return $this->dataBase->query($sql)->fetch_assoc()['nome'];
    }
    /**
     * Retorna todas as permissões do sistema;
     *
     * @return Array com todas as permissoes do sistema
     */
    public function getPermissoesAll(): array
    {
        $result = $this->dataBase->query("SELECT * FROM permissao");
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }
    
    /**
     * Retorna todas as permissões dos sistema relacionadas com o tipo de usuario;
     *
     * @return Array
     */
    public function getPermissoes_tipoAll(): array
    {
        $result = $this->dataBase->query("SELECT * FROM permissao_tipo");
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }
    /**
     * Deletar todas as permissões anteriores e adcionar as novas permissões vindas de um array.
     *
     * @param array $permissoesTipo permissoes atuais que seram inseridas no sistema
     * @return void
     */
    public function setPermissoes( array $permissoesTipo, string $msg){

        $this->dataBase->autocommit(false);

        $this->dataBase->query("DELETE FROM permissao_tipo");

        foreach($permissoesTipo as $pt){
            $sql = "INSERT INTO permissao_tipo (permissao_ID, tipo_usuario_ID) VALUES (?, ?)";
            $stmt = $this->dataBase->prepare($sql);
            $stmt->bind_param("ii", $pt['permissao_ID'], $pt['tipo_ID']);
            $stmt->execute();
        }
        $this->INSERT_log($msg);

        $this->dataBase->commit();
    }

    private function INSERT_log(string $msg, int $userAfetado=null){

        $this->dataBase->query("INSERT IGNORE INTO acoes (atividade) VALUES ('$msg')");

        $campos = "(datahora, acoes_ID, usuario_made_ID,usuario_affected_ID)";
        $now = now();
        $user = session("ID");
        $userAfetado = $userAfetado ?? $user;//por causa da chave estrangeira não consigo inserir valor nulo
        $select = " SELECT '$now', ID, '$user', '$userAfetado' FROM acoes WHERE atividade = '$msg'";
        $this->dataBase->query("INSERT INTO log $campos $select");

    }
}
