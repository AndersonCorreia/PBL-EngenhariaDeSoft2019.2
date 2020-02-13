<form id="form.agendamento" class="col-lg-10 col-xl-9 col-12 m-2" method="POST" action="{{route('AgendarDiurnoInstituicao.post')}}">
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-msm">
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
                    <option value="noite">Noite</option>
                </select>
            </div>
            <div class="form-group col-sm-12 responsaveis">
                <span><h6>Responsáveis pela turma durante a visitação</h6></span>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="incluirResponsavel">
                    <label class="form-check-label" for="defaultCheck1">Sou um dos responsáveis</label>
                </div>
                <div class="row box">
                    <div class="col-md-7 m-0">
                        <input id="resp" class="form-control"  type="text" maxlength="40" name="Responsavel" 
                        placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-3">
                        <input id="cargo" class="form-control"  type="text" maxlength="40" name="Cargo" 
                        placeholder="Cargo" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary clone">+</button>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary btn_remove">-</button>
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
    form .responsaveis{
        padding:2%;
    }
    form .responsaveis .box{
        padding:1%;
    }
    form span{
        color: black;
        text-decoration: none;
    }
</style>
@endsection