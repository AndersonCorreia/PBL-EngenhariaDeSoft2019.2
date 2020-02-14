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
<div class="scorpius-border container-fluid m-0 p-4">
    <p class="h3">Minha proposta de horário</p>

    <form action="{{ route('HorarioEstagiario.enviarHorario') }}" method="POST">
        {{csrf_field()}}

        <div id="guia" class="scorpius-border-shadow p-4">
            <div class="row">
                <div class="col-md-3">
                    <p class="h5">Guia de matrícula: </p>
                </div>
                <div class="col-md-9">
                    <input name="guia" type="file"/>
                </div>
            </div>
        </div>
        <div class="mt-3 container-fluid scorpius-border-shadow p-4">
            <div class="mb-3">
                <p class="h3 float-left">Proposta de horário</p>
            </div>
            <div class="mb-1">-</div>
            <div id="calendario" class="p-2">
                <div class="row">
                    <div class="col-md-2 p-0"></div>
                    <div class="col-md-2 p-0">
                        <p class="h5">Segunda</p>
                    </div>
                    <div class="col-md-2">
                        <p class="h5">Terça</p>
                    </div>
                    <div class="col-md-2">
                        <p class="h5">Quarta</p>
                    </div>
                    <div class="col-md-2">
                        <p class="h5">Quinta</p>
                    </div>
                    <div class="col-md-2">
                        <p class="h5">Sexta</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">
                        <p class="h6">08:00 - 12:00</p>
                    </div>
                    <div class="col-md-2 0-0">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="seg-manha" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="ter-manha" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="qua-manha" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="qui-manha" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="sex-manha" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <p class="h6">14:00 - 18:00</p>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="seg-tarde" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="ter-tarde" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="qua-tarde" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="qui-tarde" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="sex-tarde" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <p class="h6">18:00 - 22:00</p>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="seg-noite" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="ter-noite" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="qua-noite" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="qui-noite" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="btn btn-outline-secondary btn-lg">
                            <input name="sex-noite" autocomplete="off" class="p-0" type="checkbox">
                        </label>
                    </div>
                </div>
                <div class="border-bottom mt-1">.</div>
                <div class="mt-3">
                    <label for="observacoes" class="ml-1 float-left">
                        <p class="h5 float-left">Observações</p>
                    </label>
                    <textarea placeholder="Digite aqui observações sobre seu horário..." maxlength="100"
                        id="observacoes" class="form-control" name="observacao" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-success float-right border-all-100">
                <i class="fa fa-send"></i>
                Enviar
            </button>
        </div>
    </form>

</div>
@endsection