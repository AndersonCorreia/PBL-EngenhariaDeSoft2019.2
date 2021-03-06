<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')
@section('title', 'Falta pouco...')
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
            <img id="img-background-1" class="d-block w-100"
                src="{{ asset('img\tela_login\background-login-1.jpg') }}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-2" class="d-block w-100"
                src="{{ asset('img\tela_login\background-login-2.jpg') }}" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-3" class="d-block w-100"
                src="{{ asset('img\tela_login\background-login-3.jpg') }}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-4" class="d-block w-100"
                src="{{ asset('img\tela_login\background-login-4.jpg') }}" alt="Quarto Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-5" class="d-block w-100"
                src="{{ asset('img\tela_login\background-login-5.jpg') }}" alt="Quinto Slide">
        </div>
    </div>
</div>
@endsection

<div class="text-center mx-auto col-md-10">
    <h1>Falta pouco...</h1>
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
    <div class="form-group">
        <div class="form-row">
            <!-- CPF -->
            <div class="col">
                <label for="cpfCadastro">CPF</label>
                <input id="cpfCadastro" placeholder="000.000.000-00" type="text" minlength="14" maxlength="14"
                    class="form-control">
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

        <button type="submit" class="btn btn-success btn-lg btn-block">Finalizar</button>
        <h1></h1>
        <h6 class="float-right" style="font-size:13px">
            Por cadastre-se, você aceita os <a target="_blank" href="">Termos</a> e a
            <a target="_blank" href="">Politica de Privacidade</a>.
        </h6>
</form>

@endsection