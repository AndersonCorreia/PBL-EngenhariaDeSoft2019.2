<?PHP 
namespace App\DB;
use App\Model\Instituicao;

/**
 * Classe para fornecer um Objeto de Acesso aos Dados( DAO) relacionados a classe Instituicao.
 */
class DashFuncionarioDAO extends \App\DB\interfaces\DataAccessObject {

    public function __Construct(){
        parent::__Construct("visitante");
    }

    public function SELECT_ALUNOS()
    {
        $result = $this->dataBase->query("SELECT * FROM visitante_institucional");
        $visitanteInst = $result->fetch_all();

        $visitanteInstFinal = array();
        $agendamentoChecados = array();
        foreach($visitanteInst as $visitante){
            # 0 = ID | 1 = nome | 2 = status_checkin | 3 = idade | 4 = agendamento_ID
            if(!in_array($visitante[4], $agendamentoChecados)){
                $agendamentoChecados[] = $visitante[4];
                $idAgendamento = $visitante[4];
                $result = $this->dataBase->query("SELECT visita, professor_instituicao_ID FROM agendamento_institucional WHERE ID = {$idAgendamento} AND status = 'confirmado'");
                $row = $result->fetch_assoc();
                $idVisita = $row['visita'];
                $idProfessorInstituicao = $row['professor_instituicao_ID'];
                $result = $this->dataBase->query("SELECT data_visita, turno, ID FROM visita WHERE ID = {$idVisita} AND status = 'não realizada'");
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $dataVisita = $row['data_visita'];
                    $turno = $row['turno'];
                    $visita_ID = $row['ID'];
                    $alunos = array();
                    foreach($visitanteInst as $aluno){
                        if($aluno[4] == $idAgendamento){
                            $alunos[] = $aluno;
                        }
                    }
                    $result = $this->dataBase->query("SELECT instituicao_ID, usuario_ID FROM professor_instituicao WHERE ID = $idProfessorInstituicao");
                    $row = $result->fetch_assoc();
                    $IDinstituicao = $row['instituicao_ID'];
                    $IDprofessor = $row['usuario_ID'];
                    $result = $this->dataBase->query("SELECT nome FROM usuario WHERE ID = $IDprofessor");
                    $row = $result->fetch_assoc();
                    $professor = $row['nome'];
                    $result = $this->dataBase->query("SELECT nome FROM instituicao WHERE ID = $IDinstituicao");
                    $row = $result->fetch_assoc();
                    $instituicao = $row['nome'];
                    
                    $visitanteInstFinal[] = [
                        'agendamento_ID' => $idAgendamento,
                        'data' => $dataVisita,
                        'turno' => $turno,
                        'professor' => ['ID'=> $IDprofessor, 'nome'=> $professor],
                        'instituicao' => ['ID'=> $IDinstituicao, 'nome'=> $instituicao],
                        'aluno' => $alunos,
                        'visita_ID' => $visita_ID
                    ];
                }
            }
        }
        return $visitanteInstFinal;
    }
    public function SELECT_USUARIOS()
    {
        $result = $this->dataBase->query("SELECT * FROM visitante");
        $visitanteInst = $result->fetch_all();

        $visitanteInstFinal = array();
        // $agendamentoChecados = array();
        foreach($visitanteInst as $visitante){
            # 0 = ID | 1 = nome | 2 = status_checkin | 3 = idade | 4 = RG| 5 = agendamento_ID
            // if(!in_array($visitante[5], $agendamentoChecados)){
                // $agendamentoChecados[] = $visitante[5];
                $idAgendamento = $visitante[5];
                $result = $this->dataBase->query("SELECT visita FROM agendamento WHERE ID = {$idAgendamento} AND status = 'confirmado'");
                $row = $result->fetch_assoc();
                $idVisita = $row['visita'];
                $result = $this->dataBase->query("SELECT data_visita, turno, ID FROM visita WHERE ID = {$idVisita} AND status = 'não realizada'");
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    // dd($row);
                    $dataVisita = $row['data_visita'];
                    $turno = $row['turno'];
                    $visita_ID = $row['ID'];
                    $usuario = $visitante;
                    $visitanteInstFinal[] = [
                        'agendamento_ID' => $idAgendamento,
                        'data' => $dataVisita,
                        'turno' => $turno,
                        'usuario' => $usuario,
                        'visita_ID' => $visita_ID
                    ];
                // }
            }
        }
        return $visitanteInstFinal;

    }

    public function UPDATE_STATUS_ALUNO($ID, $status)
    {
        $visiID = intval($ID);
        return $this->dataBase->query("UPDATE visitante_institucional SET status_Checkin = '$status' WHERE ID = $visiID");
    }
    public function UPDATE_STATUS_USUARIO($ID, $status)
    {
        $visiID = intval($ID);
        return $this->dataBase->query("UPDATE visitante SET status_Checkin = '$status' WHERE ID = $visiID");
    }

    public function UPDATE_VISITA($ID, $status)
    {   
        $visiID = intval($ID);
        return $this->dataBase->query("UPDATE visita SET status = '$status' WHERE ID = $visiID");
    }

    public function INSERT(object $object): bool{
        // return;
    }

    public function UPDATE(object $object): bool{
        // return;
    }
   


}