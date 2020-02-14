@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('css/scorpius.css') }}">

<div class="row col-12 scorpius-border container-fluid p-4 mr-3">
    <div class="col-12 m-0 p-0  scorpius-border-shadow container-fluid p-2">
        @include('telasUsuarios.Agendamentos._includes.escolhaDeExposicoes')
    </div>
    <div class="col-12 mt-4 p-0 scorpius-border-shadow container-fluid p-2">
        @include('telasUsuarios.Agendamentos._includes.calendar')
    </div>
    <div id="formulario" class="col-12 mt-4 scorpius-border-shadow container-fluid p-2">
        @if($tipoUserLegenda["tipo"] == "institucional")
        @include('telasUsuarios.Agendamentos._includes.formularioAgendamento')
        @else
        @include('telasUsuarios.Agendamentos._includes.formularioAgendamentoIndividual')
        @endif
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
function adicionar(){
    var element = $('.box:last').clone();
    var cont = element.children('.nome-responsavel').children('input').attr('name').replace('responsavel', '');
    if(cont > 4){
        return alert('Quantidade máx. de responsáveis atingida');
    }
    element.children('.nome-responsavel').children('input').attr('name', 'responsavel' + (++cont));
    element.children('.cargo-responsavel').children('input').attr('name', 'cargo' + cont);
    element.children('.nome-responsavel').children('input').val('');
    element.children('.cargo-responsavel').children('input').val('');
    $('#dados-responsavel-campos').append(element);

}
function remover(){
    if($('.box').length > 1){
        $('.box:last').remove();
    }
}
$('#btn-adicionar').on("click", adicionar);
$('#btn-remover').on("click", remover);
</script>

@endsection