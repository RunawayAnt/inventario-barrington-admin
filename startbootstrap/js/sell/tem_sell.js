/*
function agregar() {
    var codigo = $("#prod_codigo").val();
    agregarfila(codigo);
}


function agregarfila(text) {
    document.getElementById("table_sell").insertRow(-1).innerHTML =
        '<td>' + text + '</td><td></td><td></td><td></td><td></td><td></td>'
}
*/
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
function inputsSell(val) {
    if (val == true) {
        document.getElementById('pr_existe').className = "text-danger";
        document.getElementById('pr_id').className = "text-danger";
        document.getElementById('pr_descrip').className = "text-danger";
        document.getElementById('pr_preciounit').className = "text-danger";
        document.getElementById('pr_preciototal').className = "text-danger";
        document.getElementById('pr_codebar').className = "form-control text-danger";
        document.getElementById('pr_cantd').className = "form-control text-danger";

        toastr.error('Producto en existencia muy bajo, por favor reabastesca.')

    } else {
        document.getElementById('pr_existe').className = " ";
        document.getElementById('pr_id').className = " ";
        document.getElementById('pr_descrip').className = " ";
        document.getElementById('pr_preciounit').className = " ";
        document.getElementById('pr_preciototal').className = " ";
        document.getElementById('pr_codebar').className = "form-control";
        document.getElementById('pr_cantd').className = "form-control";


    }
}