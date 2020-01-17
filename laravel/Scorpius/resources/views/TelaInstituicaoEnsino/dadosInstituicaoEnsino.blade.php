@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Atualizar dados')

@section('conteudo')

<h1>Instituicao ({{$registros[0]['nome']}})</h1>
<div>
<form action="{{route('user.instituicoes.atualizar',$registros[0]['ID'])}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <fieldset>
        <div class="form-row col-msm">
            <div class="form-group col-sm-12 d-block">
                <span class="col-10">Instituição de Ensino</span>
                <input type="hidden" name="_method" value="put">
                <div class="col-md-14 col-sm-9 m-0 p-0 float-sm-left">
                    <input id="nomeInst"  class="form-control" type="text" name="Instituicao" placeholder="Insira o Nome da instituicão" value="{{isset($registros[0]['nome']) ? $registros[0]['nome'] : ''}}" list="instList" required autofocus>
                    
                </div>
            </div>

            <div class="form-group col-sm-8">    
                <span>Responsável pela Instituição</span>
                <input class="form-control"  type="text" maxlength="40" name="nameResponsavel" placeholder="Nome do Responsável"  value="{{isset($registros[0]['responsavel']) ? $registros[0]['responsavel'] : ''}}" required>
            </div>
            
            <div class="form-group col-sm-4">
                <span>Telefone da instituicão</span>
                <input class="form-control" type="tel" maxlength="14" name="nameTelefone" placeholder="(99)99999-9999" value="{{isset($registros[0]['telefone']) ? $registros[0]['telefone'] : ''}}" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" title="Numero de telefone com DD" required>
            </div> 

            <div class="form-group col-sm-8">
                <span>Endereço da Instituição</span>
                <input class="form-control"  type="text" maxlength="50" name="nameEndereco" placeholder="Informe Rua e Bairro" value="{{isset($registros[0]['endereco']) ? $registros[0]['endereco'] : ''}}" required>
            </div>

            <div class="form-group col-sm-2">    
                <span>Numero</span>
                <input class="form-control" type="text" name="nameNumero" maxlength="5" placeholder="xxx" value="{{isset($registros[0]['numero']) ? $registros[0]['numero'] : ''}}" required>
            </div>

            <div class="form-group col-sm-2">
                <span>CEP</span>
                <input class="form-control" type="text" name="nameCEP" maxlength="9" placeholder="99999-999" value="{{isset($registros[0]['cep']) ? $registros[0]['cep'] : ''}}" required>
            </div>

            <div class="form-group col-sm-4">
                <span>Cidade</span>
                <input class="form-control"  type="text" name="nameCidade" placeholder="Informe a Cidade" value="{{isset($registros[0]['cidade_UF']) ? $registros[0]['cidade_UF'] : ''}}" required>
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
                <select name="tipo"  class="custom-select" placeholder="Tipo de instituição" required>
                    <option  value="Privada">Privada</option> 
                    <option  value="Federal">Federal</option>
                    <option  value="Distrital">Distrital</option>
                    <option  value="Estadual">Estadual</option>
                    <option  value="Municipal">Municipal</option>
                    <option  value="Organização Não-Governamental">Organização Não-Governamental</option>
                </select>
            </div>
        </div>
    </fieldset>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Atualizar Dados</button>
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
</div>
@endsection

@section('css')
<style type="text/css">
    form .form-group{
        padding:2%;
    }
    form span{
        color: black;
        text-decoration: none;   
    }
</style>
@endsection