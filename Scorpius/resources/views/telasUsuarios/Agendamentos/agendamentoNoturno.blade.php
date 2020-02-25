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

{{-- <script src={{ asset('js/agendamento.js') }}></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script>

function adicionarInd(){
    var element = $('.box:last').clone();
    var cont = element.children('.nome-visitante').children('input').attr('name').replace('responsavel', '');
    if(cont > 4){
        return alert('Quantidade máx. de visitantes atingida');
    }
    element.children('.nome-visitante').children('input').attr('name', 'visitante[]');
    element.children('.rg-visitante').children('input').attr('name', 'rg[]');
    element.children('.idade-visitante').children('input').attr('name', 'idade[]');
    element.children('.nome-visitante').children('input').val('');
    element.children('.rg-visitante').children('input').val('');
    element.children('.idade-visitante').children('input').val('');
    $('#dados-visitantes-campos').append(element);
}

$('form').on('click', '.btn-remover', function(e){
    e.preventDefault();
    if ($('.box').length > 1){
        $(this).parents('.box').remove();
    }
 });

$('#btn-adicionarInd').on("click", adicionarInd);
</script>
@endsection