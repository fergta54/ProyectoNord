<?php
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
    <link rel="stylesheet" href="./recursos/css/cabecera.css">
    <link rel="stylesheet" href="./recursos/css/index.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="./recursos/js/jquery-3.7.0.min.js"></script>
    <script src="./recursos/js/bootstrap.min.js"></script>

    
    <style>
        @import url('http://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
    .nav-item {
    margin-right: 10px;
    }
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    
    .review .review-slider{
  padding-bottom: 2rem;
  margin: 150px;
}

.review .box{
  padding:2rem;
  text-align: center;
  box-shadow: 0 1rem 2rem rgba(0,0,0,.1);
  border-radius: .5rem;
}

.review .box img{
  height:13rem;
  width:13rem;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 1rem;
}

.review .box h3{
  color:#333;
  font-size: 2.5rem;
}

.review .box p{
  color:#666;
  font-size: 1.5rem;
  padding:1rem 0;
}

.review .box .stars i{
  color:var(--orange);
  font-size: 1.7rem;
}

    </style>
</head>

<body>
    
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
                                <a class="cabecera" href="./gestionVentas/menuProd.php">
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
                                <a class="cabecera" href="./contactanos.php">
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
        <br>
        <section class="review" id="review">

        <h1 class="text-center"> <b>Sobre Nosotros</b> </h1>

    <div class="swiper-container review-slider">
            <p style="font-size: 2.5rem;
                            font-weight: bolder;
                            color:black;
                            text-transform: uppercase;
                            text-align:center;">NORDSTERN</p>
        <div class="swiper-wrapper">
            <h1>
                <br>
                La empresa Nordstern es una empresa boliviana fundada el 21 de febrero de 2011, dedicada a la importación de materiales para telecomunicaciones y otros, para satisfacer las necesidades de nuestros clientes , contamos con 4 sucursales y planeamos expandir nuestros servicios por toda la region. 
            </h1>
        </div>

        <!--
        <p style="font-size: 2.5rem;
                            font-weight: bolder;
                            color:black;
                            text-transform: uppercase;
                            text-align:center;">Equipaje</p>
        <div class="swiper-wrapper">
            <h1>
                <br>
                Comprueba que el peso y las dimensiones de tu equipaje de mano está dentro de las normas establecidas de Aeroméxico. El equipaje de bodega ( o facturado) también tiene límites de tamaño y peso. Evita el cobro de exceso de equipaje siguiendo las normas establecidas por Aerovalle <br><br>
            </h1>
        </div>
        -->

        <p style="font-size: 2.5rem;
                            font-weight: bolder;
                            color:black;
                            text-transform: uppercase;
                            text-align:center;">Descarga nuestra Aplicacion Movil</p>
        <div class="swiper-wrapper">
            <h1>
                <br>
                Tambien contamos con una aplicacion movil para que puedas comprar tus productos ¡¡desde donde estes!! 
                <br><br>
                
            </h1>
        </div>

        <div style="justify-content: center;" class="swiper-wrapper text-center">
            <button style="font-size: 2.5rem;
                            font-weight: bolder;
                            
                            text-transform: uppercase;
                            text-align:center;" type="button" class="btn btn-outline-warning btn-lg">Descargar ahora!</button>
        </div>

    </div>

</section>
</body>
</html>