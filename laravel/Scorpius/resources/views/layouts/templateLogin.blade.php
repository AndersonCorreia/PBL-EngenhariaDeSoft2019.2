<!-- 
    Esse será o template das telas de login (sign in e sign up), 
    visto que acerca de layout, serão a mesma coisa. Então reaproveitamos o layout. 
-->

@include('layouts._includes.top')

<div class="row">
    <!-- Aqui ficara as coisas que ficam ao lado esquerdo das telas de login, que no caso, 
    é aquela imagem do background -->
    
        <div class="col-sm" id="lado_esquerdo">
            <img width="92%" class="img-fluid" src="{{ asset('img/background-login-2.png') }}">
        </div>
      

    <!-- Aqui ficara as coisas que ficam ao lado direito das telas de login, como os campos
    os botões, etc.. -->
    <div class="col-sm" id="lado_direito">
        <div class="w-auto p-3">
            <div class="text-center">
            <img width="250" class="img-fluid" id="nome-scorpius" src="{{ asset('img/nome-scorpius.png') }}">
            </div>
            @yield('conteudo')
        </div>
    </div>
</div>

@include('layouts._includes.footer')