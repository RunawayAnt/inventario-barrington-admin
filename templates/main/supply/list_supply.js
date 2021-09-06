//Carga Lista
$(document).ready(function () {
    listSupply();
});

//Filtro Global del input de la tabla al input creado
function filterGlobal() {
    $('#table_supply').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}