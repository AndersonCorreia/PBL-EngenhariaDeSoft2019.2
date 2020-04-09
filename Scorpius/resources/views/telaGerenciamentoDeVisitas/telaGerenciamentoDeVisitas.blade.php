@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')

<div class="form-row col-msm row col-12 m-1 p-2 scorpius-border-shadow border-top border-shadow">
    <div class="form-group d-block " id="listaEspera">
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
    <div class="form-group col-sm-12 d-block p-0 ">
        <div style="text-align:center;">
            <button id="setaLeft" type="button" class=" btn btn-default" onclick="anterioresDias('diurno')" disabled>
                <i class="fas fa-angle-left"></i>
            </button>
            <span id="calendarDatas" class="text-dark font-weight-bold">
                {{date("d/m/Y", strtotime(now())) }} a {{$visitas_institucionais["datas"]["dataFim"]}}
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
                        @forelse($visitas_institucionais['datas'] as $data)
                            @if($loop->first)
                                <th scope="col">{{date("d/m/Y", strtotime(now())) }}</th>
                            @elseif($loop->last)
                                <th scope="col">{{$visitas_institucionais["datas"]["dataFim"]}}</th>
                            @else
                                <th scope="col">{{$data}}</th> 
                            @endif
                        @empty
                        <th scope="col"></th>
                        @endforelse
                    </tr>
                </thead>
                <tbody>
                <!-- array visitas_institucionais vai estar limitado por data  -->                
                    <tr>   
                        <th class="table-secondary" scope="row">Manhã</th>
                        @foreach($visitas_institucionais['visitas'] as $visita)
                            @if($visita['turno'] == 'manhã')
                                <td>@include('telaGerenciamentoDeVisitas._includes.diasTabela')</td>  
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr> 
                        <th class="table-secondary" scope="row">Tarde</th>
                        @foreach($visitas_institucionais['visitas'] as $visita)
                            @if($visita['turno'] == 'tarde')
                                <td>@include('telaGerenciamentoDeVisitas._includes.diasTabela')</td>  
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <th class="table-secondary" scope="row">Noite</th>
                        @foreach($visitas_institucionais['visitas'] as $visita)
                            @if($visita['turno'] == 'noite')
                                <td>@include('telaGerenciamentoDeVisitas._includes.diasTabela')</td>  
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- CÓDIGO DA LISTA DE ESPERA PARA UM DIA E TURNO ESPECIFICO-->
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
                            
                            <div class="row mx-2 pt-1 scorpius-border-shadow border-top border-shadow" larguraDiv>
                                <div class="row col-12 col-md-11 my-1">
                                    <div class="row col-12">
                                        <div class="custom-control custom-radio col-md-12">
                                            @forelse($lista_espera as $agendamento)
                                                <form >
                                                    @include('telaGerenciamentoDeVisitas._includes.listaEsperaDiaTurno')
                                                </form>
                                            @empty
                                                <div class="col-md-12">
                                                    <div class="col-12 p-0 my-1 font-weight-bold">
                                                        <p>Não existe nenhuma instituição na lista de espera para esse dia e turno.</p>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
                            <button type="submit" class="btn btn-primary" btnlistaEDT>Confirmar</button>
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
                            <div class="row col-12 mb-3 m-0 vh-40 px-2 p-0 ">
                                <div class="overflow-auto h-75 col-12 m-0 px-2">
                                    @forelse($lista_espera as $agendamento)
                                        @include('telaGerenciamentoDeVisitas._includes.listaEspera')
                                    @empty
                                        <div class="col-md-12">
                                            <div class="col-12 p-0 my-1 font-weight-bold">
                                                <p>Não existe nenhuma instituição na lista de espera.</p> 
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
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
                            <button type="submit" class="btn btn-primary" data-dismiss="modal" btnConfirmaCancelamento>Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
    <div class= "row col-12 m-1 p-3 scorpius-border-shadow border-top border-shadow">
        <div class="row col-12 m-0 pl-2 p-0"><h4>Lista de Agendamentos Cancelados</h4></div>
        <div class= "row col-12 m-1 p-2 scorpius-border-shadow border-top border-shadow bg-dark text-white" >
            <div class="row col-12 m-0 pl-2 p-0"><p> <b> Cancelado Pelo Funcionário: </b> </p></div>
            @forelse ($agendamentos_cancelados_funcionario as $agendamento)
            <div class= "row m-1 p-2 scorpius-border-shadow border-top border-shadow text-dark" agendCancelado>
                <div class="row col-12 m-0 pl-2 p-0">
                    <p> <b> {{$agendamento['instituicao']}} </b> </p>
                </div>
                <div class="row col-12 m-0 pl-2 p-0">
                    <p style="margin-top: -8px;"> <b> Data da Visita: {{$agendamento['data']}}  </b></p>
                </div>
                <div class="row col-12 m-0 pl-2 p-0">
                    <p style="margin-top: -8px;"> <b> Ano Escolar: {{$agendamento['ano_escolar']}} </b></p> <p style="margin-top: -8px; margin-left: 80px;"> <b> Turma: {{$agendamento['turma']}}</b></p>
                </div>
                <div class="row col-12 m-0 pl-2 p-0">
                    <p> <b> Motivo do Cancelamento: </b></p>
                </div>
            </div>
            @empty
                <p> <b> Não há nenhum agendamento cancelado! </b></p>
            @endforelse
        </div>
        <div class= "row col-12 m-1 p-2 scorpius-border-shadow border-top border-shadow bg-dark text-white">
            <div class="row col-12 m-0 pl-2 p-0"><p> <b> Cancelado Pelo Usuário: </b> </p></div>
            @forelse ($agendamentos_cancelados_usuario as $agendamento)
            <div class= "row m-1 p-2 scorpius-border-shadow border-top border-shadow text-dark" agendCancelado>
                <div class="row col-12 m-0 pl-2 p-0">
                    <p> <b> {{$agendamento['instituicao']}} </b></p>
                </div>
                <div class="row col-12 m-0 pl-2 p-0">
                    <p style="margin-top: -8px;"> <b> Data da Visita: {{$agendamento['data']}} </b></p> 
                </div>
                 <div class="row col-12 m-0 pl-2 p-0">
                    <p style="margin-top: -8px;"> <b> Ano Escolar: {{$agendamento['ano_escolar']}} </b></p> <p style="margin-top: -8px; margin-left: 80px;"> <b> Turma: {{$agendamento['turma']}}</b></p>
                </div>
            </div>
            @empty
                <p> <b> Não há nenhum agendamento cancelado! </b> </p>
            @endforelse

        </div>
    </div>
    
        <style>
            #listaEspera{
                padding: 0px;
                margin: 0px;
                width:100%;
                align:right;
                height: 100%;
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
            [agendCancelado]{
                width: 500px;
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