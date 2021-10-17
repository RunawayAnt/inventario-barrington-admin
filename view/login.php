<?php
session_start();
if (isset($_SESSION['se_user'])) {
    header('Location: main.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barrington Admin - Iniciar sesion</title>

    <link rel="shortcut icon" href="" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="../tmp/sbadmin/css/sb-admin-2.css" rel="stylesheet">
    <link href="../tmp/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <i class="nav-icon fas fa-dolly fa-2x text-gray-900"></i>
                                        <h1 class="h3 text-gray-900 mt-1 mb-1">Barrington <b>Admin</b></h1>
                                        <p class="h5 text-gray-600 mt-1 mb-4">Sistema de Inventario</p>
                                    </div>
                                    <div class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="inUser" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="inPass" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar Sesion" onclick="CheckUser()">
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div id="dropDownSelect1"></div>

    <!-- Bootstrap core JavaScript-->
    <script src="../tmp/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="../tmp/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../tmp/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../tmp/sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Sweet Alert-->
    <script src="../tmp/sbadmin/vendor/sweetAlert/sweetalert2.js"></script>

    <!-- Config user-->
    <script src="../config/functUser.js"></script>

    <!---Simple script-->
    <script type="text/javascript">
        document.oncontextmenu = function() {
            return true;
        }
    </script>

</body>

</html>
