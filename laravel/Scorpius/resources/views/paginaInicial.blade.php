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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Scorpius</title>
</head>

<body>
    <!-- TELA INICIAL -->
    <div id="tela-inicial">
        {{-- TELA INICIAL - DESKTOP --}}
        <div class="desktop">
            <div id="container" class="row">
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
                            <a id="menu-botoes-exposicoes" href="#exposicoes">
                                EXPOSIÇÕES
                            </a>
                            <a id="menu-botoes-informacoes" href="#informacoes">
                                INFORMAÇÕES
                            </a>
                            <a id="menu-botoes-agendamento" href="#informacoes">
                                AGENDAMENTO
                            </a>
                            <a id="menu-botoes-endereco" href="#informacoes">
                                ENDEREÇO
                            </a>
                            <a id="menu-botoes-contato" href="#informacoes">
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
                    <button id="mobile-menu-antares" type="button" class="btn btn-primary border border-white"><a
                            href="">Antares</a></button>
                    <button id="mobile-menu-exposicoes" type="button" class="btn btn-primary border border-white"><a
                            href="#exposicoes">Exposições</a></button>
                    <button id="mobile-menu-informacoes" type="button" class="btn btn-primary border border-white"><a
                            href="#informacoes">Informações</a></button>
                </div>
                <div id="mobile-menu-botoes-1" class="btn-group" role="group" aria-label="...">
                    <button id="mobile-menu-agendamento" type="button" class="btn btn-primary border border-white"><a
                            href="#agendamento">Agendamento</a></button>
                    <button id="mobile-menu-endereco" type="button" class="btn btn-primary border border-white"><a
                            href="#endereco">Endereço</a></button>
                    <button id="mobile-menu-contato" type="button" class="btn btn-primary border border-white"><a
                            href="contato">Contato</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- INFORMAÇÕES -->
    <div id="informacoes">
        {{-- INFORMAÇÕES - DESKTOP --}}
        <div class="desktop row mr-0">
            <div id="informacoes-esquerda" class="col-md-6">
                <img id="informacoes-esquerda-img" src="{{ asset('img/tela_inicial/observatorio-antares.jpg') }}">
            </div>
            <div id="informacoes-direita" class="col-md-6">
                <h1 id="informacoes-direita-titulo">
                    SOBRE O OBSERVATÓRIO
                </h1>
                <h2 id="informacoes-direita-conteudo">
                    O planetário é utilizado para a projeção de filmes
                    sobre o Universo e representa um importante recurso
                    didático para as visitas de escolas e do público em
                    geral no Observatório Astronômico Antares.
                    As sessões acontecem de segunda a sexta
                    às 10 horas e às 15 horas.
                </h2>
                <h2 id="informacoes-direita-conteudo-footer">
                    O atendimento é gratuito.
                </h2>
            </div>
        </div>
        {{-- INFORMAÇÕES - MOBILE --}}
        <div class="mobile">
            <div id="mobile-informacoes-esquerda">
                <img id="mobile-informacoes-esquerda-img"
                    src="{{ asset('img/tela_inicial/observatorio-antares.jpg') }}">
            </div>
            <div id="mobile-informacoes-direita">
                <h4 id="mobile-informacoes-direita-titulo"> SOBRE O OBSERVATÓRIO</h4>
                <h5 id="mobile-informacoes-direita-conteudo">
                    O planetário é utilizado para a projeção de filmes
                    sobre o Universo e representa um importante recurso
                    didático para as visitas de escolas e do público em
                    geral no Observatório Astronômico Antares.
                    As sessões acontecem de segunda a sexta
                    às 10 horas e às 15 horas.
                </h5>
                <h5 id="mobile-informacoes-direita-footer">O atendimento é gratuito.</h5>
            </div>
        </div>
    </div>

    {{-- AGENDAMENTO / ENDEREÇO / CONTATO --}}
    <div id="aec">

        {{-- DESKTOP --}}
        <div class="desktop">
            <div class="row">

                {{-- Parte esquerda da sub-tela --}}
                <div id="aec-esquerda" class="col-md-6">

                </div>

                {{-- Parte direita da sub-tela --}}
                <div id="aec-direita" class="col-md-6">

                </div>
            </div>
        </div>

        {{-- MOBILE --}}
        <div class="mobile">

        </div>
    </div>
</body>

</html>