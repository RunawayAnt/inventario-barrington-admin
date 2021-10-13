//Carga Lista
$(document).ready(function () {
    listCategory();
});

//Desactivar o Activar Text-area

function show_Textarea(change) {
    //var change = document.getElementById("password");
    if (change.disabled == true) {
        //change.type = "text";
        $('.icon').removeClass('fa fa-toggle-on').addClass('fa fa-toggle-off');
        $(change).prop('disabled', false);
    } else {
        //change.type = "password";
        $('.icon').removeClass('fa fa-toggle-off').addClass('fa fa-toggle-on');
        //document.getElementById('text_btnarea').innerHTML = 'Descripcion';
        $(change).prop('disabled', true);
        document.getElementById('alert_textarea').innerHTML = '';
        document.getElementById('textarea').className = "form-control";
        document.getElementById('edit_textarea').className = "form-control";
    }
}

//Limpiar Inputs despues de registrar categorias

function cleanInputs() {
    //console.log(1);
    document.getElementById('alert_nombre_categoria').innerHTML = '';
    document.getElementById('alert_textarea').innerHTML = '';
    document.getElementById('textarea').className = "form-control";
    document.getElementById('nombre_categoria').className = "form-control";
}

//Permitir caracteres para Text Area y Input

function enableLettrsTextArea(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        letters = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890/()",
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

//Validar Inputs

function validateInputs(va, id, alert) {
    if (textarea.disabled == true && id == 'textarea' || edit_textarea.disabled == true && id == 'edit_textarea') {
        document.getElementById('alert_textarea').innerHTML = '';
        document.getElementById('textarea').className = "form-control";
        document.getElementById('edit_textarea').className = "form-control";
        return false;
    }
    if (va.trim() == '') {
        //Input descripcion
        document.getElementById(alert).style.display = 'block';
        document.getElementById(alert).className = "text-danger";
        document.getElementById(alert).innerHTML = 'Casilla vacia, por favor rellenar';
        document.getElementById(id).className = "form-control is-invalid";
        return false;
    }
    else {
        if (va.length > 5) {
            //Input descripcion
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-success";
            document.getElementById(alert).innerHTML = '';
            document.getElementById(id).className = "form-control is-valid";
            return true;
        } else {
            document.getElementById(alert).style.display = 'block';
            document.getElementById(alert).className = "text-warning";
            document.getElementById(alert).innerHTML = 'Caracteres mayores a 5';
            document.getElementById(id).className = "form-control is-warning";
            return false;
        }

    }
}

/*
!   INHABILITADO
!   *para evitar codigo redundante*
*/

// //Filtro Global del input de la tabla al input creado
// function filterGlobal() {
//     $('#table_category').DataTable().search(
//         $('#global_filter').val(),
//     ).draw();
// }

// //Evitamos cerrar los modal
// function notcloseModal(nomModal) {
//     $(nomModal).modal({ backdrop: 'static', keyboard: false });
// }


