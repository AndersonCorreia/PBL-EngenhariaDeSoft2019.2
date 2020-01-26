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
    <div class="container p-2 bg-primary">
        <div class="col bg-secondary text-center font-weight-bold">
            <button type="button" class=" btn btn-default seta-esquerda"></button>
            <span> {{$dataInterval[0] ?? "01/02/2020"}} - a - {{$dataInterval[1] ?? "20/02/2020"}} </span>
            <button type="button" class="btn btn-default seta-direita"></span></button>
        </div>
        <hr class="my-1 bg-light">
        <div class="row m-0 font-weight-bold">
            <div class="col col-lg-6 pb-2 text-center bg-warning border-right border-dark">
                <div class="row m-0 mb-2  font-weight-bold"> 
                    <div class="col">Dia</div> 
                    <div class="col">Manhã</div>
                    <div class="col">Tarde</div>
                    <div class="col">Noite</div>
                </div>
                @for ($i = 0; $i < 5; $i++)
                <div class="row m-1 p-0"> 
                    <div id="data{{$i}}" class="col-3 p-1">{{ $visitas[$i]["data"] ?? "27/01 SEG" }}</div> 
                    <div class="col-3 py-1">
                        <button id="manhã{{$i}}" type="button" class="btn w-50 h-75 {{$visitas[$i]["manha.cor"] ?? 'bg-light'}}"></button>
                    </div>
                    <div class="col-3 py-1">
                        <button id="manhã{{$i}}" type="button" class="btn w-50 h-75 {{$visitas[$i]["tarde.cor"] ?? 'btn-light'}}"></button>
                    </div>
                    <div class="col-3 py-1">
                        <button id="manhã{{$i}}" type="button" class="btn w-50 h-75 {{$visitas[$i]["noite.cor"] ?? 'btn-light'}}"></button>
                    </div>
                </div>
                    <hr class="col-12 m-0 p-0 linha rounded bg-primary">
                @endfor
            </div>
            <div class="col-lg-6 pb-2 bg-info text-center border-left border-dark ">
                <div class="row m-0 mb-2 d-none d-lg-flex"> 
                    <div class="col">Dia</div> 
                    <div class="col">Manhã</div>
                    <div class="col">Tarde</div>
                    <div class="col">Noite</div>
                </div>
                @for ($i = 0; $i < 5; $i++)
                <div class="row m-1 p-0"> 
                    <div id="data{{$i}}" class="col-3 p-1">{{ $visitas[$i]["data"] ?? "27/01 SEG" }}</div> 
                    <div class="col-3 py-1">
                        <button id="manhã{{$i}}" type="button" class="btn w-50 h-75 {{$visitas[$i]["manha.cor"] ?? 'bg-light'}}"></button>
                    </div>
                    <div class="col-3 py-1">
                        <button id="manhã{{$i}}" type="button" class="btn w-50 h-75 {{$visitas[$i]["tarde.cor"] ?? 'btn-light'}}"></button>
                    </div>
                    <div class="col-3 py-1">
                        <button id="manhã{{$i}}" type="button" class="btn w-50 h-75 {{$visitas[$i]["noite.cor"] ?? 'btn-light'}}"></button>
                    </div>
                </div>
                    <hr class="col-12 m-0 p-0 linha rounded bg-primary">
                @endfor
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
    .glyphicon {
        color: blueviolet;
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