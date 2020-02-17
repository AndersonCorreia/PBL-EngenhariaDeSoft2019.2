@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Demanda WEB')
@section('css')
@endsection
@section('conteudo')

<div class="scorpius-border container-fluid m-0 p-4">
    <p class="h3">Minha proposta de horário</p>

    <form name="formEnviarDemanda" autocomplete="off">
        @csrf
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div id="guia" class="scorpius-border-shadow p-4">
            <div class="row">
                <div class="col-md-3">
                    <p class="h5">Guia de matrícula: </p>
                </div>
                <div class="col-md-9">
                    <input id="guia" name="guia" type="file" class="form-control-anexo"/>
                </div>
            </div>
        </div>
        <div class="mt-3 container-fluid scorpius-border-shadow p-4">
            <div class="mb-3">
                <p class="h3 float-left">Proposta de horário</p>
            </div>
            <div class="border-bottom mt-1">.</div>
            <div id="calendario" class="p-2 text-center">
                <div class="row">
                    <div class="col-md-2 p-0">
                        <p class="h5">Turno / Dia</p>
                    </div>
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
                        <p class="h6 mt-1 mt-1">08:00 - 12:00</p>
                    </div>
                    <div class="col-md-2 0-0">
                        <button id="seg-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="ter-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="qua-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="qui-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="sex-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <p class="h6 mt-1">14:00 - 18:00</p>
                    </div>
                    <div class="col-md-2 0-0">
                        <button id="seg-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="ter-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="qua-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="qui-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="sex-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <p class="h6 mt-1">18:00 - 22:00</p>
                    </div>
                    <div class="col-md-2 0-0">
                        <button id="seg-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="ter-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="qua-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="qui-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                    <div class="col-md-2">
                        <button id="sex-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false"></button>
                    </div>
                </div>
                <div class="border-bottom mt-1">.</div>
                <div class="mt-3">
                    <label for="observacoes" class="ml-1 float-left">
                        <p class="h5 float-left">Observações</p>
                    </label>
                    <textarea placeholder="Digite aqui observações sobre seu horário..." maxlength="100"
                        id="obs" class="form-control" name="observacao" rows="2"></textarea>
                </div>
            </div>

        </div>
        <div class="mt-4" style="text-align: right !important;">
            <button id="enviar" type="submit" class="btn btn-success border-all-100">
                <i class="fa fa-send"></i> Enviar
            </button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script>
$(function() {
    $.ajaxSetup({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });
    $('form[name="formEnviarDemanda"]').submit(function(e) {
        e.preventDefault();

        if (!$('input[name="guia"]').val()) {
            return Swal.fire(
                "Guia de matrícula faltando!",
                "Por favor, insira sua guia de matrícula para enviar sua proposta de horário",
                "warning"
            );
        }

        var horarios = {
            seg: [],
            ter: [],
            qua: [],
            qui: [],
            sex: []
        };
        
        // SEGUNDA
        if ($("#seg-manha").attr("aria-pressed") == "true") {
            horarios["seg"].push("Manha");
        }
        if ($("#seg-tarde").attr("aria-pressed") == "true") {
            horarios["seg"].push("Tarde");
        }
        if ($("#seg-noite").attr("aria-pressed") == "true") {
            horarios["seg"].push("Noite");
        }
        //  TERÇA
        if ($("#ter-manha").attr("aria-pressed") == "true") {
            horarios["ter"].push("Manha");
        }
        if ($("#ter-tarde").attr("aria-pressed") == "true") {
            horarios["ter"].push("Tarde");
        }
        if ($("#ter-noite").attr("aria-pressed") == "true") {
            horarios["ter"].push("Noite");
        }
        // QUARTA
        if ($("#qua-manha").attr("aria-pressed") == "true") {
            horarios["qua"].push("Manha");
        }
        if ($("#qua-tarde").attr("aria-pressed") == "true") {
            horarios["qua"].push("Tarde");
        }
        if ($("#qua-noite").attr("aria-pressed") == "true") {
            horarios["qua"].push("Noite");
        }
        // QUINTA
        if ($("#qui-manha").attr("aria-pressed") == "true") {
            horarios["qui"].push("Manha");
        }
        if ($("#qui-tarde").attr("aria-pressed") == "true") {
            horarios["qui"].push("Tarde");
        }
        if ($("#qui-noite").attr("aria-pressed") == "true") {
            horarios["qui"].push("Noite");
        }
        // SEXTA
        if ($("#sex-manha").attr("aria-pressed") == "true") {
            horarios["sex"].push("Manha");
        }
        if ($("#sex-tarde").attr("aria-pressed") == "true") {
            horarios["sex"].push("Tarde");
        }
        if ($("#sex-noite").attr("aria-pressed") == "true") {
            horarios["sex"].push("Noite");
        }
        
        $.ajax({
            url: "{{ route('estagiario.enviarHorario') }}",
            method: "POST",
            data: {
                observacao: $('#obs').val(),
                guia: $('input[name="guia"]').val(),
                horarios: horarios
                
            },
            dataType: 'json',
            success: function(data) {
                if(!(data['success'])){
                    return Swal.fire(
                    "Erro ao enviar a proposta de horário",
                    data['erro'],
                    "error"
                );
                }
                return Swal.fire(
                    "Proposta de horário enviada com sucesso",
                    "Seu horário agora está em processo de análise e pode ser modificado no horário final",
                    "success"
                );
            }
        });
    });
});

</script>
{{-- <script src="{{ asset('js/demandaweb.js') }}"></script> --}}
@endsection