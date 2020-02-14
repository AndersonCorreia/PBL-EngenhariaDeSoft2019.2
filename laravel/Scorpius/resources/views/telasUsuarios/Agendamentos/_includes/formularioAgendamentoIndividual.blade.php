<form id="form.agendamento" class="container-fluid m-0 p-2" method="POST"
    action="{{route('AgendarDiurnoVisitante.post')}}">
    {{csrf_field()}}
    <div id="dados-agendamento">
        <p class="h5">Dados para o agendamento</p>
        <div id="data-turno" class="row">
            <div class="col-md-6">
                <label for="inputData">Data</label>
                <input class="form-control" type="date" id="data" max="{{$visitas['dataLimite']}}" name="data" required>
            </div>
            <div class="col-md-6">
                <label for="selectTurno">Turno</label>
                <select id="turno" name="turno" id="turno" class="custom-select" placeholder="turno" required>
                    <option value="manhã">Manhã</option>
                    <option value="tarde">Tarde</option>
                </select>
            </div>
        </div>
    </div>
    <div id="dados-visitante" class="mt-4 dados-pessoais">
        <p class="h6">Dados dos visitantes</p>
        <div class="row">
            <div class="col-md-4">Nome</div>
            <div class="col-md-4">RG</div>
            <div class="col-md-4">Idade</div>
        </div>
        <div id="dados-visitantes-campos">
            <div class="row box mb-2">
                <div class="col-md-4 nome-visitante">
                    <input id="visitante" class="form-control" type="text" maxlength="40" name="visitante1"
                        placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                </div>
                <div class="col-md-3 rg-visitante">
                    <input id="RG" class="form-control" type="text" maxlength="15" name="rg1"
                        placeholder="xxxxxxxxxxxxxxxxx" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                </div>
                <div class="col-md-4 idade-visitante">
                    <input id="idade" class="form-control" type="text" maxlength="3" name="idade1" placeholder="xxx"
                        pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                </div>
                <div class="col-md-1">
                    <button id="btn-remover" type="button" class="btn btn-danger btn-remove">
                        <i class="fas fa-minus    "></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="ml-3 mt-2">
            <button id="btn-adicionar" type="button" class="btn btn-success btn_add">
                <i class="fas fa-plus    "></i>
                Adicionar
            </button>
        </div>
    </div>
    <div id="observacoes" class="mt-3">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observações"></textarea>
    </div>
    <div class="adicionar-cancelar mt-2 float-right">
        <button id="submit" type="submit" class="btn mr-2 btn-primary">
            <i class="fas fa-receipt    "></i>
            Solicitar agendamento</button>
        <a href="" class="btn btn-secondary">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancelar</a>
    </div>

    {{-- 
    <fieldset>
        <div class="form-group col-sm-12 visitantes">
            <span><h5>Dados para o agendamento</h5></span>
            <div class="row">
                <div class="col-md-6">
                    <label for="inputData">Data</label>
                    <input class="form-control" type="date" id="data" max="{{$visitas['dataLimite']}}" name="data"
    required>
    </div>
    <div class="col-md-6">
        <label for="selectTurno">Turno</label>
        <select id="turno" name="turno" id="turno" class="custom-select" placeholder="turno" required>
            <option value="manhã">Manhã</option>
            <option value="tarde">Tarde</option>
        </select>
    </div>
    </div>

    </div>
    <div class="form-group col-sm-12 dados-pessoais">
        <p>
            <h6>Dados dos visitantes</h6>
        </p>
        <div class="row">
            <div class="col-md-3">
                <label for="visitante">Nome</label>
                <input id="visitante" class="form-control" type="text" maxlength="40" name="Visitante[]"
                    placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
            </div>
            <div class="col-md-3">
                <label for="RG">RG</label>
                <input id="RG" class="form-control" type="text" maxlength="15" name="RG[]"
                    placeholder="xxxxxxxxxxxxxxxxx" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
            </div>
            <div class="col-md-3">
                <label for="idade">Idade </label>
                <input id="idade" class="form-control" type="text" maxlength="3" name="idade[]" placeholder="xxx"
                    pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
            </div>
            <div class="col-md-3 mt-4 pt-1">
                <button id="btn-remove" type="button" class="btn btn-secondary btn_remove">-</button>
            </div>
        </div>
        <div class=" btns  float-right">
            <button type="button" class=" mt-1 btn btn-success mr-2 btn_add">Adicionar</button>
        </div>
    </div>
    <div class="form-group col-sm-12">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observações"></textarea>
    </div>
    <div class="btn-lg btn-block">
        <button id="submit" type="submit" class="btn mr-2 btn-primary">Solicitar agendamento</button>
        <a href="#"><button type="button" class="btn btn-danger">Cancelar</button> </a>
    </div>
    </div>
    </fieldset> --}}
</form>

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