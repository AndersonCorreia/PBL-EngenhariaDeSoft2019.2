<?php

 // chama tela de alterar dados cadastrais localizada no controller através do método index
 Route::resource('/AlterarDadosUsuario', 'AlteraUsuarioController');
    
 //Rotas para agendamento de uma conta individual
 Route::get('/agendamentoUsuario', 'UserController@agendamentoIndividual')->name('AgendarAvulso.show');
 Route::post('/agendamentoUsuario', 'UserController@agendarContaIndividual');