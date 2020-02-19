<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Instituicao;
use App\Model\Visita;
use App\Model\Professor_instituicao;
use App\DB\PessoaDAO;
use App\DB\VisitaDAO;
use App\Model\AgendamentoInstitucional;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class UserController extends Controller{   

    function getDashboard(){
        //para testes
        $visitas= [];
        $agen = new \App\Model\AgendamentoInstitucional();
        $visitas[] = new \App\Model\Visita( new \DateTime("26-01-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("25-01-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("27-01-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("27-01-2020"), "noite", "realizada", $agen);
        $visitas[] = new \App\Model\Visita( new \DateTime("29-01-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("30-01-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("31-01-2020"), "noite", "realizada", $agen);
        $visitas[] = new \App\Model\Visita( new \DateTime("03-02-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("04-02-2020"), "noite", "realizada", $agen);
        $visitas[] = new \App\Model\Visita( new \DateTime("05-02-2020"), "tarde", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("06-02-2020"), "manha", "realizada");
        $visitas[] = new \App\Model\Visita( new \DateTime("07-02-2020"), "noite", "realizada", $agen);
        $array = [];

        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }

        $exposicoes = [];
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
        //fim da parte para testes
        $id_user = session('ID',701);
        $erro=null;
        $variaveis=null;
        $registro=null;
        $registro = Visita::listarAgendamentos($id_user);
        $notificacao = Visita::listarNotificacao($id_user);
        $agenda_institucional = Visita::listarAgendamentosInstitucionais($id_user);
        $tipoAtividade ="exposições";
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Entrar na Lista de Espera", "tipo" => "institucional"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'registros' => $registro,
            'notificacoes' => $notificacao,
            'agenda_institucional' => $agenda_institucional,
            'visitas' => $array,
            'legendaCores' => $visitas[0]->getBtnClasses(),
            'tipoUserLegenda'=> $institucional,
            'tipoAtividade' => $tipoAtividade,
            $tipoAtividade => $exposicoes//a tela de escolha das atividades espera um valor dinamico mesmo.
        ];

        return view("Dashboard_visitante.Dashboard_visitante",$variaveis);
    }

    public function confirmacaoAgendamento($id,$status){
      
        $retorno=(new VisitaDAO())->confirmaAgendamento($id,$status);
        return redirect()->route("dashboard.show");
    }



    /**
     * Função para realizar o login do usuario, preencher a sessão com o ID, nome e Tipo do usuario
     *
     * @param [type] $request
     * @return void
     */
    public function login(Request $request){
        $user = $request["e-mail"];
        $senha = $request["senha"];
        $DAO = new PessoaDAO();
        $usuario = $DAO->UserLogin($user, $senha);//lança uma exception se as informações estiverem incorretas

        $request->session()->regenerate();//a documentação falava que era para previnir um ataque chamado "session fixation"
        session(["ID" => $usuario["ID"], "nome" => $usuario["nome"], "tipo" => $usuario["tipo"]]);

        return redirect()->route("dashboard");
    }
    
    /**
     * Função para realizar o login do usuario, preencher a sessão com o ID e nome;
     *
     * @param [type] $request
     * @return void
     */
    public function loginADM(Request $request){
        $user = $request["usuario"];
        $senha = $request["senha"];
        $DAO = new PessoaDAO();
        $usuario = $DAO->UserLogin($user, $senha);//lança uma exception se as informações estiverem incorretas

        $request->session()->regenerate();//a documentação falava que era para previnir um ataque chamado "session fixation"
        session(["ID" => $usuario["ID"], "nome" => $usuario["nome"] ]);

        return redirect()->route("dashboard.adm");
    }
    /**
     * faz o logout do usuario apagando todos os dados da sessão
     *
     * @param [type] $request
     * @return void
     */
    public function logout(Request $request){

        $request->session()->flush();
        return redirect()->route("paginaInicial");
    }

    /**
     * Exibir tela de agendamento de uma instituicao
     *
     * @return void
     */
    public function agendamento(){

        $DAO = new VisitaDAO();
        $dataAtual = now();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));//depois mudar para 1 mes
        $visitas= $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim,true,20);

        $array = [];
        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }

        $exposicoes = [];
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
        //fim da parte para testes
        $tipoAtividade ="exposições";
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Entrar na Lista de Espera", "tipo" => "institucional"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => $visitas[0]->getBtnClasses(),
            'tipoUserLegenda'=> $institucional,
            'tipoAtividade' => $tipoAtividade,
            $tipoAtividade => $exposicoes//a tela de escolha das atividades espera um valor dinamico mesmo.
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoIndividual(){
        $DAO = new VisitaDAO();
        $dataAtual = now();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));//depois mudar para 1 mes
        $visitas= $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim,true,20);
        $array = [];

        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array);
        }

        $exposicoes = [];
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
        //fim da parte para testes
        $tipoAtividade ="exposições";
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => $visitas[0]->getBtnClasses(),
            'tipoUserLegenda'=> $visitante,
            'tipoAtividade' => $tipoAtividade,
            $tipoAtividade => $exposicoes
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }

    public function agendamentoAtividadeDiferenciada(){
        $DAO = new VisitaDAO();
        $dataAtual = now();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));//depois mudar para 1 mes
        $visitas= $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim,true,20);
        $array = [];

        //fim da parte para testes
        $tipoAtividade ="atividade-diferenciada";
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => $visitas[0]->getBtnClasses(),
            'tipoUserLegenda'=> $visitante,
            'tipoAtividade' => $tipoAtividade,
        ];

        return view('telasUsuarios.Agendamentos.agendamento', $variaveis);
    }
    public function agendamentoNoturno(){
        $DAO = new VisitaDAO();
        $dataAtual = now();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));//depois mudar para 1 mes
        $visitas= $DAO->getVistasObjectsByDateInicio_FIM($dataAtual, $dataFim,false,20);
        $array = [];
        \App\Model\Visita::setCorIndisponivel('btn-danger');
        
        foreach ($visitas as $v) {
            $v->preencherArrayForCalendario($array, "btn-danger");
        }
        $atividades = [];
        for($i=0 ; $i<1 ; $i++){
            $atividades[]= ["titulo"=> "Telescopio", "descrição" => "Observação do céu noturno"];
        }
        //fim da parte para testes
        $tipoAtividade = 'atividade';
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Indisponivel", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks(),
            'paginaAtual' => "Agendar Visita",
            'visitas' => $array,
            'legendaCores' => $visitas[0]->getBtnClasses(),
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
