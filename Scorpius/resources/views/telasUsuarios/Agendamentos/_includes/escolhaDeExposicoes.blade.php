<div id="exposicoes" class="col-12 m-0 text-left font-weight-bold overflow-auto">
    <div class="col-12 p-2">
        <span> Selecione as {{$tipoAtividade}} a serem visitadas: <span>
    </div>
    <hr class="bg-light col-12 linha rounded p-0 m-0">
    <div class="form-row col-12">
        @if(($turno ?? "diurno") == 'diurno')
            @foreach ($$tipoAtividade as $exp)
            <div class="col-12 col-md-6 p-1">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" value="{{$exp["ID"]}}" id="check{{$loop->index}}" name="exposicoes[]">
                    <label class="custom-control-label" for="check{{$loop->index}}">{{$exp["titulo"]}}: {{$exp["descricao"]}} </label>
                </div>
            </div>
            @endforeach
        @else
            @foreach ($$tipoAtividade as $exp)
            <div class="col-12 col-md-6 p-1">
                <div class="custom-control custom-checkbox">
                    @if($loop->first)
                    <input class="custom-control-input" type="radio" value="{{$exp["ID"]}}" id="radio{{$loop->index}}" name="exposicao" checked>
                    @else
                    <input class="custom-control-input" type="radio" value="{{$exp["ID"]}}" id="radio{{$loop->index}}" name="exposicao">
                    @endif
                    <label class="custom-control-label" for="radio{{$loop->index}}">{{$exp["titulo"]}}: {{$exp["descricao"]}} </label>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>