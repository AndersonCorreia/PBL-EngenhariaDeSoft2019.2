<div id="exposicoes" class="col border ml-lg-3 mt-3 mt-lg-0 text-left overflow-auto barra">
    <div class="p-2">
        <span> Selecione as exposições/atividades que deseja conhecer <span>
    </div>
    <hr class="bg-light linha rounded p-0 m-0">
    <fieldset form="form.agendamento" class="form-group">
        @foreach ($exposicoes as $exp)
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" value="{{$exp["titulo"]}}" id="check{{$loop->index}}">
                <label class="custom-control-label" for="check{{$loop->index}}"> {{$exp["descrição"]}} </label>
            </div>
        @endforeach
        @foreach ($atividades as $ati)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" value="{{$ati["titulo"]}}" id="checkAti{{$loop->index}}">
            <label class="custom-control-label" for="checkAti{{$loop->index}}"> {{$ati["descrição"]}} </label>
        </div>
        @endforeach
    </fieldset>
</div>