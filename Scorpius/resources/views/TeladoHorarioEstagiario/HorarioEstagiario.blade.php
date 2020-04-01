@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Demanda WEB')
@section('css')
@endsection
@section('conteudo')

<div class="scorpius-border container-fluid m-0 p-4">
    <p class="h3">Minha Proposta de Horário</p>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('success')}}</strong>
        Seu horário agora está em processo de análise e pode ser modificado no horário final
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('erro')}}
    </div>
    @endif
    <form action="{{ route('demandaWeb.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="guia" class="scorpius-border-shadow p-4">
            <div class="row">
                <div class="col-md-3">
                    <p class="h5">Guia de Matrícula: </p>
                </div>
                <div class="col-md-9">
                    <input id="guia" name="guia" type="file" class="form-control-anexo"/>
                </div>
            </div>
        </div>
        <div class="mt-2 container-fluid scorpius-border-shadow p-4">
            <div class="mb-3">
                <p class="h3 float-left">Proposta de Horário</p>
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
                    <div class="col-md-2">
                        <button id="seg-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                                <input name="seg-manha" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="ter-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="ter-manha" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="qua-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="qua-manha" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="qui-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="qui-manha" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="sex-manha" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="sex-manha" value="false" type="hidden">
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <p class="h6 mt-1">14:00 - 18:00</p>
                    </div>
                    <div class="col-md-2 0-0">
                        <button id="seg-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="seg-tarde" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="ter-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="ter-tarde" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="qua-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="qua-tarde" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="qui-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="qui-tarde" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="sex-tarde" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="sex-tarde" value="false" type="hidden">
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <p class="h6 mt-1">18:00 - 22:00</p>
                    </div>
                    <div class="col-md-2 0-0">
                        <button id="seg-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="seg-noite" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="ter-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="ter-noite" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="qua-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="qua-noite" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="qui-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="qui-noite" value="false" type="hidden">
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button id="sex-noite" type="button" class="btn-outline-secondary btn-lg btn h-100 w-50"
                            data-toggle="button" aria-pressed="false">
                            <input name="sex-noite" value="false" type="hidden">
                        </button>
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
$('#seg-manha').click(function(e){
    if($('input[name="seg-manha"]').val() == 'false'){
        $('input[name="seg-manha"]').val('true');  
    }else{
        $('input[name="seg-manha"]').val('false');
    }
    return;
});
$('#ter-manha').click(function(e){
    if($('input[name="ter-manha"]').val() == 'false'){
        $('input[name="ter-manha"]').val('true');  
    }else{
        $('input[name="ter-manha"]').val('false');
    }
    return;
});
$('#qua-manha').click(function(e){
    if($('input[name="qua-manha"]').val() == 'false'){
        $('input[name="qua-manha"]').val('true');  
    }else{
        $('input[name="qua-manha"]').val('false');
    }
    return;
});
$('#qui-manha').click(function(e){
    if($('input[name="qui-manha"]').val() == 'false'){
        $('input[name="qui-manha"]').val('true');  
    }else{
        $('input[name="qui-manha"]').val('false');
    }
    return;
});
$('#sex-manha').click(function(e){
    if($('input[name="sex-manha"]').val() == 'false'){
        $('input[name="sex-manha"]').val('true');  
    }else{
        $('input[name="sex-manha"]').val('false');
    }
    return;
});

$('#seg-tarde').click(function(e){
    if($('input[name="seg-tarde"]').val() == 'false'){
        $('input[name="seg-tarde"]').val('true');  
    }else{
        $('input[name="seg-tarde"]').val('false');
    }
    return;
});
$('#ter-tarde').click(function(e){
    if($('input[name="ter-tarde"]').val() == 'false'){
        $('input[name="ter-tarde"]').val('true');  
    }else{
        $('input[name="ter-tarde"]').val('false');
    }
    return;
});
$('#qua-tarde').click(function(e){
    if($('input[name="qua-tarde"]').val() == 'false'){
        $('input[name="qua-tarde"]').val('true');  
    }else{
        $('input[name="qua-tarde"]').val('false');
    }
    return;
});
$('#qui-tarde').click(function(e){
    if($('input[name="qui-tarde"]').val() == 'false'){
        $('input[name="qui-tarde"]').val('true');  
    }else{
        $('input[name="qui-tarde"]').val('false');
    }
    return;
});
$('#sex-tarde').click(function(e){
    if($('input[name="sex-tarde"]').val() == 'false'){
        $('input[name="sex-tarde"]').val('true');  
    }else{
        $('input[name="sex-tarde"]').val('false');
    }
    return;
});

$('#seg-noite').click(function(e){
    if($('input[name="seg-noite"]').val() == 'false'){
        $('input[name="seg-noite"]').val('true');  
    }else{
        $('input[name="seg-noite"]').val('false');
    }
    return;
});
$('#ter-noite').click(function(e){
    if($('input[name="ter-noite"]').val() == 'false'){
        $('input[name="ter-noite"]').val('true');  
    }else{
        $('input[name="ter-noite"]').val('false');
    }
    return;
});
$('#qua-noite').click(function(e){
    if($('input[name="qua-noite"]').val() == 'false'){
        $('input[name="qua-noite"]').val('true');  
    }else{
        $('input[name="qua-noite"]').val('false');
    }
    return;
});
$('#qui-noite').click(function(e){
    if($('input[name="qui-noite"]').val() == 'false'){
        $('input[name="qui-noite"]').val('true');  
    }else{
        $('input[name="qui-noite"]').val('false');
    }
    return;
});
$('#sex-noite').click(function(e){
    if($('input[name="sex-noite"]').val() == 'false'){
        $('input[name="sex-noite"]').val('true');  
    }else{
        $('input[name="sex-noite"]').val('false');
    }
    return;
});
</script>
@endsection