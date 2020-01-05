@extends('layout.templateGeralTelasUsuarios')

@section('title', 'Atualizar dados')

@section('conteudo')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<h1>Colégio X</h1>
<div>
    <h2>Dados da instituição de ensino</h2>
    <?php
        if(count($_POST)>0){
            $erros= [];
            if(!filter_input(INPUT_POST, "nameInstituicao")){
                $erros["nameInstituicao"] = "Nome da instituicao não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameResponsavel")){
                $erros["nameResponsavel"] = "Nome do responsável não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameTelefone")){
                $erros["nameTelefone"] = "telefone não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameEndereco")){
                $erros["nameEndereco"] =    "Endereço não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameCidade")){
                $erros["nameCidade"] =  "Nome da cidade não inserida.";
            }
            if(!filter_input(INPUT_POST, "nameEstado")){
                $erros["nameEstado"] = "Nome do estado não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameNumero")){
                $erros["nameNumero"] =  "Numero não inserido.";
            }
            if(!filter_input(INPUT_POST, "nameCEP")){
                $erros["nameCEP"] = "CEP inválido.";
            }
            if(!filter_input(INPUT_POST, "nameTipoInstituicao")){
                $erros["nameTipoInstituicao"] = "Nome da instituição não inserido.";
            }
        }
    ?>

    <form action="#" method="post">
        <fieldset>
            <div class="form-row">
                <div class="form-group col-md-9">
                    <input class="form-control <?= $erros["nameInstituicao"] ? 'is-invalid' : ''?> " type="text" name="nameInstituicao" placeholder="Nome da instituicão de ensino" value="<?= $_POST['nameInstituicao'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameInstituicao"] ?> </div>
                </div>
                <div class="form-group col-md-9">    
                    <input class="form-control <?= $erros["nameResponsavel"] ? 'is-invalid' : ''?> "  type="text" name="nameResponsavel" placeholder="Nome do responsável pela instituição"  value="<?= $_POST['nameResponsavel'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameResponsavel"] ?> </div>
                </div>
                <div class="form-group col-md-9">    
                    <input class="form-control <?= $erros["nameTelefone"] ? 'is-invalid' : ''?> "  type="text" name="nameTelefone" placeholder="Telefone" value="<?= $_POST['nameTelefone'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameTelefone"] ?> </div>
                </div>    
                <div class="form-group col-md-9">
                    <input class="form-control <?= $erros["nameEndereco"] ? 'is-invalid' : ''?> "  type="text" name="nameEndereco" placeholder="Endereço" value="<?= $_POST['nameEndereco'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameEndereco"] ?> </div>
                </div>
                <div class="form-group col-md-9">    
                    <input class="form-control <?= $erros["nameCidade"] ? 'is-invalid' : ''?> "  type="text" name="nameCidade" placeholder="Cidade" value="<?= $_POST['nameCidade'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameCidade"] ?> </div>
                </div>
                <div class="form-group col-md-9"><div class="form-group col-md-9">    
                    <input class="form-control <?= $erros["nameEstado"] ? 'is-invalid' : ''?> "  type="text" name="nameEstado" placeholder="Estado" value="<?= $_POST['nameEstado'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameEstado"] ?> </div>
                    </div>
                <div class="form-group col-md-9">    
                    <input class="form-control <?= $erros["nameNumero"] ? 'is-invalid' : ''?> "  type="text" name="nameNumero" placeholder="Numero" value="<?= $_POST['nameNumero'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameNumero"] ?> </div>
                    </div>
                <div class="form-group col-md-9">
                    <input class="form-control <?= $erros["nameCEP"] ? 'is-invalid' : ''?> "  type="text" name="nameCEP" placeholder="CEP" value="<?= $_POST['nameCEP'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameCEP"] ?> </div>
                    </div>
                <div class="form-group col-md-9">
                    <input class="form-control <?= $erros["nameTipoInstituicao"] ? 'is-invalid' : ''?> "  type="text" name="nameTipoInstituicao" placeholder="Tipo de instituição (pública ou particular)" value="<?= $_POST['nameTipoInstituicao'] ?>">
                    <div class="invalid-feedback"> <?= $erro["nameTipoInstituicao"] ?> </div>
                </div>
                <div class="box-actions">
                    <button type="submit" class="btn btn-primary">Atualizar dados</button>
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection