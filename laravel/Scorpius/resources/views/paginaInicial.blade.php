<!-- Pagina inicial do site Scorpius -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{ asset('css/paginaInicial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://kit.fontawesome.com/8dc881c5b9.js" crossorigin="anonymous"></script>
    <link REL="SHORTCUT ICON" HREF="{{asset('img/logo-galaxy-shotcut.png')}}">
    <title>Scorpius</title>
</head>

<body>
    {{-- TELA INICIAL --}}
    <div id="inicio">
        {{-- TELA INICIAL - DESKTOP --}}
        <div class="desktop">
            <div class="row mr-0">
                <!-- Lado esquerdo da tela -->
                <div class="col-md-6 lado-esquerdo">
                    <!-- Nome Scorpius -->
                    <div id="img-nome-scorpius">
                        <img class="img-fluid" id="img-nome-scorpius"
                            src="{{ asset('img/tela_inicial/somente-nome-img.png') }}">
                    </div>
                    <!-- DIV que só aparecerá para versão mobile -->
                    <br>
                    <div id="menu">

                        <img id="menu-img-logo" class="img-fluid"
                            src="{{ asset('img/tela_inicial/logo-somente-galacia-img.png') }}">

                        <div id="menu-botoes">
                            <a id="menu-botoes-antares" href="http://www.antares.uefs.br/">
                                ANTARES
                            </a>
                            <a id="menu-botoes-atividades" href="#atividades-diferenciadas">
                                ATIVIDADES
                            </a>
                            <a id="menu-botoes-exposicoes" href="#exposicoes">
                                EXPOSIÇÕES
                            </a>
                            <a id="menu-botoes-informacoes" href="#informacoes">
                                INFORMAÇÕES
                            </a>
                            <a id="menu-botoes-agendamento" href="#agendamento-endereco-informacoes">
                                AGENDAMENTO
                            </a>
                            <a id="menu-botoes-endereco" href="#agendamento-endereco-informacoes">
                                ENDEREÇO
                            </a>
                            <a id="menu-botoes-contato" href="#agendamento-endereco-informacoes">
                                CONTATO
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Lado direito -->
                <div id="lado-direito" class="col-md-6 pr-0">
                    <img class="img-fluid" id="img-background"
                        src="{{ asset('img/tela_inicial/img-background-v3.png') }}">
                    <div id="btn-login">
                        <a id="btn-entrar" class="btn btn-outline-primary text-white"
                            href="{{ route('entrar') }}">ENTRAR</a>
                        <a id="btn-cadastrar" class="btn btn-primary" href="{{ route('cadastrar') }}">CADASTRAR-SE</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- TELA INICIAL - MOBILE --}}
        <div class="mobile">
            <img class="img-fluid" id="mobile-img-nome-scorpius"
                src="{{ asset('img/tela_inicial/somente-nome-img.png') }}">
            <div id="mobile-btn-login">
                <a id="mobile-btn-entrar" class="btn btn-outline-primary text-white btn-lg btn-block"
                    href="{{ route('entrar') }}">ENTRAR</a>
                <a id="mobile-btn-cadastrar" class="btn btn-primary btn-lg btn-block"
                    href="{{ route('cadastrar') }}">CADASTRAR-SE</a>
            </div>
            <div id="mobile-menu-img">
                <img id="mobile-menu-img-logo" class="img-fluid"
                    src="{{ asset('img/tela_inicial/logo-somente-galacia-img.png') }}">
            </div>
            <br><br>
            <div id="mobile-menu">
                <div id="mobile-menu-botoes-1" class="btn-group" role="group" aria-label="...">
                    <button id="mobile-menu-informacoes" type="button" class="btn btn-primary border border-white"><a
                            href="#informacoes">Informações</a></button>
                    <button id="mobile-menu-atividades" type="button" class="btn btn-primary border border-white"><a
                            href="atividades-diferenciadas">Atividades</a></button>
                    <button id="mobile-menu-exposicoes" type="button" class="btn btn-primary border border-white"><a
                            href="#exposicoes">Exposições</a></button>
                </div>
                <div id="mobile-menu-botoes-2" class="btn-group" role="group" aria-label="...">
                    <button id="mobile-menu-agendamento" type="button" class="btn btn-primary border border-white"><a
                            href="#agendamento-endereco-informacoes">Agendamento</a></button>
                    <button id="mobile-menu-endereco" type="button" class="btn btn-primary border border-white"><a
                            href="#agendamento-endereco-informacoes">Endereço</a></button>
                    <button id="mobile-menu-contato" type="button" class="btn btn-primary border border-white"><a
                            href="#agendamento-endereco-informacoes">Contato</a></button>
                </div>
            </div>
        </div>
    </div>

    {{-- INFORMAÇÕES --}}
    <section id="informacoes">
        {{-- INFORMAÇÕES - DESKTOP --}}
        <div class="desktop row mr-0">
            <div id="informacoes-left" class="col-md-6">
                <img id="informacoes-left-img" src="{{ asset('img/tela_inicial/observatorio-antares.jpg') }}">
            </div>
            <div id="informacoes-right" class="col-md-6">
                <h1 id="informacoes-right-titulo">
                    SOBRE O OBSERVATÓRIO
                </h1>
                <h2 id="informacoes-right-conteudo">
                    O planetário é utilizado para a projeção de filmes
                    sobre o Universo e representa um importante recurso
                    didático para as visitas de escolas e do público em
                    geral no Observatório Astronômico Antares.
                    As sessões acontecem de segunda a sexta
                    às 10 horas e às 15 horas.
                </h2>
                <h2 id="informacoes-right-conteudo-footer">
                    O atendimento é gratuito.
                </h2>
            </div>
        </div>
        {{-- INFORMAÇÕES - MOBILE --}}
        <div class="mobile">
            <div id="mobile-informacoes-left">
                <img id="mobile-informacoes-left-img" src="{{ asset('img/tela_inicial/observatorio-antares.jpg') }}">
            </div>
            <div id="mobile-informacoes-right">
                <h4 id="mobile-informacoes-right-titulo"> SOBRE O OBSERVATÓRIO</h4>
                <h5 id="mobile-informacoes-right-conteudo">
                    O planetário é utilizado para a projeção de filmes
                    sobre o Universo e representa um importante recurso
                    didático para as visitas de escolas e do público em
                    geral no Observatório Astronômico Antares.
                    As sessões acontecem de segunda a sexta
                    às 10 horas e às 15 horas.
                </h5>
                <h5 id="mobile-informacoes-right-footer">O atendimento é gratuito.</h5>
            </div>
        </div>
    </section>

    {{-- ATIVIDADES DIFERENCIADAS --}}
    <div class="desktop text-center mt-3 mb-3">
        <p class="h2">Atividades diferenciadas</p>
    </div>
    <section id="atividades-diferenciadas">
        <div class="desktop">
            <div id="slideShowAtividades" class="carousel slide text-center" data-ride="carousel">
                <ol class="carousel-indicators">


                    @if (empty($atividades))
                    <li data-target="#slideShowAtividades" data-slide-to="0" class="active"></li>
                    @else
                    <div hidden="true">{{$counter = 0}}</div>
                    @foreach ($atividades as $atividade)
                    @if($counter == 0)
                    <li data-target="#slideShowAtividades" data-slide-to="0" class="active"></li>
                    @else
                    <li data-target="#slideShowAtividades" data-slide-to="{{$counter}}"></li>
                    @endif
                    <div hidden="false">{{$counter = $counter + 1}}</div>
                    @endforeach
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (empty($atividades))
                    <div class="carousel-item active">
                        <img class="d-block w-100 atv-img mx-auto"
                            src="{{ asset('img/tela_inicial/observatorio-antares.jpg') }}">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="h4">Não há atividades diferenciadas no momento</p>
                        </div>
                    </div>
                    @else
                    <div hidden="false">{{$counter = 0}}</div>
                    @foreach ($atividades as $atividade)
                    @if($counter == 0)
                    <div class="carousel-item active">
                        <img class="d-block w-100 atv-img mx-auto"
                            src="data:image/jpeg;base64,<?= base64_encode($atividade['imagem']) ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="h2">{{$atividade['titulo']}}</p>
                            <p class="h4">{{$atividade['descricao']}}</p>
                            <p class="h4">Vagas por turno: {{$atividade['quantidade_inscritos']}}</p>
                            <p class="h4">{{$atividade['data_inicial']}} - {{$atividade['data_final']}}</p>
                        </div>
                    </div>
                    @else
                    <div class="carousel-item">
                        <img class="d-block w-100 atv-img mx-auto"
                            src="data:image/jpeg;base64,<?= base64_encode($atividade['imagem']) ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="h2">{{$atividade['titulo']}}</p>
                            <p class="h4">{{$atividade['descricao']}}</p>
                            <p class="h4">Vagas por turno: {{$atividade['quantidade_inscritos']}}</p>
                            <p class="h4">{{$atividade['data_inicial']}} - {{$atividade['data_final']}}</p>
                        </div>
                    </div>
                    @endif
                    <div hidden="false">{{$counter = $counter + 1}}</div>
                    @endforeach
                    @endif
                </div>
                <a class="carousel-control-prev" href="#slideShowAtividades" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#slideShowAtividades" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
        <div class="mobile text-center mt-3">

            <p class="h2">Atividades Diferenciadas</p>

            <div class="btn-group-vertical btn-lg btn-block">
                @if (empty($atividades))
                <p class="h3">Não há atividaes diferenciadas no momento.</p>
                @else
                @foreach ($atividades as $atividade)
                <button type="button" class="btn btn-light mb-1" data-toggle="modal"
                    data-target="#atv{{$atividade['ID']}}">
                    {{$atividade['titulo']}}
                </button>

                <div class="modal fade" id="atv{{$atividade['ID']}}" tabindex="-1" role="dialog"
                    aria-labelledby="#atv{{$atividade['ID']}}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="atv{{$atividade['ID']}}Title">{{$atividade['titulo']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card  text-center mx-auto" style="width: 100%;">
                                    <img class="card-img-top"
                                        src="data:image/jpeg;base64,<?= base64_encode($atividade['imagem']) ?>"
                                        alt="{{$atividade['titulo']}}">
                                    <div class="card-body">
                                        <p class="card-text">{{$atividade['descricao']}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Vagas por turno: {{$atividade['quantidade_inscritos']}}</li>
                                        <li class="list-group-item">Início: {{$atividade['data_inicial']}}</li>
                                        <li class="list-group-item">Fim: {{$atividade['data_final']}}</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- EXPOSICOES --}}
    <div class="text-center mt-3 mb-3">
        <p class="h2">Exposições</p>
    </div>
    <section id="exposicoes">

        <div id="exposicoes-galeria" class="row mr-0 desktop">
            <div class="col-md-4 p-0">
                <div id="exposicoes-img-astronomia" class="zoom text-center">
                    <img src="{{ asset('img/tela_inicial/background-astronomia.jpg') }}" alt="Astronomia">
                    <button type="button" class="exposicoes-btn-text text-center btn bg-transparent" data-toggle="modal"
                        data-target="#Astronomia">
                        Astronomia
                    </button>
                </div>


                <div class="modal fade" id="Astronomia" tabindex="-1" role="dialog" aria-labelledby="AstronomiaTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Astronomia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        @if(empty($astronomia))
                                        <p>Infelizmente não há exposições relacionadas a esse tema :,(</p>
                                        @endif
                                        @foreach ($astronomia as $evento)
                                        <div class="col-sm-3">
                                            <div class="card exposicoes-card" style="width: 16rem;">
                                                <img class="card-img-top"
                                                    src="data:image/jpeg;base64,<?= base64_encode($evento['imagem']) ?>"
                                                    alt="Imagem de capa do card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$evento['titulo']}}</h5>
                                                    <p class="card-text">{{$evento['descricao']}}</p>
                                                </div>
                                                <div class="card-body">
                                                    <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 p-0">
                <div class="zoom text-center">
                    <img src="{{ asset('img/tela_inicial/background-biodiversidade.jpg') }}" alt="Astronomia">
                    <button type="button" class="exposicoes-btn-text text-center btn bg-transparent" data-toggle="modal"
                        data-target="#biodiversidade">
                        Biodiversidade
                    </button>
                </div>

                <div class="modal fade bg-transparent" id="biodiversidade" tabindex="-1" role="dialog"
                    aria-labelledby="biodiversidadeTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl bg-transparent" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Biodiversidade</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        @if(empty($biodiversidade))
                                        <p>Infelizmente não há exposições relacionadas a esse tema :,(</p>
                                        @endif
                                        @foreach ($biodiversidade as $evento)
                                        <div class="col-sm-3">
                                            <div class="card exposicoes-card" style="width: 16rem;">
                                                <img class="card-img-top"
                                                    src="data:image/jpeg;base64,<?= base64_encode($evento['imagem']) ?>"
                                                    alt="Imagem de capa do card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$evento['titulo']}}</h5>
                                                    <p class="card-text">{{$evento['descricao']}}</p>
                                                </div>
                                                <div class="card-body">
                                                    <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 p-0">
                <div class="zoom text-center">
                    <img src="{{ asset('img/tela_inicial/background-origem-1.jpg') }}" alt="Astronomia">
                    <button type="button" class="exposicoes-btn-text text-center btn bg-transparent" data-toggle="modal"
                        data-target="#origem-do-humano">
                        Origem do Homem
                    </button>
                </div>

                <div class="modal fade bg-transparent" id="origem-do-humano" tabindex="-1" role="dialog"
                    aria-labelledby="origem-do-humanoTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl bg-transparent" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Origem do homem</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        @if(empty($origem_do_humano))
                                        <p>Infelizmente não há exposições relacionadas a esse tema :,(</p>
                                        @endif
                                        @foreach ($origem_do_humano as $evento)
                                        <div class="col-sm-3">
                                            <div class="card exposicoes-card" style="width: 16rem;">
                                                <img class="card-img-top"
                                                    src="data:image/jpeg;base64,<?= base64_encode($evento['imagem']) ?>"
                                                    alt="Imagem de capa do card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$evento['titulo']}}</h5>
                                                    <p class="card-text">{{$evento['descricao']}}</p>
                                                </div>
                                                <div class="card-body">
                                                    <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mobile">
            <div id="exposicoes-galeria" class="row mr-0 p-0">
                <div class="col-md-4 p-0">
                    <div id="exposicoes-img-astronomia" class="zoom text-center">
                        <img src="{{ asset('img/tela_inicial/background-astronomia.jpg') }}" alt="Astronomia">
                        <button type="button" class="exposicoes-btn-text text-center btn bg-transparent"
                            data-toggle="modal" data-target="#AstronomiaMB">
                            Astronomia
                        </button>
                    </div>


                    <div class="modal fade" id="AstronomiaMB" tabindex="-1" role="dialog"
                        aria-labelledby="AstronomiaMBTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Astronomia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    @if(empty($astronomia))
                                    <p>Infelizmente não há exposições relacionadas a esse tema :,(</p>
                                    @endif
                                    @foreach ($astronomia as $evento)

                                    <div class="card  exposicoes-card" style="width: 100%;">
                                        <img class="card-img-top"
                                            src="data:image/jpeg;base64,<?= base64_encode($evento['imagem']) ?>"
                                            alt="Imagem de capa do card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$evento['titulo']}}</h5>
                                            <p class="card-text">{{$evento['descricao']}}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="zoom text-center">
                        <img src="{{ asset('img/tela_inicial/background-biodiversidade.jpg') }}" alt="Astronomia">
                        <button type="button" class="exposicoes-btn-text text-center btn bg-transparent"
                            data-toggle="modal" data-target="#biodiversidadeMB">
                            Biodiversidade
                        </button>
                    </div>

                    <div class="modal fade bg-transparent" id="biodiversidadeMB" tabindex="-1" role="dialog"
                        aria-labelledby="biodiversidadeMBTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl bg-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Biodiversidade</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @if(empty($biodiversidade))
                                            <p>Infelizmente não há exposições relacionadas a esse tema :,(</p>
                                            @endif
                                            @foreach ($biodiversidade as $evento)
                                            <div class="col-sm-3">
                                                <div class="card exposicoes-card" style="width: 16rem;">
                                                    <img class="card-img-top"
                                                        src="data:image/jpeg;base64,<?= base64_encode($evento['imagem']) ?>"
                                                        alt="Imagem de capa do card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$evento['titulo']}}</h5>
                                                        <p class="card-text">{{$evento['descricao']}}</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="zoom text-center">
                        <img src="{{ asset('img/tela_inicial/background-origem-1.jpg') }}" alt="Astronomia">
                        <button type="button" class="exposicoes-btn-text text-center btn bg-transparent"
                            data-toggle="modal" data-target="#origem-do-humanoMB">
                            Origem do Homem
                        </button>
                    </div>

                    <div class="modal fade bg-transparent" id="origem-do-humanoMB" tabindex="-1" role="dialog"
                        aria-labelledby="origem-do-humanoMBTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl bg-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Origem do homem</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @if(empty($origem_do_humano))
                                            <p>Infelizmente não há exposições relacionadas a esse tema :,(</p>
                                            @endif
                                            @foreach ($origem_do_humano as $evento)
                                            <div class="col-sm-3">
                                                <div class="card exposicoes-card" style="width: 16rem;">
                                                    <img class="card-img-top"
                                                        src="data:image/jpeg;base64,<?= base64_encode($evento['imagem']) ?>"
                                                        alt="Imagem de capa do card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$evento['titulo']}}</h5>
                                                        <p class="card-text">{{$evento['descricao']}}</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="{{ route('entrar')}}" class="card-link">Agendar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    {{-- AGENDAMENTO / ENDEREÇO / CONTATO --}}
    <section id="agendamento-endereco-informacoes">

        {{-- DESKTOP --}}
        <div class="desktop">
            <div class="row mr-0">

                {{-- Parte left da sub-tela --}}
                <div id="aec-left" class="col-md-4">
                    <div id="aec-left-agendamento">
                        <div id="aec-left-agendamento-card" class="mx-auto">
                            <p class="h1 text-center">Agendamento</p>
                            <div class="card bg-transparent"
                                style="border-top-right-radius:30px;border-top-left-radius:30px;border-bottom-right-radius:30px;border-bottom-left-radius:30px;">
                                <a href="{{ route('entrar') }}">
                                    <img id="aec-left-agendamento-card-img" class="card-img bg-transparente"
                                        src="{{ asset('img/tela_inicial/background-agendamento.jpg') }}">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="cont_b358ec09b5af28aa548c2098f8263b2d">
                        <script type="text/javascript" async
                            src="https://www.tempo.com/wid_loader/b358ec09b5af28aa548c2098f8263b2d">
                        </script>
                    </div>

                </div>

                {{-- Parte right da sub-tela --}}
                <div id="aec-right" class="col-md-8">
                    <div id="aec-right-ec">
                        <div class="card">
                            <div id="aec-right-ec-mapa" class="z-depth-1-half map-container-6" style="height: 400px">
                                <iframe id="mapa"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.125422728828!2d-38.98123065087737!3d-12.239785991296475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71437f814104ed1%3A0xf454b0caf4308ec7!2sObservat%C3%B3rio%20Astron%C3%B4mico%20Antares!5e0!3m2!1spt-BR!2sbr!4v1579092162227!5m2!1spt-BR!2sbr"
                                    width="600" height="450" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                            </div>
                            <div id="aec-right-ec-footer" class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <a target="_blank" href="https://goo.gl/maps/obi3JURBXJco6Kab6">
                                            <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 30px;"></i>
                                            <p>Feira de Santana, BA 925</p>
                                            <p>BRASIL</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="tel:+7536241921">
                                            <i class='fas fa-phone' style='font-size:30px'></i>
                                        </a>
                                        <a href="tel:+7536241921">
                                            <p>
                                                (+55) 75 3624 1921
                                            </p>
                                        </a>
                                        <a href="tel:+55754000">
                                            <p>4000 (UEFS)</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="mailto:">
                                            <i class="fa fa-envelope" aria-hidden="true" style="font-size: 30px;"></i>
                                        </a>
                                        <a href="mailto:observatoriouefs@gmail.com">
                                            <p>observatoriouefs@gmail.com</p>
                                        </a>
                                        <a href="mailto:museuantares@gmail.com">
                                            <p>museuantares@gmail.com</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>

        {{-- MOBILE --}}
        <div class="mobile">
            <div id="mobile-agendamento">
                <p class="h2 text-center">AGENDAMENTO</p>
                <div class="card bg-transparent"
                    style="border-top-right-radius:30px;border-top-left-radius:30px;border-bottom-right-radius:30px;border-bottom-left-radius:30px;">
                    <a href="{{ route('entrar') }}">
                        <img id="aec-left-agendamento-card-img" class="card-img bg-transparente"
                            src="{{ asset('img/tela_inicial/background-agendamento.jpg') }}">
                    </a>
                </div>
            </div>
            <div id="mobile-ec">
                <p class="h2 text-center">Endereço e Contato</p>
                <div class="card"
                    style="border-top-right-radius:30px;border-top-left-radius:30px;border-bottom-right-radius:30px;border-bottom-left-radius:30px;">
                    <div id="aec-right-ec-mapa" class="z-depth-1-half map-container-6" style="height: 400px">
                        <iframe id="mapa"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.125422728828!2d-38.98123065087737!3d-12.239785991296475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71437f814104ed1%3A0xf454b0caf4308ec7!2sObservat%C3%B3rio%20Astron%C3%B4mico%20Antares!5e0!3m2!1spt-BR!2sbr!4v1579092162227!5m2!1spt-BR!2sbr"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div id="aec-right-ec-footer" class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <a target="_blank" href="https://goo.gl/maps/obi3JURBXJco6Kab6">
                                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 30px;"></i>
                                    <p>Feira de Santana, BA 925</p>
                                    <p>BRASIL</p>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="tel:+7536241921">
                                    <i class='fas fa-phone' style='font-size:30px'></i>
                                </a>
                                <a href="tel:+7536241921">
                                    <p>
                                        (+55) 75 3624 1921
                                    </p>
                                </a>
                                <a href="tel:+55754000">
                                    <p>4000 (UEFS)</p>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="mailto:">
                                    <i class="fa fa-envelope" aria-hidden="true" style="font-size: 30px;"></i>
                                </a>
                                <a href="mailto:observatoriouefs@gmail.com">
                                    <p>observatoriouefs@gmail.com</p>
                                </a>
                                <a href="mailto:museuantares@gmail.com">
                                    <p>museuantares@gmail.com</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- FOOTER--}}
    <footer id="footer">
        <div class="desktop">
            <div class="row mr-0">
                {{-- Background --}}
                <img id="footer-img-background" src="{{ asset('img/tela_inicial/background-footer.jpg') }}">
                <div id="footer-conteudo" class="row">
                    {{-- Logo Scorpius --}}
                    <div class="container-footer col-md-2 text-center">
                        <img id="footer-img-logo" src="{{ asset('img/scorpius-whited.png') }}" alt="">
                    </div>
                    {{-- Contato --}}
                    <div id="footer-conteudo-contato" class="container-footer col-md-3 mr-0 ml-0">
                        <p class="h5">Contato</p>
                        <p class="h6">
                            Rua da Barra, 925 - Jardim Cruzeiro <br>
                            CEP: 44024-432 <br>
                            Feira de Santana - BA<br>
                            Telefone: 4000 (UEFS)/75 3624-1921 <br>
                            E-mail: observatoriouefs@gmail.com <br>
                            museuantares@gmail.com

                        </p>
                    </div>
                    {{-- Menu --}}
                    <div id="footer-conteudo-menu" class="container-footer col-md-2 m-0">
                        <p class="h5">Menu</p>
                        <p class="h6">
                            <a href="#inicio">Início</a> <br>
                            <a href="#informacoes">Sobre o Observatório</a> <br>
                            <a href="#exposicoes">Exposições</a> <br>
                            <a href="#atividades-diferenciadas"> Atividades Diferenciadas</a> <br>
                            <a href="#agendamento-endereco-contato">Agendamento</a> <br>
                            <a href="#agendamento-endereco-contato">Endereço e Contato</a> <br>
                        </p>
                    </div>
                    {{-- Redes Sociais --}}
                    <div id="footer-conteudo-rs" class="container-footer col-md-2">
                        <p class="h5">Redes Sociais</p>
                        <div class="row mx-auto">
                            <div class="col-sm-2 pr-3">
                                <a target="_blank"
                                    href="https://www.facebook.com/pages/Observat%C3%B3rio-Astron%C3%B4mico-Antares/244289909257692">
                                    <i class="fab fa-facebook" style="font-size:24px;"></i>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a target="_blank" href="https://www.instagram.com/observatorioantares/">
                                    <i class="fab fa-instagram" style="font-size:24px"></i>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a target="_blank" href="http://www.antares.uefs.br/">
                                    <i class="fas fa-globe" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Botao de voltar ao topo --}}
                    <div class="col-md-1 text-center">
                        <a href="#inicio">
                            <i class="fas fa-arrow-circle-up" style="font-size:20px;"></i>
                            <br>
                            <p class="h6">TOPO</p>
                        </a>
                    </div>
                </div>
            </div>
            {{-- SUB FOOTER --}}
            <footer id="sub-footer" style="background-color:#0B0B3B" class="row mr-0 text-white">
                {{-- Copyright --}}
                <div class="col-md-6 mt-2 pl-5">
                    <p class="h6">
                        <span style="font-family: stark;">Scorpius</span>
                        <i class="fas fa-copyright" style="font-size:12px;"></i>
                        All Rights Reserved.
                    </p>
                </div>
                {{-- Botao de login administrativo --}}
                <div class="col-md-6 mt-2">
                    <a class="text-white" href="{{ route('loginAdm') }}">
                        <p class="h6 float-right">ADM</p>
                    </a>
                </div>
            </footer>
        </div>
        {{-- MOBILE --}}
        <div style="background-color:#0B0B3B">
            <div class="mobile text-white text-center">
                {{-- logo Scorpius - MOBILE --}}
                <div>
                    <img id="mobile-footer-img-logo" style="width: 50%;" src="{{ asset('img/scorpius-whited.png') }}">
                </div>
                {{-- Menu - MOBILE  --}}
                <div id="mobile-footer-menu">
                    <p class="h4">Menu</p>
                    <p class="h6">
                        <a href="#inicio">Início</a> <br>
                        <a href="#informacoes">Sobre o Observatório</a> <br>
                        <a href="#exposicoes">Exposições</a> <br>
                        <a href="#atividades-diferenciadas"> Atividades Diferenciadas</a> <br>
                        <a href="#agendamento-endereco-contato">Agendamento</a> <br>
                        <a href="#agendamento-endereco-contato">Endereço e Contato</a> <br>
                    </p>
                </div>
                <br>
                {{-- Redes sociais - MOBILE  --}}
                <div id="mobile-footer-rs" class="mx-auto">
                    <p class="h4">Redes Sociais</p>
                    <a class="pr-1" target="_blank"
                        href="https://www.facebook.com/pages/Observat%C3%B3rio-Astron%C3%B4mico-Antares/244289909257692">
                        <i class="fab fa-facebook" style="font-size:24px;"></i>
                    </a>
                    <a class="pr-1" target="_blank" href="https://www.instagram.com/observatorioantares/">
                        <i class="fab fa-instagram" style="font-size:24px"></i>
                    </a>
                    <a target="_blank" href="http://www.antares.uefs.br/">
                        <i class="fas fa-globe" style="font-size: 24px;"></i>
                    </a>
                </div>
                <br>
                {{-- Contato - MOBILE  --}}
                <div id="mobile-footer-contato" class="mx-auto">
                    <p class="h4">Contato</p>
                    <p class="h6">
                        Rua da Barra, 925 - Jardim Cruzeiro <br>
                        CEP: 44024-432 <br>
                        Feira de Santana - BA<br>
                        TELEFONE: <br>
                        4000 (UEFS) <br>
                        +55 75 3624-1921<br>
                        E-MAIL: <br>
                        observatoriouefs@gmail.com <br>
                        museuantares@gmail.com

                    </p>
                </div>
                {{-- Botao de login administrativo - MOBILE  --}}
                <a class="text-white" href="{{ route('loginAdm') }}">
                    <p class="h6">ADM</p>
                </a>
                {{-- Copyright - MOBILE --}}
                <p class="h6 mb-0 pb-0">
                    <span style="font-family: stark;">Scorpius</span>
                    <i class="fas fa-copyright" style="font-size:12px;"></i>
                    All Rights Reserved.
                </p>

            </div>
        </div>
    </footer>

</body>

</html>