@extends('TelaCheckinVisitas.checkinVisitas')
@section('checkinEstagiario')
<div class="container-fluid bg-white shadow-sm p-2"
    style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
    @if ($visitantes == NULL)
    <div class="alert alert-secondary" role="alert">Não há visitas marcadas.</div>
    @else
    <div class="row ml-3 mr-3">
        <div class="col-md-4">
            <p class="h3 float-left">Próxima visitação</p>
        </div>
        <div class="col-md-2">
            <p class="h3">{{$visitantes['dia']['turno']}}</p>
        </div>
        <div class="col-md-4">
            <p class="h3 text-center">{{$visitantes['dia']['data']}}</p>
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning float-right">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                Concluir visita
            </button>
        </div>
    </div>
</div>
<div class="p-4">
    @if(isset($visitantes['visitantes'][0]['aluno']))
    <div id="escola">
        <div class="container-fluid bg-secondary p-2 text-white border-all-50">
            <div class="row">
                <div class="col-md-5">
                    <input type="hidden" value="{{$visitantes['visitantes'][0]['instituicao']['ID']}}">
                    <p class="h5 ml-1 mt-1">{{$visitantes['visitantes'][0]['instituicao']['nome']}}</p>
                </div>
                <div class="cold-md-5">
                    <input type="hidden" value="{{$visitantes['visitantes'][0]['professor']['ID']}}">
                    <p class="h5 mt-1 ml-2">{{$visitantes['visitantes'][0]['professor']['nome']}}</p>
                </div>
                <div class="col-md-4">
                    <p class="h5 float-right mt-1">
                        Quantidade: {{count($visitantes['visitantes'][0]['aluno'])}}
                    </p>
                </div>
            </div>
        </div>
        {{-- FOREACH --}}
        <div class="pl-3 pr-3 pt-1">
            <input type="hidden" value="{{$i = 0}}">
            @foreach ($visitantes['visitantes'][0]['aluno'] as $aluno)
            <div class="scorpius-border-shadow border-all-50 p-2 mt-1">
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
                        {{-- <form name="checkinAluno" method="POST"> --}}
                            {{csrf_field()}}
                            <meta name="csrf-token" content="{{csrf_token()}}">
                            
                            <input id="aluno{{$i}}" type="hidden" value="{{$aluno[0]}}">
                            <button class="btn btn-outline-secondary" type="submit" value="aluno{{$i}}" aria-pressed="false" presente>
                                Presente
                            </button>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @if (isset($visitantes['visitantes'][1]['usuario']))
    <div id="visitantesComuns" class="mt-3">
        <div class="container-fluid bg-secondary p-2 text-white border-all-50">
            <div class="row mr-3">
                <div class="col-md-9 text-center">
                    <p class="h5">Demais visitantes</p>
                </div>
                {{-- <div class="col-md-3">
                <p class="h5 float-right">{checados} | {total}</p>
            </div> --}}
            </div>
        </div>
        <div class="pl-3 pr-3 pt-1">
            <div class="scorpius-border-shadow border-all-50 p-2 mt-1">
                {{-- {{dd($visitantes)}} --}}
                @for($j = 1; $j < count($visitantes['visitantes']); $j++)
                    {{-- {{dd($visitantes['visitantes'][1]['usuario'])}} --}} 
                    <input type="hidden" value="{{$i = 0}}">
                    <div class="row text-center">
                        <div class="col-md-1">
                            <p class="h5 mt-1">
                                {{$i++}}
                            </p>
                        </div>
                        {{-- {{dd($visitantes)}} --}}
                        <div class="col-md-5">
                            <p class="h5 mt-1">
                                {{$visitantes['visitantes'][$j]['usuario'][1]}}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="h5 mt-1">
                                {{$visitantes['visitantes'][$j]['usuario'][4]}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <form name="checkinVisitante" method="POST">
                                <input id="usuario{{$i}}" type="hidden"
                                    value="{{$visitantes['visitantes'][$j]['usuario'][0]}}">
                                <button class="btn btn-outline-secondary" value="usuario{{$i}}" aria-pressed="false">
                                    Presente
                                </button>
                            </form>
                        </div>
                    </div>
                    @endfor
            </div>
        </div>
    </div>
    @endif
    @endif

</div>
@endsection