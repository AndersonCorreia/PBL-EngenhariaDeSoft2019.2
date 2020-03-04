<meta name="csrf-token" content="{{csrf_token()}}">
<form method="POST" action="{{route('confirma.post')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('POST') }}

    <!-- Modal -->
    <div class="modal fade" method="POST" action="{{route('confirma.post')}}" id="modalExemplo" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancelamento Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja confirmar as alterações?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" salvarMudanca>Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
{{$valor=''}}
@foreach($exposicoes as $exposicao)
    <div class="geralEventos">
        <div class="eventos scorpius-border-shadow border-top border-shadow">
            <table class="table-borderless">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Tipo evento</th>
                        <th>Data inicial</th>
                        <th>Data Final</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$exposicao['titulo']}}</td>
                        <td>{{$exposicao['tipo_evento']}}</td>
                        <td>{{$exposicao['data_inicial']}}</td>
                        @if($exposicao['data_final'])
                        <td>{{$exposicao['data_final']}}</td>
                        @else
                        <td>...</td>
                        @endif
                        <td>
                            <div class="botoes">
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target=".bd-example-modal-xl" id="btnVisualizar"
                                    data-detalhe='<?=  json_encode($valor); ?>'>
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-xl" id="btnEditar"
                                    data-detalhe='<?=json_encode($valor);?>'>
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" name="user"
                                    value='<?=json_encode($valor);?>'>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endforeach
</form>
@section('js')
<script>
$(document).ready(function() {

    let statusCancelado = $('[cancelar]')
    for (let i = 0; i < statusCancelado.length; i++) {
        let value2 = $(statusCancelado[i]).data('valores').Status.toString();
        console.log(value2)
        if (value2.search('cancelado') != -1) {
            statusCancelado[i].setAttribute("style",
                "cursor: default; pointer-events: none;user-select:none; opacity: 0.3;");
        }
    }


    let valorAtual = null
    $('[cancelar]').click(e => {
        e.preventDefault()
        valorAtual = $(e.currentTarget).data('valores')
        $('#modalExemplo').modal('show')
    })

    $('#modalExemplo [salvarMudanca]').click(e => {
        e.preventDefault()
        console.log(valorAtual)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let nomeDaTabela =
            "{{(session('tipo') == 'institucional' ? 'agendamento_institucional' : 'agendamento')}}"
        if (valorAtual) {
            $.ajax({
                url: "{{route('confirma.post')}}",
                method: 'POST',
                data: {
                    nomeTabela: nomeDaTabela,
                    ID: valorAtual.ID,
                    status: 'cancelado pelo usuario',
                    user_ID: "{{session('ID')}}"
                },
                success(retorno) {
                    //console.log(retorno)
                    location.reload();
                },
                error(erro) {
                    console.log(erro)
                }

            })
        }
    })

})
</script>
@endsection

<style>
.eventos {
    height: 95px;
    width: 800px;
}

.geralEventos {
    padding: 10px 0px 10px 0px;
    align-items: center;
    display: flex;
    flex-direction: row;
}

.botoes {
    display: flex;
    flex-direction: row;
    align-items: top border;
}

.btn {
    padding: 3px;
    margin: 5px;
}

h2 {
    align-items: center;
}

td,
th {
    padding: 3px 3px 3px 3px;
    width: 300px;
    text-align: center;
}
th{
    padding: 6px 0px 6px 0px;
}
</style>