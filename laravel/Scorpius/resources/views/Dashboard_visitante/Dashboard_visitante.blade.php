@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Início')

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
            border-bottom-right-radius: 20px; 
        border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px;
        }
    </style>
 
    <body>
    <div class="container-fluid bg-white p-4" style="border-bottom-right-radius: 20px; 
    border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
        <div class="col-12 m-0 p-0">
            <div class="container-fluid bg-white shadow p-3" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
            <div class = "row notificacoes_agendamentos">
                <div class = "col-md-5 notificacoes">
                    <div class = "card">
                    <div class = "card-header">
                        <h4 class="card-title" >Suas Notificações</h4>
                    </div>
                        <div class = "card-body scroll">
                            <h5>A visita do xx foi cancelada por motivo yy </h5>
                            
                        </div>
                    </div>
                </div>
                <div class = "col-md-7 agendamentos">
                    <div class = "card">
                    <div class = "card-header">
                        <h4 class="card-title" >Seus Agendamentos</h4>
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
                    @include('Dashboard_visitante._includes.calendar')
                    </div>
            </div>
            </div>
            </div>
    </body>
@endsection
<!--
            <div class = "container-fluid">
            <div class = "row">
                <div class = "col-md-6">
                    <h4><b>--notificações--</b></h4>
                    <div class = "card scrollbar-ripe">
                        <div class = "card-body">
                            <h5>algum exemplo</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6"> 
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> <b>Seus Agendamentos</b> </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
-->