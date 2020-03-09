@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento de Atividades Diferenciadas')

@section('conteudo')

<div class="row col-12">
    <div id="formulario" class="col-12 mt-4">
        <div class="container-fluid p-4 scorpius-border-shadow ">
            @include('telasUsuarios.Agendamentos._includes.formularioAtividadesDiferenciadas')
        </div>
    </div>
</div>
@endsection