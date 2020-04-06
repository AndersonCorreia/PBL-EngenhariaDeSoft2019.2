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
    @if(($agendamentosInstitucionais ?? ['não exibir']) === [])
    <div class="alert alert-info" role="alert">
        <span>Nenhum <b>agendamento institucional</b> para exibir.<br>
            Qualquer <b>agendamento institucional</b> com a data de visita igual ou posterior a hoje
            é exibido aqui, inclusive os cancelados.
        </span><br>
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
    @else
    <div class="alert alert-info" role="alert">
        <span>Nenhum <b>agendamento individual</b> para exibir.<br>
            Qualquer <b>agendamento individual</b> com a data de visita igual ou posterior a hoje é exibido aqui,
            inclusive os cancelados.
        </span><br>
    </div>
    @endif
</div>
@endsection