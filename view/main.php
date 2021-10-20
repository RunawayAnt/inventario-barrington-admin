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
    <title>Barrington Admin - Inicio</title> 
    <!-- Font Awesome Icons *-->
    <link rel="stylesheet" href="../tmp/adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars *-->
    <link rel="stylesheet" href="../tmp/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style *-->
    <link rel="stylesheet" href="../tmp/adminLTE/dist/css/adminlte.min.css">
    <!-- Theme Table style *-->
    <link rel="stylesheet" href="../tmp/adminLTE/plugins/DataTable/datatables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue text-white">
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
                        <img src="../tmp/adminLTE/dist/img/unDraw/undraw_male_avatar_323b.svg" class="user-image img-circle elevation-1"
                            alt="User Image">
                        <span class="d-none d-md-inline">
                            <?php echo $_SESSION['se_rol']; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <!-- User image -->
                        <li class="user-header bg-dark">
                            <img src="../tmp/adminLTE/dist/img/unDraw/undraw_male_avatar_323b.svg" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                <?php echo ucwords($_SESSION['se_lname'] . ', ' . $_SESSION['se_fname']); ?>
                                <!-- <small><i class="fa fa-circle text-success"></i> Online</small> -->
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body"> -->
                            <!-- <div class="row">
                                <div class="col-4 text-center">
                                    <a>Followers</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a>Sales</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a>Friends</a>
                                </div>
                            </div> -->
                            <!-- /.row -->
                        <!-- </li> -->
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
        <aside class="main-sidebar elevation-4 sidebar-dark-primary">
            <!-- Brand Logo -->
            <a class="brand-link navbar-blue bg-primary" href="">
                &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-dolly fa-1x text-gray-900"></i>
                <span class="brand-text font-weight-navy">Barrington <b>Admin</b></span>
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

                        <li class="nav-header">...</li>

                        <li class="nav-item has-treeview">
                            <a class="nav-link">
                                 <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Venta
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','sell/list_sell.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ventas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','sell/sell.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Vender</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Caja</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>

                        <li class="nav-header">...</li>
    
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','person/list_client.php')">
                                <i class="nav-icon fas fa-user-astronaut"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Load_contend('content_main','person/list_provider.php')">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>

                        <li class="nav-header">...</li>
                        <li class="nav-item has-treeview">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Almacen
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','product/list_product.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','category/list_category.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categorias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">...</li>
                        <li class="nav-item has-treeview">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    Suministrar
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inventario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','supply/supply.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Abastecer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        onclick="Load_contend('content_main','supply/list_supply.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Abastecimientos</p>
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
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <!-- jQuery *-->
    <script src="../tmp/adminLTE/plugins/jquery/jquery.min.js"></script>

    <!-- Sweet Alert -->
    <script src="../tmp/adminLTE/plugins/sweetAlert/sweetalert2.js"></script>

    <!-- Bootstrap *-->
    <script src="../tmp/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- overlayScrollbars *-->
    <script src="../tmp/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- AdminLTE App *-->
    <script src="../tmp/adminLTE/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <!-- <script src="../templates/../templates/dist/js/demo.js"></script> -->

    <!-- jQuery Mapael *-->
    <script src="../tmp/adminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../tmp/adminLTE/plugins/raphael/raphael.min.js"></script>
    <script src="../tmp/adminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../tmp/adminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>

    <!-- ChartJS *-->
    <script src="../tmp/adminLTE/plugins/chart.js/Chart.min.js"></script>

    <!-- DataTable *-->
    <script src="../tmp/adminLTE/plugins/DataTable/datatables.min.js"></script>

    <!-- Inputmask -->
    <script src="../tmp/adminLTE/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Config barrington-->
    <script src="../tmp/adminLTE/dist/js/config.js"></script>
</body>

</html>