<?php
session_start();
if (!isset($_SESSION['se_user'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HOME | BARRINGTON</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../templates/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../templates/dist/css/adminlte.min.css">
    <!-- Theme style
    <link rel="stylesheet" href="../templates/validation/validation.css">-->
    <!-- Theme Table style -->
    <link rel="stylesheet" href="../templates/plugins/DataTable/datatables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-white">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a onclick="Load_contend('content_main','user/list_user.php')" class="nav-link">Personal</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->

                <li class="nav-item dropdown user-menu">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="../templates/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline">
                            <?php echo $_SESSION['se_rol']; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <!-- User image -->
                        <li class="user-header bg-lightblue">
                            <img src="../templates/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                <?php echo ucwords($_SESSION['se_fname'] . ' ' . $_SESSION['se_lname']); ?>
                                <small><i class="fa fa-circle text-success"></i> Online</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a>Followers</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a>Sales</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a>Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a class="btn btn-default btn-flat"> <i class="fa fa-fw fa-user"></i> Ver
                                Perfil</a>
                            <a href="../controller/user/ctrl_close_session.php"
                                class="btn btn-default btn-flat float-right"> <i class="fa fa-fw fa-power-off"></i>
                                Cerrar
                                Sesion</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-fw fa-wrench"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-lightblue">
            <!-- Brand Logo -->
            <a class="brand-link navbar-lightblue" href="">
                <img src="../templates/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
                    style="max-height: 39px; opacity: .8">
                <span class="brand-text font-weight-navy">Barrington</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="mt-2 pb-2 mb-2 d-flex">

                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open active">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Panel de control
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">VENTA</li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','sell/list_sell.php')">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Ventas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','sell/sell.php')">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>
                                    Vender
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-cube"></i>
                                <p>
                                    Caja
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">ALMACEN</li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','product/list_product.php')">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Catalogo
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','category/list_category.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categorias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','person/list_provider.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proveedores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="Load_contend('content_main','person/list_client.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">INVENTARIO</li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Inventario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','supply/supply.php')">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>Abastecer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','supply/list_supply.php')">
                                <i class="nav-icon fas fa-history"></i>
                                <p>Abastecimientos</p>
                            </a>
                        </li>
                        <li class="nav-header">REPORTE</li>
                        <li class="nav-item has-treeview">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>
                                    Reportes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview">
                                    <a class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inventario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ventas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['se_rol'] == 'Administrador') {?>
                        <li class="nav-header">ADMINISTRAR</li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','user/list_user.php')">
                                <i class="nav-icon fa fa-fw fa-cogs"></i>
                                <p>Personal</p>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="content_main">





            <script type="text/javascript" src="../js/functDashboard.js?rev=<?php echo time(); ?>"></script>

            <section class="content">
                <div class="container-fluid">

                    <!-- =========================================================== -->

                    <!-- =========================================================== -->
                    <br>
                    <h5 class="mb-2 mt-4">Bienvenido al Sistema Barrington!</h5>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3 id="productos">0</h3>

                                    <p>Productos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cube"></i>
                                </div>
                                <a onclick="Load_contend('content_main','../view/product/list_product.php')"
                                    class="small-box-footer">Mas informacion <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-lightblue">
                                <div class="inner">
                                    <h3 id="clientes">0</h3>

                                    <p>Clientes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a onclick="Load_contend('content_main','../view/person/list_client.php')"
                                    class="small-box-footer">Mas informacion <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3 id="proveedores">0</h3>

                                    <p>Proveedores</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <a onclick="Load_contend('content_main','../view/user/list_user.php')"
                                    class="small-box-footer">Mas
                                    informacion <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-olive">
                                <div class="inner">
                                    <h3 id="ventas">0</h3>

                                    <p>Ventas</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                </div>
                                <a href="#" class="small-box-footer">Mas informacion <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Productos del Dia</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                                        Order</a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                        Orders</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Ventas del Dia</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                                        Order</a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                        Orders</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-maroon elevation-1"> <i class="fas fa-cube"></i>
                                </span>

                                <div class="info-box-content">
                                    <div class="row">
                                        <div class="col-7">
                                            <span class="info-box-text">Productos</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="mailbox-read-time float-right" id="fecha_productos">15 Feb.
                                                2015</span>
                                        </div>
                                    </div>
                                    <span class="info-box-number" id="d_productos">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-lightblue elevation-1"> <i class="fas fa-users"></i>
                                </span>

                                <div class="info-box-content">
                                    <div class="row">
                                        <div class="col-7">
                                            <span class="info-box-text">Clientes</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="mailbox-read-time float-right" id="fecha_clientes">15 Feb.
                                                2015</span>
                                        </div>
                                    </div>
                                    <span class="info-box-number" id="d_clientes">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"> <i class="fas fa-truck"></i>

                                </span>

                                <div class="info-box-content">
                                    <div class="row">
                                        <div class="col-7">
                                            <span class="info-box-text">Proveedores</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="mailbox-read-time float-right" id="fecha_proveedores">15 Feb.
                                                2015</span>
                                        </div>
                                    </div>
                                    <span class="info-box-number" id="d_proveedores">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-olive elevation-1"> <i
                                        class="nav-icon fas fa-shopping-cart"></i>
                                </span>

                                <div class="info-box-content">
                                    <div class="row">
                                        <div class="col-7">
                                            <span class="info-box-text">Ventas</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="mailbox-read-time float-right" id="fecha_ventas">15 Feb.
                                                2015</span>
                                        </div>
                                    </div>
                                    <span class="info-box-number" id="d_ventas">0</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="../templates/plugins/toastr/toastr.min.css">
            <script src="../templates/main/dashboard/dashboard.js"></script>
            <script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script>
            <!-- Toastr -->
            <script src="../templates/plugins/toastr/toastr.min.js"></script>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <!-- jQuery -->
    <script src="../templates/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../templates/dist/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="../templates/../templates/dist/js/demo.js"></script>
    <!-- jQuery Mapael -->
    <script src="../templates/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../templates/plugins/raphael/raphael.min.js"></script>
    <script src="../templates/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../templates/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../templates/plugins/chart.js/Chart.min.js"></script>
    <!-- TABLE SCRIPTS -->
    <script src="../templates/plugins/DataTable/datatables.min.js"></script>
    <!-- InputMask -->
    <script src="../templates/plugins/moment/moment.min.js"></script>
    <script src="../templates/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script>
    $(document).ready(function() {
        dashboard();
        dashboardDate();
    });
    //Idioma tables
    var idioma_espanol = {
        select: {
            rows: "%d fila seleccionada"
        },
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "No hay datos disponibles en esta tabla",
        "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
        "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "<b>No se encontraron datos</b>",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Ultimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente",
        }
    }
    //Contenedor "contd"  Contenido "cont"
    function Load_contend(contr, cont) {
        $("#" + contr).load(cont);
    }
    //Desbloquea click derecho
    document.oncontextmenu = function() {
        return true;
    }
    </script>
</body>

</html>