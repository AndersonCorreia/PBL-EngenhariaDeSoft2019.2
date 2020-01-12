@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Atualizar dados')

@section('conteudo')

<h1>Colégio X</h1>
<div>
    <h2>Dados da instituição de ensino</h2>

<form action="#" method="POST">
    {{csrf_field()}}
        <fieldset>
            <div class="form-row">
            <div class="form-group col-md-9">
                    <input class="form-control" type="text" name="nameInstituicao" placeholder="Nome da instituicão de ensino" value="" required>
                </div>
                <div class="form-group col-md-6">    
                    <input class="form-control"  type="text" name="nameResponsavel" placeholder="Nome do responsável pela instituição"  value="" required>
                </div>
                <div class="form-group col-md-3">    
                    <input class="form-control"  type="text" name="nameTelefone" placeholder="Telefone" value="" required>
                </div>    
                <div class="form-group col-md-9">
                    <input class="form-control"  type="text" name="nameEndereco" placeholder="Endereço" value="" required>
                </div>
                <div class="form-group col-md-4">    
                    <input class="form-control"  type="text" name="nameCidade" placeholder="Cidade" value="" required>
                </div>
                <div class="form-group col-md-2">    
                    <input class="form-control"  type="text" name="nameEstado" placeholder="Estado" value="" required>
                </div>
                <div class="form-group col-md-1">    
                    <input class="form-control"  type="text" name="nameNumero" placeholder="Numero" value="" required>
                </div>
                <div class="form-group col-md-2">
                    <input class="form-control"  type="text" name="nameCEP" placeholder="CEP" value="" required>
                    
                    </div>
                <div class="form-group col-md-9">
                    
                </div>
                <div class="form-group col-md-9">
                <select name="select"  class="custom-select" required>
                    <option value="valor0">Selecione o tipo da instituição</option>
                    <option  value="">Privada</option> 
                    <option  value="">Federal</option>
                    <option  value="">Distrital</option>
                    <option  value="">Estadual</option>
                    <option  value="">Municipal</option>
                    <option  value="">Organização Não-Governamental</option>
                    </select>
                <div>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Atualizar Dados</button>
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<style>
    .input-group-append{
        margin: 20px 0px 0px 0px;
    }
    
    .btn{
        margin:0px 5px 0px 0px;
    }

</style>
@endsection