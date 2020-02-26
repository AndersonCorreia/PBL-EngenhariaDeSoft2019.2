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
    'prefix'=>'estagiario',
    'namespace'=>'Estagiario'],
    function(){
        Route::get('/checkinEstagiario', 'CheckinEstagiarioController@index')->name("demandaWeb.show");
        Route::get('/demandaWeb', 'horarioEstagiarioController@index')->name("demandaWeb.show");
        Route::post('/demandaWeb/enviar-horario', 'horarioEstagiarioController@cadastrarHorario')->name("demandaWeb.post");
    }
);

