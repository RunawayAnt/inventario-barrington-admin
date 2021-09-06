function listProvider() {
    table_proveedor = $("#table_provider").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/person/provider/ctrl_list_provider.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            { "data": "ruc" },
            { "data": "razonsocial" },
            { "data": "correo" }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_provider_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

function listProducts() {
    table_product = $("#table_product").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/product/ctrl_list_product.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            {
                "data": "codigobarras"
            },
            { "data": "nombre" },
            {
                "data": "precioentrada", render: function (data) {
                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            },
            {
                "data": "cantidad", render: function (data, type, row) {


                    return "<h5>" + data + "</h5>";
                }
            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_product_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}



$("#pr_codebarra").keyup(function (e) {
    e.preventDefault();

    var codebar = $(this).val();
    var action = 'searchProduct'

    $.ajax({
        url: '../controller/supply/ctrl_supply_product.php',
        type: "POST",
        async: true,
        data: {
            action: action, codebar: codebar
        },
        success: function (response) {
            if (response == 0) {
                $("#pr_nom").val('');
                $("#pr_cat").val('');
                $("#pr_precioentrada").val('');
                $("#pr_cantidad").val('');
                $("#pr_medida").val('');
                $("#prov_ruc").val('');
                $("#prov_id").val('');
                $("#prov_nom").val('');
                $("#prov_phone").val('');
                $("#prov_direc").val('');
                $("#prov_email").val('');
                $("#pr_id").val('');
                $("#btnConfirmar").prop('disabled', true);

            } else {
                var data = JSON.parse(response);
                $("#pr_nom").val(data.nombre);
                $("#pr_cat").val(data.categoria);
                $("#pr_id").val(data.id_producto);
                $("#pr_precioentrada").val(Number.parseFloat(data.precioentrada).toFixed(2));
                $("#pr_cantidad").val(data.cantidad);
                $("#pr_medida").val(data.unidad);

                $("#prov_ruc").val(data.ruc);
                $("#prov_id").val(data.id_proveedor);
                $("#prov_nom").val(data.razonsocial);
                $("#prov_phone").val(data.telefono);
                $("#prov_direc").val(data.direccion);
                $("#prov_email").val(data.correo);
                $("#btnConfirmar").prop('disabled', false);

                /*$("#cl_nom").val(data.apellidos + ', ' + data.nombres);
                $("#cl_phone").val(data.telefono);
                $("#cl_id").val(data.id);
                $("#btnConfirmar").prop('disabled', false);*/
            }
        },
        error: function (error) {

        }
    })
})
$("#btnConfirmarReabast").click(function (e) {
    e.preventDefault();
    var total = $("#pr_total").val();
    //--------------------------------------
    var efectivo = $("#efectivo").val();
    var idusuario = $("#id_user").val();
    var idproducto = $("#pr_id").val();
    var cantidad = $("#prov_precio").val();
    var idproved = $("#prov_id").val();


    if (!efectivo.trim() == '' && efectivo != 0) {
        if (efectivo >= total) {
            Swal.fire({
                title: 'Procesar Abastecimiento',
                html: 'Al abastecer el producto seleccionado estara disponible para su venta de acuerdo a la cantidad minima definida.',
                imageUrl: '../templates/main/category/images/banner-de-venta.png',
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
                        html: 'Puedes revisar la informacion en la opcion <i class="nav-icon fas fa-history"></i> "Abastacemientos".',
                        showConfirmButton: false,
                        timer: 2300
                    })
                    realizarAbastec(idproducto, cantidad, idproved, idusuario, total, efectivo);
                    table_product.ajax.reload();
                } else if (result.isDenied) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Venta no confirmada'
                    })
                    //realizarVenta(efectivo, usuario, cliente);
                }
            })
        } else {
            toastr.warning('Efectivo insuficiente, por favor digite un monto mayor');
        }

    } else {
        toastr.warning('Campo Efectivo vacio, por favor digite el pago');
    }

})

function realizarAbastec(idproducto, cantidad, idproveedor, idusuario, total, efectivo) {
    if (idproducto != 0 && cantidad != 0 && idproveedor != 0 && idusuario != 0 && total != 0 && efectivo != 0) {
        $.ajax({
            url: '../controller/supply/ctrl_supply_abastc.php',
            type: "POST",
            async: true,
            data: {
                idproducto: idproducto,
                cantidad: cantidad,
                idproveedor: idproveedor,
                idusuario: idusuario,
                total: total,
                efectivo: efectivo
            },
            success: function (response) {
                console.log(response);
                if (response > 0) {
                    $("#pr_codebarra").val('');
                    $("#pr_nom").val('');
                    $("#pr_cat").val('');
                    $("#pr_precioentrada").val('');
                    $("#pr_cantidad").val('');
                    $("#pr_medida").val('');
                    $("#prov_ruc").val('');
                    $("#prov_id").val('');
                    $("#prov_nom").val('');
                    $("#prov_phone").val('');
                    $("#prov_direc").val('');
                    $("#prov_email").val('');
                    $("#pr_id").val('');
                    $("#pr_total").val('');
                    $("#efectivo").val('');
                    $("#id_user").val('');
                    $("#prov_precio").val('');
                    $("#costo").html('S/ 0.00');
                    $("#vuelto").val(0);
                    document.getElementById('collapseTwo').className = "panel-collapse collapse";
                    $("#btnConfirmar").prop('disabled', true);
                    $("#btnConfirmarReabast").prop('disabled', true);


                    dashboardAbast();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ops..'
                    })
                }
            },
            error: function (error) {

            }
        })
    }
}



$("#prov_precio").keyup(function (e) {
    e.preventDefault();

    var cantid = $(this).val();
    var precio = $("#pr_precioentrada").val();
    if (cantid > 0) {
        var t = cantid * precio;
        $("#costo").html('S/ ' + Number.parseFloat(t).toFixed(2));
        $("#pr_total").val(t);
        $("#btnConfirmarReabast").prop('disabled', false);
        $("#efectivo").prop('disabled', false)
    } else {
        $("#costo").html('S/ 0.00');
        $("#btnConfirmarReabast").prop('disabled', true);
        $("#efectivo").prop('disabled', true)
    }


})
$("#efectivo").keyup(function (e) {
    var total = $("#pr_total").val();
    var efectivo = $("#efectivo").val();

    if (efectivo > total) {
        var vuelto = efectivo - total;
        $("#vuelto").val(Number.parseFloat(vuelto).toFixed(2));
    }
    if (efectivo < total || efectivo == total) {
        $("#vuelto").val(0);
    }

});
function dashboardAbast() {
    $.ajax({
        url: '../controller/dashboard/ctrl_dashboard.php',
        type: 'POST',
    }).done(function (reply) {
        var data = JSON.parse(reply);
        var abast = data[0]['reabastecimientos'];
        $("#boxTotal").html(abast);
    })
}
var fecha = new Date(); //Fecha actual
var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");