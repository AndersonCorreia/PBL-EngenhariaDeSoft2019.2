<?php

//Rota dashboard estagiario

//Rota Dashboard do Funcionário.
Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/dashboardFuncionario', 'DashboardController@getTelaDashboardFuncionario')->name("dashboardFuncionario.show");
    }
);

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/gerenciamentoDeVisitas', 'VisitaController@getTelaGerenciarVisita')->name("telaGerenciamentoDeVisitas.show");
        Route::post('/gerenciamentoDeVisitas/confirmarAgendamento', 'VisitaController@confirmaAgendamento')->name("confirmaAgendamento");
        Route::post('/gerenciamentoDeVisitas/cancelarAgendamento', 'VisitaController@cancelaAgendamento')->name("cancelaAgendamento");
        Route::post('/gerenciamentoDeVisitas/escolherListaEspera', 'VisitaController@escolherListaEspera')->name("escolheListaEspera");

    }
);

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::post('/confirmacaoHorario/statusPeriodo', 'HorarioController@alterarPermissao')->name("alterarStatusPeriodo");
        Route::post('/confirmacaoHorario/definirPeriodoVisita', 'HorarioController@periodoVisita')->name("definirPeriodoVisita");
        Route::get('/confirmacaoHorario/consultaPermissao', 'HorarioController@consultaPermissao')->name("consultaPermissao");
        Route::get('/confirmacaoHorario', 'HorarioController@getTelaHorarioEstagiario')->name("telaGerenciamentoDehorarios.show");
        Route::get('/confirmacaoHorario/{id}', 'HorarioController@getProposta')->name("retornaProposta");
        Route::get('/confirmacaoHorario/horarioConfirmado/{id}', 'HorarioController@getHorarioConfirmado')->name("retornaHorarioConfirmado");
        Route::get('/confirmacaoHorario/erro','HorarioController@nenhumaProposta')->name("errorNenhumaProposta.show");
        Route::post('/confirmacaoHorario', 'HorarioController@enviaHorario')->name("enviaHorario");
        Route::get('/confirmacaoHorario/downloadGuiaMatricula/{id}', 'HorarioController@download')->name("downloadGuia");
        //Rota para retornar a tela da Proposta de Horário do Estagiário.
    }
);

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::post('/relatorioVisitasAgendadas/buscar-insituicao', 'RelatorioVisitasController@getTelaRelatorioVisitas')->name("buscarInstituicao");
        Route::get('/relatorioVisitasAgendadas', 'RelatorioVisitasController@getTelaRelatorioVisitas')->name("telaRelatorioVisitasAgendadas.show");
        



        //Rotas de checkin
        Route::post('/checkin-visitas/concluir-visita', 'CheckinVisitasController@concluirVisita')->name("concluirVisita");
        Route::post('/checkin-visitas/realizar-checkin-usuario', 'CheckinVisitasController@checkinUsuario')->name("checkinUsuario");
        Route::post('/checkin-visitas/realizar-checkin-aluno', 'CheckinVisitasController@checkinAluno')->name("checkinAluno");
        Route::get('/checkin-visitas', 'CheckinVisitasController@index')->name("checkinVisitas");
    }
);

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/gerenciamentoDeEventos','GerenciamentoDeEventosController@getTelaGerenciamentoDeEventos')->name("telaGerenciamentoDeEventos.show");
        Route::put('/gerenciamentoDeEventos/atualizar/{id}','GerenciamentoDeEventosController@update')->name("atualizarEvento");
        Route::get('/gerenciamentoDeEventos/editar/{id}','GerenciamentoDeEventosController@edit')->name("editarEvento");
        Route::get('/gerenciamentoDeEventos/remove/{id}','GerenciamentoDeEventosController@destroy')->name("removeEvento");
        Route::post('/gerenciamentoDeEventos','GerenciamentoDeEventosController@cadastrar')->name("cadastroEvento");
    }
);

Route::group(
    ['midlleware'=>[],
    'prefix'=>'estagiario',
    'namespace'=>'Estagiario'],
    function(){
        Route::get('/dashboard', 'GeralController@index')->name('dashboardEstagiario.show');
        Route::get('/demandaWeb', 'horarioEstagiarioController@index')->name("demandaWeb.show");
        Route::post('/demandaWeb/enviar-horario', 'horarioEstagiarioController@cadastrarHorario')->name("demandaWeb.post");
    }
);

Route::group(
    ['midlleware'=>[],
    'prefix'=>'adm',
    'namespace'=>'Admin'],
    function(){
        Route::get('/backup', 'BackupController@index')->name('backup');
        Route::post('/realizarBackup', 'BackupController@realizaBackup')->name('realizarBackup');
        
        //Rota de Cadastro de usuarios administrativos do sistema
        Route::get('/admin/cadastro', 'AdminCadastroController@index')->name("cadastroAdm");
        Route::post('/admin/cadastro', 'AdminCadastroController@store')->name("store.post");
        //Rota dashboard adm
        Route::get('/adm/dashboard', 'AdminController@getDashboardAdm')->name('dashboardAdm.show');
        
        Route::get('/gerenciamento/permissoes', 'PermissoesController@index')->name('permissoes.show');
        Route::post('/gerenciamento/permissoes', 'PermissoesController@alterarPermissoes')->name('permissoes.post');
        Route::get('/gerenciamento/permissoes/default', 'PermissoesController@defaultPermissoes')->name('permissoes.default');

    }
);

Route::group(
    ['midlleware'=>[],
    'prefix'=>'adm',
    'namespace'=>'Admin'],
    function(){
        Route::get('/gerenciar-usuarios', 'GerenciarUsuariosController@index')->name('gerenciarUsuarios.show');
        Route::post('/gerenciar-usuarios/alterar-tipo', 'GerenciarUsuariosController@mudarUsuario')->name('gerenciarUsuarios.mudarUsuario');
        Route::post('/gerenciar-usuarios/excluir-usuario', 'GerenciarUsuariosController@excluirUsuario')->name('gerenciarUsuarios.excluirUsuario');
        Route::get('/log', 'LogController@index')->name('logSistema.show');
    }
);

?>