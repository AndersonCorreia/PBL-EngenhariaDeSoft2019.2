<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Instituicao;
use App\Model\Visita;
use App\Model\Professor_instituicao;
use App\DB\PessoaDAO;
use App\DB\Professor_InstituicaoDAO;
use App\DB\VisitaDAO;
use App\DB\AlunoDAO;
use App\DB\ExposicaoDAO;
use App\DB\TurmaDAO;
use App\Model\AgendamentoInstitucional;
use App\Model\AgendamentoIndividual;
use App\Model\Turma;
use App\DB\AgendamentoInstitucionalDAO;
use App\DB\AgendamentoIndividualDAO;
use App\DB\AgendamentoDAO;

require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class AgendamentoController extends Controller{   

    public function confirmacaoAgendamento(Request $dados){
        $DAO = new AgendamentoDAO();
        $DAO->confirmaAgendamento($dados->nomeTabela,$dados->status,$dados->ID);
        $DAO->contAgendamento("cont_agendamento_cancelado", $dados->user_ID);
        if($dados->nomeTabela == "agendamento_institucional"){
            $DAO->delete_visitante("visitante_institucional","agendamento_institucional_ID",$dados->ID);    
        }else{
            $DAO->delete_visitante("visitante","agendamento_ID",$dados->ID); 
        }
        
        return;
    }

    public function getVisitas($turno, $data, $sentido){

        $DAO = new VisitaDAO();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));
        if($sentido=="anterior"){
            $dataAtual = now();  
        }
        else {
            $dataAtual = $data;
        }
        $visitas= $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim, ($turno=="diurno"), 20);
        $array = [];
        foreach ($visitas as $v) {
            if(count($array)<12){
                $v->preencherArrayForCalendario($array, "btn-danger");
            }
        }
        $dataFinalReal= new \DateTime($array["datas"]["dataLimite"]);
        if ( count($array)>11 ){
            $dataFinalReal->sub(new \DateInterval("P1D"));
        }
        $array["datas"]["dataLimite"] = $dataFinalReal->format("Y-m-d");
        return $array;
    }

    /**
     * Exibir tela de agendamento de uma instituicao
     *
     * @return void
     */
    public function agendamento(){

        $array = $this->getVisitas("diurno", "now", "anterior");
        $DAO = new ExposicaoDAO();
        $exposicoes = $DAO->SELECT_ALL_AtividadePermanente();
        $tipoAtividade ="exposições";
        $instituicoes = (new Professor_InstituicaoDAO)->SELECTbyUsuario_ID(session("ID"));
        $turmas = (new TurmaDAO)->SELECTbyProfessorID(session("ID"));
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Entrar na Lista de Espera", "tipo" => "institucional"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $institucional,
            'tipoAtividade' => $tipoAtividade,
            'instituicoes' => $instituicoes,
            'turmas' => $turmas,
            $tipoAtividade => $exposicoes//a tela de escolha das atividades espera um valor dinamico mesmo.
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoIndividual(){

        $array = $this->getVisitas("diurno", "now", "anterior");
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $visitante
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoAtividadeDiferenciada(){

        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita"
        ];

        return view('telasUsuarios.Agendamentos.agendamentoAtividade', $variaveis);
    }

    public function agendamentoNoturno(){
        
        Visita::setCorIndisponivel('btn-danger');
        $array = $this->getVisitas("noturno", "now", "anterior");

        $atividades = (new ExposicaoDAO())->SELECT_ALL_AtividadePermanente("noturno");
        $tipoAtividade = 'atividade';
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Indisponivel", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $visitante,
            'tipoAtividade' => $tipoAtividade,
            'turno' => 'noturno',
            $tipoAtividade => $atividades
        ];

        return view('telasUsuarios.Agendamentos.agendamentoNoturno', $variaveis);
    }
    /**
     * Cadastrar novo agendamento de uma conta usuário Institucional 
     * inserir dados do agendamento pelo POST na classe agendamento, que chama o método de
     * inserir no banco de dados
     * @return void
     */
    public function agendarInstituicao(Request $request){ 
        $userID = session('ID');
        $instituicaoID = $_POST['instituicao'];
        $TurmaID = $_POST['turma'];
        $data = $_POST['data'];
        $turno = $_POST['turno'];
        $observacao = $_POST['observacoes'];
        $exposicoes = isset( $_POST['exposicoes']) ? isset( $_POST['exposicoes']) : [];
        $responsaveis = $this->getMatrizResponsaveis($_POST['responsavel'], $_POST['cargo']);

        if( isset($_POST['incluirResponsavel']) || $responsaveis===[] ){
            $responsaveis[] = ['nome' => session('nome'), 'cargo' => "usuario que fez o agendamento"];
        }
        $visita = (new VisitaDAO())->SELECTbyData_Turno($data, $turno, true);
        $alunos = (new AlunoDAO())->SELECTbyTurma($TurmaID);
        $professor_instituicaoID = (new Professor_instituicaoDAO())->SELECTbyInstituicaoID_UserID($instituicaoID, $userID)['ID'];
        
        $agendamento = new AgendamentoInstitucional($observacao, $TurmaID, $professor_instituicaoID, $visita);
        $agendamento->setAlunos($alunos);
        $agendamento->setResponsaveis($responsaveis);
        $agendamento->setExposicoes($exposicoes);

        (new AgendamentoInstitucionalDAO)->INSERT($agendamento);
        
        return redirect()->route('dashboard');
    }

    /**
     * Cadastrar novo agendamento de uma conta usuário visitante normal
     * inserir dados do agendamento pelo POST na classe agendamento, que chama o método de
     * inserir no banco de dados
     * @return void
     */
    public function agendarContaIndividual() {
        
        $id_user = session('ID');
        $data = $_POST['data'];
        $turno = $_POST['turno'];
        $visita = (new VisitaDAO())->SELECTbyData_Turno($data, $turno, true);
        $agendamento = new AgendamentoIndividual($id_user, $visita);

        (new AgendamentoIndividualDAO)->INSERT($agendamento);

        return redirect()->route('AgendarDiurnoVisitante.show');
    }

    public function atividadeError(){

        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita"
        ];

        return view('telasUsuarios.Agendamentos.errorNenhumaAtividade',$variaveis);
    }

    public function visitaError(){

        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita"
        ];

        return view('telasUsuarios.Agendamentos.errorNenhumaVisita',$variaveis);
    }

    /**
     * Criar uma matriz dos responsaveis a partir de dois arryas. Em cada linha tera o nome do responsvel
     * no campo nome, e o cargo do ressponsavel no campo cargo;
     *
     * @return void
     */
    private function getMatrizResponsaveis($arrayResp , $arrayCargo){
        $responsaveis = [];

        for ($i=0; $i < count($arrayResp) ; $i++) { 
            $responsaveis[$i] = [ 'nome' => $arrayResp[$i], 'cargo' => $arrayCargo];
        }

        return $responsaveis;
    }
}