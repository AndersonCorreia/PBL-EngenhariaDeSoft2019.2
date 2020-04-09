@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Erro ao Cadastrar Usuário!')

@section('conteudo')
<head>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3">
        <p class="h3">Erro ao Cadastrar novo usuário!</p>
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Não foi possível cadastrar um novo usuário :(</h4>
                <hr>
            <div class="container form-group" style="margin-top: 5px">  
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
