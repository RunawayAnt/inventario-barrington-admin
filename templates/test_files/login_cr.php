<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../templates/tmp_login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../templates/tmp_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../templates/tmp_login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../templates/tmp_login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('../templates/tmp_login/images/bg-02.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <span class="login100-form-title p-b-49">
                    INICIAR SESI&Oacute;N
                </span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                    <span class="label-input100">Usuario</span>
                    <input class="input100" type="text" name="username" placeholder="Escriba el usuario" id="txt_usu"
                        autocomplete="new-password">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Contrase&ntilde;a</span>
                    <input class="input100" type="password" name="pass" placeholder="Escriba la contrase&ntilde;a"
                        id="txt_con">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Olvidaste la contrase&ntilde;a?
                    </a>
                </div>

                <div class="container-login10-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" onclick="VerificarUsuario()">
                            ENTRAR
                        </button>
                    </div>
                </div><br>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="../templates/tmp_login/vendor/sweetalert2/sweetalert2.js"></script>
    <!--===============================================================================================-->

    <!--==Maldeto jquery =============================================================================================-->
    <script src="../templates/tmp_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/vendor/bootstrap/js/popper.js"></script>
    <script src="../templates/tmp_login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../templates/tmp_login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/js/main.js"></script>
    <script src="../js/usuario.js"></script>

</body>
<script>
txt_usu.focus();
</script>

</html>