@extends('TelaCheckinVisitas.checkinVisitas')
@section('css')
<style>

</style>
@endsection
@section('checkinFuncionario')
<div class="container-fluid bg-white scorpius-border p-4">
  <p class="h3 mt-1">Próximas visitas</p>
  @if ($visitantes == NULL)
  <div class="alert alert-secondary" role="alert">Não há visitas marcadas.</div>
  @else
  {{-- {{dd($visitantes)}} --}}
  <?php $quant = 0;?>
  <div class="row">
    <div class="col-md-2 text-center">
      <p class="4"></p>
    </div>
    <div class="col-md-5 text-center">
      <p class="h4">Data</p>
    </div>
    <div class="col-md-5 text-center">
      <p class="h4">Turno</p>
    </div>
  </div>
  @foreach($visitantes as $visita)
  <?php $quant++;?>
  <div class="list-group mt-2">
    <button type="button" class="list-group-item list-group-item-action" data-toggle="modal"
      data-target="#visita{{$quant}}">
      <div class="row">
        <div class="col-md-2 text-center">
          <p class="h4">{{$quant}}°</p>
        </div>
        <div class="col-md-5 text-center">
          <p class="h4">{{$visita['dia']['data']}}</p>
        </div>
        <div class="col-md-5 text-center">
          <p class="h4">{{strtoupper($visita['dia']['turno'])}}</p>
        </div>
      </div>
    </button>
  </div>
  <div class="modal fade bd-example-modal-lg" id="visita{{$quant}}" tabindex="-1" role="dialog"
    aria-labelledby="visita{{$quant}}Title" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header row">
          {{-- <h5 class="modal-title" id="visita{{$quant}}Title">Modal title</h5> --}}
            <div class="col-md-4">
              <p class="h3 text-center">{{$visita['dia']['data']}}</p>
            </div>
            <div class="col-md-3 text-center">
              <p class="h3">{{strtoupper($visita['dia']['turno'])}}</p>
            </div>
            <div class="col-md-4">
              <form name="concluirVisita" method="post">
                @csrf
                <input type="hidden" value="{{ $visita['visita_ID'] }}">
                <button class="btn btn-warning float-right">
                  <i class="fa fa-check-square" aria-hidden="true"></i>
                  Concluir visita
                </button>
              </form>
            </div>
            <div class="col-md-1">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
        <div class="modal-body">
          <div class="p-1">
            @if(isset($visita['visitantes'][0]['aluno']))
            <div id="escola">
              <div class="container-fluid bg-secondary p-2 text-white border-all-50 text-center">
                
                  <div>
                    <input type="hidden" value="{{$visita['visitantes'][0]['instituicao']['ID']}}">
                    <p class="h5 ml-1 mt-1">{{$visita['visitantes'][0]['instituicao']['nome']}}</p>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <input type="hidden" value="{{$visita['visitantes'][0]['professor']['ID']}}">
                      <p class="h5 mt-1 ml-5 float-left">{{$visita['visitantes'][0]['professor']['nome']}}</p>
                    </div>
                    <div class="col-md-4">
                      <p class="h5 float-left mt-1">
                        Quantidade: {{count($visita['visitantes'][0]['aluno'])}}
                      </p>
                    </div>
                  </div>
                
              </div>
              {{-- FOREACH --}}
              <div class="pl-3 pr-3 pt-1">
                <input type="hidden" value="{{$i = 0}}">
                @foreach ($visita['visitantes'][0]['aluno'] as $aluno)
                <div class="scorpius-border-shadow-sm border-all-50 p-2 mt-1">
                  <div class="row text-center">
                    <div class="col-md-1">
                      <p class="h5 mt-1">
                        {{$i++}}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p class="h5 mt-1">
                        {{$aluno[1]}}
                      </p>
                    </div>
                    <div class="col-md-3">
                      <p class="h5 mt-1">
                        {{$aluno[3]}} anos
                      </p>
                    </div>
                    <div class="col-md-2 btn-presente">
                      <form name="checkinAluno" method="POST">
                        {{csrf_field()}}
                        <meta name="csrf-token" content="{{csrf_token()}}">

                        <input type="hidden" value="{{$aluno[0]}}">
                        @if ($aluno[2] == 'compareceu')
                        <button type="submit" class="btn-outline-success btn" data-toggle="button" aria-pressed="true"
                          id="aluno{{$i.''.$aluno[0]}}">Presente</button>
                        @else
                        <button type="submit" class="btn-outline-secondary btn" data-toggle="button"
                          aria-pressed="false" id="aluno{{$i.''.$aluno[0]}}">Presente</button>
                        @endif
                        {{-- <button class="btn btn-outline-secondary" id="aluno{{$i}}" type="submit"
                        value="aluno{{$i}}" aria-pressed="false">
                        Presente
                        </button> --}}
                      </form>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            @if (isset($visita['visitantes'][1]['usuario']))
            <div id="visitantesComuns" class="mt-3">
              <div class="container-fluid bg-secondary p-2 text-white border-all-50">
                <div class="row mr-3">
                  <div class="col-md-9 text-center">
                    <p class="h5">Demais visitantes</p>
                  </div>
                  {{-- <div class="col-md-3">
                        <p class="h5 float-right">{checados} | {total}</p> presente
                    </div> --}}
                </div>
              </div>
              <div class="pl-3 pr-3 pt-1">
                <div class="scorpius-border-shadow border-all-50 p-2 mt-1">
                  {{-- {{dd($visita)}} --}}
                  @for($j = 1; $j < count($visita['visitantes']); $j++) {{-- {{dd($visita['visitantes'][1]['usuario'])}}
                    --}} <input type="hidden" value="{{$i = 0}}">
                    <div class="row text-center mt-2">
                      <div class="col-md-1">
                        <p class="h5 mt-1">
                          {{$i++}}
                        </p>
                      </div>
                      {{-- {{dd($visita)}} --}}
                      <div class="col-md-5">
                        <p class="h5 mt-1">
                          {{$visita['visitantes'][$j]['usuario'][1]}}
                        </p>
                      </div>
                      <div class="col-md-4">
                        <p class="h5 mt-1">
                          {{$visita['visitantes'][$j]['usuario'][4]}}
                        </p>
                      </div>
                      <div class="col-md-2">
                        <form name="checkinVisitante" method="POST">
                          @csrf
                          <input type="hidden" value="{{$visita['visitantes'][$j]['usuario'][0]}}">
                          @if ($visita['visitantes'][$j]['usuario'][2] == 'compareceu')
                          <button type="submit" class="btn-outline-success btn" data-toggle="button" aria-pressed="true"
                            id="usuario{{$i.''.$visita['visitantes'][$j]['usuario'][0]}}">
                            Presente
                          </button>
                          @else
                          <button type="submit" class="btn-outline-secondary btn" data-toggle="button"
                            aria-pressed="false" id="usuario{{$i.''.$visita['visitantes'][$j]['usuario'][0]}}">
                            Presente
                          </button>
                          @endif
                        </form>
                      </div>
                    </div>
                    @endfor
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>
@endsection