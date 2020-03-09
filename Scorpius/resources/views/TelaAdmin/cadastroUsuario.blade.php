@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastro de Usuário')

@section('conteudo')

@if($errors->any())
    <ul>
        @foreach($errors->all() as $eror)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
{{-- Nome
Senha
Confirmacao
Tel de contato
tipo de usuario --}}
<form class="col-lg-10 col-xl-9 col-12 mx-sm-auto mt-sm-4" method="POST" action="">
    {{csrf_field()}}
    <div class="form-group">
        <label for="Nome">Nome</label>
        <input type="name" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Seu Nome">
      </div>
      <div class="form-group">
        <label for="Senha">Senha</label>
        <input type="password" class="form-control" id="Senha" placeholder="Senha">
      </div>
      <div class="form-group">
        <label for="ConfSenha">Confirmação de Senha</label>
        <input type="password" class="form-control" id="ConfSenha" placeholder="Repita a Senha">
      </div>
      <div class="form-group">
        <label for="Telefone">Telefone de contato</label>
        <input type="phone" class="form-control" id="Telefone" placeholder="Telefone">
      </div>
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="cpf" class="form-control" id="cpf" placeholder="CPF">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="UserType">Tipo do Usuário</label>
        <select class="form-control" id="UserType">
          <option value="10">Administrador</option>
          <option value="9">Funcionário</option>
          <option value="8">Estagiário</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <button type="submit" class="btn btn-outline-secondary">Limpar</button>
</form>
@endsection


@section('css')
<style type="text/css">
    form .form-group{
        padding:2%;
    }
    form span{
        color: black;
        text-decoration: none;   
    }
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
@endsection