<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="listaEspera">
    <label class="custom-control-label" for="listaEspera">
        <div class="row col-12 m-0 pl-2 p-0">
            <div class="col-lg-6 col-12 m-0 p-0">
                <b>Nome da Instituição:</b> {{$agendamento['instituicao']}}
            </div>
            <div class="col-lg-6 col-6 m-0 p-0">
                <b>Ano e Turma:</b> {{$agendamento['ano_escolar']}} - {{$agendamento['turma']}}
            </div>
            <div class="col-6 col-lg-6 m-0 p-0">
                <b>Data:</b> {{date("d/m/Y", strtotime($agendamento['data'])) }}
            </div>
            <div class="col-6 col-lg-6 m-0 p-0">
                <b>Turno:</b> {{$agendamento['turno']}}
            </div>
        </div>
    </label>
    
</div>
