@include('layouts._includes.top')

<div class= "tela  bg-light">
    <div id="menuLateral" class= "bg-dark border-right border-dark">
        <img id="logo" class = "px-md-3 px-2 pt-3 mb-3" src="{{ asset("img/scorpius-whited.png")}}" height=auto  width=100%> 
        <div class="h-75 overflow-auto">
            <nav class="p-lg-2 pr-1 py-1 navbar-left flex-column">
                @foreach ($itensMenu as $key => $item){{--Para adicionar os itens do menu dinamicamente --}}
                    @if ($key==="collapseAgend")
                        @if ($item['texto']==($paginaAtual ?? 'Inicio')){{--Para destacar a pagina atual no menu --}}
                            <a class="nav-link m-1 rounded bg-secondary " role="button" id="collapseAgendButton" data-toggle="collapse" href="#collapseAgendamento" aria-controls="collapseAgendamento" aria-expanded="true">
                                {{$item['texto'] }}
                            </a>
                        @else
                            <a class="nav-link m-1 rounded" role="button" id="collapseAgendButton" data-toggle="collapse" href="#collapseAgendamento" aria-controls="collapseAgendamento" aria-expanded="false">
                                {{$item['texto'] }}
                            </a>
                        @endif
                        <div class="collapse m-1 ml-4 rounded bg-secondary" id="collapseAgendamento">
                            @foreach ($item['itens'] as $drop)
                                <a class="nav-link my-1 m-0 rounded" href={{$drop["link"]}}>{{$drop['texto'] }}</a>
                            @endforeach
                        </div>
                    @else
                        @if ($item['texto']==($paginaAtual ?? 'Inicio')){{--Para destacar a pagina atual no menu --}}
                            <a class="nav-link bg-secondary m-1 rounded active" href="{{$item['link']}}">{{$item['texto']}}</a>
                        @else
                            <a class="nav-link m-1 rounded" href="{{$item['link']}}">{{$item['texto']}}</a>
                        @endif
                    @endif
                @endforeach
            </nav>
        </div>
    </div>
    <div class="content bg-light">
        <div id="menuTopo" class="d-flex m-0 pt-2 w-100 h-auto border-bottom">
                <ul class=" w-100">
                    <li id="menuTopoTitle" class="ml-4 pt-1 pb-0 my-0 float-left w-50">
                        <h3>@yield('title', $paginaAtual ?? 'Pagina do Visitante')</h3>
                    </li>
                    <li class="mr-3 float-right w-auto">
                        <a href="#" class="mr-5">
                            <img class="rounded-circle" height=40vh src="{{ asset("img/user-default-img.png")}}">
                            <span class="ml-1">{{session("nome") ?? 'Larissa'}}</span>
                        </a> 
                        <a href={{route("logout")}} title="Sair"><img alt="exit-icon" class="rounded-lg" width=40vw src="{{ asset("img/exit-img.jpg")}}"></a>   
                    </li>
                </ul>
        </div>
        {{--<hr class="m-0 bg-primary">--}}
        <div class="p-lg-4 pt-4 ml-lg-3 container">
            @yield('conteudo')
        </div>
    </div>
</div>

@yield('css')
<style type="text/css">
    html,
    body,
    .tela{
        margin: 0%;
        padding: 0%;
        height: 100vh;
    }

    nav a {
        color: ghostwhite;
    }
    #menuLateral nav a:hover ,#menuLateral nav a:focus{
        color: royalblue;
        background-color: ghostwhite;
    }
    hr {
        height: 0.1vh;
    }

    #menuTopo {
        background-color: white;
    }
    #menuTopo ul {
        margin: 0;
        padding:0;
        list-style: none;
    }

    #menuTopo ul li a {
        margin: 0;
        padding: 0;
        display: inline-block;
        color: black;
        text-decoration: none;
    }

    #menuTopo ul li a:hover {
        color: #767474;
    }

    @media (min-width: 651px) {
        .content {
            width: 83%;
            float: right;
        }

        #menuLateral {
            width: 17%;
            height: 100vh;
            float: left;
            position: fixed;
        }
    }
    
    html ::-webkit-scrollbar {
        width: 0.5vw;
    }

    /* aqui é para personalizar o fundo da barra*/
    html ::-webkit-scrollbar-track {
        background: rgb(255, 255, 255);
        border-radius: 20px;
    }

    /* aqui é a alça da barra, que demonstra a altura que você está na página
estou colocando uma cor azul clara nela*/
    html ::-webkit-scrollbar-thumb {
        border-radius: 20px;
        background: rgb(180, 180, 200);
    }

    @media (max-width: 650px) {
        #logo {
            height: 30%;
            width: 30%;
            margin-left: 35%;
            margin-right: 35%;
        }

        #menuLateral {
            height: auto;
        }
    }

    @media (min-width: 651px) and (max-width: 850px) {
        .content {
            width: 81%;
        }

        #menuLateral {
            min-width: 8rem;
            /*tamanho minimo para não oculta palavras*/
            width: 19%;
        }
    }

    @media (min-width: 851px) and (max-width: 950px) {

        /*para alteração mais suave do tamanho do menu*/
        .content {
            width: 82%;
        }

        #menuLateral {
            width: 18%;
        }
    }
    #menuLateral ::-webkit-scrollbar{
        width: 0.3vw;
    }

    /* aqui é para personalizar o fundo da barra*/
    #menuLateral ::-webkit-scrollbar-track{
        background: rgba(250, 250, 250, 0.3);
        border-radius: 20px;
    }

    /* aqui é a alça da barra, que demonstra a altura que você está na página
estou colocando uma cor azul clara nela*/
    #menuLateral ::-webkit-scrollbar-thumb{
        border-radius: 20px;
        background: royalblue;
    }
</style>
@include('layouts._includes.footer')