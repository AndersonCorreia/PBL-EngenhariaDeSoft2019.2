@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Bem-vindo(a), Visitante!')

@section('conteudo')
        
    <style>
        .notificacoes_agendamentos{
            padding: 10px ;
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
        .coluna_calendario{        
            float: middle;
        }
        .container-fluid{
            border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;
            border-top-right-radius: 20px;border-top-left-radius: 20px;
        }
    </style>
<div class="col overflow-auto scorpius-border-shadow-sm  mb-3 p-md-3 p-1" >
    <div class = "row col notificacoes_agendamentos">
        <div class = "col-md-5 col notificacoes">   <!-- DIV DAS NOTIFICAÇOES  -->
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
        <div class = "col-md-7 col agendamentos">   <!-- DIV DOS AGENDAMENTOS  -->
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
<div class="scorpius-border-shadow-sm p-4">
    <div class = "row">
            @include('telasUsuarios.Agendamentos._includes.calendar')  
    </div>
</div>
@endsection
