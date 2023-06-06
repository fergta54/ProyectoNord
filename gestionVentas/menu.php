<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="../recursos/css/ventas.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <!-- Font Awesome carrito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <a class="cabecera" href="index.php">
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
                    <?php
                    }
                    ?>                    
                </ul>
            </div>
         
                <a href="cart.php" class="nav-item nav-link active">
                        <i class="fas fa-shopping-cart"></i> 
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                        ?>             
                </a>
        </div>
    </nav>
</header>

<body>
productos
<?php //include('../incluir/barraNav.php') ?>
<?php //require_once ("../incluir/barraNav.php"); ?>






</body>

</html>