<?php
session_start();
// $usuario = $_SESSION['usuario'];
$usuario = null;
$varRol = null;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NORDSTERN</title>
    <link rel="stylesheet" href="./recursos/css/index.css">
    <link rel="stylesheet" href="./recursos/css/cabecera.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.min.css">
    <script src="./recursos/js/jquery-3.7.0.min.js"></script>
    <script src="./recursos/js/bootstrap.min.js"></script>
</head>

<header class="navbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-4 px-lg-5">
            <a class="cabecera" href="index.php">
                <img src="./recursos/img/lg.png" alt="logo" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Servicios
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="cabecera" href="./gestionVentas/menu.php">
                            Comprar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Sucursales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Sobre Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Contacto
                        </a>
                    </li>

                    <?php

                    if (isset($_SESSION['usuario'])) {
                        // echo '<script>Console.log("LLEGA")</script>';
                        $usuario = $_SESSION['usuario'];
                        $varRol = $_SESSION['rol'];
                    }
                    if ($varRol === 'cliente') {
                    ?>
                        <li class="nav-item">
                            <a class="cabecera" href="">
                                Bienvenido <?php
                                            echo $_SESSION['usuario'];
                                            ?> !
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="cabecera" href="./loginAzul/cerrarSesion.php">
                                Cerrar Sesion
                            </a>
                        </li>
                    <?php
                    } // 
                    else {
                    ?>
                        <li class="nav-item">
                            <a class="cabecera" href="./loginAzul/login.php">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="cabecera" href="./registroAzul/registrarCliente.php">
                                SIGN IN
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"></ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <p>Nordstern</p>
</body>

<footer class="footer">
    <div class="box-container">

        <div class="box">
            <h3>Copyright Nordstern</h3>
            <p></p>
        </div>

    </div>
</footer>

</html>