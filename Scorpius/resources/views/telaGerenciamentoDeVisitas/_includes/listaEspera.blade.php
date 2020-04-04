<div class= "row col-12 m-1 p-2 scorpius-border-shadow border-top border-shadow">
    <div class="row col-12 m-0 pl-2 p-0">
        <div class="col-lg-6 col-12 m-0 p-0">
            <b>Nome da Instituição:</b> {{$agendamento['instituicao']}}
        </div>
        <div class="col-lg-6 col-12 m-0 p-0">
            <b>Tipo da Instituição:</b> {{$agendamento['tipo_instituicao']}}   
        </div>
        <div class="col-lg-6 d-none d-md-block m-0 p-0">
            <b>Nivel de ensino:</b> {{$agendamento['ensino']}}
        </div>
        <div class="col-lg-6 col-4 m-0 p-0">
            <b>Turma:</b> {{$agendamento['turma']}}
        </div>
        <div class="col-6 col-lg-6 m-0 p-0">
            <b>Data:</b> {{date("d/m/Y", strtotime($agendamento['data'])) }}
        </div>
        <div class="col-6 col-lg-6 m-0 p-0">
            <b>Turno:</b> {{$agendamento['turno']}}
        </div>
    </div>
</div>