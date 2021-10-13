//?___Cargamos funciones y eventos   
//?___:mejorado:

$(document).ready(function () {
    listProvider();

    $('#btn-cancel').click(function () {
        let form = this.parentNode.parentNode.parentNode;
        inputClear(form);
    });

    $('#btn-close').click(function () {
        let form = this.parentNode.nextSibling;
        inputClear(form);
    });
});


//!───────────────────
//! FALTAN MEJORAR
//!!──────────────────

$(function () {
    $('[data-mask]').inputmask()
})

//Permitir caracteres para Text Area y Input
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

function enableLettrs(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        letters = " áéíóúabcdefghijklmnñopqrstuvwxyz-.",
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

function enableLN(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        //letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        numlet = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890.;,"
    specialPars = [8],
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

//Validar input
function checkPRegister(value, id, alert) {
    if (value.trim() == "") {
        document.getElementById(alert).style.display = 'none';
        document.getElementById(id).className = "form-control is-invalid";
    }
    if (!value.trim() == "") {
        if (value.length > 4) {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            // document.getElementById(alert).innerHTML = 'Caracteres correctos';
            document.getElementById(id).className = "form-control is-valid";
        } else {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            // document.getElementById(alert).innerHTML = 'Pocos Caracteres (>5)';
            document.getElementById(id).className = "form-control is-warning";
        }
    }

    if (id == 'prov_telefono') {
        if (value.trim() == "") {
            document.getElementById(alert).style.display = 'none';
            document.getElementById(id).className = "form-control is-invalid";
        }
        if (!value.trim() == "") {
            if (value.length > 16) {
                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                // document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
            } else {
                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                // document.getElementById(alert).innerHTML = 'Faltan digitos';
                document.getElementById(id).className = "form-control is-warning";
            }
        }
    }
    if (id == 'prov_ruc') {
        if (value.trim() == "") {
            document.getElementById(alert).style.display = 'none';
            document.getElementById(id).className = "form-control is-invalid";
        }
        if (!value.trim() == "") {
            if (value.length > 10) {
                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-success";
                // document.getElementById(alert).innerHTML = 'Caracteres correctos';
                document.getElementById(id).className = "form-control is-valid";
            } else {
                document.getElementById(alert).style.display = 'block';
                document.getElementById(alert).className = "text-warning";
                // document.getElementById(alert).innerHTML = 'Faltan digitos, por favor agregue los digitos que faltan';
                document.getElementById(id).className = "form-control is-warning";
            }
        }
    }
}

/*
!   INHABILITADO
!   *para evitar codigo redundante*
*/

// //Filtro Global del input de la tabla al input creado
// function filterGlobal() {
//     $('#table_provider').DataTable().search(
//         $('#global_filter').val(),
//     ).draw();
// }

// //Evitamos cerrar los modal
// function notcloseModal(nomModal) {
//     $(nomModal).modal({ backdrop: 'static', keyboard: false });
// }

//function cleanInputs() {
//     document.getElementById('alert_prov_ruc').innerHTML = '';
//     document.getElementById('prov_ruc').className = "form-control";
//     document.getElementById('prov_edtruc').className = "form-control";
//     $("#prov_ruc").val("");
//     document.getElementById('alert_prov_nombre').innerHTML = '';
//     document.getElementById('prov_nombre').className = "form-control";
//     document.getElementById('prov_edtnombre').className = "form-control";
//     $("#prov_nombre").val("");
//     document.getElementById('alert_prov_direccion').innerHTML = '';
//     document.getElementById('prov_direccion').className = "form-control";
//     document.getElementById('prov_edtdireccion').className = "form-control";
//     $("#prov_direccion").val("");
//     document.getElementById('alert_prov_email').innerHTML = '';
//     document.getElementById('prov_email').className = "form-control";
//     document.getElementById('prov_edtemail').className = "form-control";
//     $("#prov_email").val("");
//     document.getElementById('alert_prov_telefono').innerHTML = '';
//     document.getElementById('prov_telefono').className = "form-control";
//     document.getElementById('prov_edttelefono').className = "form-control";
//     $("#prov_telefono").val("");
//     //console.log('sssss');
// }
