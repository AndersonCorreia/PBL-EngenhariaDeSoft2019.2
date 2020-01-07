<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
<div class="text-center">
    <h1>Cadastre-se</h1>
    <h5>Não possui uma conta? <a href="{{ route('cadastrar') }}"> Cadastre-se</a></h5><br>
    <div class="">
        <button type="button" class="btn btn-md btn-fb"><i class="fab fa-facebook-f pr-1"></i>Entrar com o Facebook</button>
        
        <button type="button" class="btn btn-gplus"><i class="fab fa-google-plus-g pr-1"></i> Entrar com o Google</button>
    </div>
</div>
<br>
<form class="form-group col-md-10" action="" method="POST">
    <!-- E-mail -->
    <div class="form-group">
        <label for="emailCadastro">E-mail</label>
        <input class="form-control" placeholder="exemplo@exemplo.com" id="emailCadastro" name="e-mail" type="text" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Insira um e-mail válido.</small>
    </div>
    <!-- Senha -->
    <div class="form-group">
        <label for="senha">Senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha">
    </div>

    <button type="submit" class="btn btn-dark-green">Entrar</button><br>
</form>
<h7 class="col-md-10">
    Esqueceu a sua senha? <a target="_blank" href="">Ajuda.</a>.
</h7>

@endsection