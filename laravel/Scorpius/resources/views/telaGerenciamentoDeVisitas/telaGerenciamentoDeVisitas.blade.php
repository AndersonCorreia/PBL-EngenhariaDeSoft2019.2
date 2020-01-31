@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas')

@section('conteudo')

<h2>BEM VINDO, FUNCIONÁRIO</h2>
<div class="form-row col-msm">
    <div class="form-group col-sm-7 d-block">
        <h3>CRONOGRAMA DE VISITAS PROGRAMADAS</h3>
        <h4>Agendamento Semanal</h4>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Manhã</th>
                    <th scope="col">Tarde</th>
                    <th scope="col">Noite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="table-secondary">Segunda</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Terça</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Quarta</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Quinta</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Sexta</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group col-sm-5">   
        <h3>LISTA E ESPERA</h3>
        <textarea class="form-control" id="Textarea" rows="15" disabled></textarea>
    </div>
</div>
<style>
    h3{
        margin: 50px 0px 20px 0px;
    }
    h4 {
        display: block;
        text-align: center;
        margin: 50px 0px 20px 0px;
    }

    table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: -8px;
    }

    td {

        border-left-width: 0;
        min-width: 120px;
        height: 100px;
    }

    td:first-child {
        border-left-width: 1px;
    }

    th,
    td {
        text-align: center;
    }

    #Textarea{
        background-color: white;
        height: 700px;
        width: 300px;
    }
</style>
@endsection