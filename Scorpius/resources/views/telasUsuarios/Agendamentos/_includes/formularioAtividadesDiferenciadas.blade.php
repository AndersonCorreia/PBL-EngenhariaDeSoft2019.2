@section('css.head')
<style>
    @media only screen and (max-width: 580px) {
        .btn-editar-excluir {
            padding-left: 15px !important;
            -webkit-box-flex: 0 !important;
            flex: 0 0 auto !important;
            max-width: 100% !important;
            margin-top: 0% !important;
        }

        .div-btn-turma {
            -webkit-box-flex: 0 !important;
            flex: 0 0 70% !important;
            max-width: 70% !important;
        }

        .row-btn-turma {
            margin-bottom: 5% !important;
        }

        #btn-turma {
            height: 100%;
        }
    }

    #idade-aluno-info {
        float: right !important;
    }

    .btn-editar-excluir {
        width: 27% !important;
    }
</style>
@endsection
@section('conteudo')
<div class="container-fluid bg-white p-4" 
    style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
    <div class="container-fluid">
        <div class="atividade-diferenciada">
            <button type="button" class="btn btn-secondary" data-toggle="modal"
                data-target=".modal-atividade-diferenciada">
                Férias Divertidas
            </button>
            <!--Modal Agendamento-->
            <div class="modal fade modal-atividade-diferenciada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary text-white">
                                <h5 class="modal-title" id="modal-cadastrar-turmaTitle">Férias Divertidas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--Formulario de Agendamento-->
                            <form id="form.agendamento" class="container-fluid m-0 p-3" method="POST" action="{{route('AgendarDiurnoVisitante.post')}}">
                            {{csrf_field()}}
                                <div id="dados-agendamento">
                                    <p class="h5">Dados para o agendamento</p>
                                    <div id="data-turno" class="row">
                                        <div class="col-md-6">
                                            <label for="inputData">Data desejada</label>
                                            <input class="form-control" id="data" name="data" type="date" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="selectTurno">Turno</label>
                                            <select id="turno" name="turno" id="turno" class="custom-select" placeholder="turno" required>
                                                <option value="manhã">Manhã</option>
                                                <option value="tarde">Tarde</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="dados-visitante" class="mt-4 dados-pessoais">
                                    <p class="h6">Dados do visitante</p>
                                    <div class="row">
                                        <div class="col-md-10">Nome</div>
                                        <div class="col-md-2">Idade</div>
                                    </div>
                                    <div id="dados-visitante-campos">
                                        <div class="row box mb-2">
                                            <div class="col-md-10 nome-visitante">
                                                <input id="visitante" class="form-control" type="text" maxlength="40" name="visitante1" placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                                            </div>
                                            <div class="col-md-2 idade-visitante">
                                                <input id="idade" class="form-control" type="text" maxlength="3" name="idade1" placeholder="xx" pattern="[0-9]+$$" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="observacoes" class="mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observações"></textarea>
                                </div>
                                <div class="adicionar-cancelar mt-2 float-right">
                                    <button id="submit" type="submit" class="btn mr-2 btn-primary">
                                        <i class="fas fa-receipt    "></i>
                                        Agendar</button>
                                    <a href="" class="btn btn-secondary">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        Cancelar</a>
                                </div>


                                {{-- 
                                <fieldset>
                                <div class="form-group col-sm-12 visitantes">
                                    <span><h5>Dados para o agendamento</h5></span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputData">Data</label>
                                            <input class="form-control" type="date" id="data" max="{{$visitas['dataLimite']}}" name="data" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="selectTurno">Turno</label>
                                            <select id="turno" name="turno" id="turno" class="custom-select" placeholder="turno" required>
                                                <option value="manhã">Manhã</option>
                                                <option value="tarde">Tarde</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 dados-pessoais">
                                    <p>
                                        <h6>Dados dos visitantes</h6>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="visitante">Nome</label>
                                            <input id="visitante" class="form-control" type="text" maxlength="40" name="Visitante[]" placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="idade">Idade </label>
                                            <input id="idade" class="form-control" type="text" maxlength="3" name="idade[]" placeholder="xx" pattern="[0-9]+$$" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observações"></textarea>
                                </div>
                                <div class="btn-lg btn-block">
                                    <button id="submit" type="submit" class="btn mr-2 btn-primary">Agendar</button>
                                    <a href="#"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                </div>
                                </fieldset> --}}
                            </form>
                        </div>
                    </div>
            </div>
@endsection