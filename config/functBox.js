$(document).ready(function () {
    let expresion = /data/i;
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    let obtenerdatosls = Object.keys(localStorage).filter(e => e.match(expresion)).map((item) => {
        return JSON.parse(localStorage.getItem(item));
    });

    function registrarSalidaProductos(sql) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/box/ctrl_register_products.php',
                type: 'POST',
                data: {
                    sql
                }
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        });
    }

    function actualizarVentaProductos(arr) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/box/ctrl_update_products.php',
                type: 'POST',
                data: {
                    arr
                }
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        });
    }

    function pagoRealizado(idventa) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/box/ctrl_sell.php',
                type: 'POST',
                data: {
                    idventa
                }
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        });
    }

    function obtenerVenta() {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/sell/ctrl_list_sell.php',
                type: 'POST'
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        });
    }

    obtenerVenta()
        .then(datos => {
            let data = JSON.parse(datos);
            return data;
        })
        .then(ventas => {
            let tarjeta = "";
            if (ventas) {
                ventas.data.forEach(venta => {
                    tarjeta += `<div class="col-12 col-lg-4" id="${venta.id_venta}">
                    <div class="card venta-info">
                        <div class="card-header">
                            <h5 class="h5"><i class="fas fa-receipt m-2"></i>Venta #${venta.posicion}</h5>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-5">Realizado por</dt>
                                <dd class="col-sm-7">${venta.usuarios}</dd>
                                <dt class="col-sm-5">Para</dt>
                                <dd class="col-sm-7">${venta.clientes}</dd>
                                <dt class="col-sm-5">Total a cobrar</dt>
                                <dd class="col-sm-7">S/ ${parseFloat(venta.total).toFixed(2)}</dd>
                                <dt class="col-sm-5">Fecha y Hora</dt>
                                <dd class="col-sm-7">${venta.creacion}</dd>
                            </dl>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2 m-1 boton-cobrar" type="button">Cobrar</button>
                            </div>
                        </div>
                    </div>
                </div>`;
                });
                $('.contenido-caja').html(tarjeta);
            } else {
                tarjeta = `<div class="col-12">
                    <div class="text-gray text-center m-5">
                        <p class="h2"><i class="far fa-meh mx-2"></i> No hay ventas por cobrar.</p>
                    </div>
                </div>`;
                $('.contenido-caja').html(tarjeta);
            }

            document.querySelectorAll('.boton-cobrar').forEach(boton => {
                boton.onclick = (function (e) {
                    let idventa = parseInt(e.target.parentElement.parentElement.parentElement.parentElement.id);
                    let productosventa = obtenerdatosls.filter(e => e.idventa == idventa);
                    let arrayproductos = productosventa[0].datos;
                    let insert = "VALUES";
                    let arrayproductosventa = "";

                    arrayproductos.forEach(e => {
                        insert += ` (${e.id_producto}, ${e.cantidad}, 2, ${e.id_venta}, Now()),`;
                        arrayproductosventa += `${parseInt(e.id_producto)},${parseInt(e.cantidad_actual - e.cantidad)}|`
                    });


                    registrarSalidaProductos(insert.substr(0, insert.length - 1))
                        .then(res => {
                            // console.log('enviado 1', res);
                            actualizarVentaProductos(arrayproductosventa.substr(0, arrayproductosventa.length - 1))
                                .then(res => {
                                    // console.log('enviado 2 ', res);
                                    pagoRealizado(idventa)
                                        .then(res => {
                                            // console.log('enviado 3', res);
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Cobro realizado'
                                            })
                                            e.target.parentElement.parentElement.parentElement.parentElement.remove();
                                            localStorage.removeItem('data'+idventa);
                                        })
                                        .catch(err => console.log(err));
                                })
                                .catch(err => console.log(err));
                        })
                        .catch(err => console.log(err));

                })
            });
        })
        .catch(err => console.log(err));

});