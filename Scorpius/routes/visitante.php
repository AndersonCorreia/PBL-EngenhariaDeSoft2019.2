<?php
    
//Rotas para agendamento individual para as exposiçoes diurnas
Route::get('/agendamento/exposicoes', 'AgendamentoController@agendamentoIndividual')->name('AgendarDiurnoVisitante.show');
Route::post('/agendamento/exposicoes', 'AgendamentoController@agendarContaIndividual')->name('AgendarDiurnoVisitante.post');

//Rotas para agendamento de uma individual das atividades noturnas
Route::get('/agendamento/noturno', 'AgendamentoController@agendamentoNoturno')->name('AgendarNoturno.show');
Route::post('/agendamento/noturno', 'AgendamentoController@agendarNoturno')->name('AgendarNoturno.post');

//Rotas para agendamento de uma individual para atividades diferenciadas
Route::get('/agendamento/atividades', 'AgendamentoController@agendamentoAtividadeDiferenciada')->name('AgendarAtividade.show');
Route::post('/agendamento/atividades', 'AgendamentoController@agendarAtividadeDiferenciada')->name('AgendarAtividade.post');

/**
 * rota para retornar o JSON com os dados das visitas para o calendario.
 */
Route::get("/agendamento/dados/{turno}/{data}/{sentido}/", "AgendamentoController@getVisitas")->name("GetVisitas");

Route::get("/historico", "UserController@historicoDeVisitas")->name("HistoricoDeVisitas.show");
Route::get("/detalhamento", "UserController@detalhamentoDeVisitas")->name("DetalhamentoDeVisitas.show");

//Rota dashboard visitante
Route::get('/dashboard', 'UserController@getDashboard')->name('dashboardVisitante.show');

Route::post('/dashboard/confirmacao', 'AgendamentoController@confirmacaoAgendamento')->name('confirma.post');
