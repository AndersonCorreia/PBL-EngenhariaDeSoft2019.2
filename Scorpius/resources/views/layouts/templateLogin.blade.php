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
    #lado_direito{
        margin-top: 80px;
    }
    
    #nome-scorpius{
        width: 45%;
    }
    #container{
        margin-right: 0px;
    }
</style>

<div id="container" class="row">
    <!-- Lado esquerdo da tela de Login -->
    <div id="lado_esquerdo" class="col-md-6">
        @yield('img')
    </div>
    <!-- Lado direito da tela de Login -->
    <div id="lado_direito" class="col-md-6 pr-0">
        <!-- Parte do topo do lado direito -->
        <div id="lado_direito-topo" class="text-center">
            <a href="{{ route('paginaInicial') }}">
                <img id="nome-scorpius" src="{{ asset('img/nome-scorpius.png') }}">
            </a>
        </div>
        <!-- Parte de baixo do lado direito -->
        <div id="lado_direito-baixo"> @yield('conteudo')</div>
    </div>
</div>

@include('layouts._includes.footer')