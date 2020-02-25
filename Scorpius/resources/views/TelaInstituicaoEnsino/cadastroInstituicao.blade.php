@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastrar Instituição de Ensino')

@section('conteudo')

@if($errors->any())
    <ul>
        @foreach($errors->all() as $eror)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group col-12 pt-3">
<h5>Insira os Dados da Instituição</h5>
</div>

<form class="col-xl-12 col-12 mx-sm-auto mt-sm-1" method="POST" action="{{route('CadastroInstituição.post')}}">
    {{csrf_field()}}
    <input id="onlyLink" type="hidden" name="onlyLink" value="false">{{-- valor para informar ao back-end se a instituição já existe --}}
    <input id="id" type="hidden" name="ID">{{-- prenchido pelo js caso o usuario clique em "buscar" --}}
    <fieldset>
        <div class="form-row col-msm">
            <div class="form-group col-11">
                <span class="col-1 p-0">Instituição de Ensino</span>

                <div class="col-md-12 col-sm-1 m-0 p-0 float-sm-left">
                    <input id="nomeInst"  class="form-control" type="text" name="Instituicao" 
                    placeholder="Nome da instituição" list="instList" required autofocus>
                    <datalist id="instList">
                    @if (($instituicoes ?? false))
                        @foreach ($instituicoes as $inst)
                            <option class="opList" value="{{$inst['nome']}} ; Endereço: {{$inst['endereco']}}" >
                        @endforeach
                    @endif
                    </datalist>
                </div>

            </div>
            <div class="col-1 pt-4 float-sm-right d-block">
                    <button type="button" class= "btn btn-primary float-right " onclick="getDados()" buscar> Buscar </button>
                </div>

            <div class="form-group col-sm-8">    
                <span>Responsável pela Instituição</span>
                <input id="resp" class="form-control"  type="text" maxlength="40" name="Responsavel" value="" 
                placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" title="Infome apenas letras" required>
            </div>

            <div class="form-group col-sm-4">
                <span>Telefone da Instituição</span>
                <input id="tel" class="form-control" type="tel" maxlength="14" name="Telefone" placeholder="(99)99999-9999" 
                pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" title="Numero de telefone com DD no formato (xx)xxxxx-xxxx" required>
            </div> 

            <div class="form-group col-sm-8">
                <span>Endereço da Instituição</span>
                <input id="endereco" class="form-control"  type="text" maxlength="50" name="Endereco" 
                placeholder="Rua e Bairro" required>
            </div>

            <div class="form-group col-sm-2 col-4">    
                <span>Número</span>
                <input id="numero" class="form-control" type="text" name="Numero" maxlength="5" placeholder="xxx" required>
            </div>

            <div class="form-group col-sm-2 col-8">
                <span>CEP</span>
                <input id="CEP" class="form-control" type="text" name="CEP" maxlength="9" placeholder="99999-999" pattern="[0-9]{5}-[0-9]{3}$" required>
            </div>

            <div class="form-group col-sm-4">
                <span>Cidade</span>
                <input id="cidade" class="form-control"  type="text" name="Cidade" required>
            </div>

            <div class="form-group col-sm-3">
                <span>Estado</span>    
                <select id="estado" name="Estado"  class="custom-select" required>
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
                <span>Tipo de Instituição</span>
                <select id="tipo" name="Tipo"  class="custom-select" placeholder="Tipo de instituição" required>
                    <option  value="Privada">Privada</option> 
                    <option  value="Federal">Federal</option>
                    <option  value="Distrital">Distrital</option>
                    <option  value="Estadual">Estadual</option>
                    <option  value="Municipal">Municipal</option>
                    <option  value="Filantrópica">Filantrópica</option>
                </select>
            </div>
            
            <div class="input-group-append mt-0 form-group col-sm-12">
                <button id="submit" type="submit" class="btn mr-2 btn-primary">Cadastrar e Vincular Instituição</button>
                <a href={{route("instituição.show")}}><button type="button" class="btn btn-danger">Cancelar</button> </a>
            </div>

        </div>
    </fieldset>
</form>
@endsection

@section('css')
<style type="text/css">

    form .form-group{
        padding:0.5%;
    }
    form span{
        color: black;
        text-decoration: none;   
    }
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="{{ asset("/js/cadastroInstituicao.js")}}" ></script>
@endsection
