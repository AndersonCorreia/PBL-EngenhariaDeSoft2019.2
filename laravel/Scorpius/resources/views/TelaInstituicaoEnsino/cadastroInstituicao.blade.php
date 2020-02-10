@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastro de Instituição')

@section('conteudo')

@if($errors->any())
    <ul>
        @foreach($errors->all() as $eror)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form class="col-lg-10 col-xl-9 col-12 mx-sm-auto mt-sm-4" method="POST" action="{{route('CadastroInstituição.post')}}">
    {{csrf_field()}}
    <input id="onlyLink" type="hidden" name="onlyLink" value="false">{{-- valor para informar ao back-end se a instituição já existe --}}
    <input id="id" type="hidden" name="ID">{{-- prenchido pelo js caso o usuario clique em "buscar" --}}
    <fieldset>
        <div class="form-row col-msm">
            <div class="form-group col-sm-12 d-block">
                <span class="col-12 p-0">Instituição de Ensino</span>
                <div class="col-md-10 col-sm-9 m-0 p-0 float-sm-left">
                    <input id="nomeInst"  class="form-control" type="text" name="Instituicao" placeholder="Insira o Nome da instituicão" list="instList" required autofocus>
                    <datalist id="instList">
                    @if (($instituicoes ?? false))
                        @foreach ($instituicoes as $inst)
                            <option class="opList" value="{{$inst['nome']}} ; Endereço: {{$inst['endereco']}}" >
                        @endforeach
                    @endif
                    </datalist>
                </div>
                <div class="col-sm-2 mt-1 m-0 mt-sm-0 float-sm-right d-block">
                    <button type="button" class= "btn btn-primary float-right " onclick="getDados()"> Buscar </button>
                </div>
            </div>

            <div class="form-group col-sm-8">    
                <span>Responsável pela Instituição</span>
                <input id="resp" class="form-control"  type="text" maxlength="40" name="Responsavel" value="" placeholder="Nome completo do Responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
            </div>

            <div class="form-group col-sm-4">
                <span>Telefone da instituicão</span>
                <input id="tel" class="form-control" type="tel" maxlength="14" name="Telefone" placeholder="(99)99999-9999" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" title="Numero de telefone com DD no formato (xx)xxxxx-xxxx" required>
            </div> 

            <div class="form-group col-sm-8">
                <span>Endereço da Instituição</span>
                <input id="endereco" class="form-control"  type="text" maxlength="50" name="Endereco" placeholder="Informe Rua e Bairro" required>
            </div>

            <div class="form-group col-sm-2 col-4">    
                <span>Numero</span>
                <input id="numero" class="form-control" type="text" name="Numero" maxlength="5" placeholder="xxx" required>
            </div>

            <div class="form-group col-sm-2 col-8">
                <span>CEP</span>
                <input id="CEP" class="form-control" type="text" name="CEP" maxlength="9" placeholder="99999-999" pattern="[0-9]{5}-[0-9]{3}$" required>
            </div>

            <div class="form-group col-sm-4">
                <span>Cidade</span>
                <input id="cidade" class="form-control"  type="text" name="Cidade" placeholder="Informe a Cidade" required>
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
                <span>Tipo da Instituição</span>
                <select id="tipo" name="Tipo"  class="custom-select" placeholder="Tipo de instituição" required>
                    <option  value="Privada">Privada</option> 
                    <option  value="Federal">Federal</option>
                    <option  value="Distrital">Distrital</option>
                    <option  value="Estadual">Estadual</option>
                    <option  value="Municipal">Municipal</option>
                    <option  value="Filantrópica">Filantrópica</option>
                </select>
            </div>
            
            <div class="input-group-append mt-2">
                <button id="submit" type="submit" class="btn mr-2 btn-primary">Cadastrar e Vincular instituição</button>
                <a href={{route("instituição.show")}}><button type="button" class="btn btn-danger">Cancelar</button> </a>
            </div>

        </div>
    </fieldset>
</form>
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

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="{{ asset("/js/cadastroInstituicao.js")}}" ></script>
@endsection
