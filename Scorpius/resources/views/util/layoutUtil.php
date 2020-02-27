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
        'visitante0'=>      ['link'=>'#', 'texto'=>'Histórico de Visitas' ],
        'visitante1'=>      ['link'=>'/AlterarDadosUsuario' , 'texto'=>'Alterar Meus Dados' ],
        'estagiario0'=>     ['link'=>'#' , 'texto'=>'Lista de Visitantes' ],
        'estagiario1'=>     ['link'=>'#' , 'texto'=>'Resumo da Semana' ],
        'demanda web'=>     ['link'=>route('demandaWeb.show') , 'texto'=>'Demanda WEB' ],
        'realizar check-in'=>                   ['link'=>'#' , 'texto'=>'Check-in' ],
        'designar horários para estagiarios'=>  ['link'=>route('telaGerenciamentoDehorarios.show') , 'texto'=>'Horários dos Estagiários' ],
        'gerenciamento de visitas'=>            ['link'=>'#' , 'texto'=>'Gerenciamento de Visitas' ],
        'relatorio dos agendamentos'=>          ['link'=>'#' , 'texto'=>'Relatórios de Agendamentos' ],
        'cadastrar e modificar atividades'=>    ['link'=>'#' , 'texto'=>'Gerenciamento de Eventos' ],
        'criar usuarios'=>                      ['link'=>route("CadastroUsuario.show") , 'texto'=>'Cadastrar Usuário' ],
        'gerenciar usuarios'=>                  ['link'=>'#' , 'texto'=>'Gerenciar Usuários' ],
        'ver confiabilidade das instituições'=> ['link'=>'#' , 'texto'=>'Confiabilidade das instituições' ],
        'ver log de atividade'=>                ['link'=>'#' , 'texto'=>'Histórico de Atividades' ],
        'realizar backup'=>                     ['link'=>'#' , 'texto'=>'Realizar Backup' ],
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
    if($tipoUsuario=="visitante" || $tipoUsuario=="institucional"){

        $links['collapseAgend']=$menuLinks['collapseAgend'];
        if( $tipoUsuario=="institucional" ){
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
        if($tipoUsuario=="estagiario"){
            $links[]=$menuLinks["estagiario0"];
            $links[]=$menuLinks["estagiario1"];
        }
        $DAO = new App\DB\PessoaDAO;
        $permissoes = $DAO->getPermissoes($tipoUsuario);
        foreach ($permissoes as $value) {
            $links[]=$menuLinks[$value["permissao"]];
        }
    }
    
    return $links;
};