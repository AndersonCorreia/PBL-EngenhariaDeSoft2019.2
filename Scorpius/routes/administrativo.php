<?php

//Rota dashboard estagiario
Route::get('/estagiario/dashboard', 'Visitante.UserController@getDashboard')->name('dashboardEstagiario.show');

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
        Route::get('/gerenciamentoDeVisitas', 'VisitaController@getTelaVisita')->name("telaGerenciamentoDeVisitas.show");
    }
);

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/confirmacaoHorario', 'HorarioController@getTelaHorarioEstagiario')->name("telaGerenciamentoDehorarios.show");
        Route::get('/confirmacaoHorario/{id}', 'HorarioController@getProposta')->name("retornaProposta");
        Route::get('/confirmacaoHorario/erro','HorarioController@nenhumaProposta')->name("errorNenhumaProposta.show");
        Route::post('/confirmacaoHorario', 'HorarioController@enviaHorario')->name("enviaHorario");
        //Rota para retornar a tela da Proposta de Horário do Estagiário.
    }
);

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
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
    }
);

?>