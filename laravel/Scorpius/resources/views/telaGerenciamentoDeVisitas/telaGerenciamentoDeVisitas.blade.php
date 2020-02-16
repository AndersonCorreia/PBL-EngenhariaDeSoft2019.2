@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')

<div class="form-row col-msm">
    <div class="form-group col-sm-7 d-block">
        <h5>Cronograma de Visitas Programadas</h5>
        <table class="table table-hover">
            <thead>
            <tr class="table-primary">
                    <th scope="col">Turno/Dia</th>
                    <th scope="col">Segunda</th>
                    <th scope="col">Terça</th>
                    <th scope="col">Quarta</th>
                    <th scope="col">Quinta</th>
                    <th scope="col">Sexta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="table-secondary">Manhã</th>
                    <td id="segundaManha"></td>
                    <td id="tercaManha"></td>
                    <td id="quartaManha"></td>
                    <td id="quintaManha"></td>
                    <td id="sextaManha"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Tarde</th>
                    <td id="segundaTarde"></td>
                    <td id="tercaTarde"></td>
                    <td id="quartaTarde"></td>
                    <td id="quintaTarde"></td>
                    <td id="sextaTarde"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Noite</th>
                    <td id="segundaNoite"></td>
                    <td id="tercaNoite"></td>
                    <td id="quartaNoite"></td>
                    <td id="quintaNoite"></td>
                    <td id="sextaNoite"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    

</script>
<style>
    h5 {
        display: block;
    
        margin: 10px 0px 10px 5px;
    }

    table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: -8px;
    }

    /*Organização das linhas da tabela*/
    td {
        border-left-width: 0;
        min-width: 190px;
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