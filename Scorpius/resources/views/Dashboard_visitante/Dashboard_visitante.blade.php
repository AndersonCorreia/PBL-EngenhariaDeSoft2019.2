@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Bem-vindo(a), Visitante!')

@section('conteudo')
        
    <style>
        .notificacoes_agendamentos{
            padding: 10px ;
        }
        .notificacoes{
            
        }
        .scroll{
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
        }
       .card-body{
            height: 300px;
        }
        .card{
            height: 300px;
        }
        .calendario{
           
        }
        .coluna_calendario{        
            float: middle;
        }
        .container-fluid{
            border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;
            border-top-right-radius: 20px;border-top-left-radius: 20px;
        }
    </style>
 
    <body>
    {{csrf_field()}}
    {{ method_field('POST') }}
    <div class="container-fluid bg-white p-4" method="POST" action="{{route('confirma.post')}}" style="border-bottom-right-radius: 20px; 
    border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
        <div class="col-12 m-0 p-0">
            <div class="container-fluid bg-white shadow p-3" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
            <div class = "row notificacoes_agendamentos">
                    <div class = "col-md-5 notificacoes">   <!-- DIV DAS NOTIFICAÇOES  -->
                        <div class = "card">
                            <div class = "card-header text-white bg-primary">
                                <h4 class="card-title">Suas Notificações</h4>
                            </div>
                            <div class = "card-body scroll">                     
                                @foreach($notificacoes as $notificacao)
                                    <h6 style="padding: 0px 0px 20px 0px"> {{$notificacao['Mensagem']}} </h6>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-7 agendamentos">   <!-- DIV DOS AGENDAMENTOS  -->
                        <div class = "card">
                            <div class = "card-header text-white bg-primary">
                                <h4 class="card-title">Seus Agendamentos</h4>
                            </div>
                            <div class = "card-body scroll">                        
                                @include('Dashboard_visitante._includes.agendamentos')
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
            <div class="col-12 mt-4 p-0">
            <div class="container-fluid shadow p-4" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
            <div class = "row calendario">
                <div class = "col-md-10 coluna_calendario"></div>
                    <div id = "calendar">
                        @include('telasUsuarios.Agendamentos._includes.calendar')
                    </div>
            </div>
            </div>
            </div>
    </body>
@endsection
