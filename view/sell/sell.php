<?php
session_start();
?>
<script type="text/javascript" src="../js/functSell.js?rev=<?php echo time(); ?>"></script>

<!-- Content Header (Page header) -->
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
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-lightblue card-outline">
                        <!-- /.card-header -->
                        <div class="card-header border-transparent ">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Informacion del Cliente
                            </h3>
                        </div>
                        <div class="card-body pad">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                DNI</label>
                                            <input type="text" id="cl_dni" maxlength="8" class="form-control"
                                                placeholder="Digite numero de DNI" onkeypress="return enableNum(event)">
                                            <input type="hidden" id="cl_id">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Apellidos y Nombres</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="cl_nom"
                                                    placeholder="Apellidos y Nombres" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="cl_phone"
                                                    placeholder="Email" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <!-- /.card-header
                                        <button type="button" class="btn btn-block bg-gradient-secondary"
                                            disabled>Success</button> -->
                                    </div>

                                    <div class="col-6">
                                        <button type="button" id='btnConfirmar' onclick='enviarDatos()'
                                            class="btn btn-block bg-gradient-primary" disabled>Confirmar Datos</button>
                                    </div><!-- /.card-header -->
                                    <div class="col-3">
                                        <!-- /.card-header
                                        <button type="button" class="btn btn-block bg-gradient-secondary"
                                            disabled>Success</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Datos de la venta
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-lightblue">
                                        <div class="inner">
                                            <h3 id="boxTotal">0</h3>

                                            <p>Precio Total</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box
                                    <div class="small-box bg-lightblue">
                                        <div class="inner">
                                            <h3>0</h3>

                                            <p>Cantidad</p>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box
                                    <div class="small-box bg-lightblue">
                                        <div class="inner">
                                            <h3>0</h3>

                                            <p>Precio Toal</p>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box
                                    <div class="small-box bg-lightblue">
                                        <div class="inner">
                                            <h3>0</h3>

                                            <p>Precio Toal</p>
                                        </div>
                                    </div>-->

                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-lightblue card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                        href="#custom-tabs-one-messages" role="tab"
                                        aria-controls="custom-tabs-one-messages" aria-selected="false">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-one-settings" role="tab"
                                        aria-controls="custom-tabs-one-settings" aria-selected="true">Productos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">

                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-messages-tab">
                                    <div class="table-responsive" style="height: 230px;">
                                        <table id="table_clientes" class=" table-head-fixed  display responsive nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>DNI</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Telefono</th>
                                                    <th>Correo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nro</td>
                                                    <td>DNI</td>
                                                    <td>Nombres</td>
                                                    <td>Apellidos</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="" style="display: block;">
                                        <a class="btn btn-sm btn-info float-right text-white" onclick="Load_contend('content_main','../view/person/list_client.php')">Ver Clientes</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="custom-tabs-one-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-settings-tab">
                                    <div class="table-responsive" style="height: 230px;">
                                        <table id="table_productos" class=" table-head-fixed display responsive nowrap "
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Codigo</th>
                                                    <th>Nombre</th>
                                                    <th>Precio Salida</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nro</td>
                                                    <td>Codigo</td>
                                                    <td>Nombres</td>
                                                    <td>Precio Salida</td>
                                                    <td>Estado</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="" style="display: block;">
                                        <a class="btn btn-sm btn-info float-right text-white" onclick="Load_contend('content_main','../view/product/list_product.php')">Ver Productos</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <div class="col-md-6">

                    <!-- /.card -->
                    <div class="card card-lightblue card-outline">

                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-read-info p-4">
                                <input type="text" id="id_user" style="display:none"
                                    value="<?php echo $_SESSION['se_id'] ?>">
                                <h5><?php echo $_SESSION['se_lname'] . ', ' . $_SESSION['se_fname'] ?></h5>
                                <h6>Cargo: <?php echo $_SESSION['se_rol'] ?>
                                    <span class="mailbox-read-time float-right" id="fecha"></span>
                                </h6>
                                <br>
                                <dl class="row">
                                    <dt class="col-sm-4">Nombre del cliente</dt>
                                    <dd class="col-sm-8" id="nombre"></dd>
                                    <dt class="col-sm-4">Numero de Documento</dt>
                                    <dd class="col-sm-8" id="docdni"></dd>
                                    <dt class="col-sm-4">Telefono</dt>
                                    <dd class="col-sm-8" id="telfono"></dd>
                                    <dd class="col-sm-8" id="id" hidden></dd>
                                    <!--dt class="col-sm-4">Tipo de Cliente</dt>
                                    <dd class="col-sm-8" id="tipocliente"></dd-->
                                </dl>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table  text-nowrap">
                                    <thead>
                                        <tr class="bg-lightblue disabled color-palette text-center">
                                            <th>Codigo</th>
                                            <th>ID</th>
                                            <th>Descripcion</th>
                                            <th>Existencia Fija</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Total</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-barcode"></i></span>
                                                        </div>
                                                        <input id="pr_codebar" type="text" style="width:92px;"
                                                            maxlength="10" class="form-control" placeholder="D00000000A"
                                                            onkeypress="return enableCodeBar(event)" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td id="pr_id">-
                                            </td>
                                            <td id="pr_descrip">-
                                            </td>
                                            <td id="pr_existe">0
                                            </td>
                                            <td>
                                                <input id="pr_cantd" type="text" style="width:95px;"
                                                    class="form-control" maxlength="8" placeholder="00" disabled
                                                    onkeypress="return enableNum(event)">
                                            </td>
                                            <td id="pr_preciounit">0.00
                                            </td>
                                            <td id="pr_preciototal">
                                                0.00
                                            </td>
                                            <td><button type="button" class="btn btn-block btn-warning"
                                                    id="btn_agregar_producto" style="display:none">Agregar
                                                    <i class="fa fa-fw fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap" id="table_sell">
                                    <thead>
                                        <tr>
                                            <th class="bg-lightblue">Codigo</th>
                                            <th class="bg-lightblue">Descripcion</th>
                                            <th class="bg-lightblue">Cantidad</th>
                                            <th class="bg-lightblue">Precio Unitario</th>
                                            <th class="bg-lightblue">Total</th>
                                            <th class="bg-lightblue">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla_detalle_venta">

                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                        <div class="card-footer bg-white" id="footer">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-3">
                                            <h5><i class="fas fa-dollar-sign"></i> Efectivo</h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">S/</span>
                                                </div>
                                                <input type="text" class="form-control" id="efectivo"
                                                    onkeypress="return enableNum(event)" disabled>
                                                <input type="hidden" id="pr_total">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-3">
                                            <h5><i class="fas fa-dollar-sign"></i> Devuelve</h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">S/</span>
                                                </div>
                                                <input type="text" class="form-control" id="vuelto" disabled>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-7">
                                            <button type="button" class="btn btn-block bg-gradient-success btn-lg"
                                                id="btnConfirmarVenta" disabled>Confirmar</button>
                                        </div>
                                        <div class="col-5">
                                            <button type="button" class="btn btn-block bg-gradient-danger btn-lg"
                                                id="btnAnularVenta" disabled>Anular</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="callout callout-info" id="call">
                                        <p class="lead" id="fecha_venta"></p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody id="tabla_costo_venta">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
            </div>



        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
<script>
$(document).ready(function() {
    listProducts();
    listClient();
    var id = $("#id_user").val();
    $("#fecha").html(fecha.getDate() + " de " + meses[fecha.getMonth()] + " del " + fecha.getFullYear());
    //var table_venta = $("#tabla_detalle_venta tr").length;
    //$("#efectivo").prop('disabled', false);
    //$("#btnConfirmarVenta").prop('disabled', false);
    //$("#btnAnularVenta").prop('disabled', false);
    searchforDetails(id);

});
</script>

<!-- Style Toastr -->
<link rel="stylesheet" href="../startbootstrap/plugins/toastr/toastr.min.css">

<!----Script sell -->
<script src="../startbootstrap/js/sell/tem_sell.js"></script>

<!----Sweet Alert--->
<script src="../startbootstrap/sweetAlert/sweetalert2.js"></script>

<!-- Script Toastr -->
<script src="../startbootstrap/plugins/toastr/toastr.min.js"></script>