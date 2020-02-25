<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
@section('img')
<div id="img" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#img" data-slide-to="0" class="active"></li>
        <li data-target="#img" data-slide-to="1"></li>
        <li data-target="#img" data-slide-to="2"></li>
        <li data-target="#img" data-slide-to="3"></li>
        <li data-target="#img" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div id="imgs" class="carousel-item active">
            <img id="img-background-1" class="d-block w-100 img-fluid"
                src="{{ asset('img\tela_login\background-login-1.jpg') }}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-2" class="d-block w-100 img-fluid"
                src="{{ asset('img\tela_login\background-login-2.jpg') }}" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-3" class="d-block w-100 img-fluid"
                src="{{ asset('img\tela_login\background-login-3.jpg') }}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-4" class="d-block w-100 img-fluid"
                src="{{ asset('img\tela_login\background-login-4.jpg') }}" alt="Quarto Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-5" class="d-block w-100 img-fluid"
                src="{{ asset('img\tela_login\background-login-5.jpg') }}" alt="Quinto Slide">
        </div>
    </div>
</div>
@endsection
<br>
<div class="text-center mx-auto col-md-10">
    <h1>Login administrativo</h1>
</div>
<br>
<form class="form-group mx-auto col-md-10" action={{ route("loginAdm.post")}} method="POST">
    <!-- Usuário -->
    <div class="form-group">
        <label for="usuario">Usuário</label>
        <input class="form-control" id="usuario" name="usuario" type="text" required>
    </div>
    <!-- Senha -->
    <div class="form-group">
        <label for="senha">Senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha" name="senha" required>
    </div>

    <button type="submit" class="btn btn-success btn-lg btn-block" style="font-size:15px">Entrar</button>
    <h1></h1>
    <h6 class="float-right">
        Esqueceu a sua senha? <a target="_blank" href="">Ajuda</a>.
    </h6>
</form>

@endsection