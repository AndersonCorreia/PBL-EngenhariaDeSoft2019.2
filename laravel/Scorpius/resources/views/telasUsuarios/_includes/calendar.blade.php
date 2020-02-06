
{{-- 
    $visitas é uma matriz as linhas representam datas e deve ter posições numericas
    deve ter as colunas 'data' uma string como '27/11 seg', e as colunas 'manha.cor','tarde.cor','noite.cor'
    que informam as cores dos bottoes atraves de classe do bootstrap, 
    ao seja se o turno esta disponivel ocupado e etc

    $legenda array para as cores usadas na legendas dos turnos

    $tipoUser array que contem informações de acordo o tipo de usuario
--}}

<div class="row col-12 pr-0 pl-4 font-weight-bold text-center barra" >
    <div class="row col-12 mb-1 m-0 p-0 text-left">
        <div class="col-lg-2 col-6 py-1"><span> Legenda :</span></div>
        <div class="col col-lg-3 py-1"><button class="btn {{ $legenda["proprio"] }} w-auto"></button> <span> seu agendamento</span></div>
        <div class="col-lg-2 col-6 py-1"><button class="btn {{ $legenda["disponivel"] }} w-auto"></button> <span> {{$tipoUser["leg.disponivel"]}}</span></div>
        <div class="col col-lg-5 p-1 "><button class="btn {{ $legenda["indisponivel"] }} w-auto"></button> <span> {{$tipoUser["leg.indisponivel"]}}</span></div>
    </div>
    <div class="row col-12 m-0 p-0">
        <div id="calendario" class="col-12 col-lg-8 p-2 m-0 border overflow-auto barra">
            <div class="col text-dark font-weight-bold">
                <button type="button" class=" btn btn-default seta-esquerda"></button>
                <span> {{$visitas["dataInicio"] ?? "01/02"}} - a - {{$visitas["dataFim"] ?? "20/02"}} </span>
                <button type="button" class="btn btn-default seta-direita"></span></button>
            </div>
            <hr class="my-1 linha rounded bg-light">
            <div class="row m-0 font-weight-bold text-monospace">
                <div class="col-12 col-lg-6 pb-2 text-center border-right border-light">
                    <div class="row m-0 mb-2 p-0"> 
                        <div class="col-4 p-0">Dia</div> 
                        <div class="col  p-0">Manhã</div>
                        <div class="col p-0">Tarde</div>
                        <div class="col p-0">Noite</div>
                    </div>
                    @foreach ($visitas as $v)
                        @if ($loop->index < 7 && $loop->index > 1)
                        <div class="row p-1"> 
                            <div id="data{{$loop->index}}" class="col-4 p-1">{{ $v["data"] ?? "27/01 SEG" }}</div> 
                            <div class="col py-1 p-0">
                                <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["manha.btn"] ?? 'bg-light'}} "></button>
                            </div>
                            <div class="col py-1 p-0">
                                <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["tarde.btn"] ?? 'bg-light'}} "></button>
                            </div>
                            <div class="col py-1 p-0">
                                <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["noite.btn"] ?? 'btn-light'}} "></button>
                            </div>
                        </div>
                        <hr class="col-12 m-0 p-0 linha rounded bg-light">
                        @endif
                    @endforeach
                </div>
                <div class="col col-lg-6 pb-2 text-center border-left border-light">
                    <div class="row m-0 mb-2 d-none d-lg-flex p-0"> 
                        <div class="col-4 p-0">Dia</div> 
                        <div class="col p-0">Manhã</div>
                        <div class="col p-0">Tarde</div>
                        <div class="col p-0">Noite</div>
                    </div>
                    @foreach ($visitas as $v)
                        @if ($loop->index > 6)
                        <div class="row p-1"> 
                            <div id="data{{$loop->index}}" class="col-4 p-1">{{ $v["data"] ?? "27/01 SEG" }}</div> 
                            <div class="col py-1 p-0">
                                <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["manha.btn"] ?? 'bg-light'}} "></button>
                            </div>
                            <div class="col py-1 p-0">
                                <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["tarde.btn"] ?? 'bg-light'}} "></button>
                            </div>
                            <div class="col py-1 p-0">
                                <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["noite.btn"] ?? 'bg-light'}} "></button>
                            </div>
                        </div>
                        <hr class="col-12 m-0 p-0 linha rounded bg-light">
                        @endif
                    @endforeach
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
    #formulario {
        background-color: rgb(240, 240, 246);
        height: auto;
    }
    #calendario, #exposicoes{
        background-color: rgb(240, 240, 246);
        height: auto;
        max-height: 50.5vh;
    }
    html ::-webkit-scrollbar {
        width: 0.5vw;
    }

    /* aqui é para personalizar o fundo da barra*/
    html ::-webkit-scrollbar-track {
        background: rgb(255, 255, 255);
        border-radius: 20px;
    }

    /* aqui é a alça da barra, que demonstra a altura que você está na página
estou colocando uma cor azul clara nela*/
    html ::-webkit-scrollbar-thumb {
        border-radius: 20px;
        background: rgb(180, 180, 200);
    }

/**
*** Seta para ESQUERDA
**/
.seta-esquerda:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  width: 0; 
  height: 0; 

  border-top: 2.7vh solid transparent;
  border-bottom: 2.7vh solid transparent; 
  border-right: 2.2vw solid black; 
}

/**
*** Seta para DIREITA
**/
.seta-direita:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  width: 0; 
  height: 0; 

  border-top: 2.7vh solid transparent;
  border-bottom: 2.7vh solid transparent;
  border-left: 2.2vw solid black;
}

/**
*** Seta para CIMA
**/
.seta-cima:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  width: 0; 
  height: 0; 

  border-left: 1vw solid transparent;
  border-right: 1vw solid transparent;
  border-bottom: 1vw solid black;
}

/**
*** Seta para BAIXO
**/
.seta-baixo:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  width: 0; 
  height: 0; 

  border-left: 1vw solid transparent;
  border-right: 1vw solid transparent;
  border-top: 1vw solid #f00;
}

</style>
@endsection