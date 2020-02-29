<!-- Template das tela de Login (Cadastrar/Entrar/Login ADM) -->
@include('layouts._includes.top')

<style>
    @media only screen and (max-width: 1250px) {
        #lado_esquerdo {
            display: none !important;
        }
    }
    #lado_esquerdo img {
        float: left;
        width: 100% !important;
    }
    html,
    body,
    #container{
        margin: 0%;
        padding: 0%;
        height: 100vh;
        width: 100vw;
    }
    #lado_direito-topo{
        padding-top: 7vh;
    }
    
    #nome-scorpius{
        width: 35%;
    }
</style>

<div id="container" class="row m-0 p-0 w-100 mh-100">
    <!-- Lado esquerdo da tela de Login -->
    <div id="lado_esquerdo" class="col-md-6 h-100 m-0 p-0">
        @yield('img')
    </div>
    <!-- Lado direito da tela de Login -->
    <div id="lado_direito" class="col-md-6 m-0 p-0 h-100 overflow-hidden">
        <!-- Parte do topo do lado direito -->
        <div id="lado_direito-topo" class="text-center">
            <a href="{{ route('paginaInicial') }}">
                <img id="nome-scorpius" src="{{ asset('img/nome-scorpius.png') }}">
            </a>
        </div>
        <!-- Parte de baixo do lado direito -->
        @yield('conteudo')
    </div>
</div>

@include('layouts._includes.footer')