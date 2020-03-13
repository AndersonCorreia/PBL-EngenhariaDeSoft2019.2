@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Alteração de Dados Com SUCESSO!')

@section('conteudo')
<head>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3">
        <p class="h3">Dados pessoais Alterados</p>
        <div class="alert alert-sucess" role="alert">
          <h4 class="alert-heading">Dados Alterados com SUCESSO!</h4>
                <hr>
            <div class="container form-group">  
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
