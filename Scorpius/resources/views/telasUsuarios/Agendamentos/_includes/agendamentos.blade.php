@if($tipoUserLegenda["tipo"] == "institucional")
{{-- @foreach ($agendamentos as $item) --}}
<div class=" col-md-6 m-0 p-0 my-3 col-12 p-3">
    <div class="col-12 px-4 row bg-white scorpius-border-shadow">
        <div class="col-7 m-0 my-1 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Instituição :</b>
            </div>
            {Instituição}
        </div>
        <div class="col-5 m-0 mb-1 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Turma :</b>
            </div>
            {Turma}
        </div>
        <hr class="bg-light col-11 linha rounded p-0 m-0">
        <div class="col-4 my-1 m-0 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Data :</b>
            </div>
            {data}
        </div>
        <div class="col-3 my-1 m-0 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Turno :</b>
            </div>
             {turno}
        </div>
        <div class="col-5 m-0 mb-1 p-0">
            <div class='col-12 m-0 p-0'>
                <b>Status :</b>
            </div>
            {status}
        </div>
    </div>
</div>
{{-- @endforeach 
@endif
@if($tipoUserLegenda["tipo"] == "visitante")
{{-- @foreach ($agendamentos as $item) --}}
<div class="col-md-6 m-0 p-0 my-3 col-12 p-3">
    <div class="col-12 px-4 row bg-white scorpius-border-shadow">
        <div class="col-6 m-0 my-1 p-0">
            <b>Data :</b> {data}
        </div>
        <div class="col-6 m-0 my-1 p-0">
            <b>Turno :</b> {turno}
        </div>
        <hr class="bg-light col-11 linha rounded p-0 m-0">
        <div class="col-6 m-0 my-1 p-0">
            <b>Status :</b> {status}
        </div>
    </div>
</div>
{{-- @endforeach --}}
@endif