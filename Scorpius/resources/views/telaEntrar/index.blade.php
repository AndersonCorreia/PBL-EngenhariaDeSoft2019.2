<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Entre - Scorpius')

@section('img')
<div id="img" class="carousel slide col-12 p-0 m-0 w-100  h-100" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#img" data-slide-to="0" class="active"></li>
        <li data-target="#img" data-slide-to="1"></li>
        <li data-target="#img" data-slide-to="2"></li>
        <li data-target="#img" data-slide-to="3"></li>
        <li data-target="#img" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner p-0 m-0  h-100">
        <div id="imgs" class="carousel-item active h-100">
            <img id="img-background-1" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-1.jpg') }}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item h-100">
            <img id="img-background-2" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-2.jpg') }}" alt="Segundo Slide">
        </div>
        <div class="carousel-item  h-100">
            <img id="img-background-3" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-3.jpg') }}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item  h-100">
            <img id="img-background-4" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-4.jpg') }}" alt="Quarto Slide">
        </div>
        <div class="carousel-item h-100">
            <img id="img-background-5" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-5.jpg') }}" alt="Quinto Slide">
        </div>
    </div>
</div>
@endsection

@section('conteudo')

<div class="text-center mx-auto col col-md-10">
    <h1>Entre</h1>
    <h5>Não possui uma conta? <a href="/cadastrar"> Cadastre-se</a>.</h5>
    <div id="redes-socias">
        {{--<a style="font-size: 15px;" href="{{ url('/login/facebook') }}" class="btn btn-primary btn-lg btn-block" style="font-size:13px;color:white">
            <i class="fa fa-facebook-square" style="font-size:13px;color:white"></i> Entrar com o Facebook
        </a>
        <a style="font-size: 15px;" href="{{ url('/login/google') }}" class="btn btn-danger btn-lg btn-block" style="font-size:13px;color:white">
            <i class="fa fa-google-plus" style="font-size:13px;color:white"></i> Entrar com o Google
        </a>--}}
    </div>
</div>
<form class="form-group mt-5 mx-auto col col-md-10" action={{ route("login") }} method="POST">
    {{csrf_field()}}

    @if( session('loginErro',false) )
    <div class="alert alert-danger font-weight-bold text-center" role="alert">
        <span>Credenciais incorretas: usuario não existe ou senha incorreta.</span>
    </div>
    @endif

    <!-- E-mail -->
    <div class="form-group">
        <label for="emailCadastro">E-mail ou CPF</label>
        <input class="form-control" placeholder="exemplo@exemplo.com" id="emailCadastro" name="e-mail" type="text"
            aria-describedby="emailHelp" value="{{session('login','')}}" required>
    </div>
    <!-- Senha -->
    <div class="form-group">
        <label for="senha">Senha</label>
        <input minlength="4" maxlength="20" type="password" class="form-control" id="senha" name="senha" required>
    </div>

    <button type="submit" class="btn btn-success btn-lg btn-block" style="font-size:15px">Entrar</button>
    <h1></h1>
    <h6 class="float-right">
        Esqueceu a sua senha? <a target="_blank" href="">Ajuda</a>.
    </h6>
</form>

@endsection