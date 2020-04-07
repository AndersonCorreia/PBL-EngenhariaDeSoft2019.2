<!-- Modal confirmação -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Horário Estagiário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja confirmar as alterações?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" salvarMudanca>Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirmação de periodo de matrícula-->
<div class="modal fade" id="modalMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMatriculaLabel">Periodo de matrícula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja cotinuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" abrirMat>Confirmar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal horário estagiários -->
<div class="modal fade" id="modalHorarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Horários Confirmados dos Estagiário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" fecharModal>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-6  float-left">
                    <div class="form-group row">
                        <!-- DIV seleção de estagiário -->
                        <div class="alert alert-danger" role="alert" style='display:none'>Estagiário não possui horário
                            Confirmado!</div>
                        <label class="col-sm-12 col-form-label pt-3" nomeEstagiario>Nome do Estagiário</label>
                        <div class="col-9">
                            <input id="nomeEstagiario" class="form-control" type="text" name="nomeEstagiario"
                                placeholder="Insira o Nome do Estagiário" list="instList" required autofocus>
                            <datalist id="instList">

                            </datalist>
                        </div>
                        <button type="button" class="btn btn-primary float-left " buscarHorarioConfirmado> Buscar
                        </button>

                    </div>

                </div>
                <!--calendario-->
                <div>
                    @include('TelaPropostaHorarioFuncionario._include.calendario')
                </div>
            </div>
            <div class="modal-footer" style="padding:45px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" fecharModalHorario>Fechar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal periodo de visita -->
<div class="modal fade" id="modalPeridoVisita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Período de visitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" fecharModal>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPeriodo">
                    <div class="form-group col-md-12" align="center">
                        <label class="badge-pill badge-primary" for="semestre"></label>
                    </div>
                    <div class="form-group row col-12 p-3">
                        <div class="col-md-2">
                            <label for="periodo">Período de visitas:</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group" style="padding-left: 20px;">
                                <label for="periodo_inicio_campo" class="col-form-label">Data
                                    Início:</label>
                                <input type="date" class="form-control" name="data_inicial" id="periodo_inicio_campo" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="periodo_termino_campo" class="col-form-label">Data
                                    Término:</label>
                                <input type="date" class="form-control" name="data_final" id="periodo_termino_campo" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" confirmaVisita>Confirmar</button>
            </div>
        </div>
    </div>
</div>