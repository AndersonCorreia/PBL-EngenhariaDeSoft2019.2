
@include('layout._includes.top')

<div style="height: 100%; display:flex;">
    <div id="menu" class=" bg-dark" style="width : 15%; height: 100%;"> 
        <nav class="nav flex-column">
            <a class="nav-link active" href="#">Ativo</a>
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

@include('layout._includes.footer')
