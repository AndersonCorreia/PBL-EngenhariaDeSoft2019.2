@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Historico de Visitas')

@section('conteudo')
<div class="col-12 m-0 p-3 ">
    @if($agendamentosInstitucionais)
    <div class="row col-12 mb-3 m-0 p-0 px-2 scorpius-border-shadow vh-40">
        <h4 class="p-1 m-1 col-12">Histórico de Agendamentos Institucionais</h4>
        <hr class="bg-light col-12 linha rounded p-0 m-0">
        <div class="overflow-auto h-75 col-12 m-0 pr-3 p-2">
            @foreach ($agendamentosInstitucionais as $agend)
                @include('telasUsuarios.HistoricoDeVisitas._includes.institucional')
            @endforeach
        </div>
    </div>
    @endif
    @if($agendamentos != [])
    <div class="row col-12 m-0 p-0 px-2 scorpius-border-shadow vh-40">
        <h4 class="p-1 m-1 col-12">Histórico de Agendamentos Individuais</h4>
        <hr class="bg-light col-12 linha rounded p-0 m-0">
        <div class="overflow-auto h-75 row col-12 m-0 px-2">
            @foreach ($agendamentos as $agend)
                <div class="col-12 col-md-6 m-0 p-md-1 p-0">
                    @include('telasUsuarios.HistoricoDeVisitas._includes.individual')
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection