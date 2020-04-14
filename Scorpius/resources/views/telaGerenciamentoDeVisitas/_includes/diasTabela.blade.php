@if($visita['agendamentoStatus'] == "confirmado")
    <div confirma>
        <p>{{$visita['instituicao']}}</p>
        <p>{{$visita['ano_escolar']}} - {{$visita['turma']}}</p>
        <p style="margin-top: -8px;"> Status: Confirmado</p>
            <div class="btn-group" role="group">
            <button type="buttom" class="btn btn-danger" name="{{$visita['agendamentoID']}}" data-toggle="modal"
            data-target="#modal-cancelamento{{$visita['agendamentoID']}}" data-toggle="tooltip" title="Cancelar" btncanc>
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
                title="Lista de Espera" data-target="#modal-lista-espera{{$visita['agendamentoID']}}" lista>
                <i class="fas fa-list-ol"></i>
            </button>
            <form action="{{route('confirmaAgendamento')}}" method="POST">
                @csrf
                <input type="hidden" name="agendamentoID" value="{{$visita['agendamentoID']}}">
                <input type="hidden" name="usuarioID" value="{{$visita['usuarioID']}}">
                <button type="submit" class="btn btn-primary"
                    data-toggle="tooltip" title="Confirmar" btnconf>
                    <i class="fas fa-check"></i>
                </button>
            </form>
            <button type="buttom" class="btn btn-danger" data-toggle="modal" data-target="#modal-cancelamento{{$visita['agendamentoID']}}"
                data-toggle="tooltip" title="Cancelar" btncanc>
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
                title="Lista de Espera" data-target="#modal-lista-espera{{$visita['agendamentoID']}}" data-day="$visita['data']"
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
                    title="Lista de Espera" data-target="#modal-lista-espera{{$visita['agendamentoID']}}" data-day="$visita['data']"
                    data-turn="$visita['turno']" lista>
                    <i class="fas fa-list-ol"></i>
                </button>
            </div>
        </div>
@else
@endif