$(document).ready(function () {

    const fecha = new Date();

    // let subtotal = 0;
    // let iva = 0;
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

    function actualizarMonto(total) {
        let tbmonto = document.querySelectorAll('.tabla-monto > tbody > tr > td');
        let subtotal = parseFloat(total / 1.18);
        let iva = parseFloat(total - subtotal);
        // let precio_producto = parseFloat(fila.children[3].innerText);
        // let cant = parseInt(e.target.value);
        tbmonto[0].innerText = subtotal.toFixed(2);
        tbmonto[1].innerText = iva.toFixed(2);
        tbmonto[2].innerText = parseFloat(total).toFixed(2);
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

    obtenerClientes()
        .then(datos => {
            let data = JSON.parse(datos);
            return data;
        })
        .then(clientes => {
            let options = "";
            if (clientes) {
                options = `<option selected disabled value='a'>Selecciona Proveedor</option>`;
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
                    $('#telf-cliente').val(scliente[0].telefono);

                } else {
                    console.log('id_cliente vacio!');
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
                                <td>
                                 <input class="form-control form-control-sm w-50 cantidad-producto" type="number" placeholder="0" value="1" min="1" max="${producto[0].cantidad}">
                                </td>
                                <td id="${producto[0].id_producto}">${producto[0].nombre}</td>
                                <td>${parseFloat(producto[0].preciosalida).toFixed(2)}</td>
                                <td>${parseFloat(producto[0].preciosalida).toFixed(2)}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm btn-eliminar-compra">
                                        Quitar
                                </button>
                                </td>`);
                    total += parseFloat(producto[0].preciosalida);
                    $("#modal-productos").modal('hide');
                    $('#tabla-productos > tbody').prepend(tr);
                    $('#buscar_productos > option:selected').remove();
                    actualizarMonto(total);
                } else {
                    console.log('No hay producto seleccionado');
                }
            });

            $('#tabla-productos').on('click', '.btn-eliminar-compra', function (e) {
                let fila = e.target.parentElement.parentElement;
                let arrfila = Array.from(fila.children);
                $('#buscar_productos').append(`<option value='${arrfila[2].id}'>${arrfila[2].innerText}</option>`);
                fila.remove();
            });

            $('#tabla-productos').on('change', '.cantidad-producto', function (e) {
                let fila = e.target.parentElement.parentElement;
                let precioproducto = parseFloat(fila.children[3].innerText);
                let cant = parseInt(e.target.value);
                let totalproducto = parseFloat(precioproducto * cant);
                fila.children[4].innerText = totalproducto.toFixed(2);
                total = totalproducto;
                actualizarMonto(total);
            });
        })
        .catch(err => console.log(err))


});