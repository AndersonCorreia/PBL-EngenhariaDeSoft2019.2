<?php

 // chama tela de alterar dados cadastrais localizada no controller através do método index
 Route::get('/alterar-dados', 'AlteraUsuarioController@index')->name('alterarDados.show');
 Route::post('/alterar-dados/alteracao', 'AlteraUsuarioController@store')->name('alterarDadosAlteracao.post');
 Route::get('/alterar-dados/statusAlteracao', 'AlteraUsuarioController@store')->name('alterarDadosStatus.show');
    
 //Rotas para agendamento individual para as exposiçoes diurnas
 Route::get('/agendamento/exposicoes', 'AgendamentoController@agendamentoIndividual')->name('AgendarDiurnoVisitante.show');
 Route::post('/agendamento/exposicoes', 'AgendamentoController@agendarContaIndividual')->name('AgendarDiurnoVisitante.post');

 //Rotas para agendamento de uma individual das atividades noturnas
 Route::get('/agendamento/noturno', 'AgendamentoController@agendamentoNoturno')->name('AgendarNoturno.show');
 Route::post('/agendamento/noturno', 'AgendamentoController@agendarNoturno')->name('AgendarNoturno.post');

 //Rotas para agendamento de uma individual para atividades diferenciadas
 Route::get('/agendamento/atividades', 'AgendamentoController@agendamentoAtividadeDiferenciada')->name('AgendarAtividade.show');
 Route::post('/agendamento/atividades', 'AgendamentoController@agendarContaIndividual')->name('AgendarAtividade.post');
 
 Route::get('/agendamento/atividades/error', 'AgendamentoController@atividadeError')->name('Atividade.error');

 Route::get('/agendamento/visitas/error', 'AgendamentoController@visitaError')->name('Visita.error');

/**
 * rota para retornar o JSON com os dados das visitas para o calendario.
 */
Route::get("/agendamento/dados/{turno}/{data}/{sentido}/", "AgendamentoController@getVisitas");

//Rota dashboard visitante
Route::get('/visitante/dashboard', 'UserController@getDashboard')->name('dashboardVisitante.show');

Route::post('/visitante/dashboard/confirmacao', 'AgendamentoController@confirmacaoAgendamento')->name('confirma.post');
