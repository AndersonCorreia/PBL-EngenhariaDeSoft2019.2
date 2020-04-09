@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'SUCESSO ao Cadastrar novo usuário!')

@section('conteudo')
<head>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3">
        <p class="h3">Novo Usuário Cadastrado!</p>
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">SUCESSO ao Cadastrar novo usuário!</h4>
                <hr>
            <div class="container form-group">  
              <a type="button" style="margin-top: 5px" href="/adm/admin/cadastro" class="btn btn-primary">
                <span aria-hidden="true">Cadastrar Novo Usuário</span>
              </a>
              <a type="button" style="margin-top: 5px" href="/adm/gerenciar-usuarios" class="btn btn-primary">
                <span aria-hidden="true">Gerenciar Usuários</span>
              </a>
                <a type="button" style="margin-top: 5px" href="/dashboard" class="btn btn-primary">
                  <span aria-hidden="true">Voltar ao Início</span>
                </a>
            </div>
      </div>
    </div>
</div>

@endsection
