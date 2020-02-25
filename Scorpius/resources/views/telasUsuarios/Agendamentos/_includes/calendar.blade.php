
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
        <div id="calendario" class="col-12 pt-2 px-2 m-0 overflow-auto barra">
            <div class="col p-0 text-dark font-weight-bold">
                <button id="setaLeft" type="button" class=" btn btn-default" disabled>
                    <i class="fas fa-angle-left"></i>
                </button>
                <span id="calendarDatas">{{$visitas["datas"]["dataInicio"]}} a {{$visitas["datas"]["dataFim"]}}</span>
                <button id="setaRight" type="button" class=" btn btn-default">
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
                        @if ($loop->index>0 && $loop->index<11 )
                        <div class="row col-md m-md-0 mx-md-1 p-0 border"> 
                            <div id="data{{$loop->index}}" class="col-4 col-lg-12 p-2">{{ $v["data"] ?? "27/01 SEG" }}</div>
                            @if(($turno ?? "diurno")==="diurno") 
                                <div class="col col-lg-12 py-1 p-0">
                                @if( isset($v["manhã.btn"]) )
                                    <button id="manhã{{$loop->index}}" type="button" onclick="setDataTurno(this, '{{$dia}}','manhã')"
                                        class="btn w-50 h-100 border border-secondary {{$v["manhã.btn"]}}"></button>
                                @else
                                    <button id="manhã{{$loop->index}}" type="button" aria-disabled="true"
                                        class="btn w-50 h-100 border border-secondary btn-default" disabled></button>
                                @endif
                                </div>
                                <div class="col col-lg-12 py-1 p-0">
                                @if( isset($v["tarde.btn"]) )
                                    <button id="tarde{{$loop->index}}" type="button" onclick="setDataTurno(this, '{{$dia}}','manhã')"
                                        class="btn w-50 h-100 border border-secondary {{$v["tarde.btn"]}}"></button>
                                @else
                                    <button id="tarde{{$loop->index}}" type="button" aria-disabled="true"
                                        class="btn w-50 h-100 border border-secondary btn-default" disabled></button>
                                @endif
                                </div>
                            @else
                                <div class="col col-lg-12 py-1 p-0">
                                @if( isset($v["noite.btn"]) )
                                    <button id="noite{{$loop->index}}" type="button" onclick="setDataTurno(this, '{{$dia}}','manhã')"
                                        class="btn w-50 h-100 border border-secondary {{$v["noite.btn"]}}"></button>
                                @else
                                    <button id="noite{{$loop->index}}" type="button" aria-disabled="true"
                                        class="btn w-50 h-100 border border-secondary btn-default" disabled></button>
                                @endif
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
                    <a class="btn {{ $legendaCores["proprio"] }} w-auto" aria-disabled="true" disabled></a> 
                    <span> Seu agendamento</span>
                </div>
                <div class="col-5 col-lg-2 py-1">
                    <a class="btn {{ $legendaCores["disponivel"] }} w-auto" aria-disabled="true" disabled></a>
                    <span> {{$tipoUserLegenda["leg.disponivel"]}}</span>
                </div>
                <div class="col-12 col-lg-5 py-1 ">
                    <a class="btn {{ $legendaCores["indisponivel"] }} w-auto" aria-disabled="true" disabled></a>
                    <span> {{$tipoUserLegenda["leg.indisponivel"]}}</span>
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