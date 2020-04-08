@if($visita['agendamentoStatus'] == "confirmado")
    <div confirma>
        <p>{{$visita['instituicao']}}</p>
        <p>{{$visita['ano_escolar']}} - {{$visita['turma']}}</p>
        <p style="margin-top: -8px;"> Status: Confirmado</p>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-danger" name="{{$visita['agendamentoID']}}" data-toggle="modal"
            data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                <i class="fas fa-times"></i>
            </button>
            
        </div>
    </div>
        
@elseif($visita['agendamentoStatus'] == "pendente")
    <div pendente>
        <p>{{$visita['instituicao']}}</p>
        <p>{{$visita['ano_escolar']}} - {{$visita['turma']}}</p>
        <p style="margin-top: -8px;"> Status: Pendente</p>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" data-toggle="tooltip"
                title="Lista de Espera" data-target=".modal-lista-espera" lista>
                <i class="fas fa-list-ol"></i>
            </button>
            <button type="submit" class="btn btn-primary" name="{{$visita['agendamentoID']}}" data-toggle="tooltip" title="Confirmar" btnconf>
                <i class="fas fa-check"></i>
            </button>
            
            <button type="submit" class="btn btn-danger" name="{{$visita['agendamentoID']}}" data-toggle="modal"
                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
@elseif($visita['agendamentoStatus'] == "cancelado pelo usuario")
    <div cancelaU>
        <p>{{$visita['instituicao']}}</p>
        <p>{{$visita['ano_escolar']}} - {{$visita['turma']}}</p>
        <p style="margin-top: -8px;"> Status: Cancelado pelo Usuário</p>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" data-toggle="tooltip"
                title="Lista de Espera" data-target=".modal-lista-espera" data-day="$visita['data']"
                data-turn="$visita['turno']" lista>
                <i class="fas fa-list-ol"></i>
            </button>
        </div>
    </div>

@elseif($visita['agendamentoStatus'] == "cancelado pelo funcionario")
        <div cancelaF>
            <p>{{$visita['instituicao']}}</p>
            <p style="margin-top: -8px;"> Status: Cancelado pelo Funcionário</p>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" data-toggle="tooltip"
                    title="Lista de Espera" data-target=".modal-lista-espera" data-day="$visita['data']"
                    data-turn="$visita['turno']" lista>
                    <i class="fas fa-list-ol"></i>
                </button>
            </div>
        </div>
@else
@endif

@section('js')
<script>
    jQuery(document).ready(function() {
        $('[btnconf]').click(e => {
            e.preventDefault()
            let textButton = $(e.target).text()
                $('[confirma]').append('<input type="hidden" name="_method" value="PUT">')
                let url =
                    "{{ route('confirmaAgendamento') }}"; 
                url = url.replace(":id", valorAtual
                    .ID); 
                $('[confirma]').attr('action', url)
                $('[btnconf]').unbind('click').click()
                $('[btnconf]').submit()
            }
        })

        $('[bntcanc]').click(e => {
            e.preventDefault()
            let value = e.currentTarget.value
            let url =
                "{{ route('cancelaAgendamento') }}"; 
            url = url.replace(":id", value); /
            window.location.href = url
            
        })
        $('[btnlistaEDT]').click(e => {
            e.preventDefault()
            let value = e.currentTarget.value
            let url =
                "{{ route('escolherListaEspera') }}"; 
            url = url.replace(":id", value); /
            window.location.href = url
        })
    })

<script>
@endsection