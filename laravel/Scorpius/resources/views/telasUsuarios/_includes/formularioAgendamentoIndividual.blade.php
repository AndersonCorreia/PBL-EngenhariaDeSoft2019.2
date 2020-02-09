
<form id="form.agendamento" class="col-lg-10 col-xl-9 col-12 mx-sm-auto mt-sm-4" method="POST" action="{{route('AgendarDiurnoVisitante.post')}}">
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-msm">
            <span class="col-12"><h5>Dados para o agendamento</h5></span>
            <div class="form-group col-md-6">
                <label for="inputData">Data</label>
                <input class="form-control" type="date" id="data" name="data" required>
            </div>
            <div class="form-group col-md-6">
                <label for="selectTurno">Turno</label>
                <select id="turno" name="turno" class="custom-select" placeholder="turno" required>
                    <option value="manhã">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
            </div>
        </div>
            <div class="form-group col-sm-12 visitantes">
                <span><h6>Dados dos visitantes</h6></span>
                <div class="row box">
                    <div class="col-md-5 m-0 p-1 ">
                        <input id="visitante" class="form-control"  type="text" maxlength="40" name="Visitante" placeholder="Nome" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-3">
                        <input id="RG" class="form-control"  type="text" maxlength="15" name="RG" placeholder="RG" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-2">
                        <input id="idade" class="form-control"  type="text" maxlength="3" name="idade" placeholder="idade" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary btn-sm btn-block clone">+</button>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary btn-sm btn-block btn_remove">-</button>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleFormControlTextarea1">Observações</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="btn-lg btn-block">
                <button id="submit" type="submit" class="btn mr-2 btn-primary">Solicitar Agendamento</button>
                <a href="#"><button type="button" class="btn btn-danger">Cancelar</button> </a>
            </div>
        </div>
    </fieldset>
</form>

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