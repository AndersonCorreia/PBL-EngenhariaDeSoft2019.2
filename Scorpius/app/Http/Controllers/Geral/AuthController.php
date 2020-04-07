<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\email;
use App\DB\PessoaDAO;
use App\Model\Users\Empregado;
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

    public function enviarEmailRedefinicaoSenha($email, $token)
    {
        $dados = [
            'token'=> $token,
            'usuario_email'=> $email,
        ];
        session()->flash("email", $email);
         // Enviando o e-mail
        Mail::send('emails.emailRedefinicaoSenha', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Redefinição de Senha');
            $message->to( session('email') );
            $message->subject('Link para Redefinição de Senha');
        });
        
    }

    public function senhaRedefinicao(Request $request)
    {
        $email = $request->email;
        $token = hash_hmac("sha256", $email, env("APP_KEY"));
        
        $this->enviarEmailRedefinicaoSenha($email, $token);

        return view('telaRedefinicaoSenha.avisoRedefinicao'); 
    }

    public function redefinirSenha(Request $request, $email, $token){
        $senha = $request->novaSenha;
        $tokenAtual=hash_hmac("sha256", $email, env("APP_KEY"));
        if ($token == $tokenAtual){
            $usuario=(new PessoaDAO)->SELECTbyEmail($email);
            $ID=$usuario["ID"];
            $nome=$usuario["nome"];
            $cpf=$usuario["CPF"];
            $telefone=$usuario["telefone"];
            $tipo_usuario=$usuario["tipo"];
            $user = new Empregado($nome, $senha, $tipo_usuario, $cpf, $telefone, $email, $ID);
            $user->setSenha($senha);
        }
        return redirect()->route('entrar');
    }
}
