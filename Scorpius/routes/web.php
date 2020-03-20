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
Route::get("/dashboard", function (){
    
    $tipo = session("tipo");
    $rota;

    if ($tipo == null){
        $rota = "entrar";
    }
    else if ($tipo == "visitante") {
        $rota = "dashboardVisitante.show";
    }
    else if ($tipo == "institucional") {
        $rota = "dashboardInstitucional.show";
    }
    else if ($tipo == "estagiario") {
        $rota = "dashboardEstagiario.show";
    }
    else if ($tipo == "adm") {
        $rota = "dashboardAdm.show";
    }
    else {
        $rota = "dashboardFuncionario.show";
    }

    return redirect()->route($rota);

})->name("dashboard");

Route::middleware('auth')->group(
    function(){
        Route::get('/alterar-dados', 'AlteraUsuarioController@index')->name('alterarDados.show');
        Route::post('/alterar-dados/alteracao', 'AlteraUsuarioController@store')->name('alterarDadosAlteracao.post');
        Route::get('/alterar-dados/statusAlteracao', 'AlteraUsuarioController@store')->name('alterarDadosStatus.show');
        Route::get('/v/erros', 'Erros@visitante')->name('vErros');
    }
);
// Chama o metódo do Inicialcontroller que retorna a página de cadastro.
Route::resource('/cadastrar', 'CadastroController');
// Chama o metódo do Inicialcontroller que retorna a página de entrar (login).
Route::get('/entrar', 'InicialController@telaEntrar')->name('entrar');
Route::post('/entrar','AuthController@login')->name('login');
Route::get("/logout", 'AuthController@logout')->name('logout');
Route::get('/verificacao-email/{email}/{token}', 'EmailVerificacaoController@index');
Route::get('/esqueciMinhaSenha', 'InicialController@esqueciMinhaSenha')->name('reconfigurarSenha');
Route::post('/esqueciMinhaSenha','AuthController@senhaRedefinicao')->name('senhaRedefinicao');

//rota para visualizar corbetura dos testes
Route::get('/testes', function(){
    return redirect("/build/coverage/index.html",307);
});
