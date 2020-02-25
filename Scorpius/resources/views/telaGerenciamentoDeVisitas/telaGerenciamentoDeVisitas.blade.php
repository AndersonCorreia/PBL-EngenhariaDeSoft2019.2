olo@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')

<div class="form-row col-msm">
    <div class="form-group col-sm-7 d-block" id="listaEspera">
        <h5>Lista de Espera</h5>
        <ul class="list-group list-group-flush">
            <!-- (Ainda nao implementado)
            Essa parte receberá do controller uma array $lista_espera com as informações
            do agendamento: nome da instituicao, data do agendamento
            -->
            @if(($lista_espera ?? false))
            @foreach($lista_espera as $agendamento)
                <li class="list-group-item">{{$agendamento['nome']}} - {{$agendamento['data']}}</li>
            @endforeach
            @else
                <li class="list-group-item">Não possui nenhum agendamento na lista de espera.</li>
            @endif
        </ul>
    </div>
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
                    <td id="segundaManha">
                        <p>Agendamento A</p>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn-success">Confirmar</button>
                            <button type="button" class="btn-danger">Cancelar</button>
                        </div>
                        <div id="lista-espera">
                            <button type="button" class="btn-secondary m-2"data-toggle="modal"
                            data-target=".modal-lista-espera">Lista de espera
                            </button>
                            <!-- modal da lista espera -->
                            <div class="modal fade modal-lista-espera" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-white">
                                            <h5 class="modal-title" id="modal-cadastrar-turmaTitle">Lista de Espera</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- colocar resto das coisas aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
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