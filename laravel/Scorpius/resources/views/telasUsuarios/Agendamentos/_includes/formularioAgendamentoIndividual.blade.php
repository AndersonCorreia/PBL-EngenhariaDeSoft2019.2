<form id="form.agendamento" class="container-fluid m-0 p-2" method="POST" 
action="{{route('AgendarDiurnoVisitante.post')}}">
    {{csrf_field()}}
    <fieldset>
        <div class="form-group col-sm-12 visitantes">
            <span><h5>Dados para o agendamento</h5></span>
            <div class="row">
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
            <div class="form-group col-sm-12 dados-pessoais">
                <p><h6>Dados dos visitantes</h6></p>
                <div class="row btns col-md-12">
                    <button type="button" class="btn btn-success mr-2 btn_add">Adicionar</button>
                </div>
                <div class="row box">
                    <div class="col-md-5 m-0">
                        <span>Nome</span>
                    </div>
                    <div class="col-md-3">
                        <span>RG</span>
                    </div>
                    <div class="col-md-2">
                        <span>Idade</span>
                    </div>
                    <div class="col-md-5 m-0">
                        <input id="visitante" class="form-control"  type="text" maxlength="40" name="Visitante[]" 
                        placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-3">
                        <input id="RG" class="form-control"  type="text" maxlength="15" name="RG[]" 
                        placeholder="xxxxxxxxxxxxxxxxx" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-2">
                        <input id="idade" class="form-control"  type="text" maxlength="3" name="idade[]" 
                        placeholder="xxx" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class='col-md-1'>
                        <button type="button" class="btn btn-secondary btn_remove">-</button>
                    </div>
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
    </fieldset>
</form>

@section('css')
<style type="text/css">
    form .dados-pessoais{
        padding:2%;
        margin-top: 14;
    }
    form span{
        color: black;
        text-decoration: none;
    }
</style>
@endsection