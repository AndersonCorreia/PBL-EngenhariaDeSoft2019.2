@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Check-in visitas do Estagiário')

@section('conteudo')

<div class="m-1 p-3">

    <div class="row mt-3 mx-0 p-1 scorpius-border-shadow border-top border-shadow">
        <div class= "col-8 col-5 col-md-3">
            <div class="col-12 p-0 my-1 font-weight-bold"><h3>Próxima Visitação</h3></div>
        </div>
        <div class= "col-8 col-md-3">
            <div class="col-12 p-0 my-1 font-weight-bold text-right"><h3>Turno</h3></div>
        </div>
        <div class= "col-8 col-md-3">
            <div class="col-12 p-0 my-1 font-weight-bold text-right"><h3>dd/mm/aa</h3></div>
        </div>
    </div>

    <div class="row mt-3 mx-0 p-1 scorpius-border-shadow ">
        <div class= "col-8 col-5 col-md-3">
            <div class="col-12 p-0 my-1 font-weight-bold"><h5>Nome do colégio</h5></div>
        </div>
        <div class= "col-8 col-md-3">
            <div class="col-12 p-0 my-1 font-weight-bold"><h5>Professor Responsável</h5></div>
        </div>
        <div class= "col-8 col-md-3 text-right">
            <div class="col-12 p-0 my-1 my-md-0 font-weight-bold"><h5>00|00</h5></div>
        </div>
    </div>
 
    <div class= "row mt-0 mx-0 p-1 scorpius-border-shadow border-top border-shadow">
        <div class="row col-12 col-md-11 my-1" >
            <div class="row col-12">
                <div class= "col-8 col-5 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Ordem</div>
                   <div class="col-12 p-0">01</div> 
                </div>
                <div class= "col-4 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Nome</div>
                    <div class="col-12 p-0">Esdras Abreu Disney</div>
                </div>
                <div class= "col-8 col-md-4">
                    <div class="col-12 p-0 my-1 font-weight-bold">Documento</div>
                    <div class="col-12 p-0">000.000.000-00</div>
                </div>
                <div class= "col-11 col-md-1 my-1 text-right" >
                    <div class="col-12 p-0 my-1 my-md-0 font-weight-bold">Status</div>
                    <button id="qua-noite" type="button" class="btn-outline-secondary btn"
                            data-toggle="button" aria-pressed="false">Presente</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="m-1 p-3">

    <div class="form-group col-12 m-0 p-0">
        <h5>Demais Visitação</h5>
    </div>
 
    <div class= "row mt-0 mx-0 p-1 scorpius-border-shadow border-top border-shadow">
        <div class="row col-12 col-md-11 my-1" >
            <div class="row col-12">
                <div class= "col-8 col-5 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Ordem</div>
                   <div class="col-12 p-0">01</div> 
                </div>
                <div class= "col-4 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Nome</div>
                    <div class="col-12 p-0">Esdras Abreu Disney</div>
                </div>
                <div class= "col-8 col-md-4">
                    <div class="col-12 p-0 my-1 font-weight-bold">Documento</div>
                    <div class="col-12 p-0">000.000.000-00</div>
                </div>
                <div class= "col-11 col-md-1 my-1 text-right" >
                    <div class="col-12 p-0 my-1 my-md-0 font-weight-bold">Status</div>
                    <button id="qua-noite" type="button" class="btn-outline-secondary btn"
                            data-toggle="button" aria-pressed="false">Presente</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection