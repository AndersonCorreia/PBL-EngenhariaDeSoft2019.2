@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')

<div class="form-row col-msm">
    <div class="form-group col-sm-7 d-block" id="listaEspera">
        <h5 class="col-sm-12">Lista de Espera</h5>
        <ul class="list-group list-group-flush">
            <!-- (Ainda nao implementado)
            Essa parte receberá do controller uma array $lista_espera com as informações
            do agendamento: nome da instituicao, data do agendamento
            -->
            <li class="list-group-item">Colegio Helyos - 23/03/2020 - Matutino</li>
            @if(($lista_espera ?? false))
            @foreach($lista_espera as $agendamento)
                <li class="list-group-item">{{$agendamento['nome']}} - {{$agendamento['data']}}</li>
            @endforeach
            @else
                <li class="list-group-item">Não possui nenhum agendamento na lista de espera.</li>
            @endif
        </ul>
    </div>
    <div class="form-group col-sm-12 d-block">
        <h4 class="col-sm-12">Cronograma de Visitas Programadas</h4>
        <button id="setaLeft" type="button" class=" btn btn-default" onclick="anterioresDias('diurno')" disabled>
            <i class="fas fa-angle-left"></i>
        </button>
        <span id="calendarDatas" class="text-dark font-weight-bold" style="text-align:center;">10 de Março a 20 de Março</span>
        <button id="setaRight" type="button" class=" btn btn-default" onclick="proximosDias('diurno')">
            <i class="fas fa-angle-right"></i>
        </button>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">02/03 SEG</th>
                        <th scope="col">03/03 TER</th>
                        <th scope="col">05/03 QUI</th>
                        <th scope="col">06/03 SEX</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Manhã</th>
                        <td>
                            {{-- se for de manhã. COLOCAR IF --}}
                            <p>Colégio Helyos
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal"
                                    data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                            </p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                        btncanc>Cancelar
                                </button>
                                <div class="modal fade modal-cancelamento" tabindex="-1" role="dialog" 
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-secondary text-white">
                                                <h5 class="modal-title">Motivo do cancelamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- colocar resto das coisas aqui -->
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Outro:
                                                    <input type="text"></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            {{-- se for de manhã. COLOCAR IF --}}
                            <p>Escola Dois de Julho
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal"
                                    data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                            </p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                        btncanc>Cancelar
                                </button>
                                <div class="modal fade modal-cancelamento" tabindex="-1" role="dialog" 
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-secondary text-white">
                                                <h5 class="modal-title">Motivo do cancelamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- colocar resto das coisas aqui -->
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Outro:
                                                    <input type="text"></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <th scope="row">Tarde</th>
                    <td></td>
                    <td>
                        {{-- se for de tarde. COLOCAR IF --}}
                        <p>Colégio Santo Antônio
                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal"
                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                <i class="fas fa-list-ol"></i>
                            </button>
                        </p>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                btncanc>Cancelar
                            </button>
                            <div class="modal fade modal-cancelamento" tabindex="-1" role="dialog" 
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-white">
                                            <h5 class="modal-title">Motivo do cancelamento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- colocar resto das coisas aqui -->
                                            <div class="custom-control custom-radio col-md-12">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-12">
                                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Outro:
                                                <input type="text"></label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Noite</th>
                        <td></td>
                        <td></td>
                        <td>
                            {{-- se for de noite. COLOCAR IF --}}
                            <p>Colégio Anchieta
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal"
                                    data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                            </p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                    btncanc>Cancelar
                                </button>
                                <div class="modal fade modal-cancelamento" tabindex="-1" role="dialog" 
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-secondary text-white">
                                                <h5 class="modal-title">Motivo do cancelamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- colocar resto das coisas aqui -->
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Outro:
                                                    <input type="text"></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
                </table>
        </div>
        
        <div class="col p-0 pt-2 text-dark font-weight-bold" calendario>
                <button id="setaLeft" type="button" class=" btn btn-default" onclick="anterioresDias('diurno')" disabled="">
                    <i class="fas fa-angle-left" aria-hidden="true"></i>
                </button>
                <span id="calendarDatas">10 de Março a 20 de Março</span>
                <button id="setaRight" type="button" class=" btn btn-default" onclick="proximosDias('diurno')">
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                </button>
            </div>
        <table class="table table-hover col-sm-12 col-form-label">
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
                        <p>Colégio Helyos</p>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                            <button type="submit" class="btn btn-danger"btncanc>Cancelar</button>
                        </div>
                        <div id="lista-espera">
                            <button type="submit" class="btn btn-secondary"data-toggle="modal"
                            data-target=".modal-lista-espera" lista>Lista de Espera
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
                                        <div class="modal-body">
                                            <!-- colocar resto das coisas aqui -->
                                            <div class="custom-control custom-radio col-md-12">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Colegio Helyos  - 23/03/2020</label>
                                            </div>
                                            @if(($lista_espera_dia_turno ?? false))
                                            @foreach($lista_espera_dia_turno as $agendamento_dia_turno)
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">{{$agendamento_dia_turno['nome']}} - {{$agendamento_dia_turno['data']}}</label>
                                            </div>
                                            @endforeach
                                            @else
                                                <p>Não possui nenhum agendamento na lista de espera para este dia e turno.</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td id="tercaManha"></td>
                    <td id="quartaManha"></td>
                    <td id="quintaManha"></td>
                    <td id="sextaManha">
                    <p>Escola Dois de Julho</p>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                            <button type="submit" class="btn btn-danger"btncanc>Cancelar</button>
                        </div>
                        <div id="lista-espera">
                            <button type="submit" class="btn btn-secondary"data-toggle="modal"
                            data-target=".modal-lista-espera" lista>Lista de Espera
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
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Tarde</th>
                    <td id="segundaTarde"></td>
                    <td id="tercaTarde">
                    <p>Colégio Santo Antônio</p>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                            <button type="submit" class="btn btn-danger"btncanc>Cancelar</button>
                        </div>
                        <div id="lista-espera">
                            <button type="submit" class="btn btn-secondary"data-toggle="modal"
                            data-target=".modal-lista-espera" lista>Lista de Espera
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
                    
                    <td id="quartaTarde"></td>
                    <td id="quintaTarde"></td>
                    <td id="sextaTarde"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Noite</th>
                    <td id="segundaNoite"></td>
                    <td id="tercaNoite"></td>
                    <td id="quartaNoite"></td>
                    <td id="quintaNoite">
                    <p>Colégio Anchieta</p>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary" btnconf>Confirmar</button>
                            <button type="submit" class="btn btn-danger"btncanc>Cancelar</button>
                        </div>
                        <div id="lista-espera">
                            <button type="submit" class="btn btn-secondary"data-toggle="modal"
                            data-target=".modal-lista-espera" lista>Lista de Espera
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

    [btnconf]{
        padding: 7px;
        margin: 5px;
        margin-top: -8px;
        background: #00a82d;
        width: 90px;
        height: 40px;
    }
    [btncanc]{
        padding: 7px; 
        margin: 5px;
        margin-top: -8px;
        width: 90px;
        height: 40px;
    }

    [lista]{
        width: 40px;
        height: 30px;
        padding: 0px;
    }

    [calendario]{
        margin-top: 5px;
        margin-left: 380px; 
        margin-right: 15px;
    
    }

    table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: -8px;
    }

    /*Organização das linhas da tabela*/
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