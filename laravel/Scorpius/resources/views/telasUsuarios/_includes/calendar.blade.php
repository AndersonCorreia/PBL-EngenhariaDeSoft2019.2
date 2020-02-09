
{{-- 
    $visitas é uma matriz as linhas representam datas e deve ter posições numericas
    deve ter as colunas 'data' uma string como '27/11 seg', e as colunas 'manha.cor','tarde.cor','noite.cor'
    que informam as cores dos bottoes atraves de classe do bootstrap, 
    ao seja se o turno esta disponivel ocupado e etc

    $legendaCores array para as cores usadas na legendas dos turnos

    $tipoUserLegenda array que contem informações de acordo o tipo de usuario
--}}

<div class="row col-12 m-0 p-0 font-weight-bold text-center barra" >
    <div class="row col-12 m-0 p-0">
        <div id="calendario" class="col-12 p-2 m-0 border overflow-auto barra">
            <div class="col p-0 text-dark font-weight-bold">
                <button type="button" class=" btn btn-default seta-esquerda"></button>
                <span> {{$visitas["dataInicio"] ?? "01/02"}} -a- {{$visitas["dataFim"] ?? "20/02"}} </span>
                <button type="button" class="btn btn-default seta-direita"></span></button>
            </div>
            <hr class="my-1 linha rounded bg-light">
            <div class="row col-12 m-0 font-weight-bold text-monospace">
                <div class="row col-12 pb-2 m-0 px-0 text-center ">
                    <div class="row m-0 col-lg-1 mb-2 m-lg-0 pt-1 p-0 border-right">
                        <div class="col-4 col-lg-12 p-0 mt-lg-3 ">Dia</div>
                        @if(($turno ?? "diurno")==="diurno")  
                            <div class="col col-lg-12 p-0 mt-4 m-0">Manhã</div>
                            <div class="col col-lg-12 p-0 mt-1 m-0">Tarde</div>
                        @else
                            <div class="col col-lg-12 p-0">Noite</div>
                        @endif
                    </div>
                    <div class="col-lg-11 p-0 m-0 col row">
                    @foreach ($visitas as $v)
                        @if ($loop->index>1 && $loop->index<12 )
                        <div class="row col-md m-0 p-0 border-right border-left "> 
                            <div id="data{{$loop->index}}" class="col-4 col-lg-12 p-2">{{ $v["data"] ?? "27/01 SEG" }}</div>
                            @if(($turno ?? "diurno")==="diurno") 
                                <div class="col col-lg-12 py-1 p-0">
                                    <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["manha.btn"] ?? 'bg-light'}} "></button>
                                </div>
                                <div class="col col-lg-12 py-1 p-0">
                                    <button id="tarde{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["tarde.btn"] ?? 'bg-light'}} "></button>
                                </div>
                            @else
                                <div class="col col-lg-12 py-1 p-0">
                                    <button id="noite{{$loop->index}}" type="button" class="btn w-50 h-75 border border-secondary {{$v["noite.btn"] ?? 'btn-light'}} "></button>
                                </div>
                            @endif
                        </div>
                        <hr class="col-12 d-lg-none m-0 p-0 linha rounded bg-light">
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
            <hr class="my-1 linha rounded bg-light col-11">
            <div class="row col-12 mb-1 m-0 p-0 pt-1 text-left">
                <div class="col-12 col-lg-2 py-1 text-center d-none d-lg-block"><span> Legenda:</span></div>
                <div class="col-7 col-lg-3 py-1"><button class="btn {{ $legendaCores["proprio"] }} w-auto"></button> <span> Seu Agendamento</span></div>
                <div class="col-5 col-lg-3 py-1"><button class="btn {{ $legendaCores["disponivel"] }} w-auto"></button> <span> {{$tipoUserLegenda["leg.disponivel"]}}</span></div>
                <div class="col-12 col-lg-4 py-1 "><button class="btn {{ $legendaCores["indisponivel"] }} w-auto"></button> <span> {{$tipoUserLegenda["leg.indisponivel"]}}</span></div>
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

  border-top: 1.7vh solid transparent;
  border-bottom: 1.7vh solid transparent; 
  border-right: 1.3vw solid black; 
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

  border-top: 1.7vh solid transparent;
  border-bottom: 1.7vh solid transparent;
  border-left: 1.3vw solid black;
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