@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Início')

@section('conteudo')
        
    <style>
        .notificacoes_agendamentos{
            padding: 60px;
        }
        .notificacoes{
            border: 1px solid gray;
            border-radius: 5px 5px 5px 5px;
            padding: 10px;
            float: left;
        }
        .scroll{
            max-height: 100px;
            overflow-y: auto;
            padding: 10px;
        }
        .agendamentos{
            border: 1px solid gray;
            border-radius: 5px 5px 5px 5px;
            padding: 10px;
            float: right;
        }
        .calendario{
            padding: 60px;
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
        <div class="container-fluid m-0 bg-gray p-4">
            <div class = "row notificacoes_agendamentos">
                <div class = "col-md-8 notificacoes">
                    <div class = "card">
                        <h4>Notificações</h4>
                        <div class = "card scroll">
                            <h5>example4</h5>
                            <h5>example3</h5>
                            <h5>example2</h5>
                            <h5>example1</h5>
                        </div>
                    </div>
                </div>
                <div class = "cold-md-2"></div>
                <div class = "col-md-5 agendamentos">
                    <div class = "card">
                        <h4>Agendamentos</h4>
                        <div class = "card scroll">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Colégio y, 18 DEZ, 2020 (noite) - Aguardando confirmação<br>Exposição x, 30 alunos</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Colégio y, 18 DEZ, 2020 (noite) - Aguardando confirmação<br>Exposição x, 30 alunos</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Colégio y, 18 DEZ, 2020 (noite) - Aguardando confirmação<br>Exposição x, 30 alunos</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class = "row calendario">
                <div class = "col-md-10 coluna_calendario"></div>
                    <div id = "calendar">
                    @include('Dashboard_visitante._includes.calendar')
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