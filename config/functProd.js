/*
 * **LISTAR PRODUCTOS EN TABLA PRODUCTOS
 */

/* ---------------------------------------------------------------
?Funcion para listar los productos agregados en la tabla
------------------------------------------------------------------*/

function listProducts() {
    table = $("#table_product").DataTable({
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
            {
                "data": "posicion", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                "data": "codigobarras", render: function (data) {
                    return "<script>  JsBarcode('#barcode" + data + "', '" + data + "', { format: 'codabar',width: 1,height: 20,  fontSize: 14});</script> <svg id='barcode" + data + "'></svg>";
                }
            },
            {
                "data": "nombre", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            // { "data": "unidad" },

            // {
            //     "data": "precioentrada", render: function (data) {
            //         return "S/ " + Number.parseFloat(data).toFixed(2);
            //     }
            // },
            {
                "data": "preciosalida", render: function (data, type, row) {
                    if (row.estado == 'Activo') {
                        return '<p>S/ ' + Number.parseFloat(data).toFixed(2) + '</p>';
                    } else {
                        return '<p class="text-gray">S/ ' + Number.parseFloat(data).toFixed(2) + '</p>';
                    }
                }
            },
            // { "data": "mininventario" },
            {

                "data": "cantidad", render: function (data, type, row) {
                    if (row.estado == 'Activo') {
                        if (data <= parseInt(row.mininventario)) {
                            return "<h5 class='text-danger'><i class='fas fa-long-arrow-alt-down'></i> " + data + "</h5>";
                        } else {
                            return "<h5 class='text-success'><i class='fas fa-long-arrow-alt-up'></i> " + data + "</h5>";
                        }
                    } else {
                        if (data <= parseInt(row.mininventario)) {
                            return "<h5 class='text-gray'><i class='fas fa-long-arrow-alt-down'></i> " + data + "</h5>";
                        } else {
                            return "<h5 class='text-gray'><i class='fas fa-long-arrow-alt-up'></i> " + data + "</h5>";
                        }
                    }

                }
            },
            {
                "data": "creacion", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                "data": "estado", render: function (data, type, row) {
                    if (data == 'Activo') {
                        return "<span class='btn btn-success btn-sm'>" + data + "</span>&nbsp;" +
                            "<button class='estado btn btn-sm' href='#'>" +
                            "<i class='fa fa-fw fa-cog'>" +
                            "</i></button>";
                    } else {
                        return "<span class='btn btn-danger btn-sm'>" + data + "</span>&nbsp;" +
                            "<button class='estado btn btn-sm' href='#'>" +
                            "<i class='fa fa-fw fa-cog'>" +
                            "</i></button>";
                    }
                }
            },
            {
                "defaultContent": "", render: function (data, type, row) {
                    if (row.estado == 'Activo') {
                        return "<div class='btn-group btn-group-sm'>" +
                            "<a data-target='#modal-view-product' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                            "<i class='fas fa-eye'>" +
                            "</i></a>" +
                            "<a data-target='#modal-edit-product' onclick=notcloseModal('#modal-edit-product') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
                            "<i class='fas fa-pencil-alt' >" +
                            "</i></a></div>";
                    } else {
                        return "<div class='btn-group btn-group-sm'>" +
                            "<button class='vista btn btn-primary btn-sm' disabled>" +
                            "<i class='fas fa-eye'>" +
                            "</i></button>" +
                            "<button class='editar btn btn-info btn-sm' disabled>" +
                            "<i class='fas fa-pencil-alt' >" +
                            "</i></button></div>";
                    }

                }
            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_product_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal('#table_product');
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

/*
 * **OPERACIONES PARA REGISTRO DE NUEVO PRODUCTO
 */

/* ---------------------------------------------------------------
?Funcion para listar categorias dentro del formulario 'registrar producto'
------------------------------------------------------------------*/

function listPCategory() {
    $.ajax({
        url: '../controller/product/ctrl_selectc_product.php',
        type: 'POST'
    }).done(function (reply) {
        let data = JSON.parse(reply);
        let cadena = "";
        if (data.length > 0) {
            cadena += "<option selected disabled value='a'>Selecciona Categoria</option>";
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#select_category").html(cadena);
            $("#select_category_edt").html(cadena);
        } else {
            cadena += "<option id='selectNull' class='text-danger'>Select vacio</option>";
            $("#select_category").html(cadena);
            $("#select_category_edt").html(cadena);

        }
    })
}

/* ---------------------------------------------------------------
?Funcion para listar proveedores dentro del formulario 'registrar producto'
------------------------------------------------------------------*/

function listPProveedor() {
    $.ajax({
        url: '../controller/product/ctrl_selectp_product.php',
        type: 'POST'
    }).done(function (reply) {
        let data = JSON.parse(reply);
        let cadena = "";
        if (data.length > 0) {
            cadena += "<option selected disabled value='a'>Selecciona Proveedor</option>";
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#select_provider").html(cadena);
            $("#select_provider_edt").html(cadena);

        } else {
            cadena += "<option id='selectNull' class='text-danger'>Select vacio</option>";
            $("#select_provider").html(cadena);
            $("#select_provider_edt").html(cadena);

        }
    })

}

/* ---------------------------------------------------------------
?Funcion para crear codigo de manera aleatoria a cada nuevo producto
------------------------------------------------------------------*/

function rand_code(lettf, lettl, chars, lon) {
    code = "";
    for (x = 0; x < lon; x++) {
        rand = Math.floor(Math.random() * chars.length);
        code += chars.substr(rand, 1);
    }
    return lettf + code + lettl;
}

caracteres = "0123456789";
longitud = 8;

/* ---------------------------------------------------------------
?Funcion para registrar producto 
------------------------------------------------------------------*/

function registProduct() {
    let formRegs = document.querySelector('.register-modal');

    let codigobarras = rand_code('D', 'A', caracteres, longitud)
    let nombrepr = $("#prod_nom").val();
    let caractpr = $("#prod_descrip").val();
    let categoriapr = $("#select_category").val();
    let proveedorpr = $("#select_provider").val();
    let precioentradapr = $("#prod_precentrada").val();
    let preciosalidapr = $("#prod_precsalida").val();
    let unidadpr = $("#select_unid").val();
    let inventariomin = $("#prod_mini").val();
    let cantidad = $("#prod_cant").val();
    let idusarios = $("#usuarioid").val();

    if (prod_descrip.disabled == true) {
        caractpr = 'Not description';
    }

    // if (!nombrepr.trim() == '' && nombrepr.length > 2 && !codigobarras.trim() == '' &&
    //     codigobarras.length > 2 && !categoriapr.trim() == '' && !proveedorpr.trim() == '' 
    //     && precioentradapr < preciosalidapr && inventariomin < cantidad && unidadpr !== null 
    //     && !caractpr.trim() == '') {

    if (!nombrepr.trim() == '') {
        $.ajax({
            url: '../controller/product/ctrl_register_product_op.php',
            type: 'POST',
            data: {
                codeb: codigobarras,
                nomb: nombrepr,
                descrip: caractpr,
                idcateg: categoriapr,
                idprov: proveedorpr,
                precentrada: precioentradapr,
                precsalida: preciosalidapr,
                unid: unidadpr,
                mininv: inventariomin,
                idusuario: idusarios
            }
        }).done(function (reply) {

            if (reply > 0) {
                if (reply == 1) {
                    idCategory(cantidad);
                    $("#modal-register-product").modal('hide');
                    Swal.fire("Elemento registrado", "El elemento se ha registrado exitosamente.",
                        "success")
                        .then((result) => {
                            table.ajax.reload();
                            inputClear(formRegs);
                            //location.reload();
                        })
                } else {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'Elemento existente',
                        text: 'El elemento ya está registrado en el sistema.',
                        footer: '<h6 style="color:gray">Por favor, verifique el elemento en la lista.</h6>'
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Se ha detectado un error!',
                    footer: '<a href>Comuniquese con el equipo de soporte</a>'
                })
            }
        })
    }
}

/* ---------------------------------------------------------------
?Funcion para registrar una operacion de entrada al mismo tiempo que el registro del producto
------------------------------------------------------------------*/

var id;
function idCategory(in_cantidad) {
    $.ajax({
        url: '../controller/product/ctrl_id_product.php',
        type: 'POST'
    }).done(function (reply) {
        var cat_id = JSON.parse(reply);
        id = cat_id[0][0];
        registerOperation(in_cantidad, id)
    })
}

function registerOperation(cantidad, id) {
    $.ajax({
        url: '../controller/product/ctrl_register_operation_op.php',
        type: 'POST',
        data: {
            idprod: id,
            cantid: cantidad
        }
    }).done(function (reply) {
        let data = JSON.parse(reply);
        // console.log(data);
    })
}

/*
 * **CAMBIAR ESTADO DEL PRODUCTO SELECCIONADO
*/

$('#table_product').on('click', '.estado', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.estado == "Activo") {
        Swal.fire({
            title: 'Cambiar a estado inactivo',
            html: 'Al cambiar a estado "inactivo" el elemento se deshabilitara para operaciones de ventas y reabastecimientos.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#C0C0C0',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id_producto, 'Inactivo');
            }
        })
    }
    if (data.estado == "Inactivo") {
        Swal.fire({
            title: 'Cambiar a estado activo',
            html: 'Al cambiar a estado "activo" el elemento se habilitara para operaciones de ventas y reabastecimientos.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#C0C0C0',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id_producto, 'Activo');
            }
        })
    }
})

/* ---------------------------------------------------------------
?Funcion para cambiar estado del producto
------------------------------------------------------------------*/

function checkEstatus(in_id, in_status) {
    //console.log(in_id + '-' + in_status);
    $.ajax({
        url: '../controller/product/ctrl_mestatus_product.php',
        type: 'POST',
        data: {
            id_producto: in_id,
            estado: in_status
        }
    }).done(function (reply) {
        if (reply > 0) {
            Swal.fire({
                title: "Estado de producto " + in_status,
                icon: 'info'
            }).then((result) => {
                table.ajax.reload();
            })
        }
    })
}

/*
 * **OPERACIONES PARA EDITAR PRODUCTO
 */

/* ---------------------------------------------------------------
?Evento 'click' para mostrar datos de producto por id
------------------------------------------------------------------*/

var id_editProduct;

$('#table_product').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }

    id_editProduct = data.id_producto;

    // console.log(data.descripcion);

    if (data.descripcion == 'Not description') {
        $('.icon').removeClass('fa fa-toggle-off').addClass('fa fa-toggle-on');
        $('#description_register').prop('disabled', true);
        $("#description_register").val('');
    } else {
        $('.icon').removeClass('fa fa-toggle-on').addClass('fa fa-toggle-off');
        $('#description_register').prop('disabled', false);
        $("#description_register").val(data.descripcion);
    }

    // $(".code-bar-edit").empty();
    // $(".code-bar-edit").append(`<svg id="barcodeedt${data.codigobarras}"></svg>`)

    // JsBarcode(`#barcodeedt${data.codigobarras}`, data.codigobarras, {
    //     format: 'codabar',
    //     width: 2,
    //     height: 40,
    //     fontSize: 14
    // });
    $("#prod_nom_edt").val(data.nombre);
    $("#prod_precentrada_edt").val(data.precioentrada);
    $("#prod_precsalida_edt").val(data.preciosalida);
    $("#prod_mini_edt").val(data.mininventario);
    $("#select_category_edt").val(data.id_categoria);
    $("#select_provider_edt").val(data.id_proveedor);
    $("#select_unid_edt").val(data.unidad);

})

/* ---------------------------------------------------------------
?Funcion para editar producto
------------------------------------------------------------------*/

function editProduct() {
    let id_product = id_editProduct;
    let edt_nom = $('#prod_nom_edt').val();
    let edt_descrip = $('#description_register').val();
    let edt_precentrada = $('#prod_precentrada_edt').val();
    let edt_precsalida = $('#prod_precsalida_edt').val();
    let edt_mini = $('#prod_mini_edt').val();
    let edt_category = $('#select_category_edt ').val();
    let edt_provider = $('#select_provider_edt').val();
    let edt_unid = $("#select_unid_edt").val();

    if (description_register.disabled == true) {
        edt_descrip = 'Not description';
    }
    // console.log('::', edt_descrip);
    if (!edt_nom.trim() == '' && edt_nom.length > 3 && edt_precentrada < edt_precsalida && edt_descrip.length > 2) {
        $.ajax({
            url: '../controller/product/ctrl_edit_product.php',
            type: 'POST',
            data: {
                edit_id: id_product,
                edit_nom: edt_nom,
                edit_descrip: edt_descrip,
                edit_prentrada: edt_precentrada,
                edit_prsalida: edt_precsalida,
                edit_mininv: edt_mini,
                edit_categ: edt_category,
                edit_prov: edt_provider,
                edit_unid: edt_unid
            }
        }).done(function (reply) {
            if (reply > 0) {
                $("#modal-edit-product").modal('hide');
                Swal.fire("Elemento Editado", "...",
                    "success")
                    .then((result) => {
                        table.ajax.reload();
                    })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Se ha detectado un error!',
                    footer: '<a href>Comuniquese con el equipo de soporte</a>'
                })
            }
        })
    }

    /*validateInputs(edt_categoria, 'edit_nombre_categoria', 'alert_nombre_categoria');
    validateInputs(edt_descripcion, 'edit_textarea', 'alert_textarea');
    if (edit_textarea.disabled == true) {
        edt_descripcion = 'Not description';
    }*/

}

// //Borrar Proveedores
// $('#table_product').on('click', '.borrar', function () {
//     var data = table.row($(this).parents('tr')).data();
//     if (table.row(this).child.isShown()) {
//         var data = table.row(this).data();
//     }

//     Swal.fire({
//         title: 'Eliminar Producto',
//         html: '<a style="color: red;">Se perderan los datos de proveedor registrado.</a>',
//         imageUrl: '../templates/main/category/images/peligro.png',
//         imageWidth: 100,
//         imageHeight: 100,
//         imageAlt: 'Custom image',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Eliminar'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             deleteProvider(data.id_producto);
//         }
//     })

// })

// function deleteProvider(in_idproducto) {
//     $.ajax({
//         url: '../controller/product/ctrl_delete_product.php',
//         type: 'POST',
//         data: {
//             id: in_idproducto
//         }
//     }).done(function (reply) {
//         if (reply > 0) {
//             Swal.fire({
//                 title: "Categoria eliminada",
//                 imageUrl: '../templates/main/category/images/peligro.png',
//                 imageWidth: 150,
//                 imageHeight: 150,
//                 imageAlt: 'Custom image'
//             }).then((result) => {
//                 table.ajax.reload();
//             })
//         } else {
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Oops...',
//                 text: 'Se ha detectado un error!',
//                 footer: '<a href>Comuniquese con el equipo de soporte</a>'
//             })
//         }
//     })
// }