/*
* **LISTAR CATEGORIAS EN TABLA CATEGORIAS
*/

/* ---------------------------------------------------------------
?Funcion para listar las categorias agregadas
------------------------------------------------------------------*/

var table;

function listSell() {
    table = $("#table_sell").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/sell/ctrl_list_sellp.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            { "data": "clientes" },
            { "data": "usuarios" },
            {
                "data": "total", render: function (data) {

                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            },
            {
                "data": "tipopago", render: function (data, type, row) {
                    if (data == 'efectivo') {
                        return '<span class="badge bg-primary">' + data + '</span>'
                    } else {
                        return '<span class="badge bg-warning">' + data + '</span>'
                    }
                }
            },
            {
                "data": "estado", render: function (data, type, row) {

                    return '<span class="badge rounded-pill bg-success">' + data + '</span>'

                }
            },
            { "data": "creacion" }
            // {
            //     "data": "posicion", render: function (data, type, row) {
            //         return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
            //     }
            // },
            // {
            //     "data": "nombre", render: function (data, type, row) {
            //         return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
            //     }
            // },
            // {
            //     "data": "creacion", render: function (data, type, row) {
            //         return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
            //     }
            // },
            // {
            //     "data": "estado", render: function (data, type, row) {
            //         if (data == 'Activo') {
            //             return "<span class='btn btn-success btn-sm'>Activo</span>&nbsp;" +
            //                 "<button class='estado btn btn-sm' href='#'>" +
            //                 "<i class='fa fa-fw fa-cog'>" +
            //                 "</i></button>";
            //         } else {
            //             return "<span class='btn btn-danger btn-sm'>Inactivo</span>&nbsp;" +
            //                 "<button class='estado btn btn-sm' href='#'>" +
            //                 "<i class='fa fa-fw fa-cog'>" +
            //                 "</i></button>";
            //         }
            //     }
            // },
            // {
            //     "defaultContent": "", render: function (data, type, row) {
            //         if (row.estado == 'Activo') {
            //             return "<div class='btn-group btn-group-sm'>" +
            //                 "<a data-target='#modal-view-category' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
            //                 "<i class='fas fa-eye'>" +
            //                 "</i></a>" +
            //                 "<a data-target='#modal-edit-category' onclick=notcloseModal('#modal-edit-category') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
            //                 "<i class='fas fa-pencil-alt' >" +
            //                 "</i></a>" +
            //                 "<a class='borrar btn btn-danger btn-sm' href='#'>" +
            //                 "<i class='fas fa-trash'>" +
            //                 "</i></a></div>";
            //         } else {
            //             return "<div class='btn-group btn-group-sm'>" +
            //                 "<button class='vista btn btn-primary btn-sm' disabled>" +
            //                 "<i class='fas fa-eye'>" +
            //                 "</i></button>" +
            //                 "<button class='editar btn btn-info btn-sm' disabled>" +
            //                 "<i class='fas fa-pencil-alt' >" +
            //                 "</i></button>" +
            //                 "<button class='borrar btn btn-danger btn-sm' disabled>" +
            //                 "<i class='fas fa-trash'>" +
            //                 "</i></button></div>";
            //         }

            //     }

            // }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_sell_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal('#table_sell');
    });

    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}







