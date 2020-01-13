const preencherForm = function(data, status) {
        if (status != "success" || data.erro) {
            alert(" Erro ao recuperar as informações tente cadastrar manualmente");
        } else {
            $("#nomeInst").val(data.nome).attr("readonly", "readonly");
            $("#resp").val(data.responsavel).attr("readonly", "readonly");
            $("#tel").val(data.telefone).attr("readonly", "readonly");
            $("#endereco").val(data.endereco).attr("readonly", "readonly");
            $("#numero").val(data.numero).attr("readonly", "readonly");
            $("#CEP").val(data.cep).attr("readonly", "readonly");
            $("#cidade").val(data.cidade).attr("readonly", "readonly");
            $("#estado").val(data.UF).attr("readonly", "readonly");
            $("#tipo").val(data.tipo_instituicao).attr("readonly", "readonly");

            $("#submit").html("Vincular instituição");
            $("#onlyV").val("true");
        }
    }
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

function getDados() {
    var nomeInst = $("#nomeInst").val();

    if (verificarInputName(nomeInst)) {
        var nome = nomeInst.substring(0, nomeInst.indexOf(" ;"));
        var endereco = nomeInst.substring(nomeInst.indexOf("Endereço: ") + 10);
        $.getJSON("/instituicao/dados/" + nome + "/" + endereco + "/", preencherForm);
    } else {
        alert(" Para busca os dados de uma instituição selecione uma da lista." +
            "\nCaso a instituição não esteja na lista cadastre manualmente");
    }
}