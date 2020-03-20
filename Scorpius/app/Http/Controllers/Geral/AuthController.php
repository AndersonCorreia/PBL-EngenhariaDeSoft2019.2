<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\email;
use App\DB\PessoaDAO;
use App\Model\Users\Usuario;
use App\Model\EmailRedefinicaoSenha;

class AuthController extends Controller
{
    

    /**
     * Função para realizar o login do usuario, preencher a sessão com o ID, nome e Tipo do usuario
     *
     * @param [type] $request
     * @return void
     */
    public function login(Request $request)
    {
        $user = $request["e-mail"];
        $senha = $request["senha"];
        $DAO = new PessoaDAO();
        $usuario = $DAO->UserLogin($user, $senha); //lança uma exception se as informações estiverem incorretas

        $request->session()->regenerate(); //a documentação falava que era para previnir um ataque chamado "session fixation"
        session(["ID" => $usuario["ID"], "nome" => $usuario["nome"], "tipo" => $usuario["tipo"]]);

        return redirect()->route("dashboard");
    }

    /**
     * faz o logout do usuario apagando todos os dados da sessão
     *
     * @param [type] $request
     * @return void
     */
    public function logout(Request $request)
    {

        $request->session()->flush();
        return redirect()->route("paginaInicial");
    }

    public function changePassword(){
        //fazer
    }

    public function enviarEmailRedefinicaoSenha($usuario_email, $token)
    {
        $dados = [
            'token'=> $token,
            'usuario_email'=> $usuario_email,
        ];
         // Enviando o e-mail
        Mail::send('emails.emailRedefinicaoSenha', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Redefinição de Senha');
            $message->to($this->usuario_email);
            $message->subject('Código para Redefinição de Senha');
        });

        return view('telaEntrar.prosseguirRedefinicao');
    }

    public function senhaRedefinicao(Request $request)
    {

        $this->email = $request['email'];

        $token = $request['_token'];
        $dados = [
            'usuario_email' => $this->email,
            'token' => $token
        ];
    
        $this->enviarEmailRedefinicaoSenha($this->email, $token);
        return view('telaEntrar.prosseguirRedefinicao');
    }
}
