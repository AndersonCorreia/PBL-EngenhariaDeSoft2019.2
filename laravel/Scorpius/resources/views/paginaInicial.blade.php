<!-- Pagina inicial do site Scorpius -->
<!-- @include('layouts._includes.top') -->
<!--@section('title', 'Scorpius') -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/paginaInicial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Scorpius</title>
</head>
<body>
    <div id="barra-topo" class="flex-center position-ref full-heigh">
        <div>
            <img id="imgNomeSistema" src="{{ asset('img/tela_inicial/somente-nome-img.png') }}">
        </div>
        <div id="cadastrar-entrar" class="top-right" role="toolbar">
            <div class="btn-group mr-3 ml-3" role="group">
                <a href="{{ route('entrar') }}">
                    <button class="btn btn-outline-success">Entrar</button>
                </a>
            </div>
            <div  class="btn-group mr-3" role="group">
                <a href="{{ route('cadastrar') }}">
                    <button class="btn btn-success">Cadastre-se</button>
                </a>
            </div>
        </div>
    </div>
    <!-- Menu principal -->
    <div id="MenuPrincipal">
        <figure id="img-menu">
            <img id="imgLogoMenu" src="{{ asset('img/tela_inicial/logo-somente-galacia-img.png') }}">
            <a id="linkAntares" href="http://www.antares.uefs.br/">
                <i class='fas fa-external-link-alt' style='font-size:large'></i>ANTARES
            </a>
            <a id="linkInfo" href="#sobre-observatorio">INFORMAÇÕES</a>
        </figure>
    </div>

    <div id="sobre-observatorio">
        <img style="float:left;" id="imgLogoMenu" src="{{ asset('img/tela_inicial/logo-somente-galacia-img.png') }}">
        <div>
            <h1 class="bordaTextoLateral" id="fonteTitulo" style="text-align:center;">SOBRE O OBSERVATÓRIO<br></h1>
            <h2 class="bordaTextoLateral" id="fonteTexto" style="text-align:center;"><br>O planetário é utilizado para a projeção de filmes<br>
                sobre o Universo e representa um importante recurso<br>
                didático para as visitas de escolas e do público em<br>
                geral no Observatório Astronômico Antares.<br>
                As sessões acontecem de segunda a sexta<br>
                às 10 horas e às 15 horas.<br>
            </h2>
            <h2 class="bordaTextoLateral" id="fonteNegrito" style="text-align:center;"><br>O atendimento é gratuito.</h2>
        </div>
    </div>
</body>
</html>

<!-- @include('layouts._includes.footer') -->