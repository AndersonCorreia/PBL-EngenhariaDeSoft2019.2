<!-- Aqui é a tela de Cadastre-se -->
@extends('layouts.templateLogin')

@section('title', 'Cadastre-se - Scorpius')

@section('img')
<div id="img" class="carousel slide h-100" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#img" data-slide-to="0" class="active"></li>
        <li data-target="#img" data-slide-to="1"></li>
        <li data-target="#img" data-slide-to="2"></li>
        <li data-target="#img" data-slide-to="3"></li>
        <li data-target="#img" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner h-100">
        <div id="imgs" class="carousel-item active">
            <img id="img-background-1" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-1.png') }}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-2" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-2.png') }}" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-3" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-3.png') }}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-4" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-4.png') }}" alt="Quarto Slide">
        </div>
        <div class="carousel-item">
            <img id="img-background-5" class="d-block w-100"
                src="{{ asset('img\tela_login\background-cadastro-5.png') }}" alt="Quinto Slide">
        </div>
    </div>
</div>
@endsection

@section('conteudo')

<div class="text-center mx-auto my-0 col-10">
    <h4>Cadastre-se</h4>
    <h5>Já possui uma conta? <a href="{{ route('entrar') }}"> Entre</a></h5>
    {{-- <div id="redes-socias">
        <a style="font-size: 15px;" href="{{ url('/login/facebook') }}" class="btn btn-primary btn-lg btn-block"
            style="font-size:13px;color:white">
            <i class="fa fa-facebook-square" style="font-size:13px;color:white"></i> Cadastrar-se com o Facebook
        </a>
        <a style="font-size: 15px;" href="{{ url('/login/google') }}" class="btn btn-danger btn-lg btn-block"
            style="font-size:13px;color:white">
            <i class="fa fa-google-plus" style="font-size:13px;color:white"></i> Cadastrar-se com o Google
        </a>
    </div> --}}
</div>
<form class="form-group form-row mx-auto mt-3 mb-0 p-0 col-10" action="" method="POST">
    {{ csrf_field() }}
    <!-- Nome completo -->
    <div class="col-5">
        <label for="nome">Nome</label>
        <input name="nome" id="nome" type="text" class="form-control" placeholder=""
            pattern="[a-zA-ZÀ-Úà-ú]+$$" title="Infome apenas letras"required >
    </div>
    <div class="col-7">
        <label  for="sobrenome">Sobrenome</label>
        <input  name="sobrenome" id="sobrenome" type="text" class="form-control" placeholder=""
            pattern="[a-zA-ZÀ-Úà-ú ]+$$" title="Infome apenas letras" required>
    </div>
    <!-- E-mail -->
    <div class="col-8 mt-1">
        <label for="emailCadastro">E-mail</label>
        <input class="form-control" placeholder="exemplo@exemplo.com" id="emailCadastro" name="email" type="email"
            required aria-describedby="emailHelp">
        @if($ERRO == 'EMAIL')
        <small id="emailHelp" class="form-text text-danger">{{$MSG_ERRO}}</small>
        @else
        <small id="emailHelp" class="form-text text-muted">Insira um e-mail válido, pois validaremos sua conta com
            ele.</small>
        @endif
    </div>
    <!-- CPF -->
    <div class="col-4 mt-1">
        <label for="cpfCadastro">CPF</label>
        <input aria-describedby="cpfHelp" name="cpf" id="cpfCadastro" placeholder="00000000000" type="text" minlength="11" inputmode="number"
            maxlength="11" class="form-control" required pattern="[0-9]{11}" title="Informe apenas os numeros do CPF sem '.' e sem '-'.">
        @if($ERRO == 'CPF')
        <small id="cpfHelp" class="form-text text-danger">{{$MSG_ERRO}}</small>
        @endif
    </div>
    <!-- Tipo Usuario -->
    <div class="col-8 mb-0 mt-1">
        <label for="tipoUsuario">Tipo de Usuário: </label>
        <select name="tipo" class="form-control" id="tipoUsuario">
            <option value="visitante">Visitante</option>
            <option value="institucional">Representante de Instituição (ex.: professor)</option>
        </select>
    </div>
    <!-- Telefone -->
    <div class="col-4 mb-0 mt-1">
        <label for="telefone">Telefone</label>
        <input name="telefone" placeholder="(75)99999-9999" type="text" class="form-control" id="telefone"
            pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" title="Numero de telefone com DD no formato (xx)xxxxx-xxxx" required>
    </div>
    <!-- Senha -->
    <div class="form-group col-12 my-1">
        <label for="senha1">Senha</label>
        <input minlength="4" maxlength="8" type="password" class="form-control" id="senha1" required>
    </div>
    <!-- Repitir senha -->
    <div class="form-group col-12 my-0">
        <label for="senha2">Repita a senha</label>
        <input name="senha" minlength="4" maxlength="8" onkeyup="confirmarSenha()" aria-describedby="senhaHelp" type="password" class="form-control" id="senha2" required>
        <small id="senhaHelp" class="form-text text-danger"></small>
    </div>

    <div class="form-group col-12 mt-2 mb-0">
        <button id='submit' type="submit" onclick="confirmarSenhaSubmit()" class="btn btn-success btn btn-block">Cadastre-se</button>
        
        <h6 class="float-right" style="font-size:13px">
            Por cadastre-se, você aceita os <a target="_blank" href="">Termos</a> e a
            <a target="_blank" href="">Politica de Privacidade</a>.
        </h6>
    </div>
</form>

@endsection

@section('js')
<script src="{{ asset("/js/paginaCadastro.js")}}" ></script>
@endsection