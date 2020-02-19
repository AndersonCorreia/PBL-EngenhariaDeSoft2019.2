<?php

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
Route::get('/admin/cadastro', 'CadastroController@cadastroUsuario')->name("CadastroUsuario.show");

Route::post('/admin/cadastro', 'CadastroController@cadastroUsuario')->name("CadastroUsuario.post");


Route::group(
    ['midlleware'=>[], 
    'prefix'=>'funcionario',
    'namespace'=>'Funcionario'],
    function(){
        Route::get('/confirmacaoHorario', 'HorarioController@getTelaHorarioEstagiario')->name("telaGerenciamentoDehorarios.show");
        Route::get('/confirmacaoHorario/{id}', 'HorarioController@getProposta')->name("retornaProposta");
        Route::post('/confirmacaoHorario', 'HorarioController@enviaHorario')->name("enviaHorario");
    }
);

