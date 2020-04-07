    @if($visita['agendamentoStatus'] == "confirmado")
        <p>{{$visita['instituicao']}}</p>
        <p style="margin-top: -8px;"> Status: Confirmado</p>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
            data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                <i class="fas fa-times"></i>
            </button>
        </div>

    @elseif($visita['agendamentoStatus'] == "pendente")
        <p>{{$visita['instituicao']}}</p>
        <p style="margin-top: -8px;"> Status: Pendente</p>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" data-toggle="tooltip"
                title="Lista de Espera Desativada" data-target=".modal-lista-espera" lista disabled>
                <i class="fas fa-list-ol"></i>
            </button>
            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Confirmar" btnconf>
                <i class="fas fa-check"></i>
            </button>
            <button type="submit" class="btn btn-danger" id="cancelamento" data-toggle="modal"
                data-target=".modal-cancelamento" data-toggle="tooltip" title="Cancelar" btncanc>
                <i class="fas fa-times"></i>
            </button>
        </div>
    @else
    @endif
            
        
    <!-- @forelse ($agendamentos_cancelados_usuario as $agendamento)
            <p>{{$agendamento['instituicao']}}</p>
            <p style="margin-top: -8px;"> Status: Cancelado pelo Usuário</p>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" data-toggle="tooltip"
                    title="Lista de Espera" data-target=".modal-lista-espera" data-day="$agendamento['data']"
                    data-turn="$agendamento['turno']" lista>
                    <i class="fas fa-list-ol"></i>
                </button>
            </div>
    @empty
    @endforelse

    @forelse ($agendamentos_cancelados_funcionario as $agendamento)
            <p>{{$agendamento['instituicao']}}</p>
            <p style="margin-top: -8px;"> Status: Cancelado pelo Funcionário</p>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-secondary" id="lista-espera" data-toggle="modal" data-toggle="tooltip"
                    title="Lista de Espera" data-target=".modal-lista-espera" data-day="$agendamento['data']"
                    data-turn="$agendamento['turno']" lista>
                    <i class="fas fa-list-ol"></i>
                </button>
            </div>
    @empty
    @endforelse -->
