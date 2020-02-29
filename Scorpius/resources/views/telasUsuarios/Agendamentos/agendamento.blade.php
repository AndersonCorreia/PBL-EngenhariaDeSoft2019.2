@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')

<div class="row col-12 ">
    <div class="container-fluid scorpius-border-shadow p-4">
        @if($tipoUserLegenda["tipo"] == "institucional")
        <div class="col-12 m-0 p-0">
            <div class="container-fluid bg-white scorpius-border-shadow p-3" >
                @include('telasUsuarios.Agendamentos._includes.escolhaDeExposicoes')
            </div>
        </div>
        @endif
        <div class="col-12 mt-4 p-0">
            <div class="container-fluid scorpius-border-shadow p-4" >
                @include('telasUsuarios.Agendamentos._includes.calendar')
            </div>
        </div>
        <div id="formulario" class="col-12 mt-4">
            <div class="container-fluid scorpius-border-shadow p-4" >
                @if($tipoUserLegenda["tipo"] == "institucional")
                    @include('telasUsuarios.Agendamentos._includes.formularioAgendamento')
                @else
                    @include('telasUsuarios.Agendamentos._includes.formularioAgendamentoIndividual')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src={{ asset('js/agendamento.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
@endsection