<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
<div class="text-center">
    <h1>Cadastre-se</h1>
    <h4>Já possui uma conta? <a href="{{ route('entrar') }}"> Entre</a></h4><br>
    <div id="redes-sociais-login" class="btn-toolbar col-md-10 ml-3 " role="toolbar">
        <div class="btn-group mr-3" role="group">
            <button type="button" class="btn btn-primary" style="font-size:12px">
                <i class="fa fa-facebook-square" style="font-size:12px;color:white"></i>   Cadastre-se com o Facebook
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-danger" style="font-size:12px">
                <i class="fa fa-google-plus" style="font-size:12px;color:white"></i>   Cadastre-se com o Google
            </button>
        </div>
    </div>
</div>
<br>
<form class="form-group col-md-10 ml-3" action="" method="POST">
    <!-- Nome completo -->
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="nome">Nome</label>
                <input id="nome" type="text" class="form-control" placeholder="">
            </div>
            <div class="col">
                <label for="sobrenome">Sobrenome</label>
                <input id="sobrenome" type="text" class="form-control" placeholder="">
            </div>
        </div>
    </div>
    <!-- E-mail -->
    <div class="form-group">
        <label for="emailCadastro">E-mail</label>
        <input class="form-control" placeholder="exemplo@exemplo.com" id="emailCadastro" name="e-mail" type="text" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Insira um e-mail válido, pois validaremos sua conta com ele.</small>
    </div>
    <!-- CPF -->
    <div class="form-group">
        <label for="cpfCadastro">CPF</label>
        <input id="cpfCadastro" placeholder="000.000.000-00" type="text" minlength="14" maxlength="14" class="form-control">
    </div>
    <!-- Tipo de usuário -->
    <div class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-10 pt-0">Tipo de usuário</legend>
            <div class="col-md-1"></div>
            <div class="col-md-4 ml-5">
                <input class="form-check-input" type="radio" name="tipoUsuario" id="visitante" value="1" checked>
                <label class="form-check-label" for="visitante">Visitante</label>
            </div>
            <div class="col-md-6">
                <input class="form-check-input" type="radio" name="tipoUsuario" id="representante" value="2">
                <label class="form-check-label" for="representante">Representante de instituição</label>
            </div>   
        </div>
    </div>
    <!-- Senha -->
    <div class="form-group">
        <label for="senha1">Senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha1">
    </div>
    <!-- Repitir senha -->
    <div class="form-group">
        <label for="senha2">Repita a senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha2">
    </div>

    <button type="submit" class="btn btn-success btn-lg btn-block">Cadastre-se</button><br>
</form>
<h7 class="col-md-10 ml-4" style="font-size:13px">
    Por cadastre-se, você aceita os <a target="_blank" href="">Termos</a> e a 
    <a target="_blank" href="">Politica de Privacidade</a>.
</h7>

@endsection