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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Barrington - Dashboard</title>

    <!-- Font Awesome Icons -->
    <link href="../startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../startbootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Style for table -->
    <link rel="stylesheet" href="../startbootstrap/plugins/DataTable/datatables.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                 <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-dolly"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Barrington Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel de Control</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Venta
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" onclick="Load_contend('content_main','sell/sell.php')">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <span>Vender</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" onclick="Load_contend('content_main','sell/list_sell.php')">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <span>Ventas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="nav-icon fas fa-cube"></i>
                    <span>Caja</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Almacen
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <!-- <a class="nav-link" onclick="Load_contend('content_main','product/list_product.php')"> -->
                <a class="nav-link" onclick="Load_contend('content_main','product/list_product.php')">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Productos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Catalogo</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mercado:</h6>
                        <a class="collapse-item" onclick="Load_contend('content_main','person/list_client.php')">Clientes</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Materia:</h6>
                        <a class="collapse-item" onclick="Load_contend('content_main','person/list_provider.php')">Proveedores</a>
                        <a class="collapse-item" onclick="Load_contend('content_main','category/list_category.php')">Categorias</a>
                    </div>
                </div>
            </li>

           <!-- Divider -->
           <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Inventario
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Abastacer</span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Abastecimientos</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Inventario</span>
                </a>
            </li>

             <!-- Divider -->
           <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reporte
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Productos:</h6>
                        <a class="collapse-item" href="forgot-password.html">Ventas</a>
                        <a class="collapse-item" href="forgot-password.html">Inventario</a>
                        <!-- <div class="collapse-divider"></div> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="subcontent">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="content_main">
                    <!-- Main Content -->

                    <!-- End of Main Content -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
        <!-- <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Barrington Admin 2021</span>
                </div>
            </div>
        </footer> -->
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="../startbootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../startbootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- DataTables-->
    <script src="../startbootstrap/plugins/DataTable/datatables.min.js"></script>

    <!---Input Mask--->
    <script src="../startbootstrap/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../startbootstrap/js/sb-admin-2.min.js"></script>

    <!-- ES: Script general-->
    <script src="../startbootstrap/js/in-barrington-config.js"></script>

    <!----Scripts-->
    <script>
    
    //Contenedor "contd"  Contenido "cont"
    function Load_contend(contr, cont) {
        $("#" + contr).load(cont);
        // console.log(contr, cont);
    }
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
    </script>

</body>

</html>
