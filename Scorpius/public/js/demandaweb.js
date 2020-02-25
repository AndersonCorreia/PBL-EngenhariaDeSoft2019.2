$(function() {
    $('form[name="formEnviarDemanda"]').submit(function(e) {
        e.preventDefault();
        // return console.log(typeof($("#guia").val()));
        // var guia = document.getElementById('guia');
        // console.log(guia.validity.valid);

        if (!$('input[name="guia"]').val()) {
            return Swal.fire(
                "Guia de matrícula faltando!",
                "Por favor, insira sua guia de matrícula para enviar sua proposta de horário",
                "warning"
            );
        }

        let horarios = {
            seg: [],
            ter: [],
            qua: [],
            qui: [],
            sex: []
        };

        // SEGUNDA
        if ($("#seg-manha").attr("aria-pressed") == "true") {
            horarios["seg"].push("Manha");
        }
        if ($("#seg-tarde").attr("aria-pressed") == "true") {
            horarios["seg"].push("Tarde");
        }
        if ($("#seg-noite").attr("aria-pressed") == "true") {
            horarios["seg"].push("Noite");
        }
        //  TERÇA
        if ($("#ter-manha").attr("aria-pressed") == "true") {
            horarios["ter"].push("Manha");
        }
        if ($("#ter-tarde").attr("aria-pressed") == "true") {
            horarios["ter"].push("Tarde");
        }
        if ($("#ter-noite").attr("aria-pressed") == "true") {
            horarios["ter"].push("Noite");
        }
        // QUARTA
        if ($("#qua-manha").attr("aria-pressed") == "true") {
            horarios["qua"].push("Manha");
        }
        if ($("#qua-tarde").attr("aria-pressed") == "true") {
            horarios["qua"].push("Tarde");
        }
        if ($("#qua-noite").attr("aria-pressed") == "true") {
            horarios["qua"].push("Noite");
        }
        // QUINTA
        if ($("#qui-manha").attr("aria-pressed") == "true") {
            horarios["qui"].push("Manha");
        }
        if ($("#qui-tarde").attr("aria-pressed") == "true") {
            horarios["qui"].push("Tarde");
        }
        if ($("#qui-noite").attr("aria-pressed") == "true") {
            horarios["qui"].push("Noite");
        }
        // SEXTA
        if ($("#sex-manha").attr("aria-pressed") == "true") {
            horarios["sex"].push("Manha");
        }
        if ($("#sex-tarde").attr("aria-pressed") == "true") {
            horarios["sex"].push("Tarde");
        }
        if ($("#sex-noite").attr("aria-pressed") == "true") {
            horarios["sex"].push("Noite");
        }
        // $.ajaxSetup({
        //     headers: {
        //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //      }
        // });
        $.ajax({
            url: "{{ route('estagiario.enviarHorario') }}",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                return Swal.fire(
                    "Proposta de horário enviada com sucesso",
                    "Seu horário agora está em processo de análise e pode ser modificado no horário final",
                    "success"
                );
            }
        });
        return false;
    });
});

/**
 * função que limpar o valor do campo.
 */
function limpar() {
    $(".limpavel").val("");
}