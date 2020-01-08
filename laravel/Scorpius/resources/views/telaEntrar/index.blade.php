<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
<div class="text-center">
    <h1>Cadastre-se</h1>
    <h5>Não possui uma conta? <a href="{{ route('cadastrar') }}"> Cadastre-se</a></h5><br>
    <div id="redes-sociais-login" class="btn-toolbar col-md-10" role="toolbar">
        <div class="btn-group mr-3 ml-3" role="group">
            <button type="button" class="btn btn-primary" style="font-size:13px">
                <i class="fa fa-facebook-square" style="font-size:13px;color:white"></i>   Entrar com o Facebook
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-danger" style="font-size:13px">
                <i class="fa fa-google-plus" style="font-size:13px;color:white"></i>   Entrar com o Google
            </button>
        </div>
    </div>
</div>
<br>
<form class="form-group col-md-10" action="" method="POST">
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

    <button type="submit" class="btn btn-success btn-lg btn-block" style="font-size:15px">Entrar</button><br>
</form>
<h7 class="col-md-10">
    Esqueceu a sua senha? <a target="_blank" href="">Ajuda.</a>.
</h7>

@endsection