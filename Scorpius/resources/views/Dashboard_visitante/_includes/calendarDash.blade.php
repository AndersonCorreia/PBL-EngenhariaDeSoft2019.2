
{{-- 
    $visitas é uma matriz as linhas representam datas e deve ter posições numericas
    deve ter as colunas 'data' uma string como '27/11 seg', e as colunas 'manha.cor','tarde.cor','noite.cor'
    que informam as cores dos bottoes atraves de classe do bootstrap, 
    ao seja se o turno esta disponivel ocupado e etc

    $legendaCores array para as cores usadas na legendas dos turnos

    $tipoUserLegenda array que contem informações de acordo o tipo de usuario
--}}

<div class="row col-12 m-0 p-0 font-weight-bold text-center" >
    <div class="row col-12 m-0 p-0">
        <div id="calendario" class="col-12 p-2 m-0 overflow-auto barra">
            <div class="col p-0 text-dark font-weight-bold">
                <button type="button" class=" btn btn-default">
                    <i class="fas fa-angle-left"></i>
                </button>
                <span> {{$visitas["dataInicio"] ?? "01/02"}}  a  {{$visitas["dataFim"] ?? "20/02"}} </span>
                <button type="button" class=" btn btn-default">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
            <hr class="my-1 linha rounded bg-light">
            <div class="row col-12 m-0 font-weight-bold text-monospace">
                <div class="row col-12 p-0 m-0 px-0 text-center ">
                    <div class="row m-1 col-lg-1 mb-2 m-lg-0 pt-1 p-0 border">
                        <div class="col-4 col-lg-12 p-0 mt-lg-3 ">Dia</div>
                        @if(($turno ?? "diurno")==="diurno")  
                            <div class="col col-lg-12 p-0 mt-4 m-0">Manhã</div>
                            <div class="col col-lg-12 p-0 mt-1 m-0">Tarde</div>
                        @else
                            <div class="col col-lg-12 p-0 mt-4 m-0">Noite</div>
                        @endif
                    </div>
                    <div class="col-lg-11 p-0 m-0 col row">
                    @foreach ($visitas as $dia => $v)
                        @if ($loop->index>2 && $loop->index<13 )
                        <div class="row col-md m-md-0 mx-md-1 p-0 border"> 
                            <div id="data{{$loop->index}}" class="col-4 col-lg-12 p-2">{{ $v["data"] ?? "27/01 SEG" }}</div>
                            @if(($turno ?? "diurno")==="diurno") 
                                <div class="col col-lg-12 py-1 p-0">
                                    <button id="manhã{{$loop->index}}" type="button" onclick="setDataTurno('{{$dia}}','manhã')"
                                        class="btn w-50 h-100 border border-secondary {{$v["manha.btn"] ?? 'bg-light'}} "></button>
                                </div>
                                <div class="col col-lg-12 py-1 p-0">
                                    <button id="tarde{{$loop->index}}" type="button" onclick="setDataTurno('{{$dia}}','tarde')"
                                        class="btn w-50 h-100 border border-secondary {{$v["tarde.btn"] ?? 'bg-light'}} "></button>
                                </div>
                            @else
                                <div class="col col-lg-12 py-1 p-0">
                                    <button id="noite{{$loop->index}}" type="button" onclick="setDataTurno('{{$dia}}','noite')"
                                        class="btn w-50 h-100 border border-secondary {{$v["noite.btn"] ?? 'btn-light'}} "></button>
                                </div>
                            @endif
                        </div>
                        <hr class="col-12 d-lg-none m-0 p-0 linha rounded bg-light">
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
            <hr class="my-1 m-0 p-0 linha rounded bg-light col-12">
            <div class="row col-12 mb-1 m-0 p-0 pt-1 text-left">
                <div class="col-12 col-lg-2 py-1 text-center d-none d-lg-block">
                    <span> Legenda:</span>
                </div>
                <div class="col-7 col-lg-3 py-1">
                    <button class="btn {{ $legendaCores["proprio"] }} w-auto"></button> 
                    <span>Seu agendamento</span>
                </div>
                <div class="col-5 col-lg-3 py-1">
                    <button class="btn {{ $legendaCores["disponivel"] }} w-auto"></button>
                    <span> {{$leg_calend_dashboard["leg.disponivel"]}}</span>
                </div>
                <div class="col-12 col-lg-4 py-1 ">
                    <button class="btn {{ $legendaCores["indisponivel"] }} w-auto"></button>
                    <span> {{$leg_calend_dashboard["leg.indisponivel"]}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@section('css')
<style>
    .linha {
        height: 0.3vh;
    }

</style>
@endsection