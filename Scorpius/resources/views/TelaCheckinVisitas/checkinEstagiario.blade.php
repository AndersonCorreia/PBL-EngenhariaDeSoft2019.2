@extends('TelaCheckinVisitas.checkinVisitas')
@section('checkinEstagiario')
<div class="container-fluid bg-white shadow-sm p-2"
style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
<div class="row ml-3 mr-3">
    <div class="col-md-5">
        <p class="h3 float-left">Próxima visitação</p>
    </div>
    <div class="col-md-2">
        <p class="h3">{Turno}</p>
    </div>
    <div class="col-md-5">
        <p class="h3 float-right">{dd/mm/aaaa}</p>
    </div>
</div>
</div>
<div class="p-4">
<div id="escola">
    <div class="container-fluid bg-secondary p-2 text-white border-all-50">
        <div class="row">
            <div class="col-md-7">
                <p class="h5">{nome_instituicao}</p>
            </div>
            <div class="cold-md-4">
                <p class="h5">{nome_usuario}</p>
            </div>
            <div class="col-md-3">
                <p class="h5 float-right">{checados} | {total}</p>
            </div>
        </div>
    </div>
    {{-- FOREACH --}}
    <div class="p-3">
        <div class="scorpius-border-shadow border-all-50 p-2">
            <div class="row text-center">
                <div class="col-md-1">
                    <p class="h5">
                        {n°}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="h5">
                        {nome_aluno}
                    </p>
                </div>
                <div class="col-md-3">
                    <p class="h5">{idade_aluno}</p>
                </div>
                <div class="col-md-2">
                    <form name="checkin" method="POST">
                        <input type="hidden" value="{ID}">
                        <button class="btn btn-outline-secondary" aria-pressed="false">
                            Presente
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="visitantesComuns" class="mt-3">
    <div class="container-fluid bg-secondary p-2 text-white border-all-50">
        <div class="row mr-3">
            <div class="col-md-9 text-center">
                <p class="h5">Demais visitantes</p>
            </div>
            <div class="col-md-3">
                <p class="h5 float-right">{checados} | {total}</p>
            </div>
        </div>
    </div>
    <div class="p-3">
        <div class="scorpius-border-shadow border-all-50 p-2">
            <div class="row text-center">
                <div class="col-md-1">
                    <p class="h5">
                        {n°}
                    </p>
                </div>
                <div class="col-md-5">
                    <p class="h5">
                        {nome_visitante}
                    </p>
                </div>
                <div class="col-md-4">
                    <p class="h5">{cpf_visitante}</p>
                </div>
                <div class="col-md-2">
                    <form name="checkinVisitante" method="POST">
                        <input type="hidden" value="{ID}">
                        <button class="btn btn-outline-secondary" aria-pressed="false">
                            Presente
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection