<?php

namespace App\Http\Controllers\Geral;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Users\Usuario;
use App\Model\Users\Pessoa;
use Illuminate\Support\Facades\Mail;
use App\Mail\email;
use App\DB\PessoaDAO;
use App\Model\EmailVerificacao;

class CadastroController extends Controller
{
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    private $tipo;
    private $senha;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usuario = new Usuario();
        return view('telaCadastro.index', [
            'ERRO' => 'FALSE',
            'MSG' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        if($usuario->pesquisaEmail($request->email)){
            return view('telaCadastro.index', [
                'ERRO' => 'EMAIL',
                'MSG_ERRO' => 'Este e-mail já existente, por favor insira outro.'
            ]);
        }
        if($usuario->pesquisaCpf($request->cpf)){
            return view('telaCadastro.index', [
                'ERRO' => 'CPF',
                'MSG_ERRO' => 'Este CPF já existente, por favor insira outro.'
            ]);
        }

        $this->nome = $request->nome . " " . $request->sobrenome;
        $this->email = $request->email;
        $this->cpf = $request->cpf;
        $this->telefone = $request->telefone;
        $this->tipo = $usuario->tipoUsuario($request->tipo);
        $this->tipo = intval($this->tipo);
        $this->senha = $request->senha;

        $dados = [
            'nome' => $this->nome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'senha' => $this->senha,
            'tipo' => $this->tipo
        ];
        $usuario->novoUsuario($dados);
        $token = $request['_token'];
        $verificacao = new EmailVerificacao();
        $dados = [
            'usuario_email' => $this->email,
            'token' => $token
        ];
        $verificacao->novaVerificacao($dados);
        $this->sendEmail($this->email, $token);
        return view('telaCadastro.prosseguirVerificacaoEmail');
    }

    
    public function sendEmail($email, $token){
        $dados = [
            'token' => $token, 
            'email' => $email
        ];
        Mail::send('emails.emailVerificacao', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Verificação de e-mail');
            $message->to($this->email);
            $message->subject('Verificação de email');
        });
    }

}
