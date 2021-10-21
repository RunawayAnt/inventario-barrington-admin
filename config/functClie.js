/*
 * **LISTAR CLIENTES
 */

/* ---------------------------------------------------------------
?Funcion para listar los clientes 
------------------------------------------------------------------*/

var table;

function listClient() {
    table = $("#table_client").DataTable({
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
            {
                "data": "correo", render: function (data, type, row) {
                    if (data == 'correo_null') {
                        return '<span class="badge bg-secondary">sin correo electronico</span>'
                    } else {
                        return data
                    }
                }
            },
            // { "data": "creacion" },
            {
                "defaultContent":
                    "<div class='btn-group btn-group-sm'>" +
                    "<a data-target='#modal-edit-client' onclick=notcloseModal('#modal-edit-client'); data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
                    "<i class='fas fa-pencil-alt'>" +
                    "</i></a></div>"
            }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("table_client_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal('#table_client');
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}


/*
 * **REGISTRAR CLIENTES
 */

/* ---------------------------------------------------------------
?Funcion para registrar clientes
------------------------------------------------------------------*/

function registClient() {
    let nombres = $("#cli_nombres").val();
    let apellid = $("#cli_apellidos").val();
    let dni = $("#cli_dni").val();
    let email = $("#cli_email").val();
    let telefonoA = $("#cli_telefono").val();
    let formRegs = document.querySelector('.register-modal');
    let element = /_/g;
    let rephone = telefonoA.replace(element, '');
    let redni = dni.replace(element, '');

    if (email.trim() == '') {
        email = 'correo_null'
    }

    checkPRegister(nombres, "cli_nombres", 'alert_cli_nombres');
    checkPRegister(apellid, "cli_apellidos", 'alert_cli_apellidos');
    checkPRegister(redni, "cli_dni", 'alert_cli_dni');
    checkPRegister(rephone, "cli_telefono", 'alert_cli_telefono');

    if (!nombres.trim() == '' && nombres.length > 3 && !apellid.trim() == '' && apellid.length > 3 &&
        !redni.trim() == '' && redni.length > 7 &&
        !rephone.trim() == '' && rephone.length > 16) {

        $.ajax({
            url: '../controller/person/client/ctrl_register_client.php',
            type: 'POST',
            data: {
                clnombres: nombres,
                clapellidos: apellid,
                clcorreo: email,
                clphone: rephone,
                cldni: redni
            }
        }).done(function (reply) {
            if (reply > 0) {
                if (reply == 1) {
                    $("#modal-register-client").modal('hide');
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
 * **EDITAR CONTENIDO DE LOS CLIENTES
 */

/* ---------------------------------------------------------------
?Evento click para editar clientes
------------------------------------------------------------------*/

var id_editProv;

$('#table_client').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    // let division = data.correo.split(/(\@)/, 3)
    id_editProv = data.id;
    $("#cli_edtnombres").val(data.nombres);
    $("#cli_edtapellidos").val(data.apellidos);
    $("#cli_edtdni").val(data.dni);
    $("#cli_edttelefono").val(data.telefono);
    if (data.correo == 'correo_null') {
        $("#cli_edtemail").val('');
    } else {
        $("#cli_edtemail").val(data.correo);
    }
});


function editClient() {
    let formEdit = document.querySelector('.edit-modal');

    let id = id_editProv;
    let nombres = $("#cli_edtnombres").val();
    let apellid = $("#cli_edtapellidos").val();
    let redni = $("#cli_edtdni").val();
    let email = $("#cli_edtemail").val();
    let retelefono = $("#cli_edttelefono").val();

    // let domain = $("#edtdomain").val();
    let element = /_/g;
    // let correo = email + domain;
    let telefono = retelefono.replace(element, '');
    let dni = redni.replace(element, '');

    if (email.trim() == '') {
        email = 'correo_null'
    }

    checkPRegister(nombres, "cli_edtnombres", 'alert_cli_nombres');
    checkPRegister(apellid, "cli_edtapellidos", 'alert_cli_apellidos');
    checkPRegister(dni, "cli_edtdni", 'alert_cli_dni');
    checkPRegister(telefono, "cli_edttelefono", 'alert_cli_telefono');

    if (!nombres.trim() == '' && nombres.length > 3 && !apellid.trim() == '' && apellid.length > 3 &&
        !dni.trim() == '' && dni.length > 7 &&
        !telefono.trim() == '' && telefono.length > 16) {

        $.ajax({
            url: '../controller/person/client/ctrl_edit_client.php',
            type: 'POST',
            data: {
                edid: id,
                ednombres: nombres,
                edapellidos: apellid,
                edcorreo: email,
                edtelf: telefono,
                eddni: dni
            }
        }).done(function (reply) {
            if (reply > 0) {
                $("#modal-edit-client").modal('hide');
                Swal.fire("Elemento Editado", "Se ha editado con exito el cliente",
                    "success")
                    .then((result) => {
                        table.ajax.reload();
                        // inputClear(formEdit);
                        inputClear(formEdit);
                    })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Se ha detectado un error, el numero DNI ya esta asignado a un Cliente',
                    footer: '<a href>Comuniquese con el equipo de soporte</a>'
                })
            }
        })
    }
}

// $('#table_client').on('click', '.borrar', function () {
//     var data = table.row($(this).parents('tr')).data();
//     if (table.row(this).child.isShown()) {
//         var data = table.row(this).data();
//     }

//     Swal.fire({
//         title: 'Eliminar Cliente',
//         html: '<a style="color: red;">Se perderan los datos del cliente registrado.</a>',
//         imageUrl: '../startbootstrap/img/peligro.png',
//         imageWidth: 100,
//         imageHeight: 100,
//         imageAlt: 'Custom image',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Eliminar'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             deleteProvider(data.id);
//         }
//     })

// })
// function deleteProvider(in_idclient) {
//     $.ajax({
//         url: '../controller/person/client/ctrl_delete_client.php',
//         type: 'POST',
//         data: {
//             id: in_idclient
//         }
//     }).done(function (reply) {
//         if (reply > 0) {
//             Swal.fire({
//                 title: "Cliente eliminado",
//                 icon: 'warning'
//             }).then((result) => {
//                 table.ajax.reload();
//             })
//         }
//     })
// }