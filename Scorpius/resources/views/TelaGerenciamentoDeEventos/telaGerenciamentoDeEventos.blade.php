@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerencimanto De Eventos')

@section('conteudo')
<div class="m-1 p-3">
    <div class="row col-12">
        <div class="container-fluid bg-white p-4" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px">
            <div class="col-12 m-0 p-0">
                <div class="container-fluid bg-white shadow p-3 align-items"
                    style="border-bottom-right-radius: 20px;
                    border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px; float: middle">
                    <div class="card" style="overflow-y: auto">
                        <!--caixa da lista de atividades-->
                        <div class="card-header text-white bg-primary">
                            <h4 class="card-title">Listagem de Eventos</h4>
                        </div>
                        <div class="card-body" style="max-height: 325px; overflow-y: auto;">
                            @include('TelaGerenciamentoDeEventos._include.eventos')
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarModal"
                            style="float: right">Cadastrar Novo Evento</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

</style>