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
    <div id="container" class="row">
        <!-- Lado esquerdo da tela -->
        <div class="col-md-6 lado-esquerdo">
            <!-- Nome Scorpius -->
            <div id="img-nome-min">
                <img class="img-fluid" id="img-nome-scorpius" src="{{ asset('img/tela_inicial/somente-nome-img.png') }}">
            </div>
            <!-- Botões de Login (só aparecem para versão mobile) -->
            <div id="btn-login-min">
                <a id="btn-entrar" class="btn btn-outline-primary text-white btn-lg btn-block" href="{{ route('entrar') }}">ENTRAR</a>
                <a id="btn-cadastrar" class="btn btn-primary btn-lg btn-block" href="{{ route('cadastrar') }}">CADASTRAR-SE</a>
            </div>
            <br>

            <div id="menu">

                <img id="menu-img-logo" class="img-fluid" src="{{ asset('img/tela_inicial/logo-somente-galacia-img.png') }}">

                <div id="menu-botoes">
                    <a id="menu-botoes-antares" href="http://www.antares.uefs.br/"><i class='fas fa-external-link-alt' style='font-size:large'></i>
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
        <div class="col-md-6 lado-direito pr-0">
            <img class="img-fluid" id="img-background" src="{{ asset('img/tela_inicial/img-background-v3.png') }}">
            <div id="btn-login-max">
                <a id="btn-entrar" class="btn btn-outline-primary text-white" href="{{ route('entrar') }}">ENTRAR</a>
                <a id="btn-cadastrar" class="btn btn-primary" href="{{ route('cadastrar') }}">CADASTRAR-SE</a>
            </div>
        </div>
    </div>
    <br><br>
    <!-- INFORMAÇÕES -->
    <div id="informacoes">
        <div class="row mr-0 align-items-center">
            <div id="informacoes-esquerda" class="col-md-6">
                <img class="img-fluid" id="informacoes-esquerda-img" src="{{ asset('img/tela_inicial/observatorio-antares.jpg') }}">
                <span class="glyphicon glyphicon-chevron-right"></span>
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
    </div>
</body>

</html>