@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')

@include('telasUsuarios.calendar')

<div class="row col-12 pl-5 pr-4">
    <div id="formulario" class="col-12 border">
    @if($tipoUser["tipo"] == "institucional")
        @include('telasUsuarios.formularioAgendamento')
    @else
        @include('telasUsuarios.formularioAgendamentoIndividual')
    @endif
    </div>
</div>
@endsection