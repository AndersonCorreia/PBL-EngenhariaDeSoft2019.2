@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Dashboard Estagiário')

@section('conteudo')
    <div class="row p-4">
        <div class="col-md-4">
            <div class= "mt-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleClima>
                <h5 class="text-center">PREVISÃO DO TEMPO</h5>
            </div>
            <div class= "mt-3 p-1 scorpius-border-shadow border-top border-shadow bg-dark" clima> 
                <div id="cont_95c97e35b519de972fd2e46a44e7c47f" class="rounded">
                    <script type="text/javascript" async src="https://www.tempo.com/wid_loader/95c97e35b519de972fd2e46a44e7c47f">
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class= "mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleProxVisita>
                <h5 class="text-center">SEU HORÁRIO</h5>
            </div>
            <div>
                @if(empty($horarios))
                    <div class= "row mt-3 mx-3 p-3 px-3 scorpius-border-shadow border-top border-shadow bg-dark" escolas>

                    <div class="alert alert-secondary mt-3 text-center" role="alert">
                        <strong>Você ainda não possui um horário definido.</strong>
                    </div>
                </div>
                @else
                <div class= "mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark" escolas>

                <div class="list-group">
                <li class="list-group-item btn-block bg-secondary border-all-100 text-uppercase">
                    <div class="row text-center text-white">
                        <div class="col-md-6">DIA</div>
                        <div class="col-md-6">TURNO</div>
                    </div>
                </li>
                @foreach ($horarios as $horario)
                <li class="list-group-item btn-block text-uppercase border-all-100">
                    <div class="row text-center">
                        <div class="col-md-6">
                            {{$horario['dia_semana']}}
                        </div>
                        <div class="col-md-6">
                            {{$horario['turno']}}
                        </div>
                    </div>
                </li>
                @endforeach
                </div>
            </div>    

                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class= "mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleProxVisita>
                <h5 class="text-center">CHECK-IN INSTITUIÇÕES</h5>
            </div>
            <div class= "row mt-3 mx-3 p-1 px-3 scorpius-border-shadow border-top border-shadow bg-dark" escolas>
                <div class="mt-1 mx-1 p-1">
                    <div class="scorpius-border-shadow p-2" checkInst>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <p class="h6">
                                    Colégio Estadual Luís Eduardo Magalhães <!--Substituir por acesso ao banco - nome da instituição --> 
                                </p>
                            </div>
                            <div class="row mx-4">
                                <div class="col-xl-4">
                                    <form name="checkin" method="POST">
                                        <input type="hidden" value="{ID}">
                                        <button class="btn btn-outline-warning" aria-pressed="false" posBtn>
                                            Presente <!--Dá efeito de "realizada" ao campo "status" da tabela "visita"-->
                                        </button>
                                    </form>
                                </div>
                                <div class="col-xl-4 mx-4">
                                    <form name="cancelar" method="POST">
                                        <input type="hidden" value="{ID}">
                                        <button class="btn btn-outline-danger" aria-pressed="false" posBtn>
                                            Ausente  <!--Dá efeito de "não realizada" ao campo "status" da tabela "visita"-->
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                            
                    </div>
                </div>
                
                <div class="p-1 mt-1 mx-1">
                    <div class="scorpius-border-shadow p-2" checkInst>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <p class="h6">
                                    Colégio Estadual Santo Antônio do Argoim
                                </p>
                            </div>
                            <div class="row mx-4">
                                <div class="col-xl-4">
                                    <form name="checkin" method="POST">
                                        <input type="hidden" value="{ID}">
                                        <button class="btn btn-outline-warning" aria-pressed="false" posBtn>
                                            Presente
                                        </button>
                                    </form>
                                </div>
                                <div class="col-xl-4 mx-4">
                                    <form name="cancelar" method="POST">
                                        <input type="hidden" value="{ID}">
                                        <button class="btn btn-outline-danger" aria-pressed="false" posBtn>
                                            Ausente
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

                                
                <div class="p-1 mt-1 mx-1">
                    <div class="scorpius-border-shadow p-2" checkInst>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <p class="h6">
                                    Colégio Estadual Ana Lúcia Magalhães
                                </p>
                            </div>
                            <div class="row mx-4">
                                <div class="col-xl-4">
                                    <form name="checkin" method="POST">
                                        <input type="hidden" value="{ID}">
                                        <button class="btn btn-outline-warning" aria-pressed="false" posBtn>
                                            Presente
                                        </button>
                                    </form>
                                </div>
                                <div class="col-xl-4 mx-4">
                                    <form name="cancelar" method="POST">
                                        <input type="hidden" value="{ID}">
                                        <button class="btn btn-outline-danger" aria-pressed="false" posBtn>
                                            Ausente
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection