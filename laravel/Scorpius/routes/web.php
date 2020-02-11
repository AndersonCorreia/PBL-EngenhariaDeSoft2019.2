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
Route::resource('/cadastrar', 'CadastroController');
// Chama o metódo do Inicialcontroller que retorna a página de entrar (login).
Route::get('/entrar', ['uses'=>'InicialController@telaEntrar'])->name('entrar');
Route::post('/entrar','UserController@login')->name('login');
Route::get("/logout", 'UserController@logout')->name('logout');
Route::get('/login-administrativo', ['uses' => 'InicialController@loginAdm'])->name('loginAdm');
Route::post('/login-administrativo','UserController@loginADM')->name('loginAdm.post');

// Testes. PAGINA TEMPORARIA
Route::resource('enviar-eventos', 'enviarEventosController');

//rota para visualizar corbetura dos testes
Route::get('/testes', function(){
    return redirect("/build/coverage/index.html",307);
});

/**
 * Acionado quando o usuário apertar o botão "cadastre-se". Chamará o metódo do CadastroController que
 * gerencia o cadastro normal dos visitantes/responsáveis.
 */
//Route::post('/cadastro/cadastrar-se', ['as'=>'cadastro.normal', 'uses'=>'Admin\CadastroController@cadastroNormal'])->name('cadastro.normal');
Route::get('/verificacao-email/{email}/{token}', 'EmailVerificacaoController@index');
/**
 * Após confirmação dos dados da rota acima, retorna a tela de "Prosseguir" da verificação de email. Essa tela
 * só tem o intuito de informar que um email foi enviado para o inbox do visitante/responsável. Por isso usei o 
 * get, pois é só uma tela para mostrar informações.
 */
// Route::get('cadastro/cadastre-se/confirmacao-email', ['uses'=>'InicialController@prosseguirVerificacaoEmail']);
// rotas para cadastro com facebook e google
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Testes. PAGINA TEMPORARIA
Route::resource('enviar-eventos', 'enviarEventosController');

//rota para visualizar corbetura dos testes
Route::get('/testes', function(){
    return redirect("/build/coverage/index.html",307);
});

//Rota para retornar a tela da Proposta de Horário do Estagiário.
Route::get('/demandaWeb', 'horarioEstagiarioController@index')->name("HorarioEstagiario.show");
Route::post('/demandaWeb/enviar-horario', 'horarioEstagiarioController@cadastrarHorario')->name("HorarioEstagiario.enviarHorario");
