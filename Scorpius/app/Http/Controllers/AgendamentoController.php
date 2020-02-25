<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Instituicao;
use App\Model\Visita;
use App\Model\Professor_instituicao;
use App\DB\PessoaDAO;
use App\DB\Professor_InstituicaoDAO;
use App\DB\VisitaDAO;
use App\DB\TurmaDAO;
use App\Model\AgendamentoInstitucional;

require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class AgendamentoController extends Controller{   

    public function confirmacaoAgendamento($id,$status){
      
        $retorno=(new VisitaDAO())->confirmaAgendamento($id,$status);
        return redirect()->route("dashboard.show");
    }

    public function confirmaAgendamentoInstituicao($id,$status){
      
        $retorno=(new VisitaDAO())->confirmaAgendamentoInstituicao($id,$status);
        return redirect()->route("dashboard.show");
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
            if(count($array)<11){
                $v->preencherArrayForCalendario($array, "btn-danger");
            }
        }
        $dataFinalReal= new \DateTime($array["datas"]["dataLimite"]);
        $dataFinalReal->sub(new \DateInterval("P1D"));
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
        $exposicoes = [];
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
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
        $exposicoes = [];
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
        $tipoAtividade ="exposições";
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => Visita::getBtnClasses(),
            'tipoUserLegenda'=> $visitante,
            'tipoAtividade' => $tipoAtividade,
            $tipoAtividade => $exposicoes
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoAtividadeDiferenciada(){

        $tipoAtividade ="atividade-diferenciada";
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'tipoAtividade' => $tipoAtividade,
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }
    public function agendamentoNoturno(){
        
        Visita::setCorIndisponivel('btn-danger');
        $array = $this->getVisitas("noturno", "now", "anterior");

        $atividades = [];
        for($i=0 ; $i<1 ; $i++){
            $atividades[]= ["titulo"=> "Telescopio", "descrição" => "Observação do céu noturno"];
        }

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
    public function agendarInstituicao(){
        //ID	Visita	Data_Agendamento	Status	turma_ID	instituicao_ID
        //não terminado
        $dados = [
            //'visita' => $id_visita,
            'dataAgendamento' => $_POST['data'],
            'status' => 1,
            'turmaID' => $id_turma,
            'instituicaoID' => $id_instituicao
        ];
        $agendamento = new Agendamento();
        $agendamento->novoAgendamento($dados);
        return redirect()->route('AgendarDiurnoInstituição.show');
    }

    /**
     * Cadastrar novo agendamento de uma conta usuário visitante normal
     * inserir dados do agendamento pelo POST na classe agendamento, que chama o método de
     * inserir no banco de dados
     * @return void
     */
    public function agendarContaIndividual() {
        //dados da tabela	ID	Visita	Data_Agendamento	Status	usuario_ID
        //não terminado
        $id_user = session('ID');
        $dados = [
            //'visita' => $id_visita,
            'dataAgendamento' => $_POST['data'],
            'status' => 1,
            'usuario_ID' => $id_user 
        ];
        $agendamento = new Agendamento();
        $agendamento->novoAgendamento($dados);
        return redirect()->route('AgendarDiurnoVisitante.show');
    }
}
