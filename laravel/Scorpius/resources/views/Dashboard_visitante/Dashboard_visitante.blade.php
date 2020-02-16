
@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')
   
<style>
    .information_block{ 
        border: 1px solid #F3F2F2;
        border-radius: 5px 5px 5px 5px;
        padding: 10px;
        box-shadow: 5px 5px #E8E8E8;
    }
    .scroll{
        max-height: 100px;
        overflow-y: auto;
        padding: 10px;
    }
    .calendario{
        padding: 60px;
    }
    .coluna_calendario{
        border: 1px solid gray;
        border-radius: 5px 5px 5px 5px;
        padding: 10px;
        float: middle;
    }
    .notbold{
        font-weight: normal;
    }
</style>

<body>
    <div class = "container-fluid m-0 bg-gray p-4" style = "border-bottom-right-radius: 20px; 
    border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
        <div class = "row" style = "padding: 60px">
            <div class = "col-md-5 information_block" style = "float: left"><!-- bloco de notificações-->
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

            <div class = "col-md-5 information_block" style = "float: right"><!--bloco de agendamentos-->
                <div class = "card">
                    <h4>Agendamentos</h4>
                    <div class = "card scroll">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><span class = "notbold">Colégio y, 18 DEZ, 2020 (noite) - Aguardando confirmação<br>Exposição x, 30 alunos</span></label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><span class = "notbold">Colégio y, 18 DEZ, 2020 (noite) - Aguardando confirmação<br>Exposição x, 30 alunos</span></label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><span class = "notbold">Colégio y, 18 DEZ, 2020 (noite) - Aguardando confirmação<br>Exposição x, 30 alunos</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        &nbsp;
        <div class = "row calendario">
            <div class = "col-md-10 coluna_calendario"></div>
                <div id = "calendar"></div>

        </div>
    </div>
</body>

@endsection