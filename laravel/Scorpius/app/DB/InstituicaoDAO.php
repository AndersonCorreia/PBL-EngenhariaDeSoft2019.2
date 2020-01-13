<?PHP 
namespace App\DB;
require_once __DIR__."/interfaces/DataAccessObject.php";
require_once __DIR__."/../Model/Users/Instituicao.php";//falta inserir as outras classes

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
        $sql = "DELETE FROM instituicao WHERE id = $instituicao->id";
  
        $resultado = $this->dataBase->query($sql);
        return $resultado;
    }
    function SELECT_ALL(String $table="instituicao"){
        return parent::SELECT_ALL($table);// inves de apenas retorna criar os objetos da classe
        //talvez nesse select all não seja util mas os selects de um usuario especifico devem criar o objeto
    }
    /**
     * Undocumented function
     *
     * @return Pessoa
     */
    function SELECTbyCPF(): InstituicaoDAO{

    }
    /**
     * Undocumented function
     *
     * @param string $tipoUsuario
     * @return Array
     */
    function getPermissoes(string $tipoUsuario): Array{
        $join = "permissao p LEFT JOIN tipo_usuario t ON p.tipo_usuario_ID = t.ID";
        $result = $this->dataBase->query("SELECT (permissao) FROM $join WHERE t.nome = '$tipoUsuario'");
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return $array;
    }

}