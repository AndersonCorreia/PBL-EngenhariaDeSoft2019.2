<form id="form.agendamento" class="container-fluid m-0 p-3" method="POST"
    action="{{route('AgendarDiurnoInstituicao.post')}}">
    {{csrf_field()}}

    <div id="dados-agendamento">
        <p class="h5">Dados para o agendamento</p>
        <label class="mt-2" for="nome-instituicao">Selecione a instituição</label>
        <input id="nome-instituicao"  class="form-control" type="text" name="Instituicao" 
            placeholder="Nome da instituição" list="instList" required autofocus>
        <datalist id="instList">
            @if (($instituicoes ?? false))
                @foreach ($instituicoes as $inst)
                    <option class="opList" value="{{$inst['nome']}}" >
                @endforeach
            @endif
        </datalist>
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="turma">Turma</label>
                <input id="turma" name="turma" class="form-control" type="text" list="listTurma" placeholder="Nome da turma" required autofocus> 
                <datalist id="listTurma">
                
                    @if (($turmas ?? false))
                        @foreach ($turmas as $turma)
                            <option class="opList" value="{{$turma['nome']}}" >
                        @endforeach
                    @endif

                </datalist>
            </div>
            <div class="col-md-4">
                <label for="data">Data</label>
                <input class="form-control" type="date" id="data" max="{{$visitas['dataLimite']}}" name="data" required>
            </div>
            <div class="col-md-4">
            @if(($turno ?? "diurno")==="diurno") 
                <label for="turno">Turno</label>
                <select id="turno" name="turno" class="custom-select" placeholder="turno" required>
                    <option value="manhã">Manhã</option>
                    <option value="tarde">Tarde</option>
                </select>
            @else
                <label for="selectTurno">Turno</label>
                <input class="form-control" type="text" placeholder="Noturno" readonly>
            @endif
            </div>
        </div>
        <div id="dados-responsavel" class="mt-3">
            <p class="h5">Responsáveis pela turma durante a visitação</p>
            <div class="form-check mt-3 ml-4">
                <input class="form-check-input" type="checkbox" value="" id="incluirResponsavel">
                <label class="form-check-label" for="defaultCheck1">Sou um dos responsáveis</label>
            </div>
            <p class="h6 mt-3">Adicionar outros responsáveis</p>
            <div id="dados-responsavel-campos">
                <div class="row box mt-1">
                    <div class="col-md-7 nome-responsavel">
                        <input class="form-control nome" type="text" maxlength="40" name="responsavel1"
                            placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-4 cargo-responsavel">
                        <input class="form-control cargo" type="text" maxlength="40" name="cargo1" placeholder="Cargo"
                            pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-remover">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-2 ml-3">
                <button id="btn-adicionar" type="button" class="btn btn-success">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Adicionar
                </button>
            </div>
            <div id="observacoes" class="mt-3">
                <textarea name="observacoes" class="form-control" rows="3" placeholder="Observações"></textarea>
            </div>
        </div>
    </div>
    <div class="mt-3 mb-2 float-right" id="btns-finais">
        <button id="submit" type="submit" class="btn mr-2 btn-primary">
            <i class="fas fa-receipt    "></i>
            Agendar
        </button>
        <a href="#" class="btn btn-secondary">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancelar
        </a>
    </div>
    <!-- {{-- <div class="form-row col-sm">
        <span>
            <h5>Dados para o agendamento</h5>
        </span>
        <div class="form-group col-sm-12 d-block">
            <span>Instituição de Ensino</span>
            <div class="col-md-12 col-sm-9 m-0 p-0 float-sm-left">
                <input id="nomeInst" class="form-control" type="text" name="Instituicao"
                    placeholder="Nome da instituição" list="instList" required autofocus>
                <datalist id="instList">
                    @if (($instituicoes ?? false))
                    @foreach ($instituicoes as $inst)
                    <option class="opList" value="{{$inst['nome']}} ; Endereço: {{$inst['endereco']}}">
                    @endforeach
                @endif
    </datalist>
    </div>
    </div>
    <div class="form-group col-sm-4">
        <span>Turma</span><br>
        <input class="form-control" type="text" required>
    </div>
    <div class="form-group col-sm-4">
        <span>Data</span><br>
        <input class="form-control" type="date" id="data" max="{{$visitas['dataLimite']}}" name="data" required>
    </div>
    <div class="form-group col-sm-4">
        <span>Turno</span>
        <select id="turno" name="turno" id="turno" class="custom-select" placeholder="turno" required>
            <option value="manhã">Manhã</option>
            <option value="tarde">Tarde</option>
        </select>
    </div>
    <div class="dados-pessoais">
        <p>
            <h5>Responsáveis pela turma durante a visitação</h5>
        </p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="incluirResponsavel">
            <label class="form-check-label" for="defaultCheck1">Sou um dos responsáveis</label>
        </div>
        <p>
            <h6>Adicionar outros responsáveis</h6>
        </p>

        <p></p>
        <div class="row box">
            <div class="col-md-8">
                <input class="form-control nome" type="text" maxlength="40" name="responsavel"
                    placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
            </div>
            <div class="col-md-4">
                <input class="form-control cargo" type="text" maxlength="40" name="cargo" placeholder="Cargo"
                    pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
            </div>
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Adicionar
            </button>
            <button class="btn btn-danger">
                <i class="fa fa-minus" aria-hidden="true"></i>
                Remover
            </button>
        </div>
    </div>
    <div id="observacoes" class="mt-3">
        <textarea name="observacoes" class="form-control" rows="3" placeholder="Observações"></textarea>
    </div>
    <div>
        <button id="submit" type="submit" class="btn mr-2 btn-primary">
            <i class="fas fa-receipt    "></i>
            Agendar
        </button>
        <a href="#" class="btn btn-secondary">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancelar
        </a>
    </div>
    </div> --}} -->

</form>

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