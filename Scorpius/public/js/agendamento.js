function setDataTurno(e, data, turno) {
    $('#data').val(data);
    $('#turno').val(turno);

    if( $(e).hasClass("btn-warning") ){
        alert("qualquer coisa")
    }
}

function adicionar(){
    var element = $('.box:last').clone();
    var cont = element.children('.nome-responsavel').children('input').attr('name').replace('responsavel', '');
    if(cont > 4){
        return alert('Quantidade máx. de responsáveis atingida');
    }
    element.children('.nome-responsavel').children('input').attr('name', 'responsavel[]');
    element.children('.cargo-responsavel').children('input').attr('name', 'cargo[]');
    element.children('.nome-responsavel').children('input').val('');
    element.children('.cargo-responsavel').children('input').val('');
    $('#dados-responsavel-campos').append(element);
}

function adicionarInd(){
    var element = $('.box:last').clone();
    var cont = element.children('.nome-visitante').children('input').attr('name').replace('responsavel', '');
    if(cont > 4){
        return alert('Quantidade máx. de visitantes atingida');
    }
    element.children('.nome-visitante').children('input').attr('name', 'visitante[]');
    element.children('.rg-visitante').children('input').attr('name', 'rg[]');
    element.children('.idade-visitante').children('input').attr('name', 'idade[]');
    element.children('.nome-visitante').children('input').val('');
    element.children('.rg-visitante').children('input').val('');
    element.children('.idade-visitante').children('input').val('');
    $('#dados-visitantes-campos').append(element);
}

$('form').on('click', '.btn-remover', function(e){
    e.preventDefault();
    if ($('.box').length > 1){
        $(this).parents('.box').remove();
    }
 });
$('#btn-adicionar').on("click", adicionar);
$('#btn-adicionarInd').on("click", adicionarInd);

var posCalendar = 0;
var Turno;

function proximosDias(turno){
    Turno = turno;
    if( posCalendar<1 ){
        var datafinal = $("#data").attr("max");
        $.getJSON("/instituicao/agendamento/dados/"+ datafinal+ "/proximo", preencherCalendar);
    }
    $("#setaLeft").removeAttr("disabled");
    $("#setaRight").attr("disabled");
}

function anterioresDias(turno){
    Turno = turno;
    if( posCalendar<1 ){
        var data = $("#data").attr("min");
        $.getJSON("/instituicao/agendamento/dados/"+ data + "/anterior", preencherCalendar);
    }
    $("#setaRight").removeAttr("disabled");
    $("#setaLeft").attr("disabled");
}

/**
 * Função para preencher os valores dos campos e desativa o formulario,
 * permitindo apenas que o usuario concluar a ação vinculando a instituição.
 * @param {*} data 
 * @param {*} status 
 */
const preencherCalendar = function(data, status) {
    if (status != "success" || data.error) {
        alert("Erro ao recuperar as informações");
    } else {
        var visitas = data;
        $("#calendarDatas").html( visitas["datas"]["dataInicio"] + ' a ' + visitas["datas"]["dataFim"] );
        
        var index = 0;
        for (const [dia, v] of visitas.entries()) {
            if(index>0 && index<11 ){
                if( Turno == "diurno"){
                    var manha = $("#manhã"+index);
                    if(v.hasOwnProperty("manhã.btn")){
                        manha.click(setDataTurno(manha, dia,'manhã') ).removeAttr("disabled");
                        manha.removeClass("btn-default").addClass(v["manhã.btn"]);
                    }else {
                        manha.off().attr("disabled");
                        manha.removeClass(v["manhã.btn"]).addClass("btn-default");
                    }

                    var tarde = $("#tarde"+index);
                    if(v.hasOwnProperty("tarde.btn")){
                        tarde.click(setDataTurno(tarde, dia,'tarde') ).removeAttr("disabled");
                        tarde.removeClass("btn-default").addClass(v["tarde.btn"]);
                    }else {
                        tarde.off().attr("disabled");
                        tarde.removeClass(v["tarde.btn"]).addClass("btn-default");
                    }
                }else {
                    var noite = $("#noite"+index);
                    if(v.hasOwnProperty("noite.btn")){
                        noite.click(setDataTurno(noite, dia,'noite') ).removeAttr("disabled");
                        noite.removeClass("btn-default").addClass(v["noite.btn"]);
                    }else {
                        noite.off().attr("disabled");
                        noite.removeClass(v["noite.btn"]).addClass("btn-default");
                    }
                }
            }
            index++;
        }
    }
}
