<!-- É a tela "Prosseguir" da prototipação, informa que um email foi enviado ao inbox do usuário -->

@extends('layouts.templateLogin')

@section('title', 'Verifique seu e-mail - Scorpius')

@section('conteudo')
@section('img')
<div id="img" class="carousel slide h-100" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#img" data-slide-to="0" class="active"></li>
        <li data-target="#img" data-slide-to="1"></li>
        <li data-target="#img" data-slide-to="2"></li>
        <li data-target="#img" data-slide-to="3"></li>
        <li data-target="#img" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner h-100">
        <div id="imgs" class="carousel-item active">
            <img id="img-background-1" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-1.png') }}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-2" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-2.png') }}" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-3" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-3.png') }}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-4" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-4.png') }}" alt="Quarto Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-5" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-5.png') }}" alt="Quinto Slide">
        </div>
    </div>
</div>
@endsection
<div class="text-center mx-auto col-md-10">
    <br>
    <h1>Falta pouco...</h1>
    <h3>
        Enviamos um email para você com um link para que você possa redefinir sua senha.
        Por favor verifique sua caixa de mensagem...
        após a redefinição, você poderá entrar em sua conta com a nova senha.
    </h3>
    <br>
    <a  style="font-size: 24px" href="{{ route('entrar') }}" class="btn btn-success">
    <i class='fas fa-arrow-circle-right' style='font-size:24px;color:white'></i> Prosseguir</a>
</div>

@endsection