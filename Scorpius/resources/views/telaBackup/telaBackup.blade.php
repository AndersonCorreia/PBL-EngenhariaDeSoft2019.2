@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Realizar Backup')

@section('conteudo')
{{csrf_field()}}
{{ method_field('POST') }}
<!-- Modal Confirmação -->
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

<!-- Modal Diretorio -->
<div class="modal fade" id="modalDiretorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Como Escolher um Diretório?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Para realizar o backup do sistema, você deve escolher uma pasta válida.</p>
                <p>Cheque a pasta que será escolhida e selecione seu caminho(diretório).</p>
                <p>Exemplo: <strong>C:\User\...\Desktop</strong></p>
                <small class="text-danger">Lembre de colocar o caminho completo e correto!</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3">
        <form>
        <meta name="csrf-token" content="{{csrf_token()}}">  
            <div class="row m-0"><!--campo botões-->
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group pl-4">
                        <i class="fas fa-cloud-download-alt fa-10x pl-4" style="color: 008BF2;"></i>
                    </div>
                    <div class="form-group pt-4">
                        <label for = "diretorio"> Diretório de Backup </label>
                        <button type="button" class="btn btn-secondary" data-target="#modalDiretorio" data-toggle="modal"><i class="far fa-lg fa-question-circle"></i></button>
                        <input type = "text" class = "form-control" name="diretorio" id = "diretorio" placeholder ="C:\..." >
                    </div>
                    <div class="form-group pt-2">
                        <button type="button" class="btn btn-success form-control" value="backup" data-toggle="modal"
                                data-target="#modalExemplo" backup>Realizar Backup Agora <i class="fa fa-send"></i>
                        </button>
                    </div>
                    <div class="form-group pt-2">
                        <button type="submit" value="cancelar" name="cancelar" class="btn btn-danger form-control" cancelar>Cancelar
                        </button>
                    </div>            
                </div>
                <div class="col-md-4"></div>       
            </div>
        </form>
    </div>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function() {


    $('[backup]').click(e=>{
        $('.alert').hide()
    })

    $('[salvarMudanca]').click(e=>{
        e.preventDefault()
        let dir = $('#diretorio').val()
        console.log(dir)
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

}
</style>
