<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
@section('img')
<img style="border-bottom-right-radius: 130px;border-top-right-radius: 130px;" class="img-fluid " src="{{ asset('img/background-login-3.png') }}">
@endsection
<br>
<div class="text-center mx-auto col-md-10">
    <h1>Login administrativo</h1>
</div>
<br>
<form class="form-group mx-auto col-md-10" action="" method="POST">
    <!-- Usuário -->
    <div class="form-group">
        <label for="usuario">Usuário</label>
        <input class="form-control" id="usuario" name="usuario" type="text">
    </div>
    <!-- Senha -->
    <div class="form-group">
        <label for="senha">Senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha">
    </div>

    <button type="submit" class="btn btn-success btn-lg btn-block" style="font-size:15px">Entrar</button>
    <h1></h1>
    <h6 class="float-right">
        Esqueceu a sua senha? <a target="_blank" href="">Ajuda</a>.
    </h6>
</form>

@endsection