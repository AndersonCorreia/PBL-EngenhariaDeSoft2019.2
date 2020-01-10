<!-- 
    Esse será o template das telas de login (sign in e sign up), 
    visto que acerca de layout, serão a mesma coisa. Então reaproveitamos o layout. 
-->

@include('layouts._includes.top')

<style>
    @media only screen and (max-width: 1250px) {
        #lado_esquerdo {
            display: none !important;
        }
    }
    .column {
        float: left;
    }
    .column.side {
        width: 25%;
    }
    .column.middle {
        width: 50%;
    }

    #lado_esquerdo img {
        width: 100%;
    }
    #lado_direito{
        top: 100px;
    }
</style>

<div>
    <!-- Aqui ficara as coisas que ficam ao lado esquerdo das telas de login, que no caso, 
    é aquela imagem do background -->

    <div class="column col-md-6" id="lado_esquerdo">
        <img class="img-fluid" src="{{ asset('img/background-login-2.png') }}">
    </div>


    <!-- Aqui ficara as coisas que ficam ao lado direito das telas de login, como os campos
    os botões, etc.. -->
    <div id="lado_direito" class="column col-md-6">

        <div id="lado_direito-topo" class="text-center">
            <a href="{{ route('paginaInicial') }}">
                <img  width="45%" id="nome-scorpius" src="{{ asset('img/nome-scorpius.png') }}">
            </a>
        </div>

        <div id="lado_direito-baixo"> @yield('conteudo')</div>

    </div>
</div>

@include('layouts._includes.footer')