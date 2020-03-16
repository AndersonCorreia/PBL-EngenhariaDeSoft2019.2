@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Bem-vindo(a), Visitante!')

@section('conteudo')
        
    <style>
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
    </style>
<div class="row col-12 overflow-auto m-0 p-3" >
    <div class = "row col-12 m-0 mb-5 p-4 scorpius-border-shadow ">
        <div class = "col-md-5 col-12 m-0 pr-2 p-0 ">   <!-- DIV DAS NOTIFICAÇOES  -->
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
        <div class = "col-md-7 col-12 pl-2 m-0 p-0 agendamentos">   <!-- DIV DOS AGENDAMENTOS  -->
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
    <div class=" col-12 scorpius-border-shadow border-top border-shadow p-4">
        @include('telasUsuarios.Agendamentos._includes.calendar')  
    </div>
</div>

@endsection
