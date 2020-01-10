@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastro de Instituição')

@section('conteudo')

<form class="col-md-9 col-sm-11 mx-sm-auto mt-sm-4" method="POST">{{-- não precisar do action pois é a mesma url pra rota do POST --}}
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-msm">
            <div class="form-group col-sm-12 d-block">
                <div class="col-sm-10 m-0 p-0 float-sm-left">
                    <input id="nomeInst" class="form-control" type="text" name="nameInstituicao" placeholder="Nome da instituicão" value="" required>
                </div>
                <div class="col-sm-2 pt-1 p-0 pt-sm-0 float-sm-right d-block">
                    <button type="button" class= "btn btn-primary float-right " onclick="getDados()"> Buscar </button>
                </div>
            </div>
            <div class="form-group col-sm-8">    
                <input class="form-control"  type="text" name="nameResponsavel" placeholder="Nome do responsável pela instituição"  value="" required>
            </div>
            <div class="form-group col-sm-4">    
                <input class="form-control"  type="text" name="nameTelefone" placeholder="Telefone" value="" required>
            </div>    
            <div class="form-group col-sm-7">
                <input class="form-control"  type="text" name="nameEndereco" placeholder="Endereço" value="" required>
            </div>
            <div class="form-group col-sm-3">    
                <input class="form-control"  type="text" name="nameCidade" placeholder="Cidade" value="" required>
            </div>
            <div class="form-group col-sm-2">    
                <select name="select"  class="custom-select" required>
                    <option  value="" selected>BA</option> 
                    <option  value="">Federal</option>
                    <option  value="">Distrital</option>
                    <option  value="">Estadual</option>
                    <option  value="">Municipal</option>
                    <option  value="">Organização Não-Governamental</option>
                </select>
            </div>
            <div class="form-group col-sm-1">    
                <input class="form-control"  type="text" name="nameNumero" placeholder="Numero" value="" required>
            </div>
            <div class="form-group col-sm-2">
                <input class="form-control"  type="text" name="nameCEP" placeholder="CEP" value="" required>
            </div>
            <div class="form-group col-sm-9">
                <select name="select"  class="custom-select" required>
                    <option  value="">Privada</option> 
                    <option  value="">Federal</option>
                    <option  value="">Distrital</option>
                    <option  value="">Estadual</option>
                    <option  value="">Municipal</option>
                    <option  value="">Organização Não-Governamental</option>
                </select>
            <div>
            <div class="input-group-append mt-2">
                <button type="submit" class="btn mr-2 btn-primary">Cadastrar e vincular instituição</button>
                <button type="submit" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </fieldset>
</form>
@endsection