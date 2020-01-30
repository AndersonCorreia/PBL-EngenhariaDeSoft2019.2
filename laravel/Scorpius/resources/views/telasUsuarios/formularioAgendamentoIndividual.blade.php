@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendar Visita')

@section('conteudo')
<form class="col-lg-10 col-xl-9 col-12 mx-sm-auto mt-sm-4" method="POST" action="{{route('AgendarInstituicao.post')}}">
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-msm">
            <span><h5>Dados para o agendamento</h5></span>
            </div>
            <div class="form-group col-sm-4">
                <span>Data</span></br>
                <input class="form-control" type="date" id="data" name="data" required>
            </div>
            <div class="form-group col-sm-4">
                <span>Turno</span>
                <select id="turno" name="turno" class="custom-select" placeholder="turno" required>
                    <option value="manhã">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
            </div>
            <div class="form-group col-sm-12 visitantes">
                <span><h6>Dados dos visitantes</h6></span>
                <div class="row box">
                    <div class="col-md-7 m-0 p-1 ">
                        <input id="visitante" class="form-control"  type="text" maxlength="40" name="Visitante" placeholder="Nome completo" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-3">
                        <input id="RG" class="form-control"  type="text" maxlength="15" name="RG" placeholder="RG" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary clone">+</button>
                    </div>
                    <div class="col-md-1">
                        <input type="button" class="btn btn-primary btn_remove" value="-">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <textarea name="obs" cols="30" rows="3" placeholder="Alguma Observação"></textarea>
            </div>
            <div class="input-group-append mt-2">
                <button id="submit" type="submit" class="btn mr-2 btn-primary">Solicitar Agendamento</button>
                <a href="#"><button type="button" class="btn btn-danger">Cancelar</button> </a>
            </div>
        </div>
    </fieldset>
</form>

@endsection

@section('css')
<style type="text/css">
    form .visitantes{
        padding:2%;
        margin-top: 14;
    }
    form span{
        color: black;
        text-decoration: none;
    }
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script>
$(document).foundation();

$('.clone').click(function(e){
    e.preventDefault();
    $('.box:first').clone().appendTo($('.visitantes'));
    $('.box').last().find('input[type="text"]').val('');
});
$('form').on('click', '.btn_remove', function(e){
    e.preventDefault();
    if ($('.box').length > 1){
        $(this).parents('.box').remove();
    }
    
 });
</script>
@endsection