@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastrar Instituição de Ensino')

@section('conteudo')
<div class="col-12 m-0 p-0 pt-1 scorpius-border-shadow-sm">

<form class="col-lg-12 col-12 mx-sm-auto mt-sm-1" method="POST" action="{{route('CadastroInstituição.post')}}">
    {{csrf_field()}}
    <input id="onlyLink" type="hidden" name="onlyLink" value="false">{{-- valor para informar ao back-end se a instituição já existe --}}
    <input id="id" type="hidden" name="ID">{{-- prenchido pelo js caso o usuario clique em "buscar" --}}
    <fieldset>
        <div class="form-row col-12">
            <h5>Insira os Dados da Instituição</h5>
            <div class="form-group row m-auto col-md-12 col-12">
                <span class="col-12 p-0">Instituição de Ensino</span>
                <div class="col-12 row m-0 p-0">
                    <div class="col-12 col-sm m-0 p-0">
                        <input id="nomeInst"  class="form-control limpavel" type="text" name="Instituicao" 
                        placeholder="Nome da instituição" list="instList" required autofocus>
                        <datalist id="instList">
                        @if (($instituicoes ?? false))
                            @foreach ($instituicoes as $inst)
                                <option class="opList" value="{{$inst['nome']}} ; Endereço: {{$inst['endereco']}}" >
                            @endforeach
                        @endif
                        </datalist>
                    </div>
                    <div class="col-sm-2 col-xl-1 col-8 my-1 mx-sm-2 my-sm-0 p-0 d-block">
                        <button type="button" class="btn btn-primary float-right" onclick="getDados()" buscar>Buscar</button>
                    </div>
                    <div class="col-sm-2 col-xl-1 col-4 my-1 m-sm-0 p-0 d-block">
                        <button type="button" class="btn btn-danger float-right" onclick="limpar()" buscar>Limpar</button>
                    </div>
                </div>
            </div>

            <div class="form-group pt-3 col-sm-8">    
                <span>Responsável pela Instituição</span>
                <input class="form-control"  type="text" maxlength="40" name="name" value="" id="responsavelID"
                placeholder="Nome completo do responsável" pattern="[a-zA-ZÀ-Úà-ú ]+$$" title="Infome apenas letras" required>
            </div>

            <div class="form-group pt-3 col-sm-4">
                <span>Telefone da Instituição</span>
                <input class="form-control" class="form-control" type="text" maxlength="13" name="telefone" placeholder="99-99999-9999" OnKeyUP="formatar('##-#####-####', this)"
                pattern="[0-9]{2}-[0-9]{4,6}-[0-9]{3,4}$" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ $registro['telefone'] ?? '' }}" title="Numero de telefone com DD no formato xx-xxxxx-xxxx" required>
            </div> 

            <div class="form-group col-sm-8">
                <span>Endereço da Instituição</span>
                <input class="form-control"  type="text" id="enderecoID" maxlength="50" name="endereco" 
                placeholder="Rua e Bairro" required>
            </div>

            <div class="form-group col-sm-2 col-4">    
                <span>Número</span>
                <input id="numero" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" type="text" name="Numero" maxlength="5" placeholder="xxx" required>
            </div>

            <div class="form-group col-sm-2 col-8">
                <span>CEP</span>
                <input id="CEP" class="form-control" type="text" name="CEP" maxlength="9" placeholder="99999-999" pattern="[0-9]{5}-[0-9]{3}$" 
                onkeypress="return event.charCode >= 48 && event.charCode <= 57" OnKeyUP="formatar('#####-###', this)" required>
            </div>

            <div class="form-group col-sm-4">
                <span>Cidade</span>
                <input class="form-control" placeholder="Cidade da instituição"  id="cidadeID" type="text" name="cidade" required>
            </div>

            <div class="form-group col-sm-3">
                <span>Estado</span>    
                <select id="estado" name="Estado"  class="custom-select" required>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
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
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="{{ asset("/js/cadastroInstituicao.js")}}" ></script>
<script>
    function formatar(mascara, documento){
        var i = documento.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(i)
        
        if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
        }
    
    }
</script>

<script> 
  document.getElementById("cidadeID").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
</script> 


<script> 
  document.getElementById("enderecoID").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
</script>


<script> 
  document.getElementById("responsavelID").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
</script> 

<script> 
  document.getElementById("nomeInst").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
</script>

@endsection
