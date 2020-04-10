@extends('layouts.templateGeralTelasUsuarios')


@section('title', 'Painel de Controle do Funcionário')

@section('conteudo')


<form method="get" class= "m-1 p-3" action="#"> <!--bloco começa aqui -->
    <div class="form-group col-12 m-0 p-0">
        <h4>Bem-vindo(a), Funcionário(a)</h4>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class= "row mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleProxVisita>
                <h6 class="col-sm-12" nomeEscola>PRÓXIMAS VISITAS INSTITUCIONAIS</h6>
            </div>
            
            
            <div class= "row mt-3 mx-3 p-3 px-3 scorpius-border-shadow border-top border-shadow bg-dark" style="overflow-y: auto;"  proxVisita>
                @foreach($visitantes as $visita)
                    @if(isset($visita['visitantes'][0]['aluno']))
                    <div class= "row mt-1 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-white text-black"  conteudoProxVisita>
                        <p class="h6 col-sm-12" nomeEscola>{{$visita['visitantes'][0]['instituicao']['nome']}}</p> <!--Substituir por acesso ao banco - nome da instituição -->
                        <p class="h6 col-sm-12" dataVisita>Data: {{$visita['dia']['data']}}</p> 
                        <p class="h6 col-sm-12" turnoVisita>Turno: {{strtoupper($visita['dia']['turno'])}}</p>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>


        <div class="col-xl-4">
            <div class= "row mt-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleClima>
                <h5 class="col-sm-12" nomeEscola>PREVISÃO DO TEMPO</h5>
            </div>
            <div class= "row mt-3 p-1 scorpius-border-shadow border-top border-shadow bg-dark" clima> 
                <div id="cont_95c97e35b519de972fd2e46a44e7c47f" class="rounded">
                    <script type="text/javascript" async src="https://www.tempo.com/wid_loader/95c97e35b519de972fd2e46a44e7c47f">
                    </script>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class= "row mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleProxVisita>
                <h6 class="col-sm-12" nomeEscola>PRÓXIMAS VISITAS INDIVIDUAIS</h6>
            </div>

            <div class= "row mt-3 mx-3 p-1 px-3 scorpius-border-shadow border-top border-shadow bg-dark" style="overflow-y: auto;" escolas>
                @foreach($visitantes as $visita)
                @for($j = 1; $j < count($visita['visitantes']); $j++) {{-- {{dd($visita['visitantes'][1]['usuario'])}}
                {{-- {{dd($visita)}} --}}
                <div class="mt-1 mx-1 p-1">
                    <div class="scorpius-border-shadow p-1" checkInst>
                        <div class="row text-center">
                            
                                <p class="h6 col-sm-12"nomeVisitante>
                                    {{$visita['visitantes'][$j]['usuario'][1]}} <!--Substituir por acesso ao banco - nome da instituição --> 
                                </p>
                                <p class="h6 col-sm-12" dataVisita>Data: {{$visita['dia']['data']}}</p> 
                                <p class="h6 col-sm-12" turnoVisita>Turno: {{strtoupper($visita['dia']['turno'])}}</p>
                            
                        </div>    

                    </div>
                </div>
                @endfor
                @endforeach
            </div>
        </div>
    </div>

</form>


<style>
    [nomeEscola]{
        text-align: center;
        word-wrap:break-word;
      
    }

    [nomeVisitante]{
        text-align: center;
        word-wrap:break-word;
       
    }

    [dataVisita]{
        text-align: center;
        color: red; 
        word-wrap:break-word;
       
    }

    [turnoVisita]{
        text-align: center;
        color: blue; 
        word-wrap:break-word;
    }

    [titleProxVisita]{
        width: 300px;
        height: 70px;
    }

    [titleClima]{
        width: 370px;
        height: 70px;
    }

    [proxVisita]{
        width: 300px;
        height: 370px;
    }

    [conteudoProxVisita]{
        width: 250px;
        height: 130px; 
    }

    [clima]{
        width: 370px;
        height: 370px;
    }

    [escolas]{
        width: 300px; 
        height: 370px;
    }

    [checkInst]{
        width: 250px;
        min-height: 80px;
    }

    [expand]{
        margin-top: 5px;
        margin-left: 20px; 
        margin-right: 15px;
        width: 155px;
        height: 40px;
    }

</style>
@endsection
