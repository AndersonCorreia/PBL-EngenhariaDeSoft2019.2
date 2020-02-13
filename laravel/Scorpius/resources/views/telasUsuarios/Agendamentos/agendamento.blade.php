@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')

<div class="row col-12 container-fluid shadow-sm bg-white p-4"
    style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
    <div class="col-12 m-0 p-0 container-fluid shadow-sm bg-white p-2"
        style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
        @include('telasUsuarios.Agendamentos._includes.escolhaDeExposicoes')
    </div>
    <div class="col-12 mt-4 p-0 container-fluid shadow-sm bg-white p-2"
        style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
        @include('telasUsuarios.Agendamentos._includes.calendar')
    </div>
    <div id="formulario" class="col-12 mt-4 border container-fluid shadow-sm bg-white p-2"
        style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
    @if($tipoUserLegenda["tipo"] == "institucional")
        @include('telasUsuarios.Agendamentos._includes.formularioAgendamento')
    @else
        @include('telasUsuarios.Agendamentos._includes.formularioAgendamentoIndividual')
    @endif
    </div>
</div>
@endsection

@section('js')

<script src={{ asset('js/agendamento.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script>
$(document).foundation();

$('.clone').click(function(e){
    e.preventDefault();
    $('.box:first').clone().appendTo($('.responsaveis'));
    $('.box').last().find('input[type="text"]').val('');
});
$('form').on('click', '.btn_remove', function(e){
    e.preventDefault();
    if ($('.box').length > 1){
        $(this).parents('.box').remove();
    }
    
 });
</script>

@endsection