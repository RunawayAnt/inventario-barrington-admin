function listSell() {
    table = $("#table_sell").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/sell/ctrl_sell_list.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "dni" },
            {
                "data": "name", render: function (data) {

                    return "<span class='badge bg-info'>" + data + "</span>";
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
                    "<a class='vista btn btn-primary' data-target='#modal-view-sell' data-toggle='modal' btn-sm' href='#'>" +
                    "<i class='fas fa-indent'>" +
                    "</i></a></div>"
            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_sell_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

$('#table_sell').on('click', '.vista', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
 
    document.getElementById("cliente").innerHTML = data.nombres+" "+data.apellidos;
    document.getElementById("detalle_monto").innerHTML = "Monto realizado "+data.creacion;
    document.getElementById("subtotal").innerHTML = "S/ "+ Number.parseFloat(data.total-(data.total*0.18)).toFixed(2);
    document.getElementById("iva").innerHTML = "S/ "+ Number.parseFloat(data.total*0.18).toFixed(2);
    document.getElementById("total").innerHTML = "S/ "+ Number.parseFloat(data.total).toFixed(2);
    listSubsell(data.id_venta);
})


function listSubsell(idventa) {
    table_subsell = $("#table_subsell").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/sell/ctrl_subsell_list.php',
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
                "data": "preciosalida", render: function (data) {

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

    document.getElementById("table_subsell_filter").style.display = "none";
    document.getElementById("table_subsell_info").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}
