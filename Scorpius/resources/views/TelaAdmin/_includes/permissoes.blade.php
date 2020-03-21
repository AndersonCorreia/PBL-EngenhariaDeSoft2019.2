<div class="col-12 m-0 p-3 overflow-auto">
    <div class="col-12 row m-0 p-3 pt-2 scorpius-border-shadow-sm font-weight-bold text-center" style="min-width: 650px">
        <div class="col row border m-0 p-0">  
            <div class="col-4 m-0 p-0 border">
                Permissões
            </div>
            <div class="col row p-0 m-0">
                @foreach ($tipos as $t)
                    @if ($loop->first)
                    <div class="col border m-0 p-0 ">
                        {{$t["tipo"]}}
                    </div>
                    @else
                        @if($loop->last)
                        <div class="col border m-0 p-0 ">
                            {{$t["tipo"]}}
                        </div>
                        @else
                        <div class="col border m-0 p-0 ">
                            {{$t["tipo"]}}
                        </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-12 bormder m-0 p-0">
            <hr class="bg-light col-12 linha rounded p-0 m-0 my-1">
            <div class="col-12 m-0 p-0 border">
                @foreach ($permissoes as $p)
                <div class="col-12 row m-0 p-0 ">
                    <div class="col-4 border m-0 p-0 pt-1">
                        <span class="align-middle m-0 p-0">{{$p["permissao"]}}</span>
                    </div>
                    @foreach($tipos as $t)
                    <div class="col border m-0 p-0 pt-1">
                        @if($permissaoTipo[$p['ID']][$t['ID']])
                            <label for='{{"".$p['ID']."|".$t['ID']}}' onclick="esvaziar(this)">
                                <i class="fas fa-star align-middle" ></i>
                            </label>
                            <input id='{{"".$p['ID']."|".$t['ID']}}' class="d-none" type="checkbox" 
                                    value='{{"".$p['ID']."|".$t['ID']."|".$p['permissao']."|".$t['tipo']}}'
                                    name="p_t[]" checked>
                        @else
                            <label for='{{"".$p['ID']."|".$t['ID']}}' onclick="preencher(this)">
                                <i class="far fa-star align-middle"></i>
                            </label>
                            <input id='{{"".$p['ID']."|".$t['ID']}}' class="d-none" type="checkbox"
                                    value='{{"".$p['ID']."|".$t['ID']."|".$p['permissao']."|".$t['tipo']}}'
                                    name="p_t[]" >
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

        $(obj).attr('onclick','esvaziar(this)').children("i").removeClass('far').addClass('fas');
    }
      
    function esvaziar(obj){
        
        $(obj).attr('onclick','preencher(this)').children("i").removeClass('fas').addClass('far');
    }

  </script>
@endsection