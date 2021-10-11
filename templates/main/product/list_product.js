
//Carga Lista
$(document).ready(function () {
    // listPCategory();
    // listPProveedor();
    listProducts();
});

// //Evitamos cerrar los modal
// function notcloseModal(nomModal) {
//     $(nomModal).modal({ backdrop: 'static', keyboard: false });
// }
// //Filtro Global del input de la tabla al input creado
// function filterGlobal() {
//     $('#table_product').DataTable().search(
//         $('#global_filter').val(),
//     ).draw();
// }

// function enableNum(e) {
//     //specialPars = [8, 37, 39, 46],
//     var key = e.keyCode || e.which,
//         keybr = String.fromCharCode(key).toLowerCase(),
//         //letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
//         numlet = ".1234567890"
//     specialPars = [8, 37, 39, 46],
//         specialKey = false;


//     for (var i in specialPars) {
//         if (key == specialPars[i]) {
//             specialKey = true;
//             break;
//         }
//     }

//     if (numlet.indexOf(keybr) == -1 && !specialKey) {
//         return false;
//     }
// }
// function enableEnt(e) {
//     //specialPars = [8, 37, 39, 46],
//     var key = e.keyCode || e.which,
//         keybr = String.fromCharCode(key).toLowerCase(),
//         //letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
//         numlet = "1234567890"
//     specialPars = [8],
//         specialKey = false;


//     for (var i in specialPars) {
//         if (key == specialPars[i]) {
//             specialKey = true;
//             break;
//         }
//     }

//     if (numlet.indexOf(keybr) == -1 && !specialKey) {
//         return false;
//     }
// }
// function enableLettrs(e) {
//     //specialPars = [8, 37, 39, 46],
//     var key = e.keyCode || e.which,
//         keybr = String.fromCharCode(key).toLowerCase(),
//         letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
//         specialPars = [8, 37],
//         specialKey = false;

//     for (var i in specialPars) {
//         if (key == specialPars[i]) {
//             specialKey = true;
//             break;
//         }
//     }

//     if (letters.indexOf(keybr) == -1 && !specialKey) {
//         return false;
//     }
// }

// //Desactivar o Activar Text-area
// function show_Textarea(change) {
//     if (change.disabled == true) {
//         $('.icon').removeClass('fa fa-toggle-on').addClass('fa fa-toggle-off');
//         $(change).prop('disabled', false);
//     } else {
//         //change.type = "password";
//         $('.icon').removeClass('fa fa-toggle-off').addClass('fa fa-toggle-on');
//         $(change).prop('disabled', true);

//     }
// }