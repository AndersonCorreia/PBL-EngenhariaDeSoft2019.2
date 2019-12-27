<!-- 
    Esse será o template das telas de login (sign in e sign up), 
    visto que acerca de layout, serão a mesma coisa. Então reaproveitamos o layout. 
-->
@include('layout._includes.top')
<!-- Aqui ficara as coisas que ficam ao lado esquerdo das telas de login, que no caso, 
é aquela imagem do background -->
<div id="lado_esquerdo">
<img id="img-esquerda" src="" alt="">
</div>

<!-- Aqui ficara as coisas que ficam ao lado direito das telas de login, como os campos
os botões, etc.. -->
<div id="lado_direito">
<img id="nome-scorpius" src="" alt="">
@yield('conteudo')
</div>

@include('layout._includes.footer')