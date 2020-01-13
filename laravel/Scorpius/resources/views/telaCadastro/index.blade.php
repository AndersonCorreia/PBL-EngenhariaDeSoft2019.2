<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
@section('img')
<img style="border-bottom-right-radius: 130px;border-top-right-radius: 130px;" class="img-fluid " src="{{ asset('img/background-login-4.png') }}">
@endsection

<div class="text-center mx-auto col-md-10">
    <h1>Cadastre-se</h1>
    <h4>Já possui uma conta? <a href="{{ route('entrar') }}"> Entre</a></h4>
    <div id="redes-socias">
        <a style="font-size: 15px;" href="" class="btn btn-primary btn-lg btn-block" style="font-size:13px;color:white">
            <i class="fa fa-facebook-square" style="font-size:13px;color:white"></i> Cadastrar-se com o Facebook
        </a>
        <a style="font-size: 15px;" href="" class="btn btn-danger btn-lg btn-block" style="font-size:13px;color:white">
            <i class="fa fa-google-plus" style="font-size:13px;color:white"></i> Cadastrar-se com o Google
        </a>
    </div>
</div>
<br>
<form class="form-group mx-auto col-md-10" action="" method="POST">
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

    <div class="form-group">
        <div class="form-row">
            <!-- CPF -->
            <div class="col">
                <label for="cpfCadastro">CPF</label>
                <input id="cpfCadastro" placeholder="000.000.000-00" type="text" minlength="14" maxlength="14" class="form-control">
            </div>
            <div class="col">
                <!-- Tipo Usuario -->
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de Usuário: </label>
                    <select class="form-control" id="tipoUsuario">
                        <option value="1">Visitante</option>
                        <option value="2">Representante de Instituição (ex.: professor)</option>
                    </select>
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

        <button type="submit" class="btn btn-success btn-lg btn-block">Cadastre-se</button>
        <h1></h1>
        <h6 class="float-right" style="font-size:13px">
            Por cadastre-se, você aceita os <a target="_blank" href="">Termos</a> e a
            <a target="_blank" href="">Politica de Privacidade</a>.
        </h6>
</form>

@endsection