/**
 ** FUNCIONES GENERALES DEL SISTEMA
 ** estamos reutilizando codigo *
 */
//?___Cargar elementos en la web

// $(document).ready(function() {
//     // dashboard();
//     // dashboardDate();
// });

//?___Bloquear el click derecho en la web

document.oncontextmenu = function() {
    return true;
}

//?___Funcion para cargar paginas en el contenedor

function Load_contend(contr, cont) {
    $("#" + contr).load(cont);
}

//?___Objeto para configurar el idioma de la tabla

var idioma_espanol = {
    select: {
        rows: "%d fila seleccionada"
    },
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "No hay datos disponibles en esta tabla",
    "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
    "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "<b>No se encontraron datos</b>",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente",
    }
}

//?___Funcion para evitar cerrar las ventanas "modal"

function notcloseModal(nomModal) {
    $(nomModal).modal({ backdrop: 'static', keyboard: false });
}

//?___Funcion "Filtro Global" del input de la tabla al input creado

function filterGlobal(element) {
    $(element).DataTable().search(
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


