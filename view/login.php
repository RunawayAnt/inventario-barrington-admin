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
    <title>LOGIN | BARRINGTON</title>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <link rel="stylesheet" type="text/css" href="../templates/templates_login/css/estilos1.css" />
    </header>
    <section id="section-general">
        <section class="section-formulario">
            <figure>
                <img src="../templates/templates_login/img/logo.png" width="220px" height="90px" alt="barrington" />
            </figure>
            <h3>Inicio de Sesi&oacute;n</h3>

            <input id="inUser" type="text" class="texto" placeholder="USUARIO">
            <input id="inPass" type="password" class="pass" placeholder="CONTRASEÑA">
            <div class="div_1">
                <input id="mostrar" type="checkbox">
                <a>Mostrar Contraseña</a>
            </div>
            <input type="submit" class="boton_1" value="INGRESAR" onclick="CheckUser()">
        </section>
        <article id="article-imagen">
            <img src="../templates/templates_login/img/login.png" width="250px" height="250px" alt="userlogin" />
        </article>
    </section>
    <div id="dropDownSelect1"></div>
    <!--==================================Sweet Alert==================================================-->
    <script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script>
    <!--==Maldeto jquery ==============================================================================-->
    <script src="../templates/tmp_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../templates/tmp_login/js/main.js"></script>
    <script src="../js/functUser.js"></script>

    <script type="text/javascript">
    document.oncontextmenu = function() {
        return true;
    }
    </script>
</body>

</html>
