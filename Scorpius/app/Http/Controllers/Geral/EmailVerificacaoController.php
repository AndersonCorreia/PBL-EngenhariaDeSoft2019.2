<?php

namespace App\Http\Controllers\Geral;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\EmailVerificacao;
use App\Model\Users\Usuario;

class EmailVerificacaoController extends Controller
{
    public function index($email, $token){
        $verificacao = new EmailVerificacao();
        $usuario = new Usuario();
        if($verificacao->verificaEmailToken($email, $token)){
            $verificacao->deletarEmailVerificacao($email);
            $usuario->ativarUsuario($email);
            return view('telaEntrar.index');
        }
        $verificacao->deletarEmailVerificacao($email);
        $usuario->deletarDesativo($email);
        return view('NÃO FOI POSSÍVEL VERIFICAR SUA CONTA\nPor favor, cadastre-se novamente');
    }
}
