function setDataTurno(data, turno) {
    $('#data').val(data);
    $('#turno').val(turno);
}

$('[type="date"]').on("keydown", function() {
    event.preventDefault();
    return false;
})