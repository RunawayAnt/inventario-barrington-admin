$(document).ready(function () {
    ListUser();
    ListRol();
});

$(function () {
    $('[data-mask]').inputmask()
})
function enableLettrs(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        specialPars = [8, 37],
        specialKey = false;

    for (var i in specialPars) {
        if (key == specialPars[i]) {
            specialKey = true;
            break;
        }
    }

    if (letters.indexOf(keybr) == -1 && !specialKey) {
        return false;
    }
}
function enableLettrsNum(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        //letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        numlet = "_áéíóúabcdefghijklmnñopqrstuvwxyz1234567890"
    specialPars = [8, 37, 39, 46],
        specialKey = false;


    for (var i in specialPars) {
        if (key == specialPars[i]) {
            specialKey = true;
            break;
        }
    }

    if (numlet.indexOf(keybr) == -1 && !specialKey) {
        return false;
    }
}
function checkBRegister(value, id, alert) {
    //console.log(value + id);

    if (value.trim() == "") {
        //console.log("vacio");
        document.getElementById(alert).style.display = 'none';
        document.getElementById(id).className = "form-control is-invalid";

    } else {
        //-------Numero Telefonico
        if (id == "telefono" && value.length >= 17) {
            //console.log("exito"+" "+value.length+" "+value);
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            document.getElementById(alert).innerHTML = 'Numeros correctos';
            document.getElementById(id).className = "form-control is-valid";
            return true;
        }
        if (id == "telefono" && value.length <= 17) {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            document.getElementById(alert).innerHTML = 'Faltan Numeros';
            document.getElementById(id).className = "form-control is-warning";
            return false;
        }
        if (id == "dni" && value.length >= 8) {
            //console.log("exito"+" "+value.length+" "+value);
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            document.getElementById(alert).innerHTML = 'Numeros correctos';
            document.getElementById(id).className = "form-control is-valid";
            return true;
        }
        if (id == "dni" && value.length <= 8) {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            document.getElementById(alert).innerHTML = 'Faltan Numeros';
            document.getElementById(id).className = "form-control is-warning";
            return false;
        }
        //-------Otros elementos
        if (value.length > 4) {
            if (id == "nombres") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            if (id == "apellidos") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            if (id == "email") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
                return true;
            }
            if (id == "username") {
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

            if (id == "nombres") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                document.getElementById(alert).innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            if (id == "apellidos") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                document.getElementById(alert).innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            if (id == "email") {
                //console.log("exito");

                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                //document.getElementById('alert_email').innerHTML = '(maximo 5 caracteres)';
                document.getElementById(id).className = "form-control is-warning";
                return false;
            }
            if (id == "username") {
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
function checkPassword(value, alert1, alert2, id1, id2) {
    if (value == 0) {
        document.getElementById(alert2).style.display = 'block';
        document.getElementById(alert2).className = "text-success";
        document.getElementById(alert2).innerHTML = 'Contraseñas confirmadas';
        document.getElementById(alert1).innerHTML = '';
        document.getElementById(id1).className = "form-control text-success is-valid";
        document.getElementById(id2).className = "form-control text-success is-valid";
    }
    if (value == 1) {
        document.getElementById(alert2).style.display = 'block';
        document.getElementById(alert2).className = "text-danger";
        document.getElementById(alert2).innerHTML = 'Contraseñas diferentes';
        document.getElementById(alert1).innerHTML = '';
        document.getElementById(id1).className = "form-control text-danger is-invalid";
        document.getElementById(id2).className = "form-control text-danger is-invalid";
    }
    if (value == 2) {
        document.getElementById(alert1).style.display = 'block';
        document.getElementById(alert1).className = "text-warning";
        document.getElementById(alert1).innerHTML = 'maximo 6 caracteres';
        document.getElementById(id1).className = "form-control text-warning is-warning";
    }
}
function showPassword(change) {
    //var change = document.getElementById("password");
    //console.log(cambio);
    if (change.type == "password") {
        change.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    } else {
        change.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

