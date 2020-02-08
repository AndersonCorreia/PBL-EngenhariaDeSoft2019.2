<?php

//Rota para retornar a tela de Gerenciamento de Visitas.
Route::get('/gerenciamentoDeVisita', 'Funcionario\VisitaController@getTelaVisita')->name("telaGerenciamentoDeVisitas.show");

Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/confirmacaoHorario', 'HorarioController@getTelaHorarioEstagiario')->name("telaGerenciamentoDehorarios.show");
        Route::get('/confirmacaoHorario/{id}', 'HorarioController@getProposta')->name("retornaProposta");
    }
);

//Rota para retornar a tela da Proposta de Horário do Estagiário.
Route::get('/demandaWeb', 'horarioEstagiarioController@index')->name("HorarioEstagiario.show");
