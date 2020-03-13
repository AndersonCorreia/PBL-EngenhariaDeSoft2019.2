@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Historico de Visitas')

@section('conteudo')

@foreach ($agendamentos as $agend)
    
@endforeach
<div class= "row col-12 m-0 p-2 scorpius-border-shadow border-top border-shadow" borda>
    <div class="row col-12 m-0 pl-2 p-0">
        <div class="col-lg-6 col-12 m-0 p-0">
            <b>Nome da Instituição:</b> {{$agend['instituicao']}}
        </div>
        <div class="col-6 col-lg-4 m-0 p-0">
            <b>Data:</b> {{$agend['data']}}
        </div>
        <div class="col-6 col-lg-2 m-0 p-0">
            <b>Turno:</b> {{$agend['turno']}}
        </div>
        <div class="col-lg-6 d-none d-md-block m-0 p-0">
            <b>Nivel de ensino:</b> {{$agend['ensino']}}
        </div>
        <div class="col-lg-4 col-6 m-0 p-0">
            <b>Turma:</b> {{$agend['turma']}}
        </div>
        <div class="col-lg-2 col-6 m-0 p-0">
            <b>Total de Alunos:</b>{{$agend['totalAlunos']}}
        </div>
        <div class="col-lg-6 d-md-none col-12 m-0 p-0">
            <b>Nivel de ensino:</b> {{$agend['ensino']}}
        </div>
        <div class="col-lg-6 col-12 m-0 p-0">
            <b>Status do Agendamento:</b> {{$agend['agendamentoStatus']}}
        </div>
        <div class="col-lg-4 col-8 m-0 p-0">
            <b>Status da Visita:</b> {{$agend['visitaStatus']}}
        </div>
        <div class="col-lg-2 col-4 m-0 p-0">
            <button type="button" class="btn btn-secondary float-left btn-sm " data-toggle="modal"
                data-target="#modal-dados-completos" expand>Dados Completos
            </button>
        </div>
    </div>
</div>
    <!--modal dos dados completos-->
    <div class="modal fade " id="modal-dados-completos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="modal-cadastrar-turmaTitle">Dados Completos do agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class= "row p-3 col-12 m-auto scorpius-border-shadow border-top border-shadow" bordaModal>
                        <div class="row col-12 m-0 p-0">
                            <div class="col-12 p-0 m-0">
                                <b>Nome da Instituição:</b> {{$agend['instituicao']}}
                            </div>
                            <div class="col-6 m-0 p-0 ">
                                <b>Data:</b> {{$agend['data']}}
                            </div>
                            <div class="col-6 m-0 p-0">
                                <b>Turno:</b> {{$agend['turno']}}
                            </div>
                            <div class="col-6 m-0 p-0 ">
                                <b>Turma:</b> {{$agend['turma']}}
                            </div>
                            <div class="col-6 m-0 p-0 ">
                                <b>Total de Alunos:</b>{{$agend['totalAlunos']}}
                            </div>
                            <div class="col-12 col-lg-6 m-0 p-0">
                                <b>Nivel de ensino:</b> {{$agend['ensino']}}
                            </div>
                            <div class="col-lg-6 col-12 m-0 p-0">
                                <b>Status da Visita:</b> {{$agend['visitaStatus']}}
                            </div>
                            <div class="col-12 m-0 p-0">
                                <b>Status do Agendamento:</b> {{$agend['agendamentoStatus']}}
                            </div>
                        </div>
                        <div class="row col-12 m-0 my-1 p-0">
                            <span class="col-12 m-0 my-1 p-0 font-weight-bold">Exposiçoes Escolhidas</span>
                            <hr class="bg-light col-12 linha rounded p-0 m-0">
                            @foreach ($agend['exposicoes'] as $item) 
                                <div class="col-12 col-lg-6 m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                    {{$item['titulo']}}: {{$item['descricao']}}
                                </div>
                            @endforeach
                            <hr class="bg-light col-12 linha rounded p-0 m-0">
                        </div>
                        <div class="row col-12 m-0 my-1 p-0">
                            <span class="col-12 m-0 p-0 font-weight-bold">Lista de Responsaveis</span>
                            <hr class="bg-light col-12 linha rounded p-0 m-0">
                            <div class="col-6 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                <b>NOME:</b>
                            </div>
                            <div class="col-6 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                <b>CARGO:</b>
                            </div>
                            @foreach ($agend['responsaveis'] as $item)
                            <div class="col-6 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                {{$item['nome']}}
                            </div>
                            <div class="col-6 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                {{$item['cargo']}}
                            </div>
                            @endforeach
                            <hr class="bg-light col-12 linha rounded p-0 m-0">
                        </div>
                        <div class="row col-12 m-0 my-1 p-0">
                            <span class="col-12 m-0 p-0 font-weight-bold">Lista dos Alunos</span>
                            <hr class="bg-light col-12 linha rounded p-0 m-0">
                            <div class="col-8 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                <b>NOME:</b>
                            </div>
                            <div class="col-4 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                <b>IDADE:</b>
                            </div>
                            @foreach ($agend['visitantes'] as $item)
                            <div class="col-8 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                {{$item['nome']}}
                            </div>
                            <div class="col-4 small m-0 my-1 p-0 pl-md-4 pl-3 border-right">
                                {{$item['idade']}}
                            </div>
                            @endforeach
                            <hr class="bg-light col-12 linha rounded p-0 m-0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection