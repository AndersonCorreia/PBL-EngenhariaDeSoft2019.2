<meta name="csrf-token" content="{{csrf_token()}}">
<form method="POST" action="{{route('confirma.post')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('POST') }}

    <!-- Modal confirmar -->
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
                                <button type="button" class="btn btn-warning" id="btnVisualizar"
                                    data-detalhe='<?= json_encode($exposicao); ?>'>
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-primary" id="btnEditar"
                                    data-detalhe='<?=json_encode($exposicao);?>'>
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


<!-- modal cadastro -->

<div class="modal fade" method="POST" action="{{route('cadastroEvento')}}" id="cadastrarModal" tabindex="-1"
    role="dialog" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarModalLabel">CADASTRO DE NOVO EVENTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bg-white p-3">
                    <div class="col-12 m-0 p-0">
                        <div class="container-fluid bg-white shadow p-3"
                            style="border-bottom-right-radius: 20px;
                        border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px; float: middle">
                            <form method="POST" action="{{route('cadastroEvento')}}" enctype="multipart/form-data">
                                <meta name="csrf-token" content="{{csrf_token()}}">
                                {{csrf_field()}}
                                {{ method_field('POST') }}
                                <div class="row col-12 p-3">
                                    <div class="col-md-12">
                                        <div class="form-group" style="padding-left: 20px;">
                                            <label for="nome_campo" class="col-form-label ">Nome:</label>
                                            <input type="text" class="form-control" name="titulo" id="nome_campo" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding-left: 20px;">
                                            <label for="tipoEvento_campo" class="col-form-label">Tipo de Evento:</label>
                                            <select class="form-control" id="tipoEvento_campo" name="evento">
                                                <option selected></option>
                                                <option value="atividade diferenciada">atividade diferenciada</option>
                                                <option value="atividade permanente">atividade permanente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding-left: 20px;">
                                            <label for="temaEvento_campo" class="col-form-label">Tema do Evento:</label>
                                            <select class="form-control" id="temaEvento_campo" name="tema">
                                                <option selected></option>
                                                <option value="biodiversidade">Biodiversidade</option>
                                                <option value="astronomia">Astronomia</option>
                                                <option value="origem do humano">Evolução Humana</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 p-3">
                                    <div class="col-md-12">
                                        <div class="form-group" style="padding-left: 20px;">
                                            <label for="descricao_campo" class="col-form-label">Descrição do
                                                Evento:</label>
                                            <textarea class="form-control" id="descricao_campo" name="descricao"></textarea>
                                        </div>
                                    </div>
                                 
                                    <div class="row col-12 p-3">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding-left: 20px;">
                                                <label for="limiteVagas_campo" class="col-form-label">Limite de
                                                    Vagas:</label>
                                                <input type="number" class="form-control" name="quantidade" id="limiteVagas_campo"
                                                    max="40" min="0" />
                                            </div>
                                        </div>
                                        <div clas="col-md-6">
                                            <div class="form-group" style="padding-left: 15px; width: 155px;">
                                                <label for="turno_campo" class="col-form-label">Turno:</label>
                                                <select class="form-control" id="turno_campo" name="turno">
                                                    <option selected></option>
                                                    <option value="diurno">diurno</option>
                                                    <option value="noturno">noturno</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 p-3">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding-left: 20px;">
                                                <label for="periodo_inicio_campo" class="col-form-label">Data
                                                    Início:</label>
                                                <input type="date" class="form-control" name="data_inicial" id="periodo_inicio_campo" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="periodo_termino_campo" class="col-form-label">Data
                                                    Termino:</label>
                                                <input type="date" class="form-control" name="data_final" id="periodo_termino_campo" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 p-3">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding-left: 20px;">
                                                <label for="imagem_campo" class="col-form-label">Imagem da
                                                    Atividade:</label>
                                                <input type="file" name="imagem" class="form-control" id="imagem_campo"
                                                    style="width: 320px;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 p-3">
                                        <div class="col-md-8" style="padding-left: 60px">
                                            <button type="button" class="btn btn-danger" cancelar>Cancelar</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success" confirmar>Cadastrar</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts._includes.footer')
@section('js')
<script>
$(document).ready(function() {
    let valorAtual = null
    $('.botoes #btnVisualizar').click(e => {
        e.preventDefault()
        $('#cadastrarModal').modal('show')
        valorAtual = $(e.currentTarget).data('detalhe')
        console.log(valorAtual)
        if (valorAtual.titulo) {
            $('#nome_campo').val(valorAtual.titulo).prop('disabled', true);
        } else {
            $('#nome_campo').val('').prop('disabled', true);
        }
        if (valorAtual.tipo_evento) {
            $('#tipoEvento_campo').val($(`option:contains(${valorAtual.tipo_evento})`).val()).prop(
                'disabled', true);
        } else {
            $('#tipoEvento_campo').prop('disabled', true).val($(`option:selected`).val())
        }
        if (valorAtual.tema_evento) {
            $('#temaEvento_campo').val($(`option:contains(${valorAtual.tema_evento})`).val()).prop(
                'disabled', true);
        } else {
            $('#temaEvento_campo').val($(`option:selected`).val()).prop('disabled',
                true);
        }
        if (valorAtual.descricao) {
            $('#descricao_campo').val(valorAtual.descricao).prop('disabled', true);
        } else {
            $('#descricao_campo').val('').prop('disabled', true);
        }
        if (valorAtual.quantidadeEscritos) {
            $('#limiteVagas_campo').val(valorAtual.quantidadeEscritos).prop('disabled', true);
        } else {
            $('#limiteVagas_campo').val(0).prop('disabled', true);
        }
        if (valorAtual.turno) {
            $("#turno_campo").val($(`option:contains(${valorAtual.turno})`).val()).prop('disabled',
                true);
        } else {
            $("#turno_campo").prop('disabled', true).val($(`option:selected`).val())
        }
        if (valorAtual.data_inicial) {
            $('#periodo_inicio_campo').val(valorAtual.data_inicial).prop('disabled', true);
        } else {
            $('#periodo_inicio_campo').prop('disabled', true).val('dd-mm-aaaa')
        }
        if (valorAtual.data_final) {
            $('#periodo_termino_campo').val(valorAtual.data_final).prop('disabled', true);
        } else {
            $('#periodo_termino_campo').prop('disabled', true).val('dd-mm-aaaa')
        }
        $('#imagem_campo').parent().hide()
        $('[confirmar]').hide()
        $('[cancelar]').hide()
    })
    $('.botoes #btnEditar').click(e => {
        e.preventDefault()
        $('#cadastrarModal').modal('show')
        valorAtual = $(e.currentTarget).data('detalhe')
        console.log(valorAtual)
        if (valorAtual.titulo) {
            $('#nome_campo').val(valorAtual.titulo).prop('disabled', false);
        } else {
            $('#nome_campo').val('').prop('disabled', false);
        }
        if (valorAtual.tipo_evento) {
            $('#tipoEvento_campo').val($(`option:contains(${valorAtual.tipo_evento})`).val()).prop(
                'disabled', false);
        } else {
            $('#tipoEvento_campo').prop('disabled', false).val($(`option:selected`).val())
        }
        if (valorAtual.tema_evento) {
            $('#temaEvento_campo').val($(`option:contains(${valorAtual.tema_evento})`).val()).prop(
                'disabled', false);
        } else {
            $('#temaEvento_campo').val($(`option:selected`).val()).prop('disabled',
                false);
        }
        if (valorAtual.descricao) {
            $('#descricao_campo').val(valorAtual.descricao).prop('disabled', false);
        } else {
            $('#descricao_campo').val('').prop('disabled', false);
        }
        if (valorAtual.quantidadeEscritos) {
            $('#limiteVagas_campo').val(valorAtual.quantidadeEscritos).prop('disabled', false);
        } else {
            $('#limiteVagas_campo').val(0).prop('disabled', false);
        }
        if (valorAtual.turno) {
            $("#turno_campo").val($(`option:contains(${valorAtual.turno})`).val()).prop('disabled',
                false);
        } else {
            $("#turno_campo").prop('disabled', false).val($(`option:selected`).val())
        }
        if (valorAtual.data_inicial) {
            $('#periodo_inicio_campo').val(valorAtual.data_inicial).prop('disabled', false);
        } else {
            $('#periodo_inicio_campo').prop('disabled', false).val('dd-mm-aaaa')
        }
        if (valorAtual.data_final) {
            $('#periodo_termino_campo').val(valorAtual.data_final).prop('disabled', false);
        } else {
            $('#periodo_termino_campo').prop('disabled', false).val('dd-mm-aaaa')
        }
        $('#imagem_campo').parent().show()
        $('[confirmar]').show().text("Atualizar")
        $('[cancelar]').show()
    })

    $('[confirmar]').click(e=>{
        e.preventDefault()
        let textButton = $(e.target).text()
        if(textButton == 'Cadastrar'){

        }else{
            $.ajax({
                type:,
                data:,
                
            })            
        }

    })


    $('[cadastro]').click(e => {

        e.preventDefault()

        $('#cadastrarModal').modal('show')

        $('#nome_campo').prop('disabled', false).val('')

        $('#tipoEvento_campo').prop('disabled', false).val($(`option:selected`).val())

        $('#temaEvento_campo').prop('disabled', false).val($(`option:selected`).val())

        $('#descricao_campo').prop('disabled', false).val('')

        $('#limiteVagas_campo').prop('disabled', false).val(0)

        $("#turno_campo").prop('disabled', false).val($(`option:selected`).val())

        $('#periodo_inicio_campo').prop('disabled', false).val('dd-mm-aaaa')

        $('#periodo_termino_campo').prop('disabled', false).val('dd-mm-aaaa')

        $('#imagem_campo').parent().show()
        $('[confirmar]').show().text("Cadastrar")
        $('[cancelar]').show()
    })



    $('#cadastrarModal [salvarMudanca]').click(e => {
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
    width: 1000px;
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

.botoes>.btn {
    width: 40px;
    height: 40px;
    padding: 10px;
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

th {
    padding: 6px 0px 6px 0px;
}
</style>