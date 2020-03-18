@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento de Atividades Diferenciadas')

@section('conteudo')

<div class="row col-12 m-0 p-2">
    @foreach ($atividades as $atividade){{-- precisa de titulo, os dois campos da data, id, turno e imagem --}}
    <div class="col-12 col-md-10 col-xl-6 text-center mt-2 m-0 px-2">
        <div class="col-12 m-0 p-1 scorpius-border-shadow-sm text-left">
            @include('telasUsuarios.Agendamentos._includes.formularioAtividadesDiferenciadas')
        </div>
    </div>
    @endforeach
</div>
@endsection