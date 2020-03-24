@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Histórico de atividade')

@section('conteudo')

<div class="scorpius-border p-4">
    <p class="h2 mb-3">Feed</p>
  @if(empty($logs))
  <div class="alert alert-secondary" role="alert">Não há atividades registradas.</div>
  @else
  @foreach($logs as $log)
  <div class="list-group mt-2">
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$log['nome']}}</h5>
      <label class="h5">{{$log['datahora']}}</label>
      </div>
      <p class="mb-1">
          @foreach($acoes as $acao)
            @if($acao['ID'] == $log['acoes_ID'])
                {{$acao['atividade']}}
            @endif
          @endforeach
      </p>
    </a>
   </div>
  @endforeach
  @endif
</div>

@endsection
@section('js')

@endsection