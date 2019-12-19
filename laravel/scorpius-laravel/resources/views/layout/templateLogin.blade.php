<!-- 
    Esse será o template das telas de login (sign in e sign up), 
    visto que acerca de layout, serão a mesma coisa. Então reaproveitamos o layout. 
-->

@include('layout._includes.topo') <!-- Template do topo da pagina html, também da pra reaproveitar -->

@yield('body')

@include('layout._includes.footer') <!-- Template do rodapé -->