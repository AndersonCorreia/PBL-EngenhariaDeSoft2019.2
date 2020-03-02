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
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Horário Estagiário</h5>
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
    @foreach((session('tipo') == 'institucional' ? $registros['agendamento_institucional'] :
    $registros['agendamento'])
    as $agenda)
    <div class="agendas">
        <div class="instituicoes scorpius-border-shadow border-top border-shadow">
            <table class="table-borderless">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Status</th>
                        @if(session('tipo') == 'institucional')
                        <th>Turma</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{trim(substr($agenda['Data_Agendamento'], 0, 11))}}</td>
                        <td>{{trim(substr($agenda['Data_Agendamento'], 11, 14))}}</td>
                        <td>{{trim($agenda['Status'])}}</td>
                        @if(session('tipo') == 'institucional')
                        <td>{{trim($agenda['ano_escolar'])}}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="botoes">
            <a class="btn col btn-danger status p-1" value='' data-valores="{{json_encode($agenda)}}"
                cancelar>Cancelar</a>
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
                    status: 'cancelado pelo usuario'
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
.instituicoes {
    height: 95px;
    width: 500px;
}

.agendas {
    padding:10px 0px 10px 0px;
    align-items: center;
    display: flex;
    flex-direction: row;
}

.botoes {
    display: flex;
    flex-direction: column;
    align-items: center border;
}

.btn {
    padding: 10px;
    margin: 5px;
}

h2 {
    align-items: center;
}

td,
th {
    padding: 0px 15px 0px 15px;
    width: 50px;
    text-align: center;
}
</style>