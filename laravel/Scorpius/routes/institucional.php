<?php
/**
 * Rota para a tela de instituicões de ensino dentro do escopo de usuário.
 */
Route::get('/instituicao','ControlerInstitucional@telaInstituicao')->name("instituição.show");

Route::get('/dashboard/{professor_ID}/turmas', 'TurmaController@index')->name('telaTurmas');
Route::post('/dashboard/{professor_ID}/turmas/excluir', 'TurmaController@excluirTurma')->name("excluirTurma");
Route::post('/dashboard/{professor_ID}/turmas/editar', 'TurmaController@editarTurma')->name("editarTurma");
Route::post('/dashboard/{professor_ID}/turmas/cadastrar', 'TurmaController@cadastrarTurma')->name("cadastrarTurma");

Route::post('dashboard/{professor_ID}/turmas/excluir-aluno', 'TurmaController@excluirAluno')->name("excluirAluno");
Route::post('dashboard/{professor_ID}/turmas/adicionar-aluno', 'TurmaController@adicionarAluno')->name("adicionarAluno");

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
Route::get('/turma/erro','ControlerInstitucional@nenhumaInstituicao')->name("errorNenhumaTurma.show");

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