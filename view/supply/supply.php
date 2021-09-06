<?php
session_start();
?>
<script type="text/javascript" src="../js/functSupply.js?rev=<?php echo time(); ?>"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Abastecer</h1>
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

                    <div class="card card-warning card-outline">
                        <!-- /.card-header -->
                        <div class="card-header border-transparent ">
                            <h3 class="card-title">
                                <i class="fas fa-cube"></i>
                                Informacion del Producto
                            </h3>
                        </div>
                        <div class="card-body pad">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Codigo de Barras</label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-barcode"></i></span>
                                                    </div>
                                                    <input id="pr_codebarra" type="text" style="width:92px;"
                                                        maxlength="10" class="form-control" placeholder="D00000000A"
                                                        onkeypress="return enableCodeBar(event)">
                                                </div>
                                            </div>
                                            <input type="hidden" id="pr_id">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Nombre del Producto</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-cube"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="pr_nom"
                                                    placeholder="Tela Producto" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Categoria</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="pr_cat"
                                                    placeholder="Tela Categoria" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Precio Unid.</label>
                                            <input type="text" id="pr_precioentrada" maxlength="8" class="form-control"
                                                placeholder="00.00" onkeypress="return enableNum(event)" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Existencia</label>
                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" id="pr_cantidad"
                                                    placeholder="000" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Unidad de Medida</label>
                                            <input type="text" id="pr_medida" maxlength="8" class="form-control"
                                                placeholder="Metros" onkeypress="return enableNum(event)" disabled>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.card-header -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <!-- /.card-header
                                        <button type="button" class="btn btn-block bg-gradient-secondary"
                                            disabled>Success</button> -->
                                        </div>
                                        <div class="col-4">
                                            <!-- /.card-header
                                        <button type="button" class="btn btn-block bg-gradient-secondary"
                                            disabled>Success</button>-->
                                        </div>
                                        <div class="col-4">
                                            <button type="button" id='btnConfirmar' onclick='' data-toggle="collapse"
                                                data-parent="#accordion" class="btn btn-block bg-gradient-primary"
                                                href="#collapseTwo" disabled>Abastecer</button>
                                        </div>

                                    </div>
                                </div>
                                <div id="accordion">
                                    <div class="card card-danger">
                                        <div id="collapseTwo" class="panel-collapse collapse" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                Efectivo
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">S/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="efectivo"
                                                                        onkeypress="return enableNum(event)" disabled
                                                                        placeholder="00">

                                                                    <input type="hidden" id="pr_total">
                                                                    <input type="text" id="id_user" style="display:none"
                                                                        value="<?php echo $_SESSION['se_id'] ?>">
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
                                                                Devuelve
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">S/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="vuelto"
                                                                        disabled placeholder="00">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">.00</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">

                                                            </div>
                                                        </div><br><br>
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <button type="button"
                                                                    class="btn btn-block bg-gradient-success btn-lg"
                                                                    id="btnConfirmarReabast" disabled>Confirmar</button>
                                                            </div>
                                                            <div class="col-5">
                                                                <button type="button"
                                                                    class="btn btn-block bg-gradient-danger btn-lg"
                                                                    id="btnAnularVentaReabast" disabled>Anular</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="callout callout-info" id="call">
                                                            <p class="lead" id="fecha_venta"></p>
                                                            <div class="table-responsive">

                                                                <div class="form-group">
                                                                    <label class="control-label" for="inputError"><i
                                                                            class="fa fa-times-circle-o"></i>
                                                                        Cantidad a Abastecer (Unidad: Metros)</label>
                                                                    <input type="text" id="prov_precio" maxlength="8"
                                                                        class="form-control" placeholder="000000"
                                                                        onkeypress="return enableNum(event)">
                                                                    <br>
                                                                    <h2 id='costo'>S/ 0.00</h2>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <!-- /.card-header -->
                        <div class="card-header border-transparent ">
                            <h3 class="card-title">
                                <i class="fas fa-truck"></i>
                                Informacion del Proveedor
                            </h3>
                        </div>
                        <div class="card-body pad">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                RUC</label>
                                            <input type="text" id="prov_ruc" maxlength="8" class="form-control"
                                                placeholder="10999999999" onkeypress="return enableNum(event)" disabled>
                                            <input type="hidden" id="prov_id">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Razon Social</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-fw fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="prov_nom"
                                                    placeholder="Empresa 123" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Telefono</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="prov_phone"
                                                    placeholder="+(51) 999-999-999" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Direccion</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-fw fa-compass"></i></span>
                                                </div>
                                                <input type="text" id="prov_direc" maxlength="8" class="form-control"
                                                    placeholder="Direccion empresa" onkeypress="return enableNum(event)"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="inputError"><i
                                                    class="fa fa-times-circle-o"></i>
                                                Correo Electronico</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="prov_email"
                                                    placeholder="example@gmail.com" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <!-- /.card-header
                                        <button type="button" class="btn btn-block bg-gradient-secondary"
                                            disabled>Success</button> -->
                                    </div>
                                    <div class="col-4">
                                        <!-- /.card-header
                                        <button type="button" class="btn btn-block bg-gradient-secondary"
                                            disabled>Success</button>-->
                                    </div>
                                    <div class="col-4">
                                        <button type="button" id='btnConfirmar' onclick='enviarDatos()'
                                            class="btn btn-block bg-gradient-secondary" disabled>Nuevo
                                            Proveedor</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Datos de reabastecimiento
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-olive">
                                        <div class="inner">
                                            <h3 id="boxTotal">0</h3>

                                            <p>Productos abastecidos hoy</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- small box
                                    <div class="small-box bg-lightblue">
                                        <div class="inner">
                                            <h3>0</h3>

                                            <p>Cantidad</p>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="col-lg-4 col-6">
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
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                        aria-selected="true">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-profile" role="tab"
                                        aria-controls="custom-tabs-four-profile" aria-selected="false">Proveedores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-supply-tab" data-toggle="pill"
                                        href="#custom-tabs-four-supply" role="tab"
                                        aria-controls="custom-tabs-four-supply"
                                        aria-selected="false">Abastecimientos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-home-tab">
                                    <!-- /.card-body <svg id="barcode"></svg>-->
                                    <table id="table_product" class="display responsive nowrap text-center"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Codigo</th>
                                                <th>Nombre</th>

                                                <th>Precio E.</th>
                                                <th>Existencia</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nro</td>
                                                <td>Codigo</td>
                                                <td>Nombres</td>

                                                <td>Precio E.</td>
                                                <td>Existencia</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-profile-tab">
                                    <table id="table_provider" class="display responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>RUC</th>
                                                <th>Empresa</th>
                                                <th>Correo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nro</td>
                                                <td>RUC</td>
                                                <td>Empresa</td>
                                                <td>Correo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-supply" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-supply-tab">

                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <!-- ./col -->
            </div>



        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<link rel="stylesheet" href="../templates/plugins/toastr/toastr.min.css">
<script src="../templates/main/supply/supply.js"></script>
<script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script>
<!-- Toastr -->
<script src="../templates/plugins/toastr/toastr.min.js"></script>