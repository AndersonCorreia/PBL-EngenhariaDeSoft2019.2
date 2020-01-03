<?php

namespace util;

$menuLinks=[//todos os possiveis links do menu, utilizado no layout da area administrativa
    ['link'=>'#' , 'texto'=>'Inicio' ],// texto é o nome que vai estar dentro da tag <a>
    ['link'=>'#' , 'texto'=>'Agendar Visita' ],
    ['link'=>'#' , 'texto'=>'Gerenciar Visitas' ],
    ['link'=>'#' , 'texto'=>'Cadastro de Instituições' ],
    ['link'=>'#' , 'texto'=>'Instituições' ],
    ['link'=>'#' , 'texto'=>'Histórico de Visitas' ],
    ['link'=>'#' , 'texto'=>'Alterar Dados' ],
    ['link'=>'#' , 'texto'=>'Lista de Visitantes' ],
    ['link'=>'#' , 'texto'=>'Resumo da Semana' ],
    ['link'=>'#' , 'texto'=>'Demanda WEB' ],
    ['link'=>'#' , 'texto'=>'Check-in' ],
    ['link'=>'#' , 'texto'=>'Horários dos Estagiários' ],
    ['link'=>'#' , 'texto'=>'Gerenciamento de Visitas' ],
    ['link'=>'#' , 'texto'=>'Relatórios de Agendamentos' ],
    ['link'=>'#' , 'texto'=>'Gerenciamento de Eventos' ],
    ['link'=>'#' , 'texto'=>'Cadastrar Usuário' ],
    ['link'=>'#' , 'texto'=>'Gerenciar Usuários' ],
    ['link'=>'#' , 'texto'=>'Histórico de Atividades' ],
    ['link'=>'#' , 'texto'=>'Realizar Backup' ],
    ['link'=>'#' , 'texto'=>'Gerenciar Permissões' ]
];
/**
 * Retorna array com informações (link e texto para a tag <a> ) para o menu do layout geral de telas,
 * apartir de um array de permissões do usuario, e o tipo do usuario 
 * para paginas que não tem permissoes especificas.
 *
 * @param array $arrayPermissoes array de permissões do usuario
 * @param string $tipoUsuario tipo do usuario para paginas especificas de determinado tipo de usuario, por exemplo Demanda web para estagiario
 * @return array array com os campos link e texto para o menu do layout geral do sistema
 */
function getMenuLinksByPermissoes($arrayPermissoes, $tipoUsuario="Visitante"){

}

//função para testes excluir posteriomente
function getMenuLinks(){
    return $menuLinks;
}