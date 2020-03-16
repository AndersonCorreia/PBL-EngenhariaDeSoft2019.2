@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Erro ao Alterar Seus Dados!!!')

@section('conteudo')
<head>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3">
        <p class="h3">Erro ao alterar Dados pessoais!!!</p>
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Não foi possível alterar seus dados :(</h4>
                <hr>
            <div class="container form-group" style="margin-top: 5px">  
              <a type="button" style="margin-top: 5px" href="/alterar-dados" class="btn btn-primary">
                <span aria-hidden="true">Alterar Dados</span>
              </a>
                <a type="button" style="margin-top: 5px" href="/visitante/dashboard" class="btn btn-primary">
                  <span aria-hidden="true">Voltar ao Início</span>
                </a>
            </div>
      </div>
    </div>
</div>

@endsection
