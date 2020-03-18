<div id="dados-agendamento">
    <p class="h5">Dados para o agendamento</p>
    <div id="data-turno" class="row">
        <div class="col-md-6">
            <label for="inputData">Data desejada</label>
            <input class="form-control" type="date" id="data" min="{{$visitas['datas']['data0']}}"
                max="{{$visitas['datas']['dataLimite']}}" name="data" required>
        </div>
        <div class="col-md-6">
        @if(($turno ?? "diurno")==="diurno") 
            <label for="selectTurno">Turno</label>
            <select id="turno" name="turno" class="custom-select" placeholder="turno" required>
                <option value="manhã">Manhã</option>
                <option value="tarde">Tarde</option>
            </select>
        @else
            <label for="turno">Turno</label>
            <input class="form-control" type="text" placeholder="Noturno" readonly>
            <input type='hidden' name="turno" value= "noite">
        @endif
        </div>
    </div>
    <div id="dados-visitante" class="mt-4 dados-pessoais">
        <p class="h6">Dados dos visitantes</p>
        <div class="row">
            <div class="col-md-6">Nome</div>
            <div class="col-md-3">RG</div>
            <div class="col-md-2">Idade</div>
        </div>
        <div id="dados-visitantes-campos">
            <div class="row box mb-2">
                <div class="col-md-6 nome-visitante">
                    <input id="visitante" class="form-control" type="text" maxlength="40" name="visitante[]"
                        placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$"
                        value = {{session("nome")}} required>
                </div>
                <div class="col-md-3 rg-visitante">
                    <input id="RG" class="form-control" type="text" minlength="14" maxlength="15" name="RG[]"
                        placeholder="XXXXXXXXXX" required>
                </div>
                <div class="col-md-2 idade-visitante">
                    <input id="idade" class="form-control" type="number" max=120 name="idade[]" placeholder="xx"
                        pattern="[0-9{2,3}]+$$" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-remover">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button id="btn-adicionarInd" type="button" class="btn btn-success btn_add">
                <i class="fas fa-plus"></i>
                Adicionar
            </button>
        </div>
    </div>
    @if(($turno ?? "diurno")==="noturno") 
    <div id="observacoes" class="mt-3">
        <textarea class="form-control" name="observacao" rows="3" maxlenght=100 placeholder="Observações"></textarea>
    </div>
    @endif
    <div class="adicionar-cancelar mt-2 text-right">
        <button id="submit" type="submit" class="btn mr-2 btn-primary">
            <i class="fas fa-receipt"></i>
            Agendar
        </button>
        <a href={{route('dashboard')}} class="btn btn-secondary">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancelar
        </a>
    </div>
</div>
@section('css')
<style type="text/css">
    form .dados-pessoais {
        padding: 2%;
        margin-top: 14;
    }

    form span {
        color: black;
        text-decoration: none;
    }
</style>

@endsection

<script>
$('#form_agendamento')
    .attr('action',{{ ($turno ?? "diurno") == 'diurno' ?
            route('AgendarDiurnoVisitante.post') : route('AgendarNoturno.post')}});
</script>
