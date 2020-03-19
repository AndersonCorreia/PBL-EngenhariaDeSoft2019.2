<div id="dados-agendamento" class="col m-0">
    <p class="h5">Dados para o agendamento</p>
    <label class="mt-2" for="nome-instituicao">Selecione a instituição</label>
    <select class="form-control" id="nome-instituicao" name="instituicao">
        @if (($instituicoes ?? false))
        @foreach ($instituicoes as $inst)
            <option value="{{$inst['instituicao_ID']}}"> {{$inst['nome']}} </option>
        @endforeach
        @endif
    </select>
    <div class="row mt-3">
        <div class="col-md-4">
            <label for="turma">Turma</label>
            <select id="turma" name="turma" class="form-control" required>
                @if (($turmas ?? false))
                @foreach ($turmas as $turma)
                    <option value="{{$turma['ID']}}"> {{$turma['nome']}} </option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-md-4">
            <label for="data">Data</label>
            <input class="form-control" type="date" id="data" min="{{$visitas['datas']['data0']}}"
                max="{{$visitas['datas']['dataLimite']}}" name="data" required>
        </div>
        <div class="col-md-4"> 
            <label for="turno">Turno</label>
            <select id="turno" name="turno" class="custom-select" placeholder="turno" required>
                <option value="manhã">Manhã</option>
                <option value="tarde">Tarde</option>
            </select>
        </div>
    </div>
    <div id="dados-responsavel" class="mt-3">
        <p class="h5">Responsáveis pela turma durante a visitação</p>
        <div class="form-check mt-3 ml-4">
            <input class="form-check-input" type="checkbox" value="true" name="incluirResponsavel" maxlenght="100" checked>
            <label class="form-check-label" for="defaultCheck1">Sou um dos responsáveis</label>
        </div>
        <p class="h6 mt-3">Adicionar outros responsáveis</p>
        <div id="dados-responsavel-campos">
            <div class="row box mt-1">
                <div class="col-md-7 nome-responsavel">
                    <input class="form-control nome" type="text" maxlength="40" name="responsavel[]"
                        placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$">
                </div>
                <div class="col-md-4 cargo-responsavel">
                    <input class="form-control cargo" type="text" maxlength="40" name="cargo[]" placeholder="Cargo"
                        pattern="[a-zA-ZÀ-Úà-ú ]+$$" >
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger btn-remover">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button id="btn-adicionar" type="button" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Adicionar
            </button>
        </div>
        <div id="observacoes" class="mt-3">
            <textarea name="observacoes" class="form-control" rows="3" maxlenght=100 placeholder="Observações"></textarea>
        </div>
    </div>
    <div class="mt-3 text-right" id="btns-finais">
        <button id="submit" type="submit" class="btn mr-2 btn-primary">
            <i class="fas fa-receipt    "></i>
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
    }

    #form.agendamento .form .dados-pessoais .box {
        padding: 2%;
    }

    form .dados-pessoais .btns {
        padding: 2%;
    }

    form span {
        color: black;
        text-decoration: none;
    }
</style>
@endsection

<script>

$('#form_agendamento').attr('action',{{route('AgendarDiurnoInstituicao.post')}});

</script>