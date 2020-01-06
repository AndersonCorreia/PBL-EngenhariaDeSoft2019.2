<!-- 
    Esse será o template das telas de login (sign in e sign up), 
    visto que acerca de layout, serão a mesma coisa. Então reaproveitamos o layout. 
-->

@include('layouts._includes.top')

<div id="tela" class="row">
    <!-- Aqui ficara as coisas que ficam ao lado esquerdo das telas de login, que no caso, 
    é aquela imagem do background -->
    
        <div class="col-sm-6 h-100 p-0 m-0 " id="lado_esquerdo">
            <img class="img-fluid h-100" src="{{ asset('img/background-login-2.png') }}">
        </div>
      

    <!-- Aqui ficara as coisas que ficam ao lado direito das telas de login, como os campos
    os botões, etc.. -->
    <div class="col-sm h-100" id="lado_direito">
        <div class="h-100 overflow-auto p-2">
            <div class="text-center">
                <img class="img-fluid w-50" id="nome-scorpius" src="{{ asset('img/nome-scorpius.png') }}">
            </div>
            @yield('conteudo')
        </div>
    </div>
</div>

<style type="text/css">
   html, body, #tela {
        margin: 0;
        padding: 0;
        height: 100vh;
    }
</style>
@include('layouts._includes.footer')