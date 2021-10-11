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
            { "data": "posicion" },
            {
                "data": "codigobarras", render: function (data) {
                    return "<script>  JsBarcode('#barcode" + data + "', '" + data + "', { format: 'codabar',width: 1,height: 20,});</script> <svg id='barcode" + data + "'></svg>";
                }
            },
            { "data": "nombre" },
            // { "data": "unidad" },

            // {
            //     "data": "precioentrada", render: function (data) {
            //         return "S/ " + Number.parseFloat(data).toFixed(2);
            //     }
            // },
            {
                "data": "preciosalida", render: function (data) {
                    return "S/ " + Number.parseFloat(data).toFixed(2);
                }
            },
            // { "data": "mininventario" },
            {

                "data": "cantidad", render: function (data, type, row) {
                    if (data <= parseInt(row.mininventario)) {
                        return "<h5 class='text-danger'><i class='fas fa-long-arrow-alt-down'></i> " + data + "</h5>";
                    } else {
                        return "<h5 class='text-success'><i class='fas fa-long-arrow-alt-up'></i> " + data + "</h5>";
                    }
                }
            },
            { "data": "creacion" },
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
                "defaultContent":
                    "<div class='btn-group btn-group-sm'>" +
                    "<a data-target='#modal-view-product' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                    "<i class='fas fa-eye'>" +
                    "</i></a>" +
                    "<a data-target='#modal-edit-product' onclick=notcloseModal('#modal-edit-product') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
                    "<i class='fas fa-pencil-alt'>" +
                    "</i></a>" +
                    "<a class='borrar btn btn-danger btn-sm' href='#'>" +
                    "<i class='fas fa-trash'>" +
                    "</i></a></div>"
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

    if (!nombrepr.trim() == '' && nombrepr.length > 2 && !codigobarras.trim() == '' && codigobarras.length > 2) {

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
                    $("#modal-register-category").modal('hide');
                    Swal.fire("Elemento registrado con exito", "Se ha registrado un nuevo producto.",
                        "success")
                        .then((result) => {
                            table.ajax.reload();
                            //location.reload();
                        })
                } else {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'Elemento existente',
                        text: 'El producto ya existe',
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
        console.log(data);
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
            title: '¿Desea inhabilitar el producto?',
            html: '<a style="color: gray;">...</a>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id_producto, 'Inactivo');
            }
        })
    }
    if (data.estado == "Inactivo") {
        Swal.fire({
            title: '¿Desa habilitar el producto?',
            html: '<a style="color: gray;">...</a>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
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
                title: "Se ha cambiado el estado del producto",
                icon: 'info'
            }).then((result) => {
                table.ajax.reload();
            })
        }
    })
}



// var id_editProduct;
// $('#table_product').on('click', '.editar', function () {
//     var data = table.row($(this).parents('tr')).data();
//     if (table.row(this).child.isShown()) {
//         var data = table.row(this).data();
//     }
//     id_editProduct = data.id_producto;
//     console.log(data.id_producto)
//     $("#prod_codigobarra_edt").val(data.codigobarras);
//     $("#prod_nom_edt").val(data.nombre);
//     $("#prod_descrip_edt").val(data.descripcion);
//     $("#prod_precentrada_edt").val(data.precioentrada);
//     $("#prod_precsalida_edt").val(data.preciosalida);
//     $("#prod_mini_edt").val(data.mininventario);
//     $("#select_category_edt").val(data.id_categoria);
//     $("#select_provider_edt").val(data.id_proveedor);
// })

// function editProduct() {
//     let id_product = id_editProduct;
//     let edt_nom = $('#prod_nom_edt').val();
//     let edt_descrip = $('#prod_descrip_edt ').val();
//     let edt_precentrada = $('#prod_precentrada_edt').val();
//     let edt_precsalida = $('#prod_precsalida_edt').val();
//     let edt_mini = $('#prod_mini_edt').val();
//     let edt_category = $('#select_category_edt ').val();
//     let edt_provider = $('#select_provider_edt').val();
//     let edt_unid = $("#select_unid_edt").val();

//     if (!edt_nom.trim() == '' && edt_nom.length > 5 && !edt_descrip.trim() == '' && edt_descrip.length > 5) {
//         $.ajax({
//             url: '../controller/product/ctrl_edit_product.php',
//             type: 'POST',
//             data: {
//                 edit_id: id_product,
//                 edit_nom: edt_nom,
//                 edit_descrip: edt_descrip,
//                 edit_prentrada: edt_precentrada,
//                 edit_prsalida: edt_precsalida,
//                 edit_mininv: edt_mini,
//                 edit_categ: edt_category,
//                 edit_prov: edt_provider,
//                 edit_unid: edt_unid
//             }
//         }).done(function (reply) {
//             if (reply > 0) {
//                 $("#modal-edit-product").modal('hide');
//                 Swal.fire("Elemento Editado", "Se ha editado con exito el producto",
//                     "success")
//                     .then((result) => {
//                         table.ajax.reload();
//                     })
//             } else {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Oops...',
//                     text: 'Se ha detectado un error!',
//                     footer: '<a href>Comuniquese con el equipo de soporte</a>'
//                 })
//             }
//         })
//     }
//     /*validateInputs(edt_categoria, 'edit_nombre_categoria', 'alert_nombre_categoria');
//     validateInputs(edt_descripcion, 'edit_textarea', 'alert_textarea');
//     if (edit_textarea.disabled == true) {
//         edt_descripcion = 'Not description';
//     }
//     */

// }
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