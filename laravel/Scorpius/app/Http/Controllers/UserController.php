<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DB\PessoaDAO;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

class UserController extends Controller{   

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
        //para testes
        $visitas= [];
        $agen = new \App\Model\Agendamento();
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
        $atividades = [];
        
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
        //fim da parte para testes
        $institucional = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Ocupado: Entrar na Lista de Espera", "tipo" => "institucional"];
        $variaveis = [
            'itensMenu' => getMenuLinks("institucional"),
            'paginaAtual' => "Agendar visita",
            'visitas' => $array,
            'legenda' => $visitas[0]->getBtnClasses(),
            'tipoUser'=> $institucional,
            'exposicoes'=> $exposicoes
        ];

        return view('TelasUsuarios.agendamento', $variaveis);
    }

    public function agendamentoIndividual(){
        //para testes
        $visitas= [];
        $agen = new \App\Model\Agendamento();
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
        $atividades = [];
        
        for($i=0 ; $i<6 ; $i++){
            $exposicoes[]= ["titulo"=> "exposicao$i", "descrição" => "exp do TEMA: Y"];
        }
        //fim da parte para testes
        $visitante = ["leg.disponivel" => "Disponível", "leg.indisponivel" => "Disponível: (havera visita escolar)", "tipo" => "visitante"];
        $variaveis = [
            'itensMenu' => getMenuLinks("visitante"),
            'paginaAtual' => "Agendar visita",
            'visitas' => $array,
            'legenda' => $visitas[0]->getBtnClasses(),
            'tipoUser'=> $visitante,
            'exposicoes'=> $exposicoes
        ];

        return view('TelasUsuarios.agendamento', $variaveis);
    }

    //inserir dados do agendamento pelo POST na classe e no banco de dados
    public function agendarInstituicao(){

        
    }

    //inserir dados do agendamento pelo POST na classe e no banco de dados
    public function agendarContaIndividual(){

        
    }
}
