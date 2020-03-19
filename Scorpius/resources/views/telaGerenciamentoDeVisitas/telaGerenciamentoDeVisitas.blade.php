@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')

<div class="form-row col-msm">
    <div class="form-group d-block" id="listaEspera">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            <div class="row">
                <div class="col-md-6">
                    <h4 >Cronograma de Visitas Agendadas</h4>
                </div>

                <div class="col-md-6 float-right p-0 m-0">    
                    <button type="submit" class="btn btn-secondary float-right" id="lista-espera" data-toggle="modal" 
                        data-toggle="tooltip" title="Lista de Espera Completa" data-target=".modal-lista-espera-total" lista-total>
                        <i class="fas fa-list-ol"></i> Consultar Lista de Espera
                    </button>
                </div>
            </div>
            </li>
        </ul>
    </div>
    <div class="form-group col-sm-12 d-block p-0">
        <div style="text-align:center;">
            <button id="setaLeft" type="button" class=" btn btn-default" onclick="anterioresDias('diurno')" disabled>
                <i class="fas fa-angle-left"></i>
            </button>
            @for($i=0; $i<4; $i++) {{-- mudar para percorrer os dias do calendario --}}
                @forelse ($agendamentos_pendentes as $agendamento || $agendamentos_confirmados as $agendamento ||
                    $agendamentos_cancelados_usuario as $agendamento || $agendamentos_cancelados_funcionario as $agendamento)
                    @if ($i == 0)
                        $data_inicio = $agendamento['data'];
                    @endif
                    @if ($i == 4)
                        $data_fim = $agendamento['data'];
                    @endif
                @endforelse
            @endfor
            <span id="calendarDatas" class="text-dark font-weight-bold">
                $data_inicio a $data_fim
            </span>
            <button id="setaRight" type="button" class=" btn btn-default" onclick="proximosDias('diurno')">
                <i class="fas fa-angle-right"></i>
            </button>
        </div>
        <div class="table-responsive p-4">
            <table class="table">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">Dia</th>
                        @for($i=0; $i<4; $i++) {{-- mudar para percorrer os dias do calendario --}}
                            @forelse ($agendamentos_pendentes as $agendamento || $agendamentos_confirmados as $agendamento ||
                            $agendamentos_cancelados_usuario as $agendamento || $agendamentos_cancelados_funcionario as $agendamento)
                                <th scope="col">$agendamento['data']</th>
                            @endforelse
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-secondary" scope="row">Manhã</th>
                        @for($data=0; $data<4; $data++) {{-- mudar para percorrer os dias do calendario --}}
                            <td>
                                {{-- trocar pelos dias do calendario --}}
                                {{-- Linha da Manhã --}}
                                @forelse ($agendamentos_pendentes as $agendamento)
                                    @if(($agendamento['turno'] == "manhã" and $agendamento['data'] = strtotime($data) )) 
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Pendente</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_confirmados as $agendamento)

                                    @if(($agendamento['turno'] == "manhã" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Confirmado</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_cancelados_usuario as $agendamento)
                                    @if(($agendamento['turno'] == "manhã" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Cancelado pelo Usuário</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_cancelados_funcionario as $agendamento)
                                    @if(($agendamento['turno'] == "manhã" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Cancelado pelo Funcionário</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                            </td>
                        @endfor
                    </tr>
                    <tr> {{-- Linha da Tarde --}}
                        <th class="table-secondary" scope="row">Tarde</th>
                        @for($data=0; $data<4; $data++) {{-- mudar para percorrer os dias do calendario --}}
                            <td>
                                @forelse ($agendamentos_pendentes as $agendamento)
                                    @if(($agendamento['turno'] == "tarde" and $agendamento['data'] = strtotime($data) )) 
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Pendente</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_confirmados as $agendamento)
                                    @if(($agendamento['turno'] == "tarde" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Confirmado</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_cancelados_usuario as $agendamento)
                                    @if(($agendamento['turno'] == "tarde" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Cancelado pelo Usuário</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_cancelados_funcionario as $agendamento)
                                    @if(($agendamento['turno'] == "tarde" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Cancelado pelo Funcionário</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                                
                            </td>
                        @endfor
                    </tr>
                    <tr>
                        <th class="table-secondary" scope="row">Noite</th>
                        @for($data=0; $data<4; $data++) {{-- mudar para percorrer os dias do calendario --}}
                            <td>
                                @forelse ($agendamentos_pendentes as $agendamento)
                                    @if(($agendamento['turno'] == "noite" and $agendamento['data'] = strtotime($data) )) 
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Pendente</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_confirmados as $agendamento)
                                    @if(($agendamento['turno'] == "noite" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Confirmado</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_cancelados_usuario as $agendamento)
                                    @if(($agendamento['turno'] == "noite" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Cancelado pelo Usuário</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse

                                @forelse ($agendamentos_cancelados_funcionario as $agendamento)
                                    @if(($agendamento['turno'] == "noite" &&  $agendamento['data'] = strtotime($data) ))
                                        <p>{{$agendamento['instituicao']}}</p>
                                        <p style="margin-top: -8px;"> Status: Cancelado pelo Funcionário</p>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" 
                                                data-toggle="tooltip" title="Lista de Espera" data-target=".modal-lista-espera" lista>
                                                <i class="fas fa-list-ol"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar"
                                                btnconf>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                                                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                @empty
                                @endforelse 

                            </td>
                        @endfor
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
                                                @if(($lista_espera ?? false))   
                                                    @foreach($lista_espera as $agendamento)
                                                        <div class="row mx-2 pt-1 scorpius-border-shadow border-top border-shadow" larguraDiv>
                                                            <div class="row col-md-12 my-1">
                                                                <div class="row col-12">
                                                                    <div class="col-md-5">
                                                                        <div class="col-12 p-0 my-1 font-weight-bold">Instituição:</div>
                                                                        <div class="col-12 p-0">
                                                                            {{$agendamento['instituicao']}}
                                                                        </div> 
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="col-12 p-0 my-1 font-weight-bold">Tipo:</div>
                                                                        <div class="col-12 p-0">
                                                                            {{$agendamento['tipo_instituicao']}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="col-12 p-0 my-1 font-weight-bold">Turno:</div>
                                                                        <div class="col-12 p-0">{{$agendamento['turno']}}</div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="col-12 p-0 my-1 font-weight-bold">Data:</div>
                                                                        <div class="col-12 p-0">
                                                                            {{date("d/m/Y", strtotime($agendamento['data'])) }}
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-md-12">
                                                        <div class="col-12 p-0 my-1 font-weight-bold">
                                                            <p>Não existe nenhuma instituição na lista de espera.</p> 
                                                            <!-- caso não haja nada na lista de espera -->
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </label>
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
                            <div class="custom-control col-md-12">
                            @if(($lista_espera_dia_turno ?? false))
                                @foreach($lista_espera_dia_turno as $agendamento_dia_turno)
                                    <div class="custom-control custom-radio">
                                        <label class="custom-control-label" for="customRadio1">
                                            {{$agendamento_dia_turno['nome']}} - {{$agendamento_dia_turno['data']}}
                                        </label>
                                    </div>
                                @endforeach
                                @else
                                    <div class="col-md-12">
                                        <div class="col-12 p-0 my-1 font-weight-bold">
                                            <p>Não existe nenhuma instituição na lista de espera.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- CÓDIGO DO MOTIVO DO CANCELAMENTO -->
        <div id="cancelamento">

            <!-- modal do motivo do cancelamento -->
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
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Condições Climáticas</label>
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

        
        <style>
            #listaEspera{
                padding: 0px;
                margin: 0px;
                width:100%;
                align:right
            }
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
            /* btn do modal  */
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
                width: 100%;
                height: 100%;
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