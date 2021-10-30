<?php
session_start();
?>
<script type="text/javascript" src="../config/functSell.js?rev=<?php echo time(); ?>"></script>
<!-- Select2 -->
<link rel="stylesheet" href="../../tmp/adminLTE/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../tmp/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vender</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Venta</a></li>
                    <li class="breadcrumb-item active">Vender</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col">
            <article class="card  bg-light">
                <div class="card-body p-2">
                    <div class="d-flex justify-content-end">
                        <!-- <button class="btn btn-danger btn-sm m-1">
                            <i class="far fa-trash-alt"></i> Eliminar
                        </button> -->
                        <!-- <button class="btn btn-success btn-sm m-1">
                            <i class="fas fa-file-excel"></i> Exportar
                        </button> -->
                        <button class="btn btn-warning btn-sm m-1">
                            <i class="fas fa-ban"></i> Cancelar
                        </button>
                        <!-- <button class="btn btn-info btn-sm m-1">
                            <i class="fas fa-file-alt"></i> Imprimir
                        </button> -->
                    </div>
                </div>
            </article>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <article class="card-header border-transparent bg-dark">
                <h3 class="card-title">
                    <i class="fas fa-cube"></i>&nbsp;
                    Informacion de Venta
                </h3>
            </article>

            <article class="card p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="buscar_cliente">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>DNI</label>
                                <input type="number" class="form-control" placeholder="Identificacion nacional"
                                    id="dni_cliente" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control" placeholder="Numero telefonico"
                                    id="telf_cliente" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Vendedor</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="buscar_vendedor">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" placeholder="Fecha actual" id="input-fecha"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Pago</label>
                                <select class="custom-select" id="pago_cliente">
                                    <option selected disabled>Seleccione Pago</option>
                                    <option>Efectivo</option>
                                    <option>Deposito</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <button class="btn btn-primary btn-sm btn-agregar">
                                <i class="fas fa-user"></i>&nbsp; Agregar Cliente
                            </button>
                            <button class="btn btn-secondary btn-sm btn-nuevo">
                                <i class="fas fa-plus"></i>&nbsp; Nuevo Producto
                            </button>
                        </div>
                    </div>
                </div>

            </article>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card-body table-responsive p-0" style="height: 220px;">
                <table class="table table-head-fixed text-nowrap" id="tabla-productos">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Precio Unit.</th>
                            <th>Total</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="body-tabla-productos">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <article class="card p-3">
                <p class="lead fecha-actual"></p>
                <div class="table-responsive">
                    <table class="table tabla-monto">
                        <tbody>
                            <tr>
                                <th style="width:50%">SUBTOTAL: S/</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>IVA (18%): S/</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>TOTAL: S/</th>
                                <td id="total_compra"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button class="btn btn-success me-md-1 ps-1" type="button" id="btn-registrar-venta" disabled>
                        <i class="mx-2 fas fa-shopping-bag"></i>Registrar venta
                    </button>
                </div>
            </article>
        </div>

    </div>

</section>


<div class="modal fade" id="modal-productos">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-box"></i>&nbsp; Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Profile Image -->
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Busqueda de producto</label>
                            <select class="form-control select2bs4" style="width: 100%;" id="buscar_productos">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="agregar-producto">Agregar producto</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>


<!-- Select2 -->
<script src="../../tmp/adminLTE/plugins/select2/js/select2.full.min.js"></script>

<script src="../../tmp/adminLTE/dist/js/pages/sell/sell.js"></script>