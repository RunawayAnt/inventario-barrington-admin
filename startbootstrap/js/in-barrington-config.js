/**
 ** FUNCIONES GENERALES DEL SISTEMA
 ** estamos reutilizando codigo *
 */

//?___Funcion para evitar cerrar las ventanas "modal"

function notcloseModal(nomModal) {
    $(nomModal).modal({ backdrop: 'static', keyboard: false });
}

//?___Funcion "Filtro Global" del input de la tabla al input creado

function filterGlobal() {
    $('#table_category').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

//?___Funcion para colocar las casillas por defecto al salir o cancelar "modal"

function inputClear(element) {
    /** elementos del formulario */
    let inputs = element.querySelectorAll("input");
    let txtareas = element.querySelectorAll("textarea");

    if (inputs.length > 0) {
        inputs.forEach(input => {
            input.value = "";
            input.className = "form-control"
        });
    }

    if (txtareas.length > 0) {
        txtareas.forEach(txtarea => {
            txtarea.value = "";
            txtarea.className = "form-control"
        });
    }
}


