@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')

@include('telasUsuarios._includes.escolhaDeExposicoes')
@include('telasUsuarios._includes.calendar')

<div class="row col-12 pl-5 pr-4">
    <div id="formulario" class="col-12 border">
    @if($tipoUser["tipo"] == "institucional")
        @include('telasUsuarios._includes.formularioAgendamento')
    @else
        @include('telasUsuarios._includes.formularioAgendamentoIndividual')
    @endif
    </div>
</div>
@endsection