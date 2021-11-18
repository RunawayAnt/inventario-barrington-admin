/*
 * **LISTAR CATEGORIAS EN TABLA CATEGORIAS
 */

/* ---------------------------------------------------------------
?Funcion para listar las categorias agregadas
------------------------------------------------------------------*/

var table;

function listCategory() {
    table = $("#table_category").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/category/ctrl_list_category.php',
            type: 'POST',
        },
        "columns": [
            {
                "data": "posicion", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                "data": "nombre", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
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
                        return "<span class='btn btn-success btn-sm'>Activo</span>&nbsp;" +
                            "<button class='estado btn btn-sm' href='#'>" +
                            "<i class='fa fa-fw fa-cog'>" +
                            "</i></button>";
                    } else {
                        return "<span class='btn btn-danger btn-sm'>Inactivo</span>&nbsp;" +
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
                            "<a data-target='#modal-view-category' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                            "<i class='fas fa-eye'>" +
                            "</i></a>" +
                            "<a data-target='#modal-edit-category' onclick=notcloseModal('#modal-edit-category') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
                            "<i class='fas fa-pencil-alt' >" +
                            "</i></a>" +
                            "<a class='borrar btn btn-danger btn-sm' href='#'>" +
                            "<i class='fas fa-trash'>" +
                            "</i></a></div>";
                    } else {
                        return "<div class='btn-group btn-group-sm'>" +
                            "<button class='vista btn btn-primary btn-sm' disabled>" +
                            "<i class='fas fa-eye'>" +
                            "</i></button>" +
                            "<button class='editar btn btn-info btn-sm' disabled>" +
                            "<i class='fas fa-pencil-alt' >" +
                            "</i></button>" +
                            "<button class='borrar btn btn-danger btn-sm' disabled>" +
                            "<i class='fas fa-trash'>" +
                            "</i></button></div>";
                    }

                }

            }
        ],

        "language": idioma_espanol,
        select: true
    });

    document.getElementById("table_category_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal('#table_category');
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

/*
 * **REGISTRAR CATEGORIAS
 */

/* ---------------------------------------------------------------
?Funcion para registrar categorias
------------------------------------------------------------------*/

function registCategory() {
    let descrip = $('#textarea').val();
    let categ = $('#nombre_categoria').val();

    let formRegs = document.querySelector('.register-modal');

    validateInputs(categ, 'nombre_categoria', 'alert_nombre_categoria');
    validateInputs(descrip, 'textarea', 'alert_textarea');
    if (textarea.disabled == true) {
        descrip = 'Not description';
    }
    if (!descrip.trim() == '' && descrip.length > 3 && !categ.trim() == '' && categ.length > 3) {

        $.ajax({
            url: '../controller/category/ctrl_register_category.php',
            type: 'POST',
            data: {
                rcategoria: categ,
                rdescripcion: descrip,
            }
        }).done(function (reply) {
            if (reply > 0) {
                if (reply == 1) {
                    $("#modal-register-category").modal('hide');
                    Swal.fire("Elemento registrado", "El elemento se ha registrado exitosamente.",
                        "success")
                        .then((result) => {
                            table.ajax.reload();
                            inputClear(formRegs);
                        })
                } else {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'Elemento ya existe',
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

/*
 * **ESTADO DE LAS CATEGORIAS
 */

/* ---------------------------------------------------------------
?Evento click para cambiar el estado de la categoria
------------------------------------------------------------------*/

$('#table_category').on('click', '.estado', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.estado == "Activo") {
        Swal.fire({
            title: 'Cambiar a estado inactivo',
            html: 'Al cambiar a estado "inactivo" el elemento se deshabilitara como opcion del producto',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#C0C0C0',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id_categoria, 'Inactivo');
            }
        })
    }
    if (data.estado == "Inactivo") {
        Swal.fire({
            title: 'Cambiar a estado activo',
            html: 'Al cambiar a estado "activo" el elemento se habilitara como opcion del producto.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#C0C0C0',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id_categoria, 'Activo');
            }
        })
    }
})


/* ---------------------------------------------------------------
?Funcion para cambiar el estado de categoria
------------------------------------------------------------------*/

function checkEstatus(in_id, in_status) {
    $.ajax({
        url: '../controller/category/ctrl_mestatus_category.php',
        type: 'POST',
        data: {
            id_categoria: in_id,
            estado: in_status
        }
    }).done(function (reply) {
        if (reply > 0) {
            Swal.fire({
                title: "Elemento " + in_status,
                icon: 'info'
            }).then((result) => {
                table.ajax.reload();
            })
        }
    })
}

/*
 * **EDITAR CONTENIDO DE LAS CATEGORIAS
 */

/* ---------------------------------------------------------------
?Evento click para editar categoria
------------------------------------------------------------------*/

var id_editCategory;
$('#table_category').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    id_editCategory = data.id_categoria;
    if (data.descripcion == 'Not description') {
        $('#edit_textarea').val('');
        $('.icon').removeClass('fa fa-toggle-off').addClass('fa fa-toggle-on');
        $(edit_textarea).prop('disabled', true);
        $("#edit_nombre_categoria").val(data.nombre);
    } else {
        $('#edit_textarea').val(data.descripcion);
        $('.icon').removeClass('fa fa-toggle-on').addClass('fa fa-toggle-off');
        $(edit_textarea).prop('disabled', false);
        $("#edit_nombre_categoria").val(data.nombre);
    }
})

/* ---------------------------------------------------------------
?Funcion para editar categoria
------------------------------------------------------------------*/

function editCategory() {
    let id_category = id_editCategory;

    let formEdit = document.querySelector('.edit-modal');

    let edt_categoria = $('#edit_nombre_categoria').val();
    let edt_descripcion = $('#edit_textarea').val();
    validateInputs(edt_categoria, 'edit_nombre_categoria', 'alert_nombre_categoria');
    validateInputs(edt_descripcion, 'edit_textarea', 'alert_textarea');

    if (edit_textarea.disabled == true) {
        edt_descripcion = 'Not description';
    }

    if (!edt_descripcion.trim() == '' && edt_descripcion.length > 5 && !edt_categoria.trim() == '' && edt_categoria.length > 3) {
        $.ajax({
            url: '../controller/category/ctrl_edit_category.php',
            type: 'POST',
            data: {
                edit_id: id_category,
                edit_categoria: edt_categoria,
                edit_descripcion: edt_descripcion,
            }
        }).done(function (reply) {
            if (reply > 0) {
                $("#modal-edit-category").modal('hide');
                Swal.fire("Elemento Editado", "Se ha editado con exito la categoria",
                    "success")
                    .then((result) => {
                        table.ajax.reload();
                        inputClear(formEdit);
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

}

/*
 * **ELIMINAR LAS CATEGORIAS
 */

/* ---------------------------------------------------------------
?Evento click para eliminar categoria
------------------------------------------------------------------*/

$('#table_category').on('click', '.borrar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Eliminar elemento categoria',
        html: 'Por favor antes de eliminar, los productos asignados deben ser cambiados de categoria.',
        // imageUrl: '../startbootstrap/img/peligro.png',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#C0C0C0',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteCategory(data.id_categoria);
        }
    })
})

/* ---------------------------------------------------------------
?Funcion para eliminar categoria
------------------------------------------------------------------*/

function deleteCategory(idCateg) {
    $.ajax({
        url: '../controller/category/ctrl_delete_category.php',
        type: 'POST',
        data: {
            idcategoria: idCateg
        }
    }).done(function (reply) {
        if (reply > 0) {
            Swal.fire({
                title: "Elemento eliminado",
                // imageUrl: '../startbootstrap/img/peligro.png',
                icon: 'warning',
                imageAlt: 'Custom image'
            }).then((result) => {
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

/* ---------------------------------------------------------------
?Evento click para mostrar informacion de la categoria
------------------------------------------------------------------*/

$('#table_category').on('click', '.vista', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.descripcion == 'Not description') {
        document.getElementById("c_nombre").innerHTML = data.nombre;
        document.getElementById("c_creacion").innerHTML = data.creacion.substr(0, 10) + " Hora: " + data.creacion.substr(11);
        document.getElementById("c_descrip").innerHTML = '<a style="color: #F0A5A5;"> Sin descripcion</a>';
    } else {
        document.getElementById("c_nombre").innerHTML = data.nombre;
        document.getElementById("c_creacion").innerHTML = data.creacion.substr(0, 10) + " Hora: " + data.creacion.substr(11);
        document.getElementById("c_descrip").innerHTML = data.descripcion;
    }
})