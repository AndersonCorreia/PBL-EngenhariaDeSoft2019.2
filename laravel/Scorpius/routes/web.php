<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses'=>'InicialController@inicio'])->name('paginaInicial');

// Chama o metódo do Inicialcontroller que retorna a página de cadastro.
Route::get('/cadastro', ['uses'=>'InicialController@telaCadastro'])->name('cadastrar');
// Chama o metódo do Inicialcontroller que retorna a página de entrar (login).
Route::get('/entrar', ['uses'=>'InicialController@telaEntrar'])->name('entrar');

Route::get('/login-administrativo', ['uses' => 'InicialController@loginAdm'])->name('loginAdm');

Route::get('/AlterarDadosCadastrais',['uses'=>'AlterarDadosController@index']);

/**
 * Acionado quando o usuário apertar o botão "cadastre-se". Chamará o metódo do CadastroController que
 * gerencia o cadastro normal dos visitantes/responsáveis.
 */
Route::post('/cadastro/cadastrar-se', ['as'=>'cadastro.normal', 'uses'=>'Admin\CadastroController@cadastroNormal'])->name('cadastro.normal');

/**
 * Rota para a tela de instituicões de ensino dentro do escopo de usuário.
 */
Route::get('/instituicao','ControlerInstitucional@telaInstituicao')->name("instituição.show");


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
 * Rota para editar instituicao.
 */
Route::get('/instituicao/editar/{id}',['as'=>'user.instituicoes.editar','uses'=>'ControlerInstitucional@editarInstituicao']);
/**
 * Rota para deletar instituicao.
 */
Route::get('/instituicao/deletar/{id}',['as'=>'user.instituicoes.deletar','uses'=>'ControlerInstitucional@deletarInstituicao']);

Route::put('/instituicao/atualizar/{id}',['as'=>'user.instituicoes.atualizar','uses'=>'ControlerInstitucional@atualizarInstituicao']);

/**
 * Após confirmação dos dados da rota acima, retorna a tela de "Prosseguir" da verificação de email. Essa tela
 * só tem o intuito de informar que um email foi enviado para o inbox do visitante/responsável. Por isso usei o 
 * get, pois é só uma tela para mostrar informações.
 */
// Route::get('cadastro/cadastre-se/confirmacao-email', ['uses'=>'InicialController@prosseguirVerificacaoEmail']);

// rotas para cadastro com facebook e google
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Testes. PAGINA TEMPORARIA
Route::resource('enviar-eventos', 'enviarEventosController');