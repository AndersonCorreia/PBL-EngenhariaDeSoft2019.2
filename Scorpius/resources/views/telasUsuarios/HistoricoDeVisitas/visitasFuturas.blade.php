@extends('layouts.templateGeralTelasUsuarios')

@section('title', $paginaAtual)

@section('conteudo')
<div class="col-12 m-0 px-3 py-3 p-0">
    @if($agendamentosInstitucionais)
    <div class="row col-12 mb-3 m-0 vh-40 px-2 p-0 scorpius-border-shadow">
        <h4 class="p-1 m-1 col-12">Agendamentos Institucionais</h4>
        <hr class="bg-light col-12 linha rounded p-0 m-0">
        <div class="overflow-auto h-75 col-12 m-0 px-2">
            @foreach ($agendamentosInstitucionais as $agend)
                @include('telasUsuarios.HistoricoDeVisitas._includes.institucional')
            @endforeach
        </div>
    </div>
    @endif
    @if($agendamentos != [])
    <div class="row col-12 m-0 p-2 vh-40 scorpius-border-shadow">
        <h4 class="p-1 m-1 col-12">Agendamentos Individuais</h4>
        <hr class="bg-light col-12 linha rounded p-0 m-0">
        <div class="overflow-auto h-75 col-12 row m-0 px-2">
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