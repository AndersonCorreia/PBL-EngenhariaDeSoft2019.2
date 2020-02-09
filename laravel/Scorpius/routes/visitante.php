<?php

 // chama tela de alterar dados cadastrais localizada no controller através do método index
 Route::resource('/AlterarDadosUsuario', 'AlteraUsuarioController');
    
 //Rotas para agendamento individual para as exposiçoes diurnas
 Route::get('/agendamento/exposicoes', 'UserController@agendamentoIndividual')->name('AgendarDiurnoVisitante.show');
 Route::post('/agendamento/exposicoes', 'UserController@agendarContaIndividual')->name('AgendarDiurnoVisitante.post');

 //Rotas para agendamento de uma individual dasatividades noturnas
 Route::get('/agendamento/noturno', 'UserController@agendamentoIndividual')->name('AgendarNoturno.show');
 Route::post('/agendamento/noturno', 'UserController@agendarContaIndividual')->name('AgendarNoturno.post');

 //Rotas para agendamento de uma individual
 Route::get('/agendamento/atividades', 'UserController@agendamentoIndividual')->name('AgendarAtividade.show');
 Route::post('/agendamento/atividades', 'UserController@agendarContaIndividual')->name('AgendarAtividade.post');