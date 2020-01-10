<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
<style>
    @font-face {
        font-family: orator;
        src: url("fonts/oratorstd.otf");
    }

    @font-face {
        font-family: stark;
        src: url("fonts/Stark.OTF");
    }
</style>
<div class="text-center mx-auto col-md-10">
    <h1>Entre</h1>
    <h5>Não possui uma conta? <a href="{{ route('cadastrar') }}"> Cadastre-se</a>.</h5>
    <div id="redes-socias">
        <a style="font-size: 15px;" href="" class="btn btn-primary btn-lg btn-block" style="font-size:13px;color:white">
            <i class="fa fa-facebook-square" style="font-size:13px;color:white"></i> Entrar com o Facebook
        </a>
        <a style="font-size: 15px;" href="" class="btn btn-danger btn-lg btn-block" style="font-size:13px;color:white">
            <i class="fa fa-google-plus" style="font-size:13px;color:white"></i> Entrar com o Google
        </a>
    </div>
</div>
<br>
<form class="form-group mx-auto col-md-10" action="" method="POST">
    <!-- E-mail -->
    <div class="form-group">
        <label for="emailCadastro">E-mail</label>
        <input class="form-control" placeholder="exemplo@exemplo.com" id="emailCadastro" name="e-mail" type="text" aria-describedby="emailHelp">
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