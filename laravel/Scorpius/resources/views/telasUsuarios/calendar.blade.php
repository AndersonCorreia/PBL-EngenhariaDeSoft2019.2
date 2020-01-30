@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'calendario')
{{-- 
    $dataInterval é um array na posição 0 deve ter uma string da primeira data que aparece no calendario
    já na posição 1 a ultima
    
    $visitas é uma matriz as linhas representam datas e deve ter posições numericas
    deve ter as colunas 'data' uma string como '27/11 seg', e as colunas 'manha.cor','tarde.cor','noite.cor'
    que informam as cores dos bottoes atraves de classe do bootstrap, 
    ao seja se o turno esta disponivel ocupado e etc

    $legenda array para as cores usadas na legendas dos turnos
--}}

@section('conteudo')
<div class="container font-weight-bold text-center" >
    <div class="row col-lg-11 col-10 mb-1">
        <div class="col-2 p-1"><span> Legenda :</span></div>
        <div class="col p-1 "><button class="btn btn-primary w-auto"></button> <span> seu agendamento</span></div>
        <div class="col p-1 "><button class="btn btn-success w-auto"></button> <span> Disponivel</span></div>
        <div class="col p-1 "><button class="btn btn-danger w-auto"></button> <span> Lista de espera</span></div>
    </div>
    <div id="calendario" class="col p-2 border">
        <div class="col text-primary font-weight-bold">
            <button type="button" class=" btn btn-default seta-esquerda"></button>
            <span> {{$dataInterval[0] ?? "01/02"}} - a - {{$dataInterval[1] ?? "20/02"}} </span>
            <button type="button" class="btn btn-default seta-direita"></span></button>
        </div>
        <hr class="my-1 bg-light">
        <div class="row m-0 font-weight-bold text-monospace">
            <div class="col-12 col-lg-6 pb-2 text-center border-right">
                <div class="row m-0 mb-2 p-0"> 
                    <div class="col-4 p-0">Dia</div> 
                    <div class="col  p-0">Manhã</div>
                    <div class="col p-0">Tarde</div>
                    <div class="col p-0">Noite</div>
                </div>
                @foreach ($visitas as $v)
                    @if ($loop->index < 5)
                    <div class="row p-1"> 
                        <div id="data{{$loop->index}}" class="col-4 p-1">{{ $v["data"] ?? "27/01 SEG" }}</div> 
                        <div class="col py-1 p-0">
                            <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border-right border-secondary {{$v["manha.btn"] ?? 'bg-light'}} "></button>
                        </div>
                        <div class="col py-1 p-0">
                            <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border-right border-secondary {{$v["tarde.btn"] ?? 'bg-light'}} "></button>
                        </div>
                        <div class="col py-1 p-0">
                            <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border-right border-secondary {{$v["noite.btn"] ?? 'btn-light'}} "></button>
                        </div>
                    </div>
                    <hr class="col-12 m-0 p-0 linha rounded bg-primary">
                    @endif
                @endforeach
            </div>
            <div class="col col-lg-6 pb-2 text-center border-left">
                <div class="row m-0 mb-2 d-none d-lg-flex p-0"> 
                    <div class="col-4 p-0">Dia</div> 
                    <div class="col p-0">Manhã</div>
                    <div class="col p-0">Tarde</div>
                    <div class="col p-0">Noite</div>
                </div>
                @foreach ($visitas as $v)
                    @if ($loop->index >4)
                    <div class="row p-1"> 
                        <div id="data{{$loop->index}}" class="col-4 p-1">{{ $v["data"] ?? "27/01 SEG" }}</div> 
                        <div class="col py-1 p-0">
                            <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border-right border-secondary {{$v["manha.btn"] ?? 'bg-light'}} "></button>
                        </div>
                        <div class="col py-1 p-0">
                            <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border-right border-secondary {{$v["tarde.btn"] ?? 'bg-light'}} "></button>
                        </div>
                        <div class="col py-1 p-0">
                            <button id="manhã{{$loop->index}}" type="button" class="btn w-50 h-75 border-right border-secondary {{$v["noite.btn"] ?? 'bg-light'}} "></button>
                        </div>
                    </div>
                    <hr class="col-12 m-0 p-0 linha rounded bg-primary">
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .linha {
        height: 0.3vh;
    }
    #calendario {
        background-color: rgb(245, 245, 248);
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

  border-top: 2.5vh solid transparent;
  border-bottom: 2.5vh solid transparent; 
  border-right: 2.3vw solid rebeccapurple; 
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

  border-top: 2.5vh solid transparent;
  border-bottom: 2.5vh solid transparent;
  border-left: 2.3vw solid rebeccapurple;
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