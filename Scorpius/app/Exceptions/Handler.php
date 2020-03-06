<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {   
        if($exception instanceof NenhumaInstCadastradaException){

            return redirect()->route('vErros')->with('viewErro','TelaInstituicaoEnsino.errorNenhumaInstituicao');
        }
        elseif($exception instanceof NenhumaTurmaCadastradaException){
            
            return redirect()->route('vErros')->with('viewErro','TelaInstituicaoEnsino.errorNenhumaTurma');
        }
        elseif($exception instanceof UsuarioNaoEncontradoException){

            return redirect()->route('loginError.show');
        }
        elseif($exception instanceof NenhumaVisitaEncontradaException){
            
            return redirect()->route('vErros')->with('viewErro','telasUsuarios.Agendamentos.errorNenhumaVisita');
        }
        elseif($exception instanceof NenhumaAtividadeEncontradaException){
            
            return redirect()->route('vErros')->with('viewErro','telasUsuarios.Agendamentos.errorNenhumaAtividade');
        }
        else {

            return parent::render($request, $exception);
        }
    }
}
