@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Realizar Backup')

@section('conteudo')
{{csrf_field()}}
{{ method_field('POST') }}
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Backup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja confirmar o backup?
                <div class="alert alert-danger" role="alert" style='display:none'>Diretório Incorreto.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" salvarMudanca>Confirmar</button>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3">
        <p class="h3">Realizar Backup</p>
        <fieldset class="form-group">
        <meta name="csrf-token" content="{{csrf_token()}}">
            <div class="col">
                <legend class="col-form-label col-sm-2 pt-0">Opções:</legend>
                <div class="col-auto form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                        value="diariamente" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Diariamente
                    </label>
                </div>
                <div class="col-auto form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                        value="semanalmente">
                    <label class="form-check-label" for="exampleRadios2">
                        Semanalmente
                    </label>
                </div>
                <div class="col-auto form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                        value="mensalmente">
                    <label class="form-check-label" for="exampleRadios3">
                        Mensalmente
                    </label>
                </div>
                <div class="col-3 my-1">
                    <label for="data" class="col-form-label">Data</label>
                    <input type="date" class="form-control" name="data" id="data" />
                </div>
                <div class="col-3 my-1">
                    <label for="dia">Dia da Semana</label>
                    <select class="custom-select mr-sm-2" id="dia">
                        <option selected>Escolher...</option>
                        <option value="seg">Segunda</option>
                        <option value="ter">Terça</option>
                        <option value="quar">Quarta</option>
                        <option value="quin">Quinta</option>
                        <option value="sex">Sexta</option>
                        <option value="sab">Sábado</option>
                        <option value="dom">Domingo</option>
                    </select>
                </div>
                <?php $horario = array('01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00','24:00'); ?>

                <div class="col-3 my-1">
                    <label for="horario">Horário</label>
                    <select class="custom-select mr-sm-2" id="horario">
                        <option selected>Escolher...</option>
                        @foreach( $horario as $key=>$value)
                        <option value="{{$key+1}}"> {{$value}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="row col-12 p-3">
                    <div class="col-md-12">
                        <div class="col-sm-3 my-1">
                            <label for="diretorio">Diretório de backup</label>
                            <input type="text" class="form-control" id="diretorio" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success col-2" value="backup" data-toggle="modal"
                        data-target="#modalExemplo" backup>
                        Backup
                        <i class="fa fa-send"></i>
                    </button>
                    <button type="submit" value="alterar" name="salvar" class="btn btn-primary col-2"
                        salvar>Salvar</button>
                    <!--botao p/ confirmar os dados-->
                    <button type="submit" value="cancelar" name="cancelar" class="btn btn-danger col-2"
                        cancelar>Cancelar</button>
                    <!--botao p/ confirmar os dados-->

                </div>
            </div>
        </fieldset>
    </div>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function() {
    $('input[type=radio]').click(e => {
        if (e.currentTarget.value == "diariamente") {
            $('#horario').parent().show()
            $('select#dia').parent().hide()
            $('#data').parent().hide()
        } else if (e.currentTarget.value == "semanalmente") {
            $('select#dia').parent().show()
            $('#data').parent().hide()
            $('#horario').parent().hide()
        } else if (e.currentTarget.value == "mensalmente") {
            $('select#dia').parent().hide()
            $('#data').parent().show()
            $('#horario').parent().hide()
        }
    })

    $('[backup]').click(e=>{
        $('.alert').hide()
    })

    $('[salvarMudanca]').click(e=>{
        e.preventDefault()
        let dir = $('#diretorio').val()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                url: "{{route('realizarBackup')}}",
                method: 'POST',
                data: {
                    diretorio:dir
                },
                success(retorno) {
                    console.log(retorno)
                    location.reload();
                },
                error(erro) {
                    console.log(erro)
                    $('.alert').show()
                }

            })
    })


})
</script>

@endsection

<style>
button[type=submit] {

    width: 300px;
}
</style>