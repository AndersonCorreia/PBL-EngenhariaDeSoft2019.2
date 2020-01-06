<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('conteudo')
<div class="text-center">
    <h1>Cadastre-se</h1>
    <h4>Já possui uma conta? <a href=""> Entre</a></h4><br>
    <div class="">
        <button type="button" class="btn btn-md btn-fb"><i class="fab fa-facebook-f pr-1"></i>Cadastre-se com o Facebook</button>
        
        <button type="button" class="btn btn-gplus"><i class="fab fa-google-plus-g pr-1"></i> Cadastre-se com o Google</button>
    </div>
</div>
<br>
<form class="form-group col-md-10" action="" method="POST">
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
        <small id="emailHelp" class="form-text text-muted">Insira um e-mail válido.</small>
    </div>
    
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="cpfCadastro">CPF</label>
                <input id="cpfCadastro" placeholder="000.000.000-00" type="text" minlength="14" maxlength="14" class="form-control">
            </div>
             <!-- Tipo de usuário -->
            <div id="usuario" class="col">
                <div class="row">
                <legend class="col-form-label pt-0">Tipo de usuário</legend>
            <div id="tipoUsuario" class="col">
                    <input class="form-check-input" type="radio" name="tipoUsuario" id="visitante" value="1" checked>
                    <label class="form-check-label" id="tamanho_label" for="visitante">Visitante</label>
            </div>
            <div class="col">
                <input class="form-check-input" type="radio" name="tipoUsuario" id="representante" value="2">
                <label class="form-check-label" id="tamanho_label" for="representante">Representante de instituição</label>
                </div>   
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="senha1">Senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha1">
    </div>
    <div class="form-group">
        <label for="senha2">Repita a senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha2">
    </div>

    <button type="submit" class="btn btn-dark-green">Cadastre-se</button><br>
</form>
<h7 class="col-md-10">
Por cadastre-se, você aceita os <a target="_blank" href="">Termos</a> e a 
    <a target="_blank" href="">Politica de Privacidade</a>.
</h7>
<style>
    #cpfCadastro{
        width:150px; 
        height:25px;
    }

    #usuario {
        width:100%;
    }

    #tamanho_label {
        width:210px; 
        height:25px;
    }


</style>
@endsection