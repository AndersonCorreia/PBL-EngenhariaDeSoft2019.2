<div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="listaEspera">
    <label class="custom-control-label" for="listaEspera">
        <div class="row col-12 m-0 pl-2 p-0">
            <div class="col-lg-9 col-12 m-0 p-0">
                <b>Nome da Instituição:</b> {{$agendamento['instituicao']}}
            </div>
            <div class="col-lg-3 col-12 m-0 p-0">
                <b>Ano e Turma:</b> {{$agendamento['ano_escolar']}} - {{$agendamento['turma']}}
            </div>
            <div class="col-lg-9 col-12 m-0 p-0">
                <b>Data:</b> {{date("d/m/Y", strtotime($agendamento['data'])) }}
            </div>
            <div class="col-lg-3 col-12 m-0 p-0">
                <b>Turno:</b> {{$agendamento['turno']}}
            </div>
        </div>
    </label>
    
</div>
