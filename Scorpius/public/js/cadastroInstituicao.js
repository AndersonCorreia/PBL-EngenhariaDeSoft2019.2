/**
 * Função para preencher os valores dos campos e desativa o formulario,
 * permitindo apenas que o usuario concluar a ação vinculando a instituição.
 * @param {*} data 
 * @param {*} status 
 */
const preencherForm = function(data, status) {
        if (status != "success" || data.error) {
            alert("Erro ao recuperar as informações tente cadastrar manualmente");
        } else {
            $("#nomeInst").val(data.nome).attr("readonly", "");
            $("#resp").val(data.responsavel).attr("readonly", "");
            $("#tel").val(data.telefone).attr("readonly", "");
            $("#endereco").val(data.endereco).attr("readonly", "");
            $("#numero").val(data.numero).attr("readonly", "");
            $("#CEP").val(data.cep).attr("readonly", "");
            $("#cidade").val(data.cidade).attr("readonly", "");
            $("#estado").val(data.UF.toUpperCase()).attr("disabled", "");
            $("#tipo").val(data.tipo_instituicao).attr("disabled", "");
            $("#id").val(data.ID);
            $("#submit").html("Vincular instituição");
            $("#onlyLink").val("true");
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
/**
 * função que busca as informações da instituição no back-end e muda a tela.
 */
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

/**
 * função que limpar o valor do campo.
 */
function limpar() {
    $(".limpavel").val("");
}