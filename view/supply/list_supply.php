<script type="text/javascript" src="../js/functlistSupply.js?rev=<?php echo time(); ?>"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Inventario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item text-blue">Inventario</li>
                    <li class="breadcrumb-item active">Abastecimientos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista Abastecimientos</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-3">

                </div>
                <div class="col-3">

                </div>
                <div class="col-3">

                </div>
                <div class="col-3">

                    <div class="input-group">
                        <input type="text" class="global_filter form-control" placeholder="Buscar" id="global_filter">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <table id="table_supply" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>RUC</th>
                        <th>Razon Social</th>
                        <th>Telefono</th>
                        <th>Tipo</th>
                        <th>Costo Total</th>
                        <th>Pago con:</th>
                        <th>Fecha de Venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nro</td>
                        <td>RUC</td>
                        <td>Razon Social</td>
                        <td>Telefono</td>
                        <td>Rol</td>
                        <td>Costo Total</td>
                        <td>Pago con:</td>
                        <td>Fecha de Venta</td>
                        <td>Acciones</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
</div>
<div class="modal fade" id="modal-view-supply">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-olive">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-indent"></i>&nbsp; Detalle de abastecimiento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Profile Image -->
            <div class="card-body bg-light">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="../templates/dist/img/logo02.png" alt="AdminLTE Logo"
                                    class="brand-image img-circle elevation-2" style="max-height: 39px; opacity: .8">
                                Barrington
                            </h4>
                            <br>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Razon Social

                            <address>
                                <strong>Barrington S.A.C</strong><br>
                            </address>
                            <!-- info row   795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                            -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Proveedor
                            <address>
                                <strong id="proveedor"></strong><br>
                                <!-- /.col 795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com -->
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #004512</b><br>
                            <br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="table_subsupply" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Codigo</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Costo Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nro</td>
                                        <td>Codigo</td>
                                        <td>Producto</td>
                                        <td>Precio</td>
                                        <td>Cantidad</td>
                                        <td>Costo Total</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <br>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">

                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead" id="detalle_monto">Monto realizado</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td id="subtotal">S/ 0.00</td>
                                        </tr>
                                        <tr>
                                            <th>IVA (18%)</th>
                                            <td id="iva">S/ 0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td id="total">S/ 0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-download"></i>
                                Exportar a Excel
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generar PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<link rel="stylesheet" href="../templates/plugins/toastr/toastr.min.css">
<script src="../templates/main/supply/list_supply.js"></script>
<script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script>
<script src="../js/JsBarcode.all.min.js"></script>