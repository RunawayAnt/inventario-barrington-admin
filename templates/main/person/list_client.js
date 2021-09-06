$(function () {
    $('[data-mask]').inputmask()
})
//Carga Lista
$(document).ready(function () {
    listClient();
});
//Filtro Global del input de la tabla al input creado
function filterGlobal() {
    $('#table_client').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
//Evitamos cerrar los modal
function notcloseModal(nomModal) {
    $(nomModal).modal({ backdrop: 'static', keyboard: false });
}
//Validar input
function checkPRegister(value, id, alert) {

    if (value.trim() == "") {
        document.getElementById(alert).style.display = 'none';
        document.getElementById(id).className = "form-control is-invalid";
    }
    if (!value.trim() == "") {
        if (value.length > 7) {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            document.getElementById(alert).innerHTML = 'Caracteres correctos';
            document.getElementById(id).className = "form-control is-valid";
        } else {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            document.getElementById(alert).innerHTML = 'Minimo 8 caracteres';
            document.getElementById(id).className = "form-control is-warning";
        }
    }

    if (id == 'cli_telefono') {
        if (value.trim() == "") {
            document.getElementById(alert).style.display = 'none';
            document.getElementById(id).className = "form-control is-invalid";
        }
        if (!value.trim() == "") {
            if (value.length > 16) {
                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
            } else {
                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                document.getElementById(alert).innerHTML = 'Faltan Numeros';
                document.getElementById(id).className = "form-control is-warning";
            }
        }
    }
}
//Permitir caracteres para Text Area y Input
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
        numlet = "_.áéíóúabcdefghijklmnñopqrstuvwxyz1234567890"
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
//Limpiar Inputs
function cleanInputs() {
    //console.log(1);
    $("#cli_nombres").val("");
    document.getElementById('alert_cli_nombres').innerHTML = '';
    document.getElementById('cli_nombres').className = "form-control";
    $("#cli_apellidos").val("");
    document.getElementById('alert_cli_apellidos').innerHTML = '';
    document.getElementById('cli_apellidos').className = "form-control";
    $("#cli_dni").val("");
    document.getElementById('alert_cli_dni').innerHTML = '';
    document.getElementById('cli_dni').className = "form-control";
    $("#cli_telefono").val("");
    document.getElementById('alert_cli_telefono').innerHTML = '';
    document.getElementById('cli_telefono').className = "form-control";
    $("#cli_email").val("");
    document.getElementById('alert_cli_email').innerHTML = '';
    document.getElementById('cli_email').className = "form-control";
}
