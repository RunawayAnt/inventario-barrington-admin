//Funcion - Login
function CheckUser() {
    //document.getElementById("txt").innerHTML=valor;
    let user = $("#inUser").val();
    let pass = $("#inPass").val();
    if (user.length == 0 || pass.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    $.ajax({
        url: '../controller/user/ctrl_verify_user.php',
        type: 'POST',
        data: {
            usu: user,
            cot: pass
        }
    }).done(function (reply) {
        //const lista = [];
        //lista.push(reply);
        console.log(reply);
        if (reply == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Usuario Incorrecto',
                text: 'Verifique su usuario o contraseña',
            });
        } else {
            let list = JSON.parse(reply);
            if (list[0][7] == "Inactivo") {
                return Swal.fire({
                    icon: 'error',
                    title: 'Usuario Inactivo',
                    text: 'Su cuenta no esta activada, por favor comuniquese con el administrador',
                    footer: '<a href>Enviar Correo al Adminnistrador</a>'
                });
            }
            $.ajax({
                url: '../controller/user/ctrl_create_session.php',
                type: 'POST',
                data: {
                    id: list[0][0],
                    fname: list[0][1],
                    lname: list[0][2],
                    rol: list[0][3],
                    user: list[0][4]
                }
            }).done(function (reply) {
                if (!list[0][4] == '') {
                    location.reload();
                }
            })
        }
    })
}
//Operaciones CRUD
//Listar Usuarios
var table;
function ListUser() {
    table = $("#table_user").DataTable({
        "ordering": true,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            url: '../controller/user/ctrl_list_user.php',
            type: 'POST',
        },
        "columns": [
            { "data": "posicion" },
            //{ "data": "id" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "dni" },
            //{ "data": "email" },
            //{ "data": "telefono" },
            { "data": "nombre_rol" },
            { "data": "usuario" },
            {
                "data": "estado",
                render: function (data, type, row) {
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
                    "<a data-target='#modal-view' data-toggle='modal' class='vista btn btn-primary btn-sm' href='#'>" +
                    "<i class='fas fa-eye'>" +
                    "</i></a>" +
                    "<a data-target='#modal-edit' onclick='notcloseModalEdit();' data-toggle='modal' class='editar btn btn-info btn-sm' href='#'>" +
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

    document.getElementById("table_user_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}
$('#table_user').on('click', '.estado', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.usuario == 'admin') {
        Swal.fire({
            icon: 'error',
            title: 'Error al cambiar de estado',
            text: 'El usuario admin no puede estar inactivo, comuniquese con el equipo de soporte.',
        })
    } else {
        if (data.estado == "Activo") {
            Swal.fire({
                title: 'Cambiar a estado Inactivo?',
                text: "No habra acceso al sistema para el usuario.",
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
                title: 'Cambiar a estado Activo?',
                text: "El usuario tendra acceso al sistema.",
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
    }
    /**/
    //alert(data.id);
})
function checkEstatus(in_iduser, in_status) {
    $.ajax({
        url: '../controller/user/ctrl_mestatus_user.php',
        type: 'POST',
        data: {
            idusuario: in_iduser,
            estado: in_status
        }
    }).done(function (reply) {
        //console.log(reply);
        if (reply > 0) {
            Swal.fire({
                title: "Estado de usuario " + in_status,
                icon: 'info'
            }).then((result) => {
                table.ajax.reload();

            })
        }
    })
}
//Ver Usuario
$('#table_user').on('click', '.vista', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.estado == "Activo") {
        document.getElementById("view_estado").innerHTML = "<span class='badge badge-success'>Activo</span>";
    } else {
        document.getElementById("view_estado").innerHTML = "<span class='badge badge-danger'>Inactivo</span>";
    }
    document.getElementById("nom_ape").innerHTML = data.nombres + ", " + data.apellidos;
    document.getElementById("nom_rol").innerHTML = data.nombre_rol;
    document.getElementById("view_usuario").innerHTML = data.usuario;
    document.getElementById("li_telefono").innerHTML = data.telefono;
    document.getElementById("li_dni").innerHTML = data.dni;
    document.getElementById("li_email").innerHTML = data.email;
    document.getElementById("li_creacion").innerHTML = "Fecha de Creacion: " + data.creacion;
})
//Borrar Usuarios
$('#table_user').on('click', '.borrar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    if (data.usuario == 'admin') {
        Swal.fire({
            icon: 'error',
            title: 'Error al eliminar usuario',
            text: 'El usuario admin no puede ser eliminado',
        })
    } else {
        Swal.fire({
            title: 'Eliminar Usuario!',
            html: '<a style="color: red;">Al eliminar el usuario sus datos se perderan, otra opcion dentro del sistema es desactivarlo.</a>',
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
                deleteUser(data.id);
            }
        })
    }
})
function deleteUser(in_iduser) {
    $.ajax({
        url: '../controller/user/ctrl_delete_user.php',
        type: 'POST',
        data: {
            idusuario: in_iduser
        }
    }).done(function (reply) {
        if (reply > 0) {
            Swal.fire({
                title: "Usuario eliminado",
                icon: 'warning'
            }).then((result) => {
                table.ajax.reload();
            })
        }
    })
}
function filterGlobal() {
    $('#table_user').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function notcloseModalDefault() {
    $("#modal-default").modal({ backdrop: 'static', keyboard: false });
}
function notcloseModalEdit() {
    $("#modal-edit").modal({ backdrop: 'static', keyboard: false });
}
function ListRol() {
    $.ajax({
        "url": "../controller/user/ctrl_list_rol.php",
        type: 'POST'
    }).done(function (reply) {
        let dat = JSON.parse(reply);
        let cadena = "";
        //console.log(dat);
        if (dat.length > 0) {
            cadena += "<option selected disabled value='a'>Selecciona rol del Personal</option>";
            for (var i = 0; i < dat.length; i++) {
                cadena += "<option value='" + dat[i][0] + "'>" + dat[i][1] + "</option>";
            }
            $("#selectRol").html(cadena);
            $("#edit_selectRol").html(cadena);
        } else {
            cadena += "<option id='selectNull' class='text-danger'>Select vacio</option>";
            $("#selectRol").html(cadena);
            $("#edit_selectRol").html(cadena);
        }
    })
}
//Registrar Usuarios
function RegistUser() {
    let nombres = $("#nombres").val();
    let apellidos = $("#apellidos").val();
    let email = $("#email").val();
    let phone = $("#telefono").val();
    let dni = $("#dni").val();
    let username = $("#username").val();
    let rolpersonal = $("#selectRol").val();
    let domain = $("#domain").val();
    let password = $("#password").val();
    let password2 = $("#password2").val();

    //---Reemplazar Valores dni y telefono ---//
    let element = /_/g;
    let rephone = phone.replace(element, '');
    let redni = dni.replace(element, '');
    let correo = email + domain;

    checkBRegister(nombres, "nombres", 'alert_nombres');
    checkBRegister(apellidos, "apellidos", 'alert_apellidos');
    checkBRegister(email, "email", 'alert_email');
    checkBRegister(username, "username", 'alert_username');
    checkBRegister(redni, "dni", 'alert_dni');
    checkBRegister(rephone, "telefono", 'alert_telefono');

    if (rolpersonal == null) {
        //console.log(rolpersonal);
        document.getElementById("selectRol").className = "custom-select text-danger is-invalid";
    }
    else {
        document.getElementById("selectRol").className = "custom-select text-success is-valid";
    }
    if (password.trim() == "") {
        checkBRegister(password, "password", 'alert_password');
    } else {
        checkBRegister(password, "password", 'alert_password');
        if (password.length > 5) {
            if (password == password2) {
                checkPassword(0, 'alert_password', 'alert_password2', 'password', 'password2');

                if (checkBRegister(nombres, "nombres", 'alert_nombres') == true && checkBRegister(apellidos, "apellidos", 'alert_apellidos') == true
                    && checkBRegister(email, "email", 'alert_email') == true && checkBRegister(rephone, "telefono", 'alert_telefono') == true
                    && checkBRegister(username, "username", 'alert_username') == true && checkBRegister(redni, "dni", 'alert_dni') == true
                    && rolpersonal != null) {
                    $.ajax({
                        url: '../controller/user/ctrl_register_user.php',
                        type: 'POST',
                        data: {
                            rnombres: nombres,
                            rapellidos: apellidos,
                            rcorreo: correo,
                            rphone: rephone,
                            rdni: redni,
                            rusername: username,
                            rrolpersonal: rolpersonal,
                            rpassword: password,

                        }
                    }).done(function (reply) {
                        //console.log(reply);
                        if (reply > 0) {
                            if (reply == 1) {
                                $("#modal-default").modal('hide');
                                Swal.fire("Mensaje de Confirmacion", "Registrado con exito!",
                                    "success")
                                    .then((result) => {
                                        table.ajax.reload();
                                        //location.reload();
                                        cleanInputs(1);
                                    })
                            } else {
                                return Swal.fire({
                                    icon: 'warning',
                                    title: 'Nombre de usuario ya existe!',
                                    text: 'Registrese con otro nombre de usuario.',
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error de Registro',
                                text: 'El numero de DNI ya ha sido registrado.',
                            });
                        }


                    })
                }
            } else {
                checkPassword(1, 'alert_password', 'alert_password2', 'password', 'password2');
            }
        } else {
            checkPassword(2, 'alert_password', 'alert_password2', 'password', 'password2');
        }
    }
}
function cleanInputs(val) {
    if (val == 1) {
        $("#nombres").val("");
        document.getElementById('alert_nombres').style.display = 'none';
        document.getElementById("nombres").className = "form-control";
        $("#apellidos").val("");
        document.getElementById('alert_apellidos').style.display = 'none';
        document.getElementById("apellidos").className = "form-control";
        $("#email").val("");
        document.getElementById('alert_email').style.display = 'none';
        document.getElementById("email").className = "form-control";
        $("#telefono").val("");
        document.getElementById('alert_telefono').style.display = 'none';
        document.getElementById("telefono").className = "form-control";
        $("#dni").val("");
        document.getElementById('alert_dni').style.display = 'none';
        document.getElementById("dni").className = "form-control";
        $("#username").val("");
        document.getElementById('alert_username').style.display = 'none';
        document.getElementById("username").className = "form-control";
        $("#selectRol").val('a');
        document.getElementById("selectRol").className = "custom-select";
        $("#domain").val('@gmail.com');
        $("#password").val("");
        $("#password2").val("");
        document.getElementById('alert_password').style.display = 'none';
        document.getElementById('alert_password2').style.display = 'none';
        document.getElementById("password").className = "form-control";
        document.getElementById("password2").className = "form-control";
    }
    if (val == 2) {
        document.getElementById('edit_alert_nombres').style.display = 'none';
        document.getElementById("edit_nombres").className = "form-control";
        //------------------------
        document.getElementById('edit_alert_apellidos').style.display = 'none';
        document.getElementById("edit_apellidos").className = "form-control";
        //------------------------
        document.getElementById('edit_alert_email').style.display = 'none';
        document.getElementById("edit_email").className = "form-control";
        //------------------------
        document.getElementById('alert_telefono').style.display = 'none';
        document.getElementById("edit_telefono").className = "form-control";
        //------------------------
        document.getElementById('alert_username').style.display = 'none';
        document.getElementById("edit_username").className = "form-control";
        //------------------------
        document.getElementById('alert_dni').style.display = 'none';
        document.getElementById("edit_dni").className = "form-control";
        //------------------------
        document.getElementById("edit_selectRol").className = "custom-select";
    }
}
//Editar Usuarios
var id_editUser;
$('#table_user').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    let division = data.email.split(/(\@)/, 3)
    id_editUser = data.id;
    $("#edit_nombres").val(data.nombres);
    $("#edit_apellidos").val(data.apellidos);
    $("#edit_email").val(division[0]);
    $("#edit_dni").val(data.dni);
    $("#edit_telefono").val(data.telefono);
    $("#edit_username").val(data.usuario);
    $("#edit_selectRol").val(data.id_rol);
    if (division[2] == 'Outlook.com') {
        $("#edit_domain").val("@Outlook.com");
    }
    if (division[2] == 'hotmail.com') {
        $("#edit_domain").val("@hotmail.com");
    }
    if (division[2] == 'gmail.com') {
        $("#edit_domain").val("@gmail.com");
    }

})
function editUser() {
    let id = id_editUser;
    let nombres = $("#edit_nombres").val();
    let apellidos = $("#edit_apellidos").val();
    let email = $("#edit_email").val();
    let phone = $("#edit_telefono").val();
    let dni = $("#edit_dni").val();
    let username = $("#edit_username").val();
    let rolpersonal = $("#edit_selectRol").val();
    let domain = $("#edit_domain").val();

    //---Reemplazar Valores dni y telefono ---//
    let element = /_/g;
    let rephone = phone.replace(element, '');
    let redni = dni.replace(element, '');
    let correo = email + domain;

    checkBEdit(nombres, "edit_nombres", 'edit_alert_nombres');
    checkBEdit(apellidos, "edit_apellidos", 'edit_alert_apellidos');
    checkBEdit(email, "edit_email", 'alert_email');
    checkBEdit(username, "edit_username", 'alert_username');
    checkBEdit(redni, "edit_dni", 'alert_dni');
    checkBEdit(rephone, "edit_telefono", 'alert_telefono');
    document.getElementById("edit_selectRol").className = "custom-select text-success is-valid";

    if (checkBRegister(nombres, "nombres", 'alert_nombres') == true && checkBRegister(apellidos, "apellidos", 'alert_apellidos') == true
        && checkBRegister(email, "email", 'alert_email') == true && checkBRegister(rephone, "telefono", 'alert_telefono') == true
        && checkBRegister(username, "username", 'alert_username') == true && checkBRegister(redni, "dni", 'alert_dni') == true
        && rolpersonal != null) {
        document.getElementById("edit_selectRol").className = "custom-select text-success is-valid";
        //console.log(id + "-" + nombres + "-" + apellidos + "-" + rephone + "-" + correo + "-" + username + "-" + rolpersonal);
        $.ajax({
            url: '../controller/user/ctrl_edit_user.php',
            type: 'POST',
            data: {
                edit_id: id,
                edit_rolusuario: rolpersonal,
                edit_nombres: nombres,
                edit_apellidos: apellidos,
                edit_dni: redni,
                edit_username: username,
                edit_correo: correo,
                edit_phone: rephone
            }
        }).done(function (reply) {
            //console.log(reply);
            if (reply > 0) {
                $("#modal-edit").modal('hide');
                Swal.fire("Elemento Editado", "Se ha editado con exito el usuario",
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
                    text: 'Se ha detectado un error!',
                    footer: '<a href>Comuniquese con el equipo de soporte</a>'
                })
            }
        })
    }
}
function checkBEdit(value, id, alert) {
    //console.log(value + id);

    if (value.trim() == "") {
        //console.log("vacio");
        document.getElementById(alert).style.display = 'none';
        document.getElementById(id).className = "form-control is-invalid";

    } else {
        //-------Numero Telefonico
        if (id == "edit_telefono" && value.length >= 17) {
            //console.log("exito"+" "+value.length+" "+value);
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            document.getElementById(alert).innerHTML = 'Numeros correctos';
            document.getElementById(id).className = "form-control is-valid";
            return true;
        }
        if (id == "edit_telefono" && value.length <= 17) {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            document.getElementById(alert).innerHTML = 'Faltan Numeros';
            document.getElementById(id).className = "form-control is-warning";
            return false;
        }
        if (id == "edit_dni" && value.length >= 8) {
            //console.log("exito"+" "+value.length+" "+value);
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            document.getElementById(alert).innerHTML = 'Numeros correctos';
            document.getElementById(id).className = "form-control is-valid";
            return true;
        }
        if (id == "edit_dni" && value.length <= 8) {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            document.getElementById(alert).innerHTML = 'Faltan Numeros';
            document.getElementById(id).className = "form-control is-warning";
            return false;
        }
        //-------Otros elementos
        if (value.length > 4) {
            if (id == "edit_nombres") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            if (id == "edit_apellidos") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            if (id == "edit_email") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            if (id == "edit_username") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Numeros correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            else {
                return false;
            }

        } else {

            if (id == "edit_nombres") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                document.getElementById(alert).innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            if (id == "edit_apellidos") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                document.getElementById(alert).innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            if (id == "edit_email") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                //document.getElementById('alert_email').innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            if (id == "edit_username") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                document.getElementById(alert).innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            else {
                return false;
            }

        }
    }
}
