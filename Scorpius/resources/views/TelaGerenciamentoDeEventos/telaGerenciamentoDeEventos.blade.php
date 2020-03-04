@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerencimanto De Eventos')

@section('conteudo')

    <body>
        <div class = "row col-12">
            <div class = "container-fluid bg-white p-4" style = "border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px">
                <div class = "col-10 m-0 p-0">
                    <div class = "container-fluid bg-white shadow p-3 align-items" style = "border-bottom-right-radius: 20px; 
                    border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px; float: middle">
                        <div class = "card" style = "overflow-y: auto"> <!--caixa da lista de atividades-->
                            <div class = "card-header text-white bg-primary">
                                <h4 class = "card-title">Listagem de Eventos</h4>
                            </div>
                            <div class = "card-body" style = "max-height: 200px; overflow-y: auto;">
                                    @include('TelaGerenciamentoDeEventos._include.eventos')
                            </div>
                                <div class = "card-footer bg-transparent border-0">
                                    <button type = "button" class = "btn btn-success" data-toggle = "modal" data-target = "#cadastrarModal" style = "float: right">Cadastrar Novo Evento</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal fade" id = "cadastrarModal" tabindex = "-1" role = "dialog" aria-labelledby = "cadastrarModalLabel" aria-hidden = "true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadastrarModalLabel">CADASTRO DE NOVO EVENTO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><!--6 rows-->
                        <form>
                            <div class="row col-12 p-3"><!--1-->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nome_campo" class="col-form-label">Nome:</label>
                                        <input type="text" class="form-control" id="nome_campo"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipoEvento_campo" class="col-form-label">Tipo de Evento:</label>
                                        <select class="form-control" id="tipoEvento_campo">
                                            <option>atividade diferenciada</option>
                                            <option>atividade permanente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"><!--2-->
                                    <div class="form-group">
                                        <label for="temaEvento_campo" class="col-form-label">Tema do Evento:</label>
                                        <select class="form-control" id="temaEvento_campo">
                                            <option>Biologia</option>
                                            <option>Astronomia</option>
                                            <option>Evolução Humana</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="row col-12 p-3"><!--3-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao_campo" class="col-form-label">Descrição do Evento:</label>
                                        <textarea class="form-control" id="descricao_campo"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12 p-3"><!--4-->
                                <div class="col-md-6">
                                    <label for="limiteVagas_campo" class="col-form-label">Limite de Vagas:</label>
                                    <input type="number" max="40"/>
                                </div>
                                <div clas="col-md-6 align-right" >
                                    <label for="turno_campo" class="col-form-label">Turno:</label>
                                    <select class="form-control" id="turno_campo">
                                            <option>Diurno</option>
                                            <option>Noturno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-12 p-3"><!--5-->
                                <div class="col-md-6">
                                    <label for="periodo_inicio_campo" class="col-form-label">Data Início:</label>
                                    <input type="date"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="periodo_termino_campo" class="col-form-label">Data Termino:</label>
                                    <input type="date"/>
                                </div>
                            </div>
                            <div class="row col-12 p-3"><!--6-->
                                <label for="imagem_campo" class="col-form-label">Imagem da Atividade:</label>
                                <input type="file" class="col-form-label" id="imagem_campo"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection

<style>

</style>
