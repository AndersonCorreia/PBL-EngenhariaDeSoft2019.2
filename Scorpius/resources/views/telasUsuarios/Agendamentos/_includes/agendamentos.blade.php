@if($tipoUserLegenda["tipo"] == "institucional")
@foreach ($agendamentos as $item)
<div class=" col-md-6 m-0 p-0 my-3 col-12 px-3">
    <div class="col-12 px-4 row bg-white scorpius-border-shadow">
        <div class="col-8 m-0 my-1 p-0 pr-2">
            <div class='col-12 m-0 p-0'>
                <b>Instituição</b>
            </div>
            {{$item['instituicao']}}
        </div>
        <div class="col-4 m-0 mb-1 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Turma</b>
            </div>
            {{$item['turma']}}
        </div>
        <hr class="bg-light col-11 linha rounded p-0 m-0">
        <div class="col-4 my-1 m-0 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Data</b>
            </div>
            {{$item['data']}}
        </div>
        <div class="col-4 my-1 m-0 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Turno</b>
            </div>
            {{$item['turno']}}
        </div>
        <div class="col-4 m-0 mb-1 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Status</b>
            </div>
            {{$item['agendamentoStatus']}}
        </div>
    </div>
</div>
@endforeach 
@endif
@if($tipoUserLegenda["tipo"] == "visitante")
@foreach ($agendamentos as $item)
<div class="col-md-6 m-0 p-0 my-3 col-12 px-3">
    <div class="col-12 px-4 row bg-white scorpius-border-shadow">
        <div class="col-4 my-1 m-0 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Data</b>
            </div>
            {{$item['data']}}
        </div>
        <div class="col-4 my-1 m-0 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Turno</b>
            </div>
            {{$item['turno']}}
        </div>
        <div class="col-4 m-0 mb-1 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Status</b>
            </div>
            {{$item['agendamentoStatus']}}
        </div>
    </div>
</div>
@endforeach
@endif