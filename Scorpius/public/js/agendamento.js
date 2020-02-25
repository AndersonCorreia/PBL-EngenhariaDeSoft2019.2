function setDataTurno(e, data, turno) {
    $('#data').val(data);
    $('#turno').val(turno);
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