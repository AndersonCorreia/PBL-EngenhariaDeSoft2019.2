@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento Noturno')

@section('conteudo')
<div class="row col-12 m-0 p-3">
    <form id="form.agendamento" class="container-fluid px-4" method="POST">
        {{csrf_field()}}
        @include('telasUsuarios.Agendamentos._includes.agendamentos')
        <div class="col-12 m-0 p-0 scorpius-border-shadow p-3 ">
            @include('telasUsuarios.Agendamentos._includes.escolhaDeExposicoes')
        </div>
        <div class="col-12 mt-4 p-0 scorpius-border-shadow p-3">
            @include('telasUsuarios.Agendamentos._includes.calendar')
        </div>
        <div id="formulario" class="col-12 mt-4 scorpius-border-shadow p-3">
            @include('telasUsuarios.Agendamentos._includes.formularioAgendamentoIndividual')
        </div>
    </form>
</div>

@endsection


@section('css')
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
@endsection

@section('js')
<script src={{ asset('js/agendamento.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
@endsection