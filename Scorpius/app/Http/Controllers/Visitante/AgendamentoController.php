<?php

namespace App\Http\Controllers\Visitante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Instituicao;
use App\Model\Visita;
use App\Model\Professor_instituicao;
use App\DB\PessoaDAO;
use App\DB\Professor_InstituicaoDAO;
use App\DB\VisitaDAO;
use App\DB\UsuarioDAO;
use App\DB\AlunoDAO;
use App\DB\ExposicaoDAO;
use App\DB\TurmaDAO;
use App\Model\AgendamentoInstitucional;
use App\Model\AgendamentoIndividual;
use App\Model\Turma;
use App\DB\AgendamentoInstitucionalDAO;
use App\DB\AgendamentoIndividualDAO;
use App\DB\AgendamentoDAO;

class AgendamentoController extends Controller{   

    private $limiteAgendamento = 2;

    public function confirmacaoAgendamento(Request $dados){
        $DAO = new AgendamentoInstitucionalDAO();
        $DAO->confirmaAgendamento($dados->nomeTabela,$dados->status,$dados->ID);
        $DAO->contAgendamento("cont_agendamento_cancelado", $dados->user_ID);
        if($dados->nomeTabela == "agendamento_institucional"){
            $DAO->delete_visitante("visitante_institucional","agendamento_institucional_ID",$dados->ID);    
        }else{
            $DAO->delete_visitante("visitante","agendamento_ID",$dados->ID); 
        }
        
        return;
    }

    public function getVisitas($turno, $data, $sentido, $tipo = 'institucional'){

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
                $v->preencherArrayForCalendario($array, $tipo);
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
        
        $userID = session("ID");
        $agendamentos = (new AgendamentoInstitucionalDAO)->SELECT_VisitaInstitucionalByUserID($userID);
        if ( count($agendamentos) > $this->limiteAgendamento){
            throw new \App\Exceptions\LimiteAgendamentosException();
        }

        $array = $this->getVisitas("diurno", "now", "anterior");
        $tipoAtividade ="exposições";
        $exposicoes = (new ExposicaoDAO())->SELECT_ALL_AtividadePermanente();
        $legenda = "(Limite de 3 Agendamentos Institucionais ativos no mesmo período )";
        $instituicoes = (new Professor_InstituicaoDAO)->SELECTbyUsuario_ID($userID);
        $turmas = (new TurmaDAO)->SELECTbyProfessorID($userID);
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Entrar na Lista de Espera", "tipo" => "institucional"];
        $variaveis = [
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $institucional,
            'tipoAtividade' => $tipoAtividade,
            'legenda' => $legenda,
            'instituicoes' => $instituicoes,
            'turmas' => $turmas,
            'agendamentos' => $agendamentos,
            $tipoAtividade => $exposicoes//a tela de escolha das atividades espera um valor dinamico mesmo.
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoIndividual(){

        $userID = session("ID");
        $agendamentos = (new AgendamentoIndividualDAO)->SELECT_VisitaIndividualByUserID($userID, '>=', '!=');
        if ( count($agendamentos) > $this->limiteAgendamento){
            throw new \App\Exceptions\LimiteAgendamentosException();
        }

        $array = $this->getVisitas("diurno", "now", "anterior", "visitante");
        $tipoAtividade ="exposições";
        $exposicoes = (new ExposicaoDAO())->SELECT_ALL_AtividadePermanente();
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $visitante,
            'tipoAtividade' => $tipoAtividade,
            'agendamentos' => $agendamentos,
            $tipoAtividade => $exposicoes//a tela de escolha das atividades espera um valor dinamico mesmo.
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoAtividadeDiferenciada(){

        $variaveis = [
            'paginaAtual' => "Agendar Visita",
            'atividades'  => (new ExposicaoDAO())->SELECT_ALL_AtividadeDiferenciadaHasImg()
        ];

        return view('telasUsuarios.Agendamentos.agendamentoAtividade', $variaveis);
    }

    public function agendamentoNoturno(){
        
        $userID = session("ID");
        $agendamentos = (new AgendamentoIndividualDAO)->SELECT_VisitaIndividualByUserID($userID);
        if ( count($agendamentos) > $this->limiteAgendamento){
            throw new \App\Exceptions\LimiteAgendamentosException();
        }

        Visita::setCorIndisponivel('btn-danger');
        $array = $this->getVisitas("noturno", "now", "anterior", "visitante");

        $atividades = (new ExposicaoDAO())->SELECT_ALL_AtividadePermanente("noturno");
        $legenda = "(Limite de 3 Agendamentos noturnos ativos no mesmo período )";
        $tipoAtividade = 'atividade';
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Indisponivel", "tipo" => "visitante"];
        $variaveis = [
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $visitante,
            'tipoAtividade' => $tipoAtividade,
            'agendamentos' => $agendamentos,
            'legenda' => $legenda,
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
        $exposicoes = isset( $_POST['exposicoes']) ? $_POST['exposicoes'] : [];
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
     * Cadastrar novo agendamento de uma conta individual
     * Inserir dados do agendamento pelo POST na classe agendamento, que chama o método de
     * inserir no banco de dados
     * @return void
     */
    public function agendarContaIndividual(Request $request) {
        $id_user = session('ID');
        $data = $_POST['data'];
        $turno = $_POST['turno'];
        $exposicoes = isset( $_POST['exposicoes']) ? $_POST['exposicoes'] : null;
        $visita = (new VisitaDAO())->SELECTbyData_Turno($data, $turno, true);
        $visitantes = $this->getMatrizVisitantes($_POST['visitante'], $_POST['idade'], $_POST['RG']);
        
        $agendamento = new AgendamentoIndividual($id_user, $visita);
        $agendamento->setVisitantes($visitantes);        
        $agendamento->setExposicoes($exposicoes);

        (new AgendamentoIndividualDAO)->INSERT($agendamento);

        return redirect()->route('dashboard');
    }

    public function agendarNoturno() {
        
        $id_user = session('ID');
        $data = $_POST['data'];
        $turno = $_POST['turno'];
        $exposicao = isset( $_POST['exposicao']) ? $_POST['exposicao'] : null;
        $visitaDAO = new VisitaDAO();
        $visita = $visitaDAO->SELECTbyData_Turno($data, $turno, true);
        $visitantes = $this->getMatrizVisitantes($_POST['visitante'], $_POST['idade'], $_POST['RG']);
        $qtdVistante = $this->getQtdVisitantesIndividual();
        $limiteVagas = (new ExposicaoDAO())->SELECTbyID($exposicao)['quantidade_inscritos'];
        
        if( ((int)$qtdVistante + count($visitantes)) <= $limiteVagas){
            
            $agendamento = new AgendamentoIndividual($id_user, $visita);
            $agendamento->setVisitantes($visitantes);        
            $agendamento->setExposicaoID($exposicao);

            (new AgendamentoIndividualDAO)->INSERT($agendamento);
    
            return redirect()->route('dashboard');
        }
        else {
            throw new \App\Exceptions\LimiteDeVagasExcedidoException();
        }
    }
    /**
     * Cadastrar novo agendamento para uma atividade diferenciada
     * @return void
     */
    public function agendarAtividadeDiferenciada() {
        //falta terminar
        $id_user = session('ID');
        $data = $_POST['data'];
        $turno = $_POST['turno'];
        $visita = (new VisitaDAO())->SELECTbyData_Turno($data, $turno, true);
        $agendamento = new AgendamentoIndividual($id_user, $visita, $status);

        (new AgendamentoIndividualDAO)->INSERT($agendamento);

        return redirect()->route('dashboard');
    }

    /**
     * Cria uma matriz dos responsaveis a partir de dois arryas. Em cada linha tera o nome do responsavel
     * no campo nome, e o cargo do responsavel no campo cargo;
     *
     * @return void
     */
    private function getMatrizResponsaveis($arrayResp , $arrayCargo){
        $responsaveis = [];

        for ($i=0; $i < count($arrayResp) && $arrayResp[$i] != "" ; $i++) { 
            $responsaveis[$i] = [ 'nome' => $arrayResp[$i], 'cargo' => $arrayCargo[$i] ];
        }

        return $responsaveis;
    }

    /**
     * Cria uma matriz dos visitantes a partir de dois arryas. Em cada linha tera o nome do visitante
     * no campo nome, o RG do visitante no campo RG e a idade do visitante no campo idade;
     *
     * @return void
     */
    private function getMatrizVisitantes($arrayVis , $arrayIdade, $arrayRG){
        $visitantes = [];
        
        for ($i=0; $i <count($arrayVis) ; $i++) { 
            $visitantes[$i] = [ 'nome' => $arrayVis[$i], 'idade' => $arrayIdade[$i], 'RG' => $arrayRG[$i] ];
            
        }
        
        return $visitantes;
    }

    public function getQtdVisitantesIndividual(){

        return "SELECT COUNT (*) 
        FROM visitantes join visita_individual WHERE visita_individual.agendamentoID = visitantes.agendamentoID)";
    
    }
}