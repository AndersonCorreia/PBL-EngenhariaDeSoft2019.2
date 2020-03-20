@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Historico de Visitas')

@section('conteudo')
<div class="col-12 m-0 p-3 h-100">
    @if($agendamentosInstitucionais)
    <div class="row col-12 mb-3 m-0 p-0 scorpius-border-shadow hw-50 d-table">
        <h4 class="ml-1 p-1 m-1 mb-2 col-12">Histórico de Agendamentos Institucionais</h4>
        <hr class="bg-light col-12 linha rounded p-0 m-0">
        <div class="overflow-auto h-75 col-12 m-0 pr-3 p-2">
            @foreach ($agendamentosInstitucionais as $agend)
                @include('telasUsuarios.HistoricoDeVisitas._includes.institucional')
            @endforeach
        </div>
    </div>
    @endif
    @if($agendamentos != [])
    <div class="row col-12 m-0 p-2 scorpius-border-shadow hw-50 d-table">
        <h4 class="ml-1 p-1 m-1 mb-2 col-12">Histórico de Agendamentos Individuais</h4>
        <hr class="bg-light col-12 linha rounded p-0 m-0">
        <div class="overflow-auto h-75 row col-12 m-0 p-2">
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