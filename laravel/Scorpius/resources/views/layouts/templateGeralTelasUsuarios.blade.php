@include('layouts._includes.top')

<div class= "tela ">
    <div id="menuLateral" class= "bg-dark border-right border-dark">
        <img id="logo" class = "px-md-3 px-2 pt-3 mb-3" src="{{ asset("img/scorpius-whited.png")}}" height=auto  width=100%> 
        <div class="h-75 overflow-auto">
            <nav class="p-lg-2 p-1 navbar-left flex-column">
                @foreach ($itensMenu as $item){{--Para adicionar os itens do menu dinamicamente --}}
                    @if ($item['texto']==($paginaAtual ?? 'Inicio')){{--Para destacar a pagina atual no menu --}}
                        <a class="nav-link bg-secondary rounded active" href="{{$item['link']}}">{{$item['texto']}}</a>
                    @else
                        <a class="nav-link" href="{{$item['link']}}">{{$item['texto']}}</a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>
    <div class="content">
        <div id="menuTopo" class="d-flex m-0 pt-2 w-100 border-bottom">
                <ul class=" w-100">
                    <li id="menuTopoTitle" class="ml-5 pt-1 pb-0 my-0 float-left w-50">
                        <h2>@yield('title', $paginaAtual ?? 'Pagina do Visitante')</h2>
                    </li>
                    <li class="mr-3 float-right w-auto">
                        <a href="#" class="mr-5">
                            <img class="rounded-circle" height=40vh src="{{ asset("img/user-default-img.png")}}">
                            <span class="ml-1">{{$nomeUsuario ?? 'Fulano'}}</span>
                        </a> 
                        <a href="#" title="Sair"><img href="#" alt="exit-icon" class="rounded-lg" width=40vw src="{{ asset("img/exit-img.jpg")}}"></a>   
                    </li>
                </ul>
        </div>
        {{--<hr class="m-0 bg-primary">--}}
        <div class="p-4 bg-light">
            @yield('conteudo')
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultrices dignissim blandit. Ut sollicitudin mattis ligula vel vestibulum. Sed tortor ligula, bibendum nec mauris fringilla, pulvinar vehicula turpis. Donec consectetur mollis suscipit. Aenean eros odio, pharetra eu nulla at, scelerisque convallis turpis. Sed eget pulvinar neque, id gravida nulla. Suspendisse vitae odio nisl. Praesent eget semper turpis, vel iaculis lectus. Pellentesque sed varius ipsum, et egestas augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer condimentum congue mi eget condimentum. Praesent quis urna eget lorem ultrices ornare in ut sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sed pulvinar mi.

            Morbi vel aliquet metus. Suspendisse ac lacinia nunc, id interdum felis. Fusce mattis ex vitae magna pulvinar tempus. Mauris euismod ex sit amet aliquet ornare. Aenean mollis nisi ut posuere porta. Proin nisi eros, accumsan nec malesuada id, rutrum in lectus. Integer tristique aliquam orci, nec vestibulum urna interdum sit amet. Nulla eu rhoncus felis. Quisque ac mauris nec urna ornare placerat.

            Integer nec nulla congue, dignissim risus quis, fringilla nulla. Integer sed hendrerit nulla, ut posuere nisi. Etiam ac velit turpis. Phasellus lacinia, neque vitae sagittis suscipit, sem ante consectetur nisi, id ornare risus libero et lorem. In ut molestie ex. Nulla eu faucibus mauris. Nullam aliquam libero consequat elit interdum sagittis. Proin orci urna, viverra nec luctus a, aliquam nec tortor. Ut congue finibus lacus at dictum. Praesent et sapien feugiat erat finibus sollicitudin non ut ex. Nam diam ex, lobortis ut magna sed, pretium pellentesque nisi. Morbi blandit, orci at molestie congue, lorem tortor luctus neque, et convallis lacus metus eu est. Integer iaculis at massa nec venenatis. Nullam ac augue non magna semper eleifend. Suspendisse mattis vehicula tortor, ac ornare metus luctus sit amet. Phasellus purus velit, aliquet ac odio non, scelerisque ornare velit.

            Cras vel viverra orci, vitae semper neque. Duis nunc ante, gravida eu enim ut, mollis scelerisque magna. Etiam id rutrum felis, ut maximus purus. Duis tempus odio quis nisi sollicitudin sollicitudin vel et enim. Maecenas consectetur, mi ac tincidunt auctor, leo tellus lacinia nibh, eget fringilla sem dui ut mauris. Proin odio magna, luctus eu tincidunt vitae, tincidunt eu felis. Morbi cursus nisi ut venenatis ullamcorper. Sed pharetra ex quis metus faucibus finibus. Nunc fringilla justo quam, vitae faucibus augue pellentesque a. Nam ornare sagittis justo sit amet vestibulum. Nam at mi porttitor magna sollicitudin bibendum. Aliquam cursus vel dui porta sagittis. Curabitur dapibus tristique ex ut sollicitudin. Nunc venenatis orci non risus viverra, ultricies euismod nibh euismod. Pellentesque fermentum eros et ultricies elementum. Suspendisse blandit, nisi dictum pellentesque condimentum, lorem nulla sagittis tortor, vitae porttitor urna nibh vitae nulla.

            Vivamus id nulla pellentesque, tempor diam at, pretium purus. Integer blandit gravida convallis. Quisque nec magna quis orci maximus laoreet sit amet eget elit. Quisque elementum volutpat lacinia. Donec et mollis sapien, a pellentesque enim. Sed venenatis lectus eget pharetra imperdiet. Donec vulputate sodales mauris, et tempus augue tempor nec. Sed quis lacus pulvinar, eleifend erat in, sollicitudin libero. Pellentesque pellentesque arcu ut sem interdum malesuada. Praesent tincidunt, lectus ac condimentum auctor, quam velit tincidunt nisi, hendrerit mattis nisi urna in nibh. Vivamus suscipit mi id egestas molestie. Aenean leo ante, bibendum eget augue sollicitudin, ultrices molestie dolor. Pellentesque eu quam in magna porta vestibulum in at arcu. Nulla laoreet urna vel lectus sodales consequat. Curabitur aliquet felis euismod nisi rutrum venenatis.

            Cras vel viverra orci, vitae semper neque. Duis nunc ante, gravida eu enim ut, mollis scelerisque magna. Etiam id rutrum felis, ut maximus purus. Duis tempus odio quis nisi sollicitudin sollicitudin vel et enim. Maecenas consectetur, mi ac tincidunt auctor, leo tellus lacinia nibh, eget fringilla sem dui ut mauris. Proin odio magna, luctus eu tincidunt vitae, tincidunt eu felis. Morbi cursus nisi ut venenatis ullamcorper. Sed pharetra ex quis metus faucibus finibus. Nunc fringilla justo quam, vitae faucibus augue pellentesque a. Nam ornare sagittis justo sit amet vestibulum. Nam at mi porttitor magna sollicitudin bibendum. Aliquam cursus vel dui porta sagittis. Curabitur dapibus tristique ex ut sollicitudin. Nunc venenatis orci non risus viverra, ultricies euismod nibh euismod. Pellentesque fermentum eros et ultricies elementum. Suspendisse blandit, nisi dictum pellentesque condimentum, lorem nulla sagittis tortor, vitae porttitor urna nibh vitae nulla.

            Vivamus id nulla pellentesque, tempor diam at, pretium purus. Integer blandit gravida convallis. Quisque nec magna quis orci maximus laoreet sit amet eget elit. Quisque elementum volutpat lacinia. Donec et mollis sapien, a pellentesque enim. Sed venenatis lectus eget pharetra imperdiet. Donec vulputate sodales mauris, et tempus augue tempor nec. Sed quis lacus pulvinar, eleifend erat in, sollicitudin libero. Pellentesque pellentesque arcu ut sem interdum malesuada. Praesent tincidunt, lectus ac condimentum auctor, quam velit tincidunt nisi, hendrerit mattis nisi urna in nibh. Vivamus suscipit mi id egestas molestie. Aenean leo ante, bibendum eget augue sollicitudin, ultrices molestie dolor. Pellentesque eu quam in magna porta vestibulum in at arcu. Nulla laoreet urna vel lectus sodales consequat. Curabitur aliquet felis euismod nisi rutrum venenatis.
        -->
        </div>
    </div>
</div>
<style type="text/css">
    html,
    body,
    .tela {
        margin: 0%;
        padding: 0%;
        height: 100vh;
    }

    a {
        color: ghostwhite;
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

    /* personalizar a barra em geral, aqui estou definindo 10px de largura para a barra vertical
e 10px de altura para a barra horizontal */
    #menuLateral ::-webkit-scrollbar {
        width: 3%;
    }

    /* aqui é para personalizar o fundo da barra*/
    #menuLateral ::-webkit-scrollbar-track {
        background: rgba(250, 250, 250, 0.3);
        border-radius: 20px;
    }

    /* aqui é a alça da barra, que demonstra a altura que você está na página
estou colocando uma cor azul clara nela*/
    #menuLateral ::-webkit-scrollbar-thumb {
        border-radius: 20px;
        background: royalblue;
    }
</style>
@include('layouts._includes.footer')