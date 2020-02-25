function setDataTurno(data, turno) {
    $('#data').val(data);
    $('#turno').val(turno);
}

// /**
//  * buscar as informações das turmas no Turmacontroller
//  */
// function getDados() {
//     var nomeTurma = $("#turma").val();

//     if (verificarInputName(nomeTurma)) {
//         var nome = nomeTurma.substring(0, nomeTurma.indexOf(" ;"));
//         $.getJSON("/agendamentoInstitucional/dados/" + nome, preencherForm);
//     } else {
//         alert(" Para busca os dados de uma turma selecione uma da lista.\n");
//     }
// }

// const preencherForm = function(data) {
//     $("#turma").val(data.nome).attr("readonly", "");
// }  
