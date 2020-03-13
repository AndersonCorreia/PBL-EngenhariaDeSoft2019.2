@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')
<div class="alert mx-4 mt-2 p-2 alert-danger" role="alert">
    <p>Não existem vagas o suficiente para os visitantes adicionados. <br>
    </p>
</div>
<div class="alert alert-info mx-4 mb-2 m-0 p-2" role="alert">
    <span>
        Ainda é possivel realizar agendamentos em outras exposições, caso o limite de vagas não seja excedido.
    </span>
</div>

@endsection