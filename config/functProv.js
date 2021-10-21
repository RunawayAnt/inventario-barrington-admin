/*
 * **LISTAR PROVEEDORES
 */

/* ---------------------------------------------------------------
?Funcion para listar los proveedores 
------------------------------------------------------------------*/


function listProvider() {
    table = $("#table_provider").DataTable({
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
            {
                "data": "posicion", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                "data": "ruc", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                "data": "razonsocial", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                "data": "correo", render: function (data, type, row) {
                    if (data == 'correo_null') {
                        return '<span class="badge bg-secondary">sin correo electronico</span>'
                    } else {
                        return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                    }
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
                "data": "creacion", render: function (data, type, row) {
                    return row.estado == 'Activo' ? '<p>' + data + '</p>' : '<p class="text-gray">' + data + '</p>';
                }
            },
            {
                // "defaultContent":
                //     "<div class='btn-group btn-group-sm'>" +
                //     "<a data-target='#modal-view-provider' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                //     "<i class='fas fa-eye'>" +
                //     "</i></a>" +
                //     "<a data-target='#modal-edit-provider' onclick=notcloseModal('#modal-edit-provider') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
                //     "<i class='fas fa-pencil-alt'>" +
                //     "</i></a>" +
                //     "<a class='borrar btn btn-danger btn-sm' href='#'>" +
                //     "<i class='fas fa-trash'>" +
                //     "</i></a></div>"

                "defaultContent": "", render: function (data, type, row) {
                    if (row.estado == 'Activo') {
                        return "<div class='btn-group btn-group-sm'>" +
                            "<a data-target='#modal-view-provider' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                            "<i class='fas fa-eye'>" +
                            "</i></a>" +
                            "<a data-target='#modal-edit-provider' onclick=notcloseModal('#modal-edit-provider') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
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

    document.getElementById("table_provider_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal('#table_provider');
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

/*
 * **REGISTRAR PROVEEDORES
 */

/* ---------------------------------------------------------------
?Funcion para registrar proveedores
------------------------------------------------------------------*/

function registProvider() {
    var subruc = $("#prov_ruc").val();//alert_prov_ruc
    let nombre = $("#prov_nombre").val();//alert_prov_nombre
    let direccion = $("#prov_direccion").val();// alert_prov_direccion
    let subcorreo = $("#prov_email").val();//alert_prov_email
    let subtelefono = $("#prov_telefono").val();//alert_prov_telefono

    // let domain = $("#domain").val();
    let element = /_/g;

    // let correo = subcorreo + domain;
    let telefono = subtelefono.replace(element, '');
    var ruc = subruc.replace(element, '');

    let formRegs = document.querySelector('.register-modal');

    if (subcorreo.trim() == '') {
        subcorreo = 'correo_null'
    }

    checkPRegister(ruc, "prov_ruc", 'alert_prov_ruc');
    checkPRegister(nombre, "prov_nombre", 'alert_prov_nombre');
    checkPRegister(direccion, "prov_direccion", 'alert_prov_direccion');
    // checkPRegister(subcorreo, "prov_email", 'alert_prov_email');
    checkPRegister(telefono, "prov_telefono", 'alert_prov_telefono');

    if (!ruc.trim() == '' && ruc.length > 10 && !nombre.trim() == '' && nombre.length > 4
        // && !direccion.trim() == '' && direccion.length > 4 && !subcorreo.trim() == '' && subcorreo.length > 4
        && !direccion.trim() == '' && direccion.length > 4
        && !telefono.trim() == '' && telefono.length > 16) {

        $.ajax({
            url: '../controller/person/provider/ctrl_register_provider.php',
            type: 'POST',
            data: {
                prruc: ruc,
                prnombre: nombre,
                prdirecc: direccion,
                premail: subcorreo,
                prtelf: telefono
            }
        }).done(function (reply) {
            //console.log(reply);
            if (reply > 0) {
                if (reply == 1) {
                    $("#modal-register-provider").modal('hide');
                    Swal.fire("Elemento registrado", "El elemento se ha registrado exitosamente.",
                        "success")
                        .then((result) => {
                            table.ajax.reload();
                            inputClear(formRegs);
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

/*
 * **ESTADO DE LOS PROVEEDORES
 */

/* ---------------------------------------------------------------
?Evento click para cambiar el estado de los proveedores
------------------------------------------------------------------*/

$('#table_provider').on('click', '.estado', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.estado == "Activo") {
        Swal.fire({
            title: 'Cambiar a estado inactivo',
            html: 'Al cambiar a estado "inactivo" el elemento se deshabilitara como opcion para el proceso de venta.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#C0C0C0',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id, 'Inactivo');
            }
        })
    }
    if (data.estado == "Inactivo") {
        Swal.fire({
            title: 'Cambiar a estado activo',
            html: 'Al cambiar a estado "activo" el elemento se habilitara como opcion para el proceso de venta.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#C0C0C0',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id, 'Activo');
            }
        })
    }
})

/* ---------------------------------------------------------------
?Funcion para cambiar el estado del proveedor
------------------------------------------------------------------*/

function checkEstatus(in_id, in_status) {
    $.ajax({
        url: '../controller/person/provider/ctrl_mestatus_provider.php',
        type: 'POST',
        data: {
            id_proveedor: in_id,
            estado: in_status
        }
    }).done(function (reply) {
        if (reply > 0) {
            Swal.fire({
                title: "Estado de proveedor " + in_status,
                icon: 'info'
            }).then((result) => {
                table.ajax.reload();
            })
        }
    })
}

/*
 * **EDITAR CONTENIDO DE LOS PROVEEDORES
 */

/* ---------------------------------------------------------------
?Evento click para editar proveedor
------------------------------------------------------------------*/

var id_editProv;

$('#table_provider').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    id_editProv = data.id;
    $("#prov_edtruc").val(data.ruc);
    $("#prov_edtnombre").val(data.razonsocial);
    $("#prov_edtdireccion").val(data.direccion);
    $("#prov_edttelefono").val(data.telefono);
    if (data.correo == 'correo_null') {
        $("#prov_edtemail").val('');
    } else {
        $("#prov_edtemail").val(data.correo);
    }
});

/* ---------------------------------------------------------------
?Funcion para editar proveedor
------------------------------------------------------------------*/

function editProvider() {
    let formEdit = document.querySelector('.edit-modal');

    let id = id_editProv;
    let edtsubruc = $("#prov_edtruc").val();
    let edtempresa = $("#prov_edtnombre").val();
    let edtsubcorreo = $("#prov_edtemail").val();
    let edtdireccion = $("#prov_edtdireccion").val();
    let edtsubtelefono = $("#prov_edttelefono").val();

    let element = /_/g;
    let edttelefono = edtsubtelefono.replace(element, '');
    let edtruc = edtsubruc.replace(element, '');

    if (edtsubcorreo.trim() == '') {
        edtsubcorreo = 'correo_null'
    }

    checkPRegister(edtruc, "prov_edtruc", 'alert_prov_ruc');
    checkPRegister(edtempresa, "prov_edtnombre", 'alert_prov_nombre');
    checkPRegister(edtdireccion, "prov_edtdireccion", 'alert_prov_direccion');
    checkPRegister(edttelefono, "prov_edttelefono", 'alert_prov_telefono');
    if (!edtruc.trim() == '' && edtruc.length > 10 && !edtempresa.trim() == '' && edtempresa.length > 3
        && !edtdireccion.trim() == '' && edtdireccion.length > 4
        && !edttelefono.trim() == '' && edttelefono.length > 16) {
        $.ajax({
            url: '../controller/person/provider/ctrl_edit_provider.php',
            type: 'POST',
            data: {
                edid: id,
                edruc: edtruc,
                edrazonsocial: edtempresa,
                eddireccion: edtdireccion,
                edcorreo: edtsubcorreo,
                edtelefono: edttelefono
            }
        }).done(function (reply) {
            if (reply > 0) {
                $("#modal-edit-provider").modal('hide');
                Swal.fire("Elemento Editado", "Se ha editado con exito el proveedor",
                    "success")
                    .then((result) => {
                        table.ajax.reload();
                        inputClear(formEdit);
                    })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Se ha detectado un error, el codigo RUC ya esta asignado a un Proveedor',
                    footer: '<a href>Comuniquese con el equipo de soporte</a>'
                })
            }
        })
    }

}

/* ---------------------------------------------------------------
?Evento click para mostrar informacion del proveedor
------------------------------------------------------------------*/

$('#table_provider').on('click', '.vista', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    document.getElementById("p_ruc").innerHTML = data.ruc;
    document.getElementById("p_empresa").innerHTML = data.razonsocial;
    document.getElementById("p_direccion").innerHTML = data.direccion;
    document.getElementById("p_correo").innerHTML = data.correo;
    document.getElementById("p_telefono").innerHTML = data.telefono;
    document.getElementById("p_creacion").innerHTML = data.creacion.substr(0, 10) + " Hora: " + data.creacion.substr(11);
});

// /*
//  * **ELIMINAR LOS PROVEEDORES
//  */

/* ---------------------------------------------------------------
/?Evento click para eliminar proveedor
------------------------------------------------------------------*/
// $('#table_provider').on('click', '.borrar', function () {
//     var data = table.row($(this).parents('tr')).data();
//     if (table.row(this).child.isShown()) {
//         var data = table.row(this).data();
//     }

//     Swal.fire({
//         title: 'Eliminar proveedor',
//         html: 'Por favor antes de eliminar, los productos asignados deben ser cambiados de categoria.',
//         // imageUrl: '../startbootstrap/img/peligro.png',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#007bff',
//         cancelButtonColor: '#C0C0C0',
//         confirmButtonText: 'Eliminar'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             deleteProvider(data.id);
//         }
//     })

// })

/* ---------------------------------------------------------------
/?Funcion para eliminar proveedor
------------------------------------------------------------------*/

// function deleteProvider(in_idprovider) {
//     $.ajax({
//         url: '../controller/person/provider/ctrl_delete_provider.php',
//         type: 'POST',
//         data: {
//             id: in_idprovider
//         }
//     }).done(function (reply) {
//         if (reply > 0) {
//             Swal.fire({
//                 title: "Proveedor eliminado",
//                 icon: 'warning'
//             }).then((result) => {
//                 table.ajax.reload();
//             })
//         }
//     })
// }
