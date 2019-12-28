
@include('layouts._includes.top')

<div style="height: 100%; display:flex;">
    <div id="menu" class=" bg-dark" style="min-Width : 90pt ; width : 15%; height: 100%;"> 
        <nav class="nav flex-column"> <!-- min-width provisorio para o texto não sai da area do menu-->
            <a class="nav-link active" href="#">Inicio</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link disabled" href="#">Desativado</a>
          </nav>
    </div>
    <div>
        @yield('conteudo')
        <H1> ascsdcsd</H1>
    </div>
</div>
<style type="text/css">
    html,body{
        height:100%;
    }
</style>
@include('layouts._includes.footer')
