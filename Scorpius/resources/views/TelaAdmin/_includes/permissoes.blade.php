<div class="col-12 m-0 p-3 overflow-auto">
    <div class="col-12 row m-0 p-3 pt-2 scorpius-border-shadow font-weight-bold text-center" style="min-width: 650px">
        <div class="col-4 m-0 p-0 border scorpius-border-shadow-sm">
            Permissões
        </div>
        <div class="col row mx-0 ml-1 px-1 p-0 m-0 border scorpius-border-shadow-sm">
            @foreach ($tipos as $t)
                @if ($loop->first)
                <div class="col border-right m-0 p-0 ">
                    {{$t["tipo"]}}
                </div>
                @else
                    @if($loop->last)
                    <div class="col border-left m-0 p-0 ">
                        {{$t["tipo"]}}
                    </div>
                    @else
                    <div class="col border-right border-left m-0 p-0 ">
                        {{$t["tipo"]}}
                    </div>
                    @endif
                @endif
            @endforeach
        </div>
        <div class="col-12 bormder m-0 mt-0 pr-1 p-0 scorpivus-border-shadow-sm">
            <hr class="bg-light col-12 linha rounded p-0 m-0 my-1">
            <div class="col-12 m-0 ml-1 p-0 border">
                @foreach ($permissoes as $p)
                <div class="col-12 row m-0 p-0">
                    <div class="col-4 border m-0 p-0 pt-2">
                        {{$p["permissao"]}}
                    </div>
                    @foreach($tipos as $t)
                    <div class="col border m-0 p-0 pt-2">
                        @if($permissaoTipo[$p['ID']][$t['ID']])
                            <label for={{"".$p['ID']."|".$t['ID']}}>
                                <i class="fas fa-star" onclick="preencher(this)"></i>
                            </label>
                            <input id={{"".$p['ID']."|".$t['ID']}} class="d-none" type="checkbox" 
                                    value={{"".$p['ID']."|".$t['ID']}} name="p_t[]" checked>
                        @else
                            <label for={{"".$p['ID']."|".$t['ID']}}>
                                <i class="far fa-star" onclick="esvaziar(this)"></i>
                            </label>
                            <input id={{"".$p['ID']."|".$t['ID']}} class="d-none" type="checkbox"
                                    value={{"".$p['ID']."|".$t['ID']}} name="p_t[]" >
                        @endif
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('js')
  <script>

    function preencher(obj){

        $(obj).removeClass('fas').addClass('far').attr('onclick','esvaziar(this)');
    }
      
    function esvaziar(obj){

        $(obj).removeClass('far').addClass('fas').attr('onclick','preencher(this)');
    }

  </script>
@endsection