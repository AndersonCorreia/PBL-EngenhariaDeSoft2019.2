@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')

<div class="row col-12 ">
    <div class="container-fluid bg-white p-4" style="border-bottom-right-radius: 20px; 
    border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
        <div class="col-12 m-0 p-0">
            <div class="container-fluid bg-white shadow p-3" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
                @include('telasUsuarios.Agendamentos._includes.escolhaDeExposicoes')

            </div>
        </div>
        <div class="col-12 mt-4 p-0">
            <div class="container-fluid shadow p-4" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
                @include('telasUsuarios.Agendamentos._includes.calendar')

            </div>
        </div>
        <div id="formulario" class="col-12 mt-4">
            <div class="container-fluid shadow p-4" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
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

{{-- <script src={{ asset('js/agendamento.js') }}></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
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
$('form').on('click', '.btn-remover', function(e){
    e.preventDefault();
    if ($('.box').length > 1){
        $(this).parents('.box').remove();
    }
 });
$('#btn-adicionar').on("click", adicionar);
// $('.btn-remover').on("click", remover);
</script>

@endsection