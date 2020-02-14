@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Demanda WEB')

@section('conteudo')
<style>
    .user_input_forms {
        text-align: center;
    }

    .submit_button {
        background-color: cornflowerblue;
        color: white;
        border: 5px;
        border-radius: 5px;
        padding: 5px;
    }
</style>
<div class="container-fluid m-0 bg-white p-4" style="border-bottom-right-radius: 20px; 
border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
    <h3>Minha Proposta de Horário</h3>
    <br>

    <div class="user_input_forms">
        <form action="{{ route('HorarioEstagiario.enviarHorario') }}" method="POST" enctype=”multipart/form-data”>
            {{csrf_field()}}

            <div class="guia">
                <span class="badge badge-pill badge-secondary">
                    <h4>Guia de Matrícula</h4>
                </span>
                <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
                <input name="guia" type="file" />
                <br><br><br>
            </div>
            <div class="container-fluid shadow p-4" style="border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
                <div class="mb-3">
                    <p class="h3 float-left">Proposta de horário</p>
    
                </div>
                <div class="border-bottom mb-1">- </div>
                <div class="calendario mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="h5">Dia / Turno</p>
                        </div>
                        <div class="col-md-3">
                            <p class="h5">Manhã</p>
                        </div>
                        <div class="col-md-3">
                            <p class="h5">Tarde</p>
                        </div>
                        <div class="col-md-3">
                            <p class="h5">Noite</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <p class="h5">Segunda</p>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="seg-manha" autocomplete="off" type="checkbox">
                                08:00 - 12:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="seg-tarde" autocomplete="off" type="checkbox">
                                14:00 - 18:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="seg-noite" autocomplete="off" type="checkbox">
                                18:00 - 22:00
                            </label>
                        </div>
                    </div>
    
                    <div class="row mt-1">
                        <div class="col-md-3">
                            <p class="h5">Terça</p>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="ter-manha" autocomplete="off" type="checkbox">
                                08:00 - 12:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="ter-tarde" autocomplete="off" type="checkbox">
                                14:00 - 18:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="ter-noite" autocomplete="off" type="checkbox">
                                18:00 - 22:00
                            </label>
                        </div>
                    </div>
    
                    <div class="row mt-1">
                        <div class="col-md-3">
                            <p class="h5">Quarta</p>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="qua-manha" autocomplete="off" type="checkbox">
                                08:00 - 12:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="qua-tarde" autocomplete="off" type="checkbox">
                                14:00 - 18:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="qua-noite" autocomplete="off" type="checkbox">
                                18:00 - 22:00
                            </label>
                        </div>
                    </div>
    
    
                    <div class="row mt-1">
                        <div class="col-md-3">
                            <p class="h5">Quinta</p>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="qui-manha" autocomplete="off" type="checkbox">
                                08:00 - 12:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="qui-tarde" autocomplete="off" type="checkbox">
                                14:00 - 18:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="qui-noite" autocomplete="off" type="checkbox">
                                18:00 - 22:00
                            </label>
                        </div>
    
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-3">
                            <p class="h5">Sexta</p>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="sex-manha" autocomplete="off" type="checkbox">
                                08:00 - 12:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="sex-tarde" autocomplete="off" type="checkbox">
                                14:00 - 18:00
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="sex-noite" autocomplete="off" type="checkbox">
                                18:00 - 22:00
                            </label>
                        </div>
    
                    </div>
                </div>
            </div>
            <br> <br>

            <div class="form-group">
                <label for="Observacao" placeholder="Descrição"><b>Observações:</b></label>
                <!--Caixa de texto de obsservação-->
                <textarea class="form-control" name="observacao" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success float-right" style="border-bottom-right-radius: 20px; 
                border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
                Enviar
                <i class="fa fa-send"></i>
            </button>
            <!--botao p/ enviar os dados-->
            {{-- <input type="submit" value="Enviar Proposta" name="proposta" class="submit_button">  <!--botao p/ enviar os dados--> --}}
        </form>

    </div>
    @endsection