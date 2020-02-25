<div id="exposicoes" class="col-12 text-left font-weight-bold overflow-auto">
    <div class="col-12 p-2">
        <span> Selecione as {{$tipoAtividade}} a serem visitadas: <span>
    </div>
    <hr class="bg-light col-12 linha rounded p-0 m-0">
    <fieldset form="form.agendamento" class="col-12">
        <div class="form-row">
            @foreach ($$tipoAtividade as $exp)
            <div class="col-12 col-md-6 p-1">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" value="{{$exp["titulo"]}}" id="check{{$loop->index}}">
                    <label class="custom-control-label" for="check{{$loop->index}}"> {{$exp["descrição"]}} </label>
                </div>
            </div>
            @endforeach
        </div>
    </fieldset>
</div>