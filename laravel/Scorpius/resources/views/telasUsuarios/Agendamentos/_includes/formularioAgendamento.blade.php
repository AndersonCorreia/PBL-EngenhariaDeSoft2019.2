<form id="form.agendamento" class="container-fluid m-0 p-2" method="POST" action="{{route('AgendarDiurnoInstituicao.post')}}">
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-sm">
            <span><h5>Dados para o agendamento</h5></span>
            <div class="form-group col-sm-12 d-block">
                <span>Instituição de Ensino</span>
                <div class="col-md-12 col-sm-9 m-0 p-0 float-sm-left">
                    <input id="nomeInst"  class="form-control" type="text" name="Instituicao" 
                    placeholder="Nome da instituição" list="instList" required autofocus>
                    <datalist id="instList">
                    @if (($instituicoes ?? false))
                        @foreach ($instituicoes as $inst)
                            <option class="opList" value="{{$inst['nome']}} ; Endereço: {{$inst['endereco']}}" >
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
            <div class="form-group col-sm-12 dados-pessoais">
                <p><h5>Responsáveis pela turma durante a visitação</h5></p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="incluirResponsavel">
                    <label class="form-check-label" for="defaultCheck1">Sou um dos responsáveis</label>
                </div>
                <p><h6>Adicionar outros responsáveis</h6></p>
                
                <div class="row btns col-md-12">
                    <button type="button" class="btn btn-success mr-2 btn_add">Adicionar</button>
                </div>
                <p></p>
                <div class="row box">
                    <div class="col-md-8 m-0">
                        <input class="form-control nome"  type="text" maxlength="40" name="responsavel[]" 
                        placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control cargo"  type="text" maxlength="40" name="cargo[]" 
                        placeholder="Cargo" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class='col-md-1'>
                        <button type="button" class="btn btn-secondary btn_remove">-</button>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observações"></textarea>
            </div>
            <div class="col-md-7 input-group-append mt-2">
                <button id="submit" type="submit" class="btn mr-2 btn-primary">Agendar</button>
                <a href="#"><button type="button" class="btn btn-danger">Cancelar</button> </a>
            </div>
        </div>
    </fieldset>
</form>

@section('css')
<style type="text/css">
    form .dados-pessoais{
        padding:2%;
    }
    #form.agendamento .form .dados-pessoais .box{
        padding:2%;
    }
    form .dados-pessoais .btns{
        padding:2%;
    }
    form span{
        color: black;
        text-decoration: none;
    }
</style>
@endsection