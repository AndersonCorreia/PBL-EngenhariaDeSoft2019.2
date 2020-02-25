<!-- É a tela "Prosseguir" da prototipação, informa que um email foi enviado ao inbox do usuário -->

@extends('layouts.templateLogin')

@section('title', 'Verifique seu e-mail - Scorpius')

@section('conteudo')
@section('img')
<img style="border-bottom-right-radius: 130px;border-top-right-radius: 130px;" class="img-fluid " src="{{ asset('img/background-login-3.png') }}">
@endsection
<div class="text-center mx-auto col-md-10">
    <br>
    <h1>Falta pouco...</h1>
    <h3>
        Enviamos um email de confirmação para você.
        Por favor verifique sua caixa de mensagem...
        após confirmado, você poderá entrar em sua conta.
    </h3>
    <br>
    <a  style="font-size: 24px" href="{{ route('entrar') }}" class="btn btn-success">
    <i class='fas fa-arrow-circle-right' style='font-size:24px;color:white'></i> Prosseguir</a>
</div>

@endsection