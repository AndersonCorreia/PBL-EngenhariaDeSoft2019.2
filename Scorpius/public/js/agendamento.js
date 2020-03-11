function setDataTurno(e, data, turno) {
    $('#data').val(data);
    $('#turno').val(turno);

    if( $(e).hasClass("btn-warning") ){
        alert("Como existe uma visita escolar programada para este dia, "+
            "durante a visita você ira acompanhar a escola no seu trajeto.")
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
    element.children('.rg-visitante').children('input').attr('name', 'RG[]');
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
        $.getJSON("/agendamento/dados/"+ Turno + "/" + datafinal+ "/proximo/", preencherCalendar);
    }
    $("#setaLeft").removeAttr("disabled");
    $("#setaRight").attr("disabled", "");
    posCalendar=1;
}

function anterioresDias(turno){
    Turno = turno;
    if( posCalendar-->0 ){
        var data = $("#data").attr("min");
        $.getJSON("/agendamento/dados/"+ Turno + "/" + data + "/anterior/", preencherCalendar);
    }
    $("#setaRight").removeAttr("disabled");
    $("#setaLeft").attr("disabled","");
    posCalendar=0;
}

/**
 * Função para preencher os valores dos campos e desativa o formulario,
 * permitindo apenas que o usuario concluar a ação vinculando a instituição.
 * @param {*} data 
 * @param {*} status 
 */
const preencherCalendar = function(data, status) {
    if (status != "success" || data == []) {
        alert("Não há proximos dias para visita além deste periodo no sistema tente novamente outro dia");
    } else {
        var visitas = data;
        $("#data").attr("min",visitas["datas"]['data0']);
        $("#data").attr("max",visitas["datas"]['dataLimite']);
        $("#calendarDatas").html( visitas["datas"]["dataInicio"] + ' a ' + visitas["datas"]["dataFim"] );
        
        var index = 0;
        for (var dia in visitas) {
            var v = visitas[dia];
            if(index>0 && index<11 ){
                $("#data"+index).html( v["data"] );
                $("#dia"+index).removeClass("d-none");
                if( Turno == "diurno"){
                    var manha = $("#manhã"+index);
                    if(v.hasOwnProperty("manhã.btn")){
                        manha.click(setDataTurno(manha, dia,'manhã') ).removeAttr("disabled");
                        manha.removeClass("btn-default","btn-success", "btn-danger", "btn-warning", "btn-primary")
                        .addClass(v["manhã.btn"]);
                    }else {
                        manha.off().attr("disabled");
                        manha.removeClass("btn-success", "btn-danger", "btn-warning", "btn-primary")
                        .addClass("btn-default");
                    }

                    var tarde = $("#tarde"+index);
                    if(v.hasOwnProperty("tarde.btn")){
                        tarde.click(setDataTurno(tarde, dia,'tarde') ).removeAttr("disabled");
                        tarde.removeClass("btn-default","btn-success", "btn-danger", "btn-warning", "btn-primary")
                        .addClass(v["tarde.btn"]);
                    }else {
                        tarde.off().attr("disabled");
                        tarde.removeClass("btn-success", "btn-danger", "btn-warning", "btn-primary")
                        .addClass("btn-default");
                    }
                }else {
                    var noite = $("#noite"+index);
                    if(v.hasOwnProperty("noite.btn")){
                        noite.click(setDataTurno(noite, dia,'noite') ).removeAttr("disabled");
                        noite.removeClass("btn-default","btn-success", "btn-danger", "btn-warning", "btn-primary")
                        .addClass(v["noite.btn"]);
                    }else {
                        noite.off().attr("disabled");
                        noite.removeClass("btn-success", "btn-danger", "btn-warning", "btn-primary")
                        .addClass("btn-default");
                    }
                }
            }
            index++;
        }
        if(index<11){
            removerDatas(index);
        }
    }
}

function removerDatas(index){

    for (let i = index; i < 11; i++) {
        $("#dia"+i).addClass("d-none");
    }
}
