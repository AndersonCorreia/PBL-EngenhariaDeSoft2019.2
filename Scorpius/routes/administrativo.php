<?php

//Rota dashboard estagiario
Route::get('/estagiario/dashboard', 'UserController@getDashboard')->name('dashboardEstagiario.show');

//Rota Dashboard do Funcionário.
Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/dashboardFuncionario', 'DashboardController@getTelaDashboardFuncionario')->name("dashboardFuncionario.show");
    }
);

//Rota dashboard adm
Route::get('/adm/dashboard', 'UserController@getDashboardAdm')->name('dashboardAdm.show');

//Rota para retornar a tela de Gerenciamento de Visitas.

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/gerenciamentoDeVisitas', 'VisitaController@getTelaVisita')->name("telaGerenciamentoDeVisitas.show");
    }
);


//Rota de Cadastro de usuarios administrativos do sistema
Route::get('/admin/cadastro', 'AdminCadastroController@index')->name("CadastroUsuario.show");

//Route::post('/admin/cadastro', 'CadastroController@cadastroUsuario')->name("CadastroUsuario.post");


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

Route::post('/checkin-visitas/concluir-visita', 'CheckinVisitasController@concluirVisita')->name("concluirVisita");
Route::post('/checkin-visitas/realizar-checkin-usuario', 'CheckinVisitasController@checkinUsuario')->name("checkinUsuario");
Route::post('/checkin-visitas/realizar-checkin-aluno', 'CheckinVisitasController@checkinAluno')->name("checkinAluno");
Route::get('/checkin-visitas', 'CheckinVisitasController@index')->name("checkinVisitas");
Route::group(
    ['midlleware'=>[],
    'prefix'=>'estagiario',
    'namespace'=>'Estagiario'],
    function(){
        Route::get('/demandaWeb', 'horarioEstagiarioController@index')->name("demandaWeb.show");
        Route::post('/demandaWeb/enviar-horario', 'horarioEstagiarioController@cadastrarHorario')->name("demandaWeb.post");
    }
);

Route::post('/realizarBackup',/** AQUI VAI O METODO DO CONTROLLER */)->name('realizarBackup');

?>
