@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')

<div class="form-row col-msm">
    <div class="form-group col-sm-7 d-block" id="listaEspera">
        <ul class="list-group list-group-flush">
            <!-- (Ainda nao implementado)
            Essa parte receberá do controller uma array $lista_espera com as informações
            do agendamento: nome da instituicao, data do agendamento
            -->
            <li class="list-group-item">
                <div class="row col-12 col-md-11 my-1">
                    <div class="row col-12">
                        <h4 class="col-sm-12">Cronograma de Visitas Agendadas</h4>
                        <button type="submit" class="btn mx-3 btn-secondary" id="lista-espera" data-toggle="modal" 
                            data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera-total" lista-total>
                            <i class="fas fa-list-ol"></i>   Lista de Espera Completa
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="form-group col-sm-12 d-block">
        <div class="col-sm-6">
            <button type="submit" class="btn mx-3 btn-secondary" id="lista-espera" data-toggle="modal" 
                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera-total" lista-total>
                <i class="fas fa-list-ol"></i>   Lista de Espera Completa
            </button>
        </div>
        <div style="text-align:center;">
            <button id="setaLeft" type="button" class=" btn btn-default" onclick="anterioresDias('diurno')" disabled>
                <i class="fas fa-angle-left"></i>
            </button>
            <span id="calendarDatas" class="text-dark font-weight-bold">
                10 de Março a 20 de Março
            </span>
            <button id="setaRight" type="button" class=" btn btn-default" onclick="proximosDias('diurno')">
                <i class="fas fa-angle-right"></i>
            </button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">Dia</th>
                        <th scope="col">02/03 SEG</th>
                        <th scope="col">03/03 TER</th>
                        <th scope="col">05/03 QUI</th>
                        <th scope="col">06/03 SEX</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-secondary" scope="row">Manhã</th>
                        <td>
                            {{-- se for de manhã. COLOCAR IF --}}
                            <p>Colégio Helyos</p>
                            <p style="margin-top: -8px;">Status: Pendente</p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                    btnconf>
                                    <i class="fas fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                    data-toggle="tooltip" title="Cancelar" btncanc>
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="modal fade modal-cancelamento" tabindex="-1" role="dialog" 
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-secondary text-white">
                                                <h5 class="modal-title">Motivo do Cancelamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- colocar resto das coisas aqui -->
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio1" name="customRadio" 
                                                    class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições Climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" 
                                                    class="custom-control-input">
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
                            <p>Escola Dois de Julho</p>
                            <p style="margin-top: -8px;">Status: Cancelado pelo Usuário</p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                    data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                    btnconf>
                                    <i class="fas fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                    data-toggle="tooltip" title="Cancelar" btncanc>
                                    <i class="fas fa-times"></i>
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
                                                    <input type="radio" id="customRadio1" name="customRadio" 
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" 
                                                        class="custom-control-input">
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
                        <th class="table-secondary" scope="row">Tarde</th>
                        <td></td>
                        <td>
                            {{-- se for de tarde. COLOCAR IF --}}
                            <p>Colégio Santo Antônio</p>
                            <p style="margin-top: -8px;">Status: Pendente</p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                    data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                    btnconf>
                                    <i class="fas fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                    data-toggle="tooltip" title="Cancelar" btncanc>
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="modal fade modal-cancelamento" tabindex="-1" role="dialog" 
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-secondary text-white">
                                                <h5 class="modal-title">Motivo do Cancelamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- colocar resto das coisas aqui -->
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio1" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" 
                                                        class="custom-control-input">
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
                        <th class="table-secondary" scope="row">Noite</th>
                        <td></td>
                        <td></td>
                        <td>
                            {{-- se for de noite. COLOCAR IF --}}
                            <p>Colégio Anchieta</p>
                            <p style="margin-top: -8px;">Status: Pendente</p>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                    data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                    btnconf>
                                    <i class="fas fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-cancelamento"
                                    data-toggle="tooltip" title="Cancelar" btncanc>
                                    <i class="fas fa-times"></i>
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
                                                    <input type="radio" id="customRadio1" name="customRadio" 
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Condições climáticas</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-12">
                                                    <input type="radio" id="customRadio2" name="customRadio" 
                                                        class="custom-control-input">
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


        <!-- CÓDIGO DA LISTA DE ESPERA -->
        <div id="lista-espera">

            <!-- modal da lista espera -->
            <div class="modal fade modal-lista-espera" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
                aria-hidden="true">
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
                                <label class="custom-control-label" for="customRadio1">
                                    <div class="row mx-2 pt-1 scorpius-border-shadow border-top border-shadow" larguraDiv>
                                        <div class="row col-12 col-md-11 my-1">
                                            <div class="row col-12">
                                                <div class="col-8 col-5 col-md-4">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Instituição:</div>
                                                    <div class="col-12 p-0">Colégio Helyos</div> <!-- substituir por registro -->
                                                </div>
                                                <div class="col-4 col-md-3">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Tipo:</div>
                                                    <div class="col-12 p-0">Particular</div>
                                                </div>
                                                <div class="col-8 col-md-3">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Data:</div>
                                                    <div class="col-12 p-0">23/03/2020</div>
                                                </div>
                                                <div class="col-4 col-md-2">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Turno:</div>
                                                    <div class="col-12 p-0">Manhã</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            @if(($lista_espera ?? false))
                            @foreach($lista_espera as $agendamento)
                            <li class="list-group-item">{{$agendamento['nome']}} - {{$agendamento['data']}}</li>
                            @endforeach
                            @else
                            <li class="list-group-item"></li> <!-- caso não haja nada na lista de espera -->
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


        <!-- CÓDIGO DA LISTA DE ESPERA TOTAL -->
        <div id="lista-espera">

            <!-- modal da lista espera -->
            <div class="modal fade modal-lista-espera-total" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
                aria-hidden="true">
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
                            <div class="custom-control col-md-12">
                                    <div class="font-weight-bold">Data: 23/03/2020</div>
                                    <div class="row mx-2 pt-1 scorpius-border-shadow border-top border-shadow" larguraDiv>
                                        <div class="row col-12 col-md-11 my-1">
                                            <div class="row col-12">
                                                <div class="col-8 col-5 col-md-7">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Instituição:</div>
                                                    <div class="col-12 p-0">Colégio Helyos</div> <!-- substituir por registro -->
                                                </div>
                                                <div class="col-4 col-md-3">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Tipo:</div>
                                                    <div class="col-12 p-0">Particular</div>
                                                </div>
                                                <div class="col-4 col-md-2">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">Turno:</div>
                                                    <div class="col-12 p-0">Manhã</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @if(($lista_espera_dia_turno ?? false))
                            @foreach($lista_espera_dia_turno as $agendamento_dia_turno)
                            <div class="custom-control custom-radio">
                                <label class="custom-control-label" for="customRadio1">
                                    {{$agendamento_dia_turno['nome']}} - {{$agendamento_dia_turno['data']}}
                                </label>
                            </div>
                            @endforeach
                            @else
                            <p></p> <!-- caso não haja nada na lista de espera -->
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

        
        <style>
            h5 {
                display: block;
                margin: 10px 0px 10px 5px;
            }

            [btnconf] {
                padding: 7px;
                margin: 5px;
                margin-top: -8px;
                background: #00a82d;
                width: 50px;
                height: 30px;
            }

            [btncanc] {
                padding: 7px;
                margin: 5px;
                margin-top: -8px;
                width: 50px;
                height: 30px;
            }

            [posicaoButton] {
                margin-top: 100px;
                margin: 50px;
            }

            [lista] {
                padding: 7px;
                margin: 5px;
                margin-top: -8px;
                width: 50px;
                height: 30px;
            }

            [lista-total] {
                padding: 7px;
                margin: 5px;
                width: 220px;
                height: 50px;
            }

            [larguraDiv] {
                width: 700px;
                height: 80px;
            }

            [calendario] {
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

            #Textarea {
                background-color: white;
                height: 700px;
                width: 300px;
            }
        </style>
        @endsection