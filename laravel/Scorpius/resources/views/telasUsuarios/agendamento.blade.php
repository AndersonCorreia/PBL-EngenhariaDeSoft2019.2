@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')

<div class="row col-12 ">
    <div class="col-12 m-0 p-0">
        @include('telasUsuarios._includes.escolhaDeExposicoes')
    </div>
    <div class="col-12 mt-4 p-0">
        @include('telasUsuarios._includes.calendar')
    </div>
    <div id="formulario" class="col-12 mt-4 border">
    @if($tipoUser["tipo"] == "institucional")
        @include('telasUsuarios._includes.formularioAgendamento')
    @else
        @include('telasUsuarios._includes.formularioAgendamentoIndividual')
    @endif
    </div>
</div>
@endsection