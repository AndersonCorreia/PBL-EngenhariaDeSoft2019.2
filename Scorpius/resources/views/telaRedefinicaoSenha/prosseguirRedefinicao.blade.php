@extends('layouts.templateLogin')

@section('title', 'Esqueci minha senha')
@section('img')
<div id="img" class="carousel slide col-12 p-0 m-0 w-100  h-100" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#img" data-slide-to="0" class="active"></li>
        <li data-target="#img" data-slide-to="1"></li>
        <li data-target="#img" data-slide-to="2"></li>
        <li data-target="#img" data-slide-to="3"></li>
        <li data-target="#img" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner p-0 m-0  h-100">
        <div id="imgs" class="carousel-item active h-100">
            <img id="img-background-1" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-1.jpg') }}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item h-100">
            <img id="img-background-2" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-2.jpg') }}" alt="Segundo Slide">
        </div>
        <div class="carousel-item  h-100">
            <img id="img-background-3" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-3.jpg') }}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item  h-100">
            <img id="img-background-4" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-4.jpg') }}" alt="Quarto Slide">
        </div>
        <div class="carousel-item h-100">
            <img id="img-background-5" class="d-block  img-fluid"
                src="{{ asset('img\tela_login\background-login-5.jpg') }}" alt="Quinto Slide">
        </div>
    </div>
</div>
@endsection
@section('conteudo')
<div class="text-center mx-auto col col-md-10">
    <h5>Redefina sua senha</h5>
</div>
<form class="form-group mt-5 mx-auto col col-md-10" name="form1" action="{{route('redefinirSenha', [ 'usuario_email' =>$email, 'token' => $token])}}" method="POST">
    {{csrf_field()}}
    <!-- Senha -->
    <div class='container'>
        <div class="form-group">
            <label for="senha">Insira sua nova senha</label>
            <input class="form-control"  type="password" id="novaSenha" name="novaSenha">
            <label for="senha">Repetir senha</label>
            <input class="form-control"  type="password" id="repetir_senha" name="repetir_senha">
        </div>
        <button type="submit" onclick="return validar()" class="btn btn-success btn-lg btn-block" style="font-size:15px">Enviar</button>
    </div>
</form>
@endsection

@section('js')
<script>
function validar() {
var senha = form1.novaSenha.value;
var rep_senha = form1.repetir_senha.value;
    if (senha != rep_senha) {
        alert('Senhas diferentes! Digite novamente.');
        form1.senha.focus();
        return false;
    }
}
</script>
@endsection