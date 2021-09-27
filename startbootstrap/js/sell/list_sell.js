//Carga Lista
$(document).ready(function () {
    listSell();
});

//Filtro Global del input de la tabla al input creado
function filterGlobal() {
    $('#table_sell').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}