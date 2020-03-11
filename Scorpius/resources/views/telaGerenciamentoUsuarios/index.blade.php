@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciamento de Usuários')

@section('conteudo')

<div class="scorpius-border p-4">
  <div class="row scorpius-border-shadow p-3">
    <div class="col-sm"><h3>Nome</h3></div>
    <div class="col-sm"><h3>Telefone</h3></div>
    <div class="col-sm"><h3>Tipo Usuário</h3></div>
  </div>

  <div class="row scorpius-border-shadow mt-2 p-3">
    <div class="col-sm"><h4>{Nome}</h4></div>
    <div class="col-sm"><h4>{Telefone}</h4></div>
    <div class="col-sm"><h4>{Tipo Usuário}</h4></div>
  </div>
</div>

@endsection
@section('js')

@endsection