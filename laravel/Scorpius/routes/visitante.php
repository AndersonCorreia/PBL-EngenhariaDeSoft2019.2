<?php

 // chama tela de alterar dados cadastrais localizada no controller através do método index
 Route::resource('/AlterarDadosUsuario', 'AlteraUsuarioController');
    
 //Rotas para agendamento individual para as exposiçoes diurnas
 Route::get('/agendamento/exposicoes', 'UserController@agendamentoIndividual')->name('AgendarDiurnoVisitante.show');
 Route::post('/agendamento/exposicoes', 'UserController@agendarContaIndividual')->name('AgendarDiurnoVisitante.post');

 //Rotas para agendamento de uma individual das atividades noturnas
 Route::get('/agendamento/noturno', 'UserController@agendamentoNoturno')->name('AgendarNoturno.show');
 Route::post('/agendamento/noturno', 'UserController@agendarNoturno')->name('AgendarNoturno.post');

 //Rotas para agendamento de uma individual para atividades diferenciadas
 Route::get('/agendamento/atividades', 'UserController@agendamentoAtividadeDiferenciada')->name('AgendarAtividade.show');
 Route::post('/agendamento/atividades', 'UserController@agendarContaIndividual')->name('AgendarAtividade.post');

 //Rota dashboard visitante
 Route::get('/visitante/dashboard', 'UserController@getDashboard')->name('dashboard.show');