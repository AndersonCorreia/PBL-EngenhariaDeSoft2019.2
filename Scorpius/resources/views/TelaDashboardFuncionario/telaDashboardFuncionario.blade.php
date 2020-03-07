@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Painel de Controle do Funcionário')

@section('conteudo')


<form method="get" class= "m-1 p-3" action="#"> <!--bloco começa aqui -->
    <div class="form-group col-12 m-0 p-0">
        <h4>Bem-vindo, Funcionário</h4>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class= "row mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleProxVisita>
                <h5 class="col-sm-12" nomeEscola>PRÓXIMAS VISITAS</h5>
            </div>
            <div class= "row mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark" proxVisita>
                
                <div class= "row mt-1 mx-3 p-2 scorpius-border-shadow border-top border-shadow bg-secondary text-white" dataVisita>
                    <p class="h6 col-sm-12" nomeEscola>Hoje - 07/03/2020</p> <!--Substituir por acesso ao banco - data atual -->
                </div>

                <div class= "row mt-1 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-white text-black" conteudoProxVisita>
                    <p class="h6 col-sm-12" nomeEscola>Colégio Estadual Luís Eduardo Magalhães</p> <!--Substituir por acesso ao banco - nome da instituição -->
                </div>

                <div class= "row mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-white text-black" conteudoProxVisita>
                    <p class="h6 col-sm-12" nomeEscola>Colégio Estadual Santo Antônio do Argoim</p>
                </div>

                <div class= "row mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-white text-black" conteudoProxVisita>
                    <p class="h6 col-sm-12" nomeEscola>Colégio Estadual Ana Lúcia Magalhães</p>
                </div>
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
                <h5 class="col-sm-12" nomeEscola>CHECK-IN INSTITUIÇÕES</h5>
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

</form>




<style>
    [nomeEscola]{
        text-align: center;
    }

    [titleProxVisita]{
        width: 300px;
        height: 60px;
    }

    [dataVisita]{
        width: 250px;
        height: 40px;
    }

    [titleClima]{
        width: 370px;
        height: 60px;
    }

    [proxVisita]{
        width: 300px;
        height: 350px;
    }

    [conteudoProxVisita]{
        width: 250px;
        height: 80px;  
    }

    [clima]{
        width: 370px;
        height: 350px;
    }

    [escolas]{
        width: 300px; 
        height: 350px;
    }

    [checkInst]{
        width: 250px;
        height: 100px;
    }
    [posBtn]{

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
