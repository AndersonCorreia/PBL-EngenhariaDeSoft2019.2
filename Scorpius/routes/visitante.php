<?php

 // chama tela de alterar dados cadastrais localizada no controller através do método index
 Route::resource('/alterar-dados', 'AlteraUsuarioController');
    
 //Rotas para agendamento individual para as exposiçoes diurnas
 Route::get('/agendamento/exposicoes', 'AgendamentoController@agendamentoIndividual')->name('AgendarDiurnoVisitante.show');
 Route::post('/agendamento/exposicoes', 'AgendamentoController@agendarContaIndividual')->name('AgendarDiurnoVisitante.post');

 //Rotas para agendamento de uma individual das atividades noturnas
 Route::get('/agendamento/noturno', 'AgendamentoController@agendamentoNoturno')->name('AgendarNoturno.show');
 Route::post('/agendamento/noturno', 'AgendamentoController@agendarNoturno')->name('AgendarNoturno.post');

 //Rotas para agendamento de uma individual para atividades diferenciadas
 Route::get('/agendamento/atividades', 'AgendamentoController@agendamentoAtividadeDiferenciada')->name('AgendarAtividade.show');
 Route::post('/agendamento/atividades', 'AgendamentoController@agendarContaIndividual')->name('AgendarAtividade.post');

/**
 * rota para retornar o JSON com os dados das visitas para o calendario.
 */
Route::get("/agendamento/dados/{turno}/{data}/{sentido}/", "AgendamentoController@getVisitas");

//Rota dashboard visitante
Route::get('/visitante/dashboard', 'UserController@getDashboard')->name('dashboardVisitante.show');

Route::get('/visitante/dashboard/confirmarcao/{id}/{status}', 'AgendamentoController@confirmacaoAgendamento')->name('confirma');
