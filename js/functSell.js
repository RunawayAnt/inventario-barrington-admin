function listProducts() {
    table = $("#table_productos").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/product/ctrl_list_products_active.php',
            type: 'POST',
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
            {
                "data": "estado", render: function (data, type, row) {
                    return "<span class='badge badge-success'>" + data + "</span>";
                }
            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_productos_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

function listClient() {
    table = $("#table_clientes").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/person/client/ctrl_list_client.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            { "data": "dni" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "telefono" },
            { "data": "correo" },
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_clientes_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

$("#cl_dni").keyup(function (e) {
    e.preventDefault();

    var cl = $(this).val();
    var action = 'searchCliente'

    $.ajax({
        url: '../controller/sell/ctrl_sell_client.php',
        type: "POST",
        async: true,
        data: {
            action: action, cliente: cl
        },
        success: function (response) {
            if (response == 0) {
                $("#cl_nom").val('');
                $("#cl_phone").val('');


            } else {
                var data = JSON.parse(response);
                $("#cl_nom").val(data.apellidos + ', ' + data.nombres);
                $("#cl_phone").val(data.telefono);
                $("#cl_id").val(data.id);
                $("#btnConfirmar").prop('disabled', false);
                //$("#pr_codebar").prop('disabled', false);

            }
        },
        error: function (error) {

        }
    })
})
var fecha = new Date(); //Fecha actual
var mes = fecha.getMonth() + 1; //obteniendo mes
var dia = fecha.getDate(); //obteniendo dia
var ano = fecha.getFullYear(); //obteniendo año


$("#btn_agregar_producto").click(function (e) {
    e.preventDefault();

    if ($("#pr_cantd").val() > 0) {
        var id_producto = $("#pr_id").html();
        var cantidad = $("#pr_cantd").val();
        var action = 'addProductoDetalle';
        var id_user = $("#id_user").val();

        $.ajax({
            url: '../controller/sell/ctrl_sell_addproduct.php',
            type: "POST",
            async: true,
            data: {
                action: action, product: id_producto, cantidad: cantidad, id_user: id_user
            },
            success: function (response) {

                var data = JSON.parse(response);
                $("#pr_total").val(data.precioTotal);
                $("#tabla_detalle_venta").html(data.detalle);
                $("#tabla_costo_venta").html(data.total);
                $("#fecha_venta").html("Monto adeudado " + dia + "/" + mes + "/" + ano);
                $("#pr_id").html('-');
                $("#pr_descrip").html('-');
                $("#pr_existe").html('0');
                $("#pr_preciounit").html('0.00');
                $("#boxTotal").html(data.precioTotal);
                $("#pr_preciototal").html('0.00');
                $("#pr_cantd").prop('disabled', true);
                $("#pr_cantd").val(0);
                document.getElementById("call").style.display = 'block';

                $("#pr_codebar").val('');
                document.getElementById("btn_agregar_producto").style.display = 'none';
                $("#efectivo").prop('disabled', false);
                $("#btnConfirmarVenta").prop('disabled', false);
                $("#btnAnularVenta").prop('disabled', false);
            },
            error: function (error) {

            }
        })
    }

})

$("#btnAnularVenta").click(function (e) {
    var id_user = $("#id_user").val();

    $.ajax({
        url: '../controller/sell/ctrl_sell_destroy.php',
        type: "POST",
        async: true,
        data: {
            user: id_user
        },
        success: function (response) {
            console.log(response);
            if (response > 0) {
                $("#pr_id").html('-');
                $("#pr_descrip").html('-');
                $("#pr_existe").html('0');
                $("#pr_preciounit").html('0.00');
                $("#pr_preciototal").html('0.00');
                $("#pr_codebar").prop('disabled', true);
                $("#pr_cantd").prop('disabled', true);
                $("#efectivo").prop('disabled', true);
                $("#btnConfirmarVenta").prop('disabled', true);
                $("#btnAnularVenta").prop('disabled', true);
                document.getElementById("btn_agregar_producto").style.display = 'none';
                document.getElementById("call").style.display = 'none';
                $("#tabla_costo_venta").html('');
                $("#tabla_detalle_venta").html('');
                $("#boxTotal").html(0);
                $("#efectivo").val('');
                $("#vuelto").val('');
            }
        },
        error: function (error) {

        }
    })
})
$("#btnConfirmarVenta").click(function (e) {
    e.preventDefault();
    var total = $("#pr_total").val();
    //--------------------------------------
    var efectivo = $("#efectivo").val();
    var usuario = $("#id_user").val();
    var cliente = $("#id").html();

    if (!efectivo.trim() == '' && efectivo != 0) {
        Swal.fire({
            title: 'Procesar Venta',
            html: 'Al procesar la venta los productos seleccionados deben ser revisados por sus cantidad en stock.',
            imageUrl: '../startbootstrap/img/banner-de-venta.png',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Custom image',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Venta realizada',
                    html: 'Puedes revisar la informacion de la venta en la opcion <i class="nav-icon fas fa-shopping-cart"></i> "Ventas".',
                    showConfirmButton: false,
                    timer: 2300
                })
                realizarVenta(efectivo, usuario, cliente);
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    title: 'Venta no confirmada'
                })
            }
        })
    } else {
        toastr.warning('Campo Efectivo vacio, por favor digite el pago');
    }

})

function realizarVenta(efect, iduser, idcl) {
    if (idcl != 0 && iduser != 0) {
        $.ajax({
            url: '../controller/sell/ctrl_sell.php',
            type: "POST",
            async: true,
            data: {
                idusuario: iduser, idcliente: idcl, efectivo: efect
            },
            success: function (response) {

                var data = JSON.parse(response);
                if (data.total > 0) {
                    console.log('venta realizada');
                    $("#pr_id").html('-');
                    $("#pr_descrip").html('-');
                    $("#pr_existe").html('0');
                    $("#pr_preciounit").html('0.00');
                    $("#pr_preciototal").html('0.00');
                    $("#pr_codebar").prop('disabled', true);
                    $("#pr_cantd").prop('disabled', true);
                    $("#efectivo").prop('disabled', true);
                    $("#btnConfirmarVenta").prop('disabled', true);
                    $("#btnAnularVenta").prop('disabled', true);
                    document.getElementById("btn_agregar_producto").style.display = 'none';
                    document.getElementById("call").style.display = 'none';
                    $("#tabla_costo_venta").html('');
                    $("#tabla_detalle_venta").html('');
                    $("#boxTotal").html(0);
                    $("#efectivo").val('');
                    $("#vuelto").val('');
                    $("#nombre").html('');
                    $("#docdni").html('');
                    $("#telfono").html('');
                    $("#id").html('');
                } else {
                    console.log('error');
                }
            },
            error: function (error) {

            }
        })
    }
}




$("#efectivo").keyup(function (e) {
    var total = $("#pr_total").val();
    var efectivo = $("#efectivo").val();

    if (efectivo > total) {
        var vuelto = efectivo - total;
        $("#vuelto").val(vuelto);
    }
    if (efectivo < total || efectivo == total) {
        $("#vuelto").val(0);
    }

});

function obtenerProductoId(id) {

    var id_prod = id;
    var id_user = $("#id_user").val();
    if (id_prod != 0) {
        $.ajax({
            url: '../controller/sell/ctrl_sell_delete.php',
            type: "POST",
            async: true,
            data: {
                id: id_prod, user: id_user
            },
            success: function (response) {
                var data = JSON.parse(response);

                if (data.precioTotal > 0) {
                    $("#tabla_detalle_venta").html(data.detalle);
                    $("#tabla_costo_venta").html(data.total);
                    $("#boxTotal").html(data.precioTotal);

                } else {
                    $("#tabla_costo_venta").html('');
                    $("#tabla_detalle_venta").html('');
                    $("#boxTotal").html(data.precioTotal);

                    $("#efectivo").prop('disabled', true);
                    $("#btnConfirmarVenta").prop('disabled', true);
                    $("#btnAnularVenta").prop('disabled', true);
                    $("#efectivo").val('');
                    $("#vuelto").val('');
                }
            },
            error: function (error) {

            }
        })
    }
}

function enviarDatos() {
    var dni = $("#cl_dni").val();
    var nomape = $("#cl_nom").val();
    var phonet = $("#cl_phone").val();
    var id = $("#cl_id").val();
    var nope = '';

    $("#nombre").html(nomape);
    $("#docdni").html(dni);
    $("#telfono").html(phonet);
    $("#id").html(id);
    $("#cl_dni").val('');
    $("#cl_nom").val('');
    $("#cl_phone").val('');
    $("#btnConfirmar").prop('disabled', true);
    $("#pr_codebar").prop('disabled', false);
}

function searchforDetails(id) {
    var id_user = id;

    $.ajax({
        url: '../controller/sell/ctrl_sell_pagedetails.php',
        type: "POST",
        async: true,
        data: {
            id_usuario: id_user
        },
        success: function (response) {
            //CODIGO EJEMPLO: D23385827A

            //console.log(response);
            var data = JSON.parse(response);
            if (data.detalle != 0 && data.total != 0) {
                $("#tabla_detalle_venta").html(data.detalle);
                $("#tabla_costo_venta").html(data.total);
                $("#fecha_venta").html("Monto adeudado " + dia + "/" + mes + "/" + ano);
                document.getElementById("call").style.display = 'block';
                $("#boxTotal").html(data.precioTotal);
            } else {
                $("#tabla_costo_venta").html();
                $("#fecha_venta").html();
                document.getElementById("call").style.display = 'none';
                $("#boxTotal").html(data.precioTotal);

            }
        },
        error: function (error) {

        }
    })
}

$("#pr_codebar").keyup(function (e) {
    e.preventDefault();

    var product = $(this).val();
    var action = 'infoProducto'
    if (product.trim() != '') {
        $.ajax({
            url: '../controller/sell/ctrl_sell_product.php',
            type: "POST",
            async: true,
            data: {
                action: action, product: product
            },
            success: function (response) {
                if (response != 'error!') {
                    var data = JSON.parse(response);

                    if (parseInt(data.mininventario) < parseInt(data.cantidad)) {
                        $("#pr_id").html(data.id_producto);
                        $("#pr_descrip").html(data.nombre);
                        $("#pr_existe").html(data.cantidad);
                        $("#pr_preciounit").html(Number.parseFloat(data.preciosalida).toFixed(2));
                        $("#pr_cantd").prop('disabled', false);
                        $("#pr_cantd").val(0);
                        inputsSell(false);
                    } else {
                        $("#pr_id").html(data.id_producto);
                        $("#pr_descrip").html(data.nombre);
                        $("#pr_existe").html(data.cantidad);
                        $("#pr_preciounit").html(Number.parseFloat(data.preciosalida).toFixed(2));
                        $("#pr_cantd").prop('disabled', true);
                        inputsSell(true);
                    }
                } else {
                    $("#pr_id").html('-');
                    $("#pr_descrip").html('-');
                    $("#pr_existe").html('0');
                    $("#pr_preciounit").html('0.00');
                    $("#pr_preciototal").html('0.00');
                    $("#pr_cantd").prop('disabled', true);
                    inputsSell(false);
                }
            },
            error: function (error) {

            }
        })
    }

})

$("#pr_cantd").keyup(function (e) {
    e.preventDefault();
    var precioT = $(this).val() * $("#pr_preciounit").html();
    var existencia = parseInt($("#pr_existe").html());
    var cant = $(this).val();
    if (cant <= existencia && cant > 0) {
        $("#pr_preciototal").html(Number.parseFloat(precioT).toFixed(2));
        document.getElementById('pr_cantd').className = "form-control";
        document.getElementById("btn_agregar_producto").style.display = 'block';
    } else {
        $("#pr_preciototal").html('0.00');
        document.getElementById('pr_cantd').className = "form-control is-invalid";
        document.getElementById("btn_agregar_producto").style.display = 'none';

    }

})

