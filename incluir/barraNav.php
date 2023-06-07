<?php
// seguridad de sesiones paginacion
session_start();
$varSession = null;
$varRol = null;
if ($_SESSION['usuario']) {
    $varSession = $_SESSION['usuario'];
    $varRol = $_SESSION['rol'];
}
if ($varSession == null || $varSession = '' || $varRol != 'admin') {
    echo 'NO TIENES ACCESSO';
    header("Location:../loginAzul/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    
    

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">

        <a class="cabecera" href="../admin.php">
            <img class="container-fluid" src="../recursos/img/lg.png" alt="logo" />
        </a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto pl-5">
                <li class="nav-item">
                    <a class="cabecera" href="../admin.php">
                        Inicio
                    </a>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="../gestionProductos/menuProductos.php">
                        Gestión de Productos
                    </a>
                </li>
                <li class="nav-item dropdown pl-4">
                    <a class="nav-link dropdown-toggle cabecera" style="color:white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión de Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../gestionUsuarios/listarRoles.php">Lista de Usuarios</a>
                        <a class="dropdown-item" href="../gestionUsuarios/crearRol.php">Crear Usuarios</a>
                        <a class="dropdown-item" href="index.php">Editar</a>
                    </div>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="../admin.php">
                        Gestión de Comprasholaaaasssss
                        hola mundo
                    </a>
                </li>
                <li class="nav-item pl-4">
                    <a class="cabecera" href="../admin.php">
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
                    <li class="nav-item pl-4">
                        <a class="cabecera" href="../loginAzul/cerrarSesion.php">
                            Cerrar Sesion
                        </a>
                    </li>
                <?php
                } // 
                else {
                ?>
                    <li class="nav-item pl-4">
                        <a class="cabecera" href="../loginAzul/login.php">
                            Login
                        </a>
                    </li>
                <?php
                }
                ?>


            </ul>
        </div>
        <a href="cart.php" class="nav-item nav-link active">
            <i class="fas fa-shopping-cart"></i>
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
            } else {
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
            }
            ?>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"></ul>
        </div>


    </nav>
</body>

</html>