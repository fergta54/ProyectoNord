<?php
// seguridad de sesiones paginacion
session_start();
$varSession = null;
$varRol = null;
if (isset($_SESSION['usuario'])) {
    $varSession = $_SESSION['usuario'];
    $varRol = $_SESSION['rol'];
}
if ($varSession == null || $varSession = '' || $varRol != 'admin') {
    echo 'NO TIENES ACCESSO';
    // header("Location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="./recursos/css/index.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.min.css">
    <script src="./recursos/js/bootstrap.min.js"></script>
    <script src="./recursos/js/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="./recursos/css/cabecera.css">
    <style>
        a {
            color: white;
        }

        a:hover {
            color: orange;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">

        <a class="cabecera " href="index.php">
            <img class="container-fluid" src="./recursos/img/lg.png" alt="logo" />
        </a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto pl-5">
                <li class="nav-item">
                    <a class="cabecera" href="index.php">
                        Inicio
                    </a>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="./gestionProductos/menuProductos.php">
                        Gestión de Productos
                    </a>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="index.php">
                        Gestión de Usuarios
                    </a>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="index.php">
                        Gestión de Compras
                    </a>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="index.php">
                        Gestión de Sucursales
                    </a>
                </li>
                <?php
                if ($_SESSION['usuario']) {
                    // echo '<script>Console.log("LLEGA")</script>';
                    $usuario = $_SESSION['usuario'];
                    $varRol = $_SESSION['rol'];
                }
                if ($varRol === 'admin') {
                ?>
                    <li class="nav-item pl-4">
                        <a class="cabecera" href="">
                            Bienvenido <?php
                                        echo 'Administrador ';
                                        echo $_SESSION['usuario'];
                                        ?> !
                        </a>
                    </li>
                    <li class="nav-item pl-4 ">
                        <a class="d-flex cabecera" href="./loginAzul/cerrarSesion.php">
                            Cerrar Sesion
                        </a>
                    </li>
                <?php
                } // 
                else {
                ?>
                    <li class="nav-item pl-4">
                        <a class="cabecera" href="./loginAzul/login.php">
                            Login
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

    </nav>
</body>

</html>