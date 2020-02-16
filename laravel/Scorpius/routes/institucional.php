<?php
/**
 * Rota para a tela de instituicões de ensino dentro do escopo de usuário.
 */
Route::get('/instituicao','ControlerInstitucional@telaInstituicao')->name("instituição.show");

/* Turmas */
Route::get('dashboard/turmas', 'TurmaController@index')->name('turma.index');
Route::post('dashboard/turmas/excluir-turma', 'TurmaController@excluirTurma')->name('turma.excluirTurma');
Route::post('dashboard/turmas/editar-turma', 'TurmaController@editarTurma')->name('turma.editarTurma');
Route::post('dashboard/turmas/cadastrar-turma', 'TurmaController@cadastrarTurma')->name('turma.cadastrarTurma');

Route::post('dashboard/turmas/excluir-aluno', 'TurmaController@excluirAluno')->name('turma.excluirAluno');
Route::post('dashboard/turmas/adicionar-aluno', 'TurmaController@adicionarAluno')->name('turma.adicionarAluno');
/**
 * Rota para retornar a tela para cadastra uma instituição
 */
Route::get('/instituicao/cadastro', 'ControlerInstitucional@telaCadastroInstituicao')->name("CadastroIntituição.show");
/**
 * Rota para casdastra uma instituição e vinculala a um usuario
 */
Route::post('/instituicao/cadastro', 'ControlerInstitucional@cadastrarInstituicao')->name("CadastroInstituição.post");
/**
 * rota para retornar o JSON com os dados de uma instituição.
 */
Route::get("/instituicao/dados/{nome}/{endereco}/", "ControlerInstitucional@getInstituicao");

/**
 * Rota exibir erro, caso não exista instituições cadastradas.
 */
Route::get('/instituicao/erro','ControlerInstitucional@nenhumaInstituicao')->name("errorNenhumaInstituicao.show");

/**
 * Rota exibir erro, caso não existam turmas cadastradas.
 */
Route::get('/turma/erro','ControlerInstitucional@nenhumaTurma')->name("errorNenhumaTurma.show");

/**
 * Rota para editar instituicao.
 */
Route::get('/instituicao/editar/{id}',['as'=>'user.instituicoes.editar','uses'=>'ControlerInstitucional@editarInstituicao']);
/**
 * Rota para deletar instituicao.
 */
Route::get('/instituicao/deletar/{id}',['as'=>'user.instituicoes.deletar','uses'=>'ControlerInstitucional@deletarInstituicao']);

Route::put('/instituicao/atualizar/{id}',['as'=>'user.instituicoes.atualizar','uses'=>'ControlerInstitucional@atualizarInstituicao']);


//Rotas para agendamento de uma instituicao
Route::get('/instituicao/agendamento', 'UserController@agendamento')->name("AgendarDiurnoInstituição.show");
Route::post('/instituicao/agendamento', 'UserController@agendarInstituicao')->name("AgendarDiurnoInstituicao.post");