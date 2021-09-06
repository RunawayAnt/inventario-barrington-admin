function listSupply() {
    table = $("#table_supply").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/supply/ctrl_list_supply.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            { "data": "ruc" },
            { "data": "razonsocial" },
            { "data": "telefono" },
            {
                "data": "name", render: function (data) {

                    return "<span class='badge bg-olive'>" + data + "</span>";
                }
            },
            {
                "data": "total", render: function (data) {

                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            },
            {
                "data": "efectivo", render: function (data) {

                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            },
            { "data": "creacion" },
            {
                "defaultContent":
                    "<div class='btn-group btn-group-sm'>" +
                    "<a class='vista btn btn-primary' data-target='#modal-view-supply' data-toggle='modal' btn-sm' href='#'>" +
                    "<i class='fas fa-indent'>" +
                    "</i></a></div>"
            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_supply_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}
$('#table_supply').on('click', '.vista', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
 
    document.getElementById("proveedor").innerHTML = data.razonsocial;
    document.getElementById("detalle_monto").innerHTML = "Monto realizado "+data.creacion;
    document.getElementById("subtotal").innerHTML = "S/ "+ Number.parseFloat(data.total-(data.total*0.18)).toFixed(2);
    document.getElementById("iva").innerHTML = "S/ "+ Number.parseFloat(data.total*0.18).toFixed(2);
    document.getElementById("total").innerHTML = "S/ "+ Number.parseFloat(data.total).toFixed(2);
    listSubsupply(data.id_venta);
})
function listSubsupply(idventa) {
    table_subsell = $("#table_subsupply").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/supply/ctrl_list_subsupply.php',
            type: 'POST',
            data: {
                idventa: idventa
            }
        },
        "columns": [
            { "data": "posicion" },
            { "data": "codigobarras" },
            { "data": "nombre" },
            {
                "data": "precioentrada", render: function (data) {

                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            },
            { "data": "cantidad" },
            {
                "data": "total", render: function (data) {

                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_subsupply_filter").style.display = "none";
    document.getElementById("table_subsupply_info").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}