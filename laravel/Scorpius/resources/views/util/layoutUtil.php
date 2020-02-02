<?php

require_once __DIR__."/../../../app/DB/PessoaDAO.php";
function getMenuLinksAll(){
    return [//todos os possiveis links do menu, utilizado no layout da area administrativa
        'inicio'=>          ['link'=>'#' , 'texto'=>'Inicio' ],// texto é o nome que vai estar dentro da tag <a>
        'visitante0'=>      ['link'=>'#' , 'texto'=>'Agendar Visita' ],
        'visitante1'=>      ['link'=>'#' , 'texto'=>'Gerenciar Visitas' ],
        'institucional0'=>  ['link'=>'/instituicao/cadastro' , 'texto'=>'Cadastro de Instituições' ],
        'institucional1'=>  ['link'=>'/instituicao' , 'texto'=>'Instituições' ],
        'institucional2'=>  ['link'=>'#' , 'texto'=>'Turmas' ],
        'visitante2'=>      ['link'=>'#' , 'texto'=>'Histórico de Visitas' ],
        'visitante3'=>      ['link'=>'#' , 'texto'=>'Alterar Dados' ],
        'estagiario0'=>     ['link'=>'#' , 'texto'=>'Lista de Visitantes' ],
        'estagiario1'=>     ['link'=>'#' , 'texto'=>'Resumo da Semana' ],
        'estagiario2'=>     ['link'=>'#' , 'texto'=>'Demanda WEB' ],
        'realizar check-in'=>                   ['link'=>'#' , 'texto'=>'Check-in' ],
        'designar horários para estagiarios'=>  ['link'=>'#' , 'texto'=>'Horários dos Estagiários' ],
        'gerenciamento de visitas'=>            ['link'=>'#' , 'texto'=>'Gerenciamento de Visitas' ],
        'relatorio dos agendamentos'=>          ['link'=>'#' , 'texto'=>'Relatórios de Agendamentos' ],
        'cadastrar e modificar atividades'=>    ['link'=>'#' , 'texto'=>'Gerenciamento de Eventos' ],
        'criar usuarios'=>                      ['link'=>'#' , 'texto'=>'Cadastrar Usuário' ],
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
 * @param string $tipoUsuario tipo do usuario para paginas especificas de determinado tipo de usuario, por exemplo Demanda web para estagiario
 * @return array array com os campos link e texto para o menu do layout geral do sistema
 */
function getMenuLinks(String $tipoUsuario="visitante"){
    $menuLinks= getMenuLinksAll();
    $tipoUsuario = strtolower($tipoUsuario);
    $links=[$menuLinks['inicio']];//adcionando o inicio que vale para todos

    if($tipoUsuario=="visitante" || $tipoUsuario=="institucional"){
        $links[]=$menuLinks['visitante0'];
        $links[]=$menuLinks['visitante1'];

        if( $tipoUsuario=="institucional" ){
            $links[]=$menuLinks["institucional0"];
            $links[]=$menuLinks["institucional1"];
            $links[]=$menuLinks["institucional2"];
        }
        $links[]=$menuLinks['visitante2'];
        $links[]=$menuLinks['visitante3'];
    }
    else {
        if($tipoUsuario=="estagiario"){
            $links[]=$menuLinks["estagiario0"];
            $links[]=$menuLinks["estagiario1"];
            $links[]=$menuLinks["estagiario2"];
        }

        $DAO = new \PessoaDAO;
        $permissoes = $DAO->getPermissoes($tipoUsuario);

        foreach ($permissoes as $value) {
            $links[]=$menuLinks[$value["permissao"]];
        }
    }

    return $links;
};