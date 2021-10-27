$(document).ready(function () {

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

    // function agregarCompra() {
    //     let tr = $("<tr>");

    //     tr.prepend(`<td>#</td>
    //     <td>
    //         <input class="form-control form-control-sm w-50" type="number" placeholder="0" min="0" max="3">
    //     </td>
    //     <td><select class="form-control select2bs4" style="width: 100%;" id="buscar_productos">
    //     </select></td>
    //     <td>20.00</td>
    //     <td>60.00</td>
    //     <td>
    //         <button class="btn btn-danger btn-sm btn-eliminar-compra">
    //             Quitar
    //         </button>
    //     </td>`);

    //     $("#tabla-productos > tbody").prepend(tr);
    // }

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
            // agregarCompra();
            let lproductos = productos.data.filter(producto => producto.estado == 'Activo');
            let options = "";
            if (lproductos) {
                options = `<option selected disabled value='a'>Seleccione Producto</option>`;
                for (const p of lproductos) {
                    options += `<option value='${p.id_producto}'>${p.nombre}</option>`;
                }
                $('#buscar_productos').html(options);
            } else {
                options = `<option selected disabled value='${0}'>Sin resultados</option>`;
                $('#buscar_productos').html(options);
            }


            $('#agregar-producto').on('click', () => {
                let idproducto = $('#buscar_productos').val();
                if (idproducto) {
                    let tr = $("<tr>");
                    let producto = productos.data.filter(e => e.id_producto == idproducto);
                    tr.prepend(`<td>${producto[0].codigobarras}</td>
                                <td>
                                 <input class="form-control form-control-sm w-50" type="number" placeholder="0" min="0" max="${producto[0].cantidad}">
                                </td>
                                <td>${producto[0].nombre}</td>
                                <td>${parseFloat(producto[0].preciosalida).toFixed(2)}</td>
                                <td>0.00</td>
                                <td>
                                    <button class="btn btn-danger btn-sm btn-eliminar-compra">
                                        Quitar
                                </button>
                                </td>`);

                    $("#tabla-productos > tbody").prepend(tr);
                    $("#modal-productos").modal('hide');
                    console.log(producto);
                } else {
                    console.log('No hay producto seleccionado');
                }
            })
        })
        .catch(err => console.log(err))


    $('#agregar-producto').on('click', function () {

    });

    $('#tabla-productos').on('click', '.btn-eliminar-compra', function (e) {
        let fila = e.target.parentElement.parentElement;
        fila.remove();
        // console.log(e.target.parentElement.parentElement,'soy un boton!');
    });

});