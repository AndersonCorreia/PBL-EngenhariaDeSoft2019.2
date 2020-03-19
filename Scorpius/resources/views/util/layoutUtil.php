<?php

require_once __DIR__."/../../../app/DB/PessoaDAO.php";
function getMenuLinksAll(){
    return [//todos os possiveis links do menu, utilizado no layout da area administrativa
        'inicio'=>          ['link'=>route("dashboard") , 'texto'=>'Inicio' ],// texto é o nome que vai estar dentro da tag <a>
        'AgendarDiurnoIns'=>['link'=>route('AgendarDiurnoInstituição.show') , 'texto'=>'Exposições Diurnas - Instituição' ],
        'AgendarDiurnoVis'=>['link'=>route('AgendarDiurnoVisitante.show') , 'texto'=>'Exposições Diurnas - Individual' ],
        'AgendarNoturno'=>  ['link'=>route('AgendarNoturno.show') , 'texto'=>'Atividades Noturnas' ],
        'AgendarAtividade'=>['link'=>route('AgendarAtividade.show') , 'texto'=>'Atividades Diferenciadas' ],
        'collapseAgend' =>  ['texto'=> 'Agendar Visita', 'itens' => array() ],
        'institucional0'=>  ['link'=>route('instituição.show') , 'texto'=>'Ver Instituições Vínculadas' ],
        'institucional1'=>  ['link'=>route('CadastroIntituição.show') , 'texto'=>'Cadastrar Instituição' ],
        'institucional2'=>  ['link'=>route('turma.index'), 'texto'=>'Turmas' ],
        'visitante0'=>      ['link'=>route('HistoricoDeVisitas.show'), 'texto'=>'Histórico de Visitas' ],
        'visitante1'=>      ['link'=>route('DetalhamentoDeVisitas.show'), 'texto'=>'Detalhamento Das Proximas Visitas' ],
        'alterarDados'=>    ['link'=>route('alterarDados.show') , 'texto'=>'Alterar Meus Dados' ],
        'demanda web'=>     ['link'=>route('demandaWeb.show') , 'texto'=>'Demanda WEB' ],
        'realizar check-in'=>                   ['link'=>route('checkinVisitas') , 'texto'=>'Check-in' ],
        'designar horários para estagiarios'=>  ['link'=>route('telaGerenciamentoDehorarios.show') , 'texto'=>'Horários dos Estagiários' ],
        'gerenciamento de visitas'=>            ['link'=>route("telaGerenciamentoDeVisitas.show") , 'texto'=>'Gerenciamento de Visitas' ],
        'relatorio dos agendamentos'=>          ['link'=>route("telaRelatorioVisitasAgendadas.show") , 'texto'=>'Relatórios de Agendamentos' ],
        'cadastrar e modificar atividades'=>    ['link'=>route("telaGerenciamentoDeEventos.show") , 'texto'=>'Gerenciamento de Eventos' ],
        'criar usuarios'=>                      ['link'=>'#' , 'texto'=>'Cadastrar Usuário' ],
        'gerenciar usuarios'=>                  ['link'=>'#' , 'texto'=>'Gerenciar Usuários' ],
        'ver confiabilidade das instituições'=> ['link'=>'#' , 'texto'=>'Confiabilidade das instituições' ],
        'ver log de atividade'=>                ['link'=>'#' , 'texto'=>'Histórico de Atividades' ],
        'realizar backup'=>                     ['link'=>route('backup') , 'texto'=>'Realizar Backup' ],
        'gerenciar permissões'=>                ['link'=>'#' , 'texto'=>'Gerenciar Permissões' ]//creio que seria melhor ser permissão apenas para o adm
    ];
}
/**
 * Retorna array com informações (link e texto para a tag <a> ) para o menu do layout geral de telas,
 * apartir de do tipo de usuario. realizar uma consulta ao banco para pegar as permissões
 *
 * @return array array com os campos link e texto para o menu do layout geral do sistema
 */
function getMenuLinks(){
    $menuLinks= getMenuLinksAll();
    $links= [];
    $tipoUsuario = session('tipo');

    $links=[$menuLinks['inicio']];//adcionando o inicio que vale para todos
    if($tipoUsuario=="visitante" || $tipoUsuario=="institucional" || $tipoUsuario=="scorpius"){

        $links['collapseAgend']=$menuLinks['collapseAgend'];
        if( $tipoUsuario=="institucional" || $tipoUsuario=="scorpius" ){
            $links[]=$menuLinks["institucional0"];
            $links[]=$menuLinks["institucional1"];
            $links[]=$menuLinks["institucional2"];
            $links['collapseAgend']['itens'][]=$menuLinks['AgendarDiurnoIns'];
        }
        
        $links['collapseAgend']['itens'][]=$menuLinks['AgendarDiurnoVis'];
        $links['collapseAgend']['itens'][]=$menuLinks['AgendarNoturno'];
        $links['collapseAgend']['itens'][]=$menuLinks['AgendarAtividade'];
        $links[]=$menuLinks['visitante0'];
        $links[]=$menuLinks['visitante1'];
    }
    else {
        $DAO = new App\DB\PessoaDAO;
        $permissoes = $DAO->getPermissoes($tipoUsuario);
        foreach ($permissoes as $value) {
            $links[]=$menuLinks[$value["permissao"]];
        }
    }

    if( $tipoUsuario=="scorpius"){
        $DAO = new App\DB\PessoaDAO;
        $permissoes = $DAO->getPermissoes($tipoUsuario);
        foreach ($permissoes as $value) {
            $links[]=$menuLinks[$value["permissao"]];
        }
    }
    
    $links[]=$menuLinks['alterarDados'];
    
    return $links;
};