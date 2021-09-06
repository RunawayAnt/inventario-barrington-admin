
var fecha = new Date(); //Fecha actual
var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
//var texto.value = fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear();

function dashboard() {
    $.ajax({
        url: '../controller/dashboard/ctrl_dashboard.php',
        type: 'POST',
    }).done(function (reply) {
        var data = JSON.parse(reply);
        var clientes = data[0]['clientes'];
        var productos = data[0]['productos'];
        var proveedores = data[0]['proveedores'];
        var ventas = data[0]['ventas'];
        $("#clientes").html(clientes);
        $("#productos").html(productos);
        $("#proveedores").html(proveedores);
        $("#ventas").html(ventas);
    })
}
function dashboardDate() {
    $.ajax({
        url: '../controller/dashboard/ctrl_dashboardDate.php',
        type: 'POST',
    }).done(function (reply) {
        var data = JSON.parse(reply);
        $("#d_productos").html(data[0]['productos']);
        $("#d_clientes").html(data[0]['clientes']);
        $("#d_proveedores").html(data[0]['proveedores']);
        $("#d_ventas").html(data[0]['ventas']);
        $("#fecha_productos").html(fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear());
        $("#fecha_clientes").html(fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear());
        $("#fecha_proveedores").html(fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear());
        $("#fecha_ventas").html(fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear());

    })
}