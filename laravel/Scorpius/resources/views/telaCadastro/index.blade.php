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
<form action="" method="POST">
    <input placeholder="Nome" id="nomeCadastro" name="nome" type="text">
    <input placeholder="Sobrenome" id="sobrenomeCadastro" name="sobrenome" type="text"><br>
    <input placeholder="E-mail" id="emailCadastro" name="e-mail" type="text"><br>
    <input type="text" class="" placeholder="000.000.000-00">
    <!-- Os radio buttons -->
    <div class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
        <label for="optionsRadios1">Visitante</label>
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        <label for="optionsRadios2">Representante</label>
    </div>

    <input placeholder="Senha" id="senhaCadastro" name="senha" type="password"><br>
    
    <button type="button" class="btn btn-dark-green">Cadastre-se</button><br>
</form>
<h5>
    Por cadastre-se, você aceita os <a target="_blank" href="">Termos</a> e a 
    <a target="_blank" href="">Politica de Privacidade</a>.
</h5>



@endsection