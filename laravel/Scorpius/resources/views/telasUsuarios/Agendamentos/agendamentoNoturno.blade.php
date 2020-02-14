@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('css/scorpius.css') }}">

<div class="row col-12 scorpius-border p-3">
    <div class="col-12 m-0 p-0 scorpius-border-shadow p-3 ">
        @include('telasUsuarios.Agendamentos._includes.escolhaDeExposicoes')
    </div>
    <div class="col-12 mt-4 p-0 scorpius-border-shadow p-3">
        @include('telasUsuarios.Agendamentos._includes.calendar')
    </div>
    <div id="formulario" class="col-12 mt-4 scorpius-border-shadow p-3">
        @include('telasUsuarios.Agendamentos._includes.formularioAgendamentoIndividual')
    </div>
</div>

@endsection


@section('css')
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
@endsection

@section('js')
<script src={{ asset('js/agendamento.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script>
$(document).foundation();

$('.dados-pessoais').on('click', '.btn_add', function(e){
    e.preventDefault();
    var element = $($('.box')[0]).clone();
    element.find('.nome').attr('id', null);
    element.find('.cargo').attr('id', null);
    element.find('.nome').attr('val', null);
    element.find('.cargo').attr('val', null);
    $('.dados-pessoais').append(element);
});

$('.dados-pessoais').on('click', '.btn_remove', function(e){
    e.preventDefault();
    if ($('.box').length > 1){
        let div = $(this).parent().parent();
        $(div).remove()
    }
});
</script>
@endsection