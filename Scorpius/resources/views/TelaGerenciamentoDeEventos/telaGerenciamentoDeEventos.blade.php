@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciamento De Eventos')

@section('conteudo')
<div class="col-12 col-md-11 bg-white m-auto p-0 pt-4" style="border-bottom-right-radius: 20px; 
    border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px">
    <div class="col-12 m-0 p-0">
        <div class="container-fluid bg-white vh-75 shadow p-3 align-items"
            style="border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px; float: middle">
            <div class="card h-100" style="overflow-y: auto">
                <!--caixa da lista de atividades-->
                <div class="card-header text-white bg-primary">
                    <h4 class="card-title">Listagem de Eventos</h4>
                </div>
                <div class="card-body mh-100" style="overflow-y: auto;">
                    @include('TelaGerenciamentoDeEventos._include.eventos')
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarModal"
                    style="float: right" cadastro>Cadastrar Novo Evento</button>
            </div>
        </div>
    </div>
</div>
@endsection