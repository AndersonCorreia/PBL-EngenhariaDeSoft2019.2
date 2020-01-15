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
                    <button id="mobile-menu-antares" type="button" class="btn btn-primary border border-white"><a
                            href="">Antares</a></button>
                    <button id="mobile-menu-exposicoes" type="button" class="btn btn-primary border border-white"><a
                            href="#exposicoes">Exposições</a></button>
                    <button id="mobile-menu-informacoes" type="button" class="btn btn-primary border border-white"><a
                            href="#informacoes">Informações</a></button>
                </div>
                <div id="mobile-menu-botoes-1" class="btn-group" role="group" aria-label="...">
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

    <!-- INFORMAÇÕES -->
    <section id="informacoes">
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
    </section>

    {{-- AGENDAMENTO / ENDEREÇO / CONTATO --}}
    <section id="agendamento-endereco-informacoes">

        {{-- DESKTOP --}}
        <div class="desktop">
            <div class="row mr-0">

                {{-- Parte esquerda da sub-tela --}}
                <div id="aec-esquerda" class="col-md-4">
                    <div id="aec-esquerda-agendamento">
                        <div id="aec-esquerda-agendamento-card" class="mx-auto">
                            <p class="h1 text-center">Agendamento</p>
                            <div class="card bg-transparent"
                                style="border-top-right-radius:30px;border-top-left-radius:30px;border-bottom-right-radius:30px;border-bottom-left-radius:30px;">
                                <a href="{{ route('entrar') }}">
                                    <img id="aec-esquerda-agendamento-card-img" class="card-img bg-transparente"
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

                {{-- Parte direita da sub-tela --}}
                <div id="aec-direita" class="col-md-8">
                    <div id="aec-direita-ec">
                        <div class="card">
                            <div id="aec-direita-ec-mapa" class="z-depth-1-half map-container-6" style="height: 400px">
                                <iframe id="mapa"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.125422728828!2d-38.98123065087737!3d-12.239785991296475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71437f814104ed1%3A0xf454b0caf4308ec7!2sObservat%C3%B3rio%20Astron%C3%B4mico%20Antares!5e0!3m2!1spt-BR!2sbr!4v1579092162227!5m2!1spt-BR!2sbr"
                                    width="600" height="450" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                            </div>
                            <div id="aec-direita-ec-footer" class="card-body">
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
                        <img id="aec-esquerda-agendamento-card-img" class="card-img bg-transparente"
                            src="{{ asset('img/tela_inicial/background-agendamento.jpg') }}">
                    </a>
                </div>
            </div>
            <div id="mobile-ec">
                <p class="h2 text-center">Endereço e Contato</p>
                <div class="card"
                    style="border-top-right-radius:30px;border-top-left-radius:30px;border-bottom-right-radius:30px;border-bottom-left-radius:30px;">
                    <div id="aec-direita-ec-mapa" class="z-depth-1-half map-container-6" style="height: 400px">
                        <iframe id="mapa"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.125422728828!2d-38.98123065087737!3d-12.239785991296475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71437f814104ed1%3A0xf454b0caf4308ec7!2sObservat%C3%B3rio%20Astron%C3%B4mico%20Antares!5e0!3m2!1spt-BR!2sbr!4v1579092162227!5m2!1spt-BR!2sbr"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div id="aec-direita-ec-footer" class="card-body">
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
</body>

</html>