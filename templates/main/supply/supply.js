$(document).ready(function () {
    listProvider();
    listProducts();
    //listClient();
    //var id = $("#id_user").val();
    $("#fecha").html(fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear());
    //var table_venta = $("#tabla_detalle_venta tr").length;
    //$("#efectivo").prop('disabled', false);
    //$("#btnConfirmarVenta").prop('disabled', false);
    //$("#btnAnularVenta").prop('disabled', false);
    //searchforDetails(id);
    dashboardAbast();
});

function enableNum(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        //letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        numlet = "1234567890"
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
function enableCodeBar(e) {
    //specialPars = [8, 37, 39, 46],
    var key = e.keyCode || e.which,
        keybr = String.fromCharCode(key).toLowerCase(),
        //letters = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        numlet = "abcdefghijklmnopqrszcxy1234567890"
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