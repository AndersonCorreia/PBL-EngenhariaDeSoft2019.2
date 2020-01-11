@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastro de Instituição')

@section('conteudo')

<form class="col-md-9 col-sm-11 mx-sm-auto mt-sm-4" method="POST">{{-- não precisar do action pois é a mesma url pra rota do POST --}}
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-msm">
            <div class="form-group col-sm-12 d-block">
                <span>Instituição de Ensino</span>
                <div class="col-sm-10 m-0 p-0 float-sm-left">
                <input id="nomeInst" class="form-control" type="text" name="nameInstituicao" placeholder="Insira o Nome da instituicão" value="" required>
                </div>
                <div class="col-sm-2 pt-1 p-0 pt-sm-0 float-sm-right d-block">
                    <button type="button" class= "btn btn-primary float-right " onclick="getDados()"> Buscar </button>
                </div>
            </div>
            <div class="form-group col-sm-8">    
                <span>Responsável pela Instituição<input class="form-control"  type="text" name="nameResponsavel" placeholder="Nome do Responsável"  value="" required></span>
            </div>
            <div class="form-group col-sm-4">
                <span>Telefone do responsável</span>
                <input class="form-control" type="tel" maxlength="14" name="nameTelefone" placeholder="(99)9999-9999" value="" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" required>
            </div> 

            <div class="form-group col-sm-8">
                <span>Endereço da Instituição</span>
                <input class="form-control"  type="text" name="nameEndereco" placeholder="Informe Rua e Bairro" value="" required>
            </div>

            <div class="form-group col-sm-2">    
                <span>Numero<input class="form-control" type="text" name="nameNumero" maxlength="5" placeholder="xxx" value="" required></span>
            </div>

            <div class="form-group col-sm-2">
                <span>CEP<input class="form-control" type="text" name="nameCEP" maxlength="8" placeholder="99999-999" value="" required></span>
            </div>

            <div class="form-group col-sm-4">
                <span>Cidade</span>
                <input class="form-control"  type="text" name="nameCidade" placeholder="Informe a Cidade" value="" required>
            </div>

            <div class="form-group col-sm-3">
                <span>Estado</span>    
                <select name="select"  class="custom-select" required>
                    <option  value="BA" selected>Bahia</option> 
                    <option  value="MA">Maranhão</option>
                    <option  value="PI">Piauí</option>
                    <option  value="CE">Ceará</option>
                    <option  value="RN">Rio Grande do Norte</option>
                    <option  value="PB">Paraíba</option>
                    <option  value="PE">Pernambuco</option>
                    <option  value="AL">Alagoas</option>
                    <option  value="SE">Sergipe</option>
                </select>
            </div>
            
            <div class="form-group col-sm-5">
                <span>Tipo da Instituição</span>
                <select name="select"  class="custom-select" placeholder="Tipo de instituição" required>
                    <option  value="Privada">Privada</option> 
                    <option  value="Federal">Federal</option>
                    <option  value="Distrital">Distrital</option>
                    <option  value="Estadual">Estadual</option>
                    <option  value="Municipal">Municipal</option>
                    <option  value="Organização Não-Governamental">Organização Não-Governamental</option>
                </select>
            </div>
            
            <div class="input-group-append mt-2">
                <button type="submit" class="btn mr-2 btn-primary">Cadastrar e vincular instituição</button>
                <button type="submit" class="btn btn-danger">Cancelar</button>
            </div>

        </div>
    </fieldset>
</form>
@endsection

<style>
.form-group{
    padding:2%;
}
span{
    color: black;
    text-decoration: none;   
}
</style>