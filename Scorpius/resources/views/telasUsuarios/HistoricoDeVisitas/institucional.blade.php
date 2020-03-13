@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Historico de Visitas')

@section('conteudo')

<div class= "row col-12 m-0 p-2 scorpius-border-shadow border-top border-shadow" borda>
    <div class="row col-12 col-md-10 m-0 p-0">
        <div class="col-md-6 col-12 m-0">
            <b>Nome da Instituição:</b> Colégio Estadual Odorico Tavares
        </div>
        <div class="col-md-3 col-4 m-0 pr-0 pr-md-auto">
            <b>Data:</b> 28/11/2019
        </div>
        <div class="col-md-3 col-4 m-0 ">
            <b>Turno:</b> Manhã
        </div>
        <div class="col-md-3 col-4 m-0 pr-0 pr-md-auto">
            <b>Total de Alunos:</b> 5
        </div>
        <div class="col-md-6 col-7 m-0">
            <b>Status do Agendamento:</b> confirmado
        </div>
        <div class="col-md-3 col-5 m-0">
            <b>Status da Visita:</b> Realizada
        </div>
    </div>
    <div class="col-md-2 col-lg-1 d-block  m-lg-2 m-0 p-0">
        <button type="button" class="btn btn-secondary float-right btn-sm " data-toggle="modal"
            data-target="#modal-dados-completos" expand>Dados Completos
        </button>
    </div>
</div>
    <!-- modal dos dados completos -->
    <div class="modal fade " id="modal-dados-completos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="modal-cadastrar-turmaTitle">Dados Completos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Somente exemplificando a estrutura -->
                    <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" bordaModal>
                        <div class="row col-12 col-md-10 m-0 p-0">
                            <div class="col-12 p-0 m-0">
                                <b>Nome da Instituição:</b> Colégio Estadual Odorico Tavares
                            </div>
                            <div class=" col-4 m-0 p-0 pr-0 pr-md-auto">
                                <b>Data:</b> 28/11/2019
                            </div>
                            <div class=" col-4 m-0 p-0">
                                <b>Turno:</b> Manhã
                            </div>
                            <div class=" col-4 m-0 p-0 ">
                                <b>Total de Alunos:</b> 5
                            </div>
                            <div class=" col-7 m-0 p-0">
                                <b>Status do Agendamento:</b> confirmado
                            </div>
                            <div class=" col-5 m-0 p-0">
                                <b>Status da Visita:</b> Realizada
                            </div>
                        </div>
                        <div class="col-12 m-0 my-1 p-0">
                            <span class="col-12 m-0 p-0 font-weight-bold">Exposiçoes Escolhidas</span>
                        </div>
                        <div class="col-12 m-0 my-1 p-0">
                            <span class="col-12 m-0 p-0 font-weight-bold">Lista de Responsaveis</span>
                        </div>
                        <div class="col-12 m-0 my-1 p-0">
                            <span class="col-12 m-0 p-0 font-weight-bold">Lista de Responsaveis</span>
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

@endsection