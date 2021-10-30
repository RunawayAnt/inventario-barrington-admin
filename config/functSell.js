$(document).ready(function () {

    const fecha = new Date();
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

    let total = 0;

    $('#input-fecha').val(fecha.toLocaleDateString());
    $('.fecha-actual').append(`Monto adeudado ${fecha.toLocaleDateString()}`);


    function obtenerClientes() {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/person/client/ctrl_list_client.php',
                type: 'POST'
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            });
        })
    }

    function obtenerUsuarios() {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/user/ctrl_list_user.php',
                type: 'POST'
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        })
    }

    function procesarVenta(idcliente, idvendedor, tipopago, totalventa) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/sell/ctrl_register_sell.php',
                type: 'POST',
                data: {
                    idcliente,
                    idvendedor,
                    tipopago,
                    totalventa
                }
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        });
    }

    function actualizarCostoProductos() {
        let tbodyp = document.querySelectorAll('#body-tabla-productos > tr > .precio');
        let totalproductos = 0;
        tbodyp.forEach(preciop => {
            totalproductos += parseFloat(preciop.innerText);
        });
        return totalproductos;
    }

    function actualizarMonto(total) {
        let tbmonto = document.querySelectorAll('.tabla-monto > tbody > tr > td');
        let subtotal = parseFloat(total / 1.18);
        let iva = parseFloat(total - subtotal);
        // let precio_producto = parseFloat(fila.children[3].innerText);
        // let cant = parseInt(e.target.value);
        tbmonto[0].innerText = subtotal.toFixed(2);
        tbmonto[1].innerText = iva.toFixed(2);
        tbmonto[2].innerText = parseFloat(total).toFixed(2);
        // console.log(total);
        // fila.children[4].innerText = parseFloat(precio_producto * cant).toFixed(2);
        // console.log(tbmonto);
    }

    function obtenerProductos() {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../controller/product/ctrl_list_product.php',
                type: 'POST'
            }).done(res => {
                resolve(res);
            }).fail(function (jqXHR, textStatus) {
                reject(textStatus);
            })
        });
    }

    function evaluarFilasYactivarBoton() {
        const filas_tabla = document.querySelectorAll('#body-tabla-productos > tr');
        if (filas_tabla.length) {
            document.querySelector('#btn-registrar-venta').disabled = false;
        } else {
            document.querySelector('#btn-registrar-venta').disabled = true;
        }
    }

    obtenerClientes()
        .then(datos => {
            let data = JSON.parse(datos);
            return data;
        })
        .then(clientes => {
            let options = "";
            if (clientes) {
                options = `<option selected disabled value='a'>Selecciona Cliente</option>`;
                clientes.data.forEach(cliente => {
                    options += `<option value='${cliente.id}'>${cliente.apellidos}, ${cliente.nombres}</option>`;
                });
                $('#buscar_cliente').html(options);
            } else {
                options = `<option selected disabled value='${0}'>Sin resultados</option>`;
                $('#buscar_cliente').html(options);
            }
            return clientes;
        })
        .then(clientes => {
            $('.btn-agregar').on('click', function () {
                let id = $('#buscar_cliente').val();
                if (id) {
                    let scliente = clientes.data.filter(cliente => cliente.id == id);
                    $('#dni_cliente').val(scliente[0].dni);
                    $('#telf_cliente').val(scliente[0].telefono);

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'No ha seleccionado un cliente'
                    })
                }

            });
        })
        .catch(err => console.log(err))

    obtenerUsuarios()
        .then(datos => {
            let data = JSON.parse(datos);
            return data;
        })
        .then(usuarios => {
            let vendedores = usuarios.data.filter(usuario => usuario.nombre_rol == 'Trabajador' && usuario.estado == 'Activo');
            let options = "";

            if (vendedores) {
                options = `<option selected disabled value='a'>Selecciona Vendedor</option>`;
                for (const vendedor of vendedores) {
                    options += `<option value='${vendedor.id}'>${vendedor.apellidos}, ${vendedor.nombres}</option>`;
                }
                $('#buscar_vendedor').html(options);
            } else {
                options = `<option selected disabled value='${0}'>Sin resultados</option>`;
                $('#buscar_vendedor').html(options);
            }
        })
        .catch(err => console.log(err))

    obtenerProductos()
        .then(datos => {
            let data = JSON.parse(datos);
            return data;
        })
        .then(productos => {

            let lproductos = productos.data.filter(producto => producto.estado == 'Activo');
            let options = "";

            if (lproductos) {
                options = `<option selected disabled value='a'>Seleccione Producto</option>`;
                for (const p of lproductos) {
                    options += `<option value='${p.id_producto}'>${p.nombre}</option>`;
                }
                $('#buscar_productos').html(options);
            }

            $('#agregar-producto').on('click', () => {
                let idproducto = $('#buscar_productos').val();
                if (idproducto) {
                    let tr = $("<tr>");
                    let producto = productos.data.filter(e => e.id_producto == idproducto);
                    tr.prepend(`<td>${producto[0].codigobarras}</td>
                                <td><input class="form-control form-control-sm w-50 cantidad-producto" id="${producto[0].id_producto}" type="number" placeholder="0" value="1" min="1" max="${producto[0].cantidad}"></td>
                                <td id="${producto[0].id_producto}">${producto[0].nombre}</td>
                                <td>${parseFloat(producto[0].preciosalida).toFixed(2)}</td>
                                <td class="precio">${parseFloat(producto[0].preciosalida).toFixed(2)}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm btn-eliminar-compra">
                                        Quitar
                                </button>
                                </td>`);
                    total += parseFloat(producto[0].preciosalida);

                    $("#modal-productos").modal('hide');
                    $('#tabla-productos > tbody').prepend(tr);
                    $('#buscar_productos > option:selected').remove();
                    actualizarMonto(actualizarCostoProductos());
                    evaluarFilasYactivarBoton();
                } else {
                    console.log('No hay producto seleccionado');
                }


            });

            $('#tabla-productos').on('click', '.btn-eliminar-compra', function (e) {
                let fila = e.target.parentElement.parentElement;
                let arrfila = Array.from(fila.children);
                fila.remove();
                $('#buscar_productos').append(`<option value='${arrfila[2].id}'>${arrfila[2].innerText}</option>`);
                actualizarMonto(actualizarCostoProductos());
                evaluarFilasYactivarBoton();
            });

            $('#tabla-productos').on('change', '.cantidad-producto', function (e) {
                let fila = e.target.parentElement.parentElement;
                let precioproducto = parseFloat(fila.children[3].innerText);
                let cant = parseInt(e.target.value);
                let totalproducto = parseFloat(precioproducto * cant);
                fila.children[4].innerText = totalproducto.toFixed(2);

                actualizarMonto(actualizarCostoProductos());
            });

            $('.btn-nuevo').on('click', function (e) {
                let ncliente = $('#buscar_cliente').val();
                let vendedor = $('#buscar_vendedor').val();
                let pagocliente = $('#pago_cliente').val();

                if (vendedor !== null) {

                    if (pagocliente !== null) {
                        if (ncliente) {
                            notcloseModal('#modal-productos');
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Casilla vacia!',
                                text: "Por favor, agregue un Cliente."
                            });
                        }
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Casilla vacia!',
                            text: "Por favor, seleccione una opcion de pago."
                        });
                    }
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Casilla vacia!',
                        text: "Por favor, agregue un Vendedor."
                    });
                }

            });
        })
        .catch(err => console.log(err));

    $('#btn-registrar-venta').on('click', function () {
        let id_cliente = $('#buscar_cliente').val();
        let id_vendedor = $('#buscar_vendedor').val();
        let tipo_pago = $('#pago_cliente').val();
        let totalcompra = document.querySelector('#total_compra').innerText;

        
        // console.log(id_cliente, id_vendedor, tipo_pago, totalcompra);
        // let productosSeleccionados = document.querySelectorAll('.cantidad-producto');
        // let id_cliente = document.querySelector('#buscar_cliente selected');
        // // let id_vendedor = document.querySelector('');
        // // let tipo_pago = document.querySelector('');
        // // let total = document.querySelector('');

        // console.log('id_cliente',id_cliente);

        // let datoscompra = [];

        // productosSeleccionados.forEach(productoSeleccionado => {
        //     datoscompra.push({ 
        //       'id_producto': productoSeleccionado.id,
        //       'cantidad': productoSeleccionado.value
        //     });
        // });
        // console.log(datoscompra);
    });





});

