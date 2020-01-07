@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Atualizar dados')

@section('conteudo')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<h1>Colégio X</h1>
<div>
    <h2>Dados da instituição de ensino</h2>
    <?php
        if(count($_POST)>0){
            $errors= [];
            if(!filter_input(INPUT_POST, "nameInstituicao")){
                $errors["nameInstituicao"] = "Nome da instituicao não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameResponsavel")){
                $errors["nameResponsavel"] = "Nome do responsável não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameTelefone")){
                $errors["nameTelefone"] = "telefone não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameEndereco")){
                $errors["nameEndereco"] =    "Endereço não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameCidade")){
                $errors["nameCidade"] =  "Nome da cidade não inserida.";
            }
            if(!filter_input(INPUT_POST, "nameEstado")){
                $errors["nameEstado"] = "Nome do estado não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameNumero")){
                $errors["nameNumero"] =  "Numero não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameCEP")){
                $errors["nameCEP"] = "CEP inválido.";
            }
            if(!filter_input(INPUT_POST, "nameTipoInstituicao")){
                $errors["nameTipoInstituicao"] = "Nome da instituição não inserido.";
            }
        }
    ?>

<form action="#" method="post">
    {{csrf_field()}}
        <fieldset>
            <div class="form-row">
            <div class="form-group col-md-9">
                    <input class="form-control" type="text" name="nameInstituicao" placeholder="Nome da instituicão de ensino" value="">
                    <div class="invalid-feedback"> </div>
                </div>
                <div class="form-group col-md-6">    
                    <input class="form-control"  type="text" name="nameResponsavel" placeholder="Nome do responsável pela instituição"  value="">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-3">    
                    <input class="form-control"  type="text" name="nameTelefone" placeholder="Telefone" value="">
                    <div class="invalid-feedback"></div>
                </div>    
                <div class="form-group col-md-9">
                    <input class="form-control"  type="text" name="nameEndereco" placeholder="Endereço" value="">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-4">    
                    <input class="form-control"  type="text" name="nameCidade" placeholder="Cidade" value="">
                    <div class="invalid-feedback"> </div>
                </div>
                <div class="form-group col-md-2">    
                    <input class="form-control"  type="text" name="nameEstado" placeholder="Estado" value="">
                    <div class="invalid-feedback"></div>
                    </div>
                <div class="form-group col-md-1">    
                    <input class="form-control"  type="text" name="nameNumero" placeholder="Numero" value="">
                    <div class="invalid-feedback"></div>
                    </div>
                <div class="form-group col-md-2">
                    <input class="form-control"  type="text" name="nameCEP" placeholder="CEP" value="">
                    <div class="invalid-feedback"></div>
                    </div>
                <div class="form-group col-md-9">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-9">
                <select name="select"  class="custom-select" >
                    <option value="valor0"selected>Selecione o tipo da instituição</option>
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