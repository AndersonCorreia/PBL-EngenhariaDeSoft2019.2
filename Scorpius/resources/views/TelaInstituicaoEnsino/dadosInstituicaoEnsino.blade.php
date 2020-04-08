@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Atualizar Dados da Instituição de Ensino')

@section('conteudo')

<div class="form-group col-12 pt-3">
    <h5>Cadastro - {{$registros['nome']}}</h5>
</div>
<div>
    <form class="col-xl-12 col-12 mx-sm-auto mt-sm-1" action="{{route('user.instituicoes.atualizar',$registros['ID'])}}"
        method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <div class="form-row col-msm">
                <div class="form-group row m-auto col-md-12 col-12">
                    <span class="col-12 p-0">Instituição de Ensino</span>
                    <div class="col-12 col-sm m-0 p-0">
                        <input type="hidden" name="_method" value="put">
                        <input id="nomeInst" class="form-control" type="text" name="Instituicao"
                            placeholder="Nome da instituição"
                            value="{{isset($registros['nome']) ? $registros['nome'] : ''}}" list="instList" 
                            required autofocus>
                        <datalist id="instList">
                            @if (($instituicoes ?? false))
                            @foreach ($instituicoes as $inst)
                            <option class="opList" value="{{$inst['nome']}}" data-valor="{{$inst['ID']}}">
                                @endforeach
                                @endif
                        </datalist>
                    </div>

                    <div class="col-sm-2 col-xl-1 col-4 my-1 m-sm-0 p-0 d-block">
                        <button type="button" class="btn btn-danger float-right"
                            limpar>Limpar</button>
                    </div>
                </div>

                <div class="form-group pt-3 col-sm-8">
                    <span>Responsável pela Instituição</span>
                    <input id="responsavelID" class="form-control" type="text" maxlength="40" name="Responsavel"
                        placeholder="Nome completo do responsável"
                        value="{{isset($registros['responsavel']) ? $registros['responsavel'] : ''}}" required>
                </div>

                <div class="form-group pt-3 col-sm-4">
                    <span>Telefone da Instituição</span>
                    <input class="form-control" type="text" maxlength="13" name="Telefone" placeholder="99-99999-9999" OnKeyUP="formatar('##-#####-####', this)"
                        value="{{isset($registros['telefone']) ? $registros['telefone'] : ''}}"
                        pattern="[0-9]{2}-[0-9]{4,6}-[0-9]{3,4}$" title="Numero de telefone com DD" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                </div>

                <div class="form-group col-sm-8">
                    <span>Endereço da Instituição</span>
                    <input class="form-control" id="enderecoID" type="text" maxlength="50" name="Endereco" placeholder="Rua e Bairro"
                        value="{{isset($registros['endereco']) ? $registros['endereco'] : ''}}" required>
                </div>

                <div class="form-group col-sm-2">
                    <span>Número</span>
                    <input class="form-control" type="text" name="Numero" maxlength="5" placeholder="xxx" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        value="{{isset($registros['numero']) ? $registros['numero'] : ''}}" required>
                </div>

                <div class="form-group col-sm-2">
                    <span>CEP</span>
                    <input class="form-control" type="text" name="CEP" maxlength="9" placeholder="99999-999" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        value="{{isset($registros['cep']) ? $registros['cep'] : ''}}" OnKeyUP="formatar('#####-###', this)" pattern="[0-9]{5}-[0-9]{3}$" required>
                </div>

                <div class="form-group col-sm-4">
                    <span>Cidade</span>
                    <input id="cidadeID" class="form-control" type="text" name="Cidade" placeholder="Cidade da instituição"
                        value="{{isset($registros['cidade']) ? $registros['cidade'] : ''}}" required>
                </div>
                <?php
                #
                # Função que ajuda a desenhar o controle HTML select
                #
                function combobox($arrDados, $valorSelecionado = null) {
                    foreach ($arrDados as $key => $value) {
                        $selected = ($valorSelecionado == $key) ? "selected=\"selected\"" : null;
                        echo "<option value=\"$key\" $selected >$value</option>";
                    }
                }

                #
                # Array com os dados de nossa combo
                #
                $tipoInst = array(
                    "Privada" => "Privada",
                    "Federal"  => "Federal",
                    "Distrital" => "Distrital",
                    "Estadual" => "Estadual",
                    "Municipal" => "Municipal",
                    "Organização Não-Governamental" => "Organização Não-Governamental"
                );

                #
                # Array com os dados de nossa combo
                #
                $estado = array(
                    "AC" => "Acre",
                    "AL" => "Alagoas", 
                    "AP" => "Amapá", 
                    "AM" => "Amazonas",
                    "BA" => "Bahia", 
                    "CE" => "Ceará",
                    "DF" => "Distrito Federal",
                    "ES" => "Espírito Santo",
                    "GO" => "Goiás",
                    "MA" => "Maranhão", 
                    "MT" => "Mato Grosso",
                    "MS" => "Mato Grosso do Sul",
                    "MG" => "Minas Gerais", 
                    "PA" => "Pará",
                    "PB" => "Paraíba", 
                    "PR" => "Paraná",
                    "PE" => "Pernambuco",
                    "PI" => "Piauí",
                    "RJ" => "Rio de Janeiro",
                    "RN" => "Rio Grande do Norte",
                    "RS" => "Rio Grande do Sul",
                    "RO" => "Rondônia",
                    "RR" => "Roraima",
                    "SC" => "Santa Catarina",
                    "SP" => "São Paulo",
                    "SE" => "Sergipe",
                    "TO" => "Tocantins"
                );

                $valor_selecionado_instituicao = $registros['tipo_instituicao'];
                $valor_selecionado_estado = $registros['UF'];

                ?>

                <div class="form-group col-sm-3">
                    <span>Estado</span>
                    <select id="estado" name="Estado" class="custom-select" required>
                        <?php combobox($estado, $valor_selecionado_estado); ?>
                    </select>
                </div>

                <div class="form-group col-sm-5">
                    <span>Tipo da Instituição</span>
                    <select id="tipo" name="Tipo" class="custom-select" placeholder="Tipo de instituição" required>
                        <?php combobox($tipoInst, $valor_selecionado_instituicao); ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary mr-2">Atualizar Dados</button>
            <a href={{route("instituição.show")}}><button type="button" class="btn btn-danger">Cancelar</button> </a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
/**
 * verificar se o nome da instituição foi proveniente das lista de instituições
 * caso o usuario clique em buscar
 */
function verificarInputName(nomeInst) {

    var verificacao = false;
    $(".opList").each((index, element) => {
        if ($(element).val() == nomeInst) {
            verificacao = true;
            return false; //para interromper o loop
        }
    });
    return verificacao;
}
/**
 * função que busca as informações da instituição no back-end e muda a tela.
 */
function getDados() {
    let nomeInst = $("#nomeInst").val();
    let instituicao_ID = $(".opList").each((index,value)=>{
        console.log(value)
    })
    console.log(instituicao_ID)
    if (verificarInputName(nomeInst)) {
        
    } else {
        alert(" Para busca os dados de uma instituição selecione uma da lista." +
            "\nCaso a instituição não esteja na lista cadastre manualmente");
    }
}

$(document).on("click", "[limpar]", e=>{
    $("#nomeInst").val('')
})
</script>
@endsection

@section('css')
<style type="text/css">
form .form-group {
    padding: 0.5%;
}

form span {
    color: black;
    text-decoration: none;
}
</style>

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
  document.getElementById("nomeInst").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
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
  document.getElementById("enderecoID").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
</script>


<script> 
  document.getElementById("cidadeID").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
</script>

@endsection