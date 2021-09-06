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
            { "data": "posicion" },
            { "data": "ruc" },
            { "data": "razonsocial" },
            { "data": "correo" },
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
            { "data": "creacion" },
            {
                "defaultContent":
                    "<div class='btn-group btn-group-sm'>" +
                    "<a data-target='#modal-view-provider' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                    "<i class='fas fa-eye'>" +
                    "</i></a>" +
                    "<a data-target='#modal-edit-provider' onclick=notcloseModal('#modal-edit-provider') data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
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

    document.getElementById("table_provider_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}
function registProvider() {
    var subruc = $("#prov_ruc").val();//alert_prov_ruc
    let nombre = $("#prov_nombre").val();//alert_prov_nombre
    let direccion = $("#prov_direccion").val();// alert_prov_direccion
    let subcorreo = $("#prov_email").val();//alert_prov_email
    let subtelefono = $("#prov_telefono").val();//alert_prov_telefono
    //----------------------
    let domain = $("#domain").val();
    let element = /_/g;
    //----------------------
    let correo = subcorreo + domain;
    let telefono = subtelefono.replace(element, '');
    var ruc = subruc.replace(element, '');

    checkPRegister(ruc, "prov_ruc", 'alert_prov_ruc');
    checkPRegister(nombre, "prov_nombre", 'alert_prov_nombre');
    checkPRegister(direccion, "prov_direccion", 'alert_prov_direccion');
    checkPRegister(subcorreo, "prov_email", 'alert_prov_email');
    checkPRegister(telefono, "prov_telefono", 'alert_prov_telefono');

    if (!ruc.trim() == '' && ruc.length > 10 && !nombre.trim() == '' && nombre.length > 4
        && !direccion.trim() == '' && direccion.length > 4 && !subcorreo.trim() == '' && subcorreo.length > 4
        && !telefono.trim() == '' && telefono.length > 16) {

        $.ajax({
            url: '../controller/person/provider/ctrl_register_provider.php',
            type: 'POST',
            data: {
                prruc: ruc,
                prnombre: nombre,
                prdirecc: direccion,
                premail: correo,
                prtelf: telefono
            }
        }).done(function (reply) {
            //console.log(reply);
            if (reply > 0) {
                if (reply == 1) {
                    $("#modal-register-provider").modal('hide');
                    Swal.fire("Elemento registrado con exito", "Se ha registrado un nueo proveedor, por favor verifique en la lista.",
                        "success")
                        .then((result) => {
                            table.ajax.reload();
                            cleanInputs();
                        })
                } else {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'Elemento existente',
                        text: 'Proveedor ya esta registrado dentro del sistema, por favor verifique.',
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
//Estado de proveedor
$('#table_provider').on('click', '.estado', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.estado == "Activo") {
        Swal.fire({
            title: '¿Cambiar a estado inactivo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id, 'Inactivo');
            }
        })
    }
    if (data.estado == "Inactivo") {
        Swal.fire({
            title: '¿Cambiar a estado activo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
                checkEstatus(data.id, 'Activo');
            }
        })
    }
})
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
var id_editProv;
$('#table_provider').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    let division = data.correo.split(/(\@)/, 3)
    id_editProv = data.id;
    $("#prov_edtruc").val(data.ruc);
    $("#prov_edtnombre").val(data.razonsocial);
    $("#prov_edtemail").val(division[0]);
    $("#prov_edtdireccion").val(data.direccion);
    $("#prov_edttelefono").val(data.telefono);
    if (division[2] == 'Outlook.com') {
        $("#edtdomain").val("@Outlook.com");
    }
    if (division[2] == 'hotmail.com') {
        $("#edtdomain").val("@hotmail.com");
    }
    if (division[2] == 'gmail.com') {
        $("#edtdomain").val("@gmail.com");
    }

})
function editProvider() {
    let id = id_editProv;
    let edtsubruc = $("#prov_edtruc").val();
    let edtempresa = $("#prov_edtnombre").val();
    let edtsubcorreo = $("#prov_edtemail").val();
    let edtdireccion = $("#prov_edtdireccion").val();
    let edtsubtelefono = $("#prov_edttelefono").val();
    let edt_domain = $("#edtdomain").val();
    //---Reemplazar Valores correo y telefono ---//
    let element = /_/g;
    let edttelefono = edtsubtelefono.replace(element, '');
    let edtruc = edtsubruc.replace(element, '');
    let edtcorreo = edtsubcorreo + edt_domain;

    checkPRegister(edtruc, "prov_edtruc", 'alert_prov_ruc');
    checkPRegister(edtempresa, "prov_edtnombre", 'alert_prov_nombre');
    checkPRegister(edtdireccion, "prov_edtdireccion", 'alert_prov_direccion');
    checkPRegister(edtsubcorreo, "prov_edtemail", 'alert_prov_email');
    checkPRegister(edttelefono, "prov_edttelefono", 'alert_prov_telefono');
    if (!edtruc.trim() == '' && edtruc.length > 10 && !edtempresa.trim() == '' && edtempresa.length > 4
        && !edtdireccion.trim() == '' && edtdireccion.length > 4 && !edtsubcorreo.trim() == '' && edtsubcorreo.length > 4
        && !edttelefono.trim() == '' && edttelefono.length > 16) {
        $.ajax({
            url: '../controller/person/provider/ctrl_edit_provider.php',
            type: 'POST',
            data: {
                edid: id,
                edruc: edtruc,
                edrazonsocial: edtempresa,
                eddireccion: edtdireccion,
                edcorreo: edtcorreo,
                edtelefono: edttelefono
            }
        }).done(function (reply) {
            if (reply > 0) {
                $("#modal-edit-provider").modal('hide');
                Swal.fire("Elemento Editado", "Se ha editado con exito el proveedor",
                    "success")
                    .then((result) => {
                        table.ajax.reload();
                        cleanInputs(2);
                        cleanInputs(1);
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
//Obtenemos los valores al darle click a una columna para Ver informacion
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
})
//Borrar Proveedores
$('#table_provider').on('click', '.borrar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }

    Swal.fire({
        title: 'Eliminar Proveedor',
        html: '<a style="color: red;">Se perderan los datos de proveedor registrado.</a>',
        imageUrl: '../templates/main/category/images/peligro.png',
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: 'Custom image',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteProvider(data.id);
        }
    })

})
function deleteProvider(in_idprovider) {
    $.ajax({
        url: '../controller/person/provider/ctrl_delete_provider.php',
        type: 'POST',
        data: {
            id: in_idprovider
        }
    }).done(function (reply) {
        if (reply > 0) {
            Swal.fire({
                title: "Proveedor eliminado",
                icon: 'warning'
            }).then((result) => {
                table.ajax.reload();
            })
        }
    })
}
