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
    .gallery .box-container{
  display: flex;
  flex-wrap: wrap;
  gap:1.5rem;
}

.gallery .box-container .box{
  overflow: hidden;
  box-shadow: 0 1rem 2rem rgba(0,0,0,.1);
  border:1rem solid #fff;
  border-radius: .5rem;
  flex:1 1 30rem;
  height: 25rem;
  position: relative;
}

.gallery .box-container .box img{
  height: 100%;
  width:100%;
  object-fit: cover;
}

.gallery .box-container .box .content{
  position: absolute;
  top:-100%; left:0;
  height: 100%;
  width:100%;
  text-align: center;
  background:rgba(0,0,0,.7);
  padding:2rem;
  padding-top: 5rem;
}

.gallery .box-container .box:hover .content{
  top:0;
}

.gallery .box-container .box .content h3{
  font-size: 2.5rem;
  color:var(--orange);
}

.gallery .box-container .box .content p{
  font-size: 1.5rem;
  color:#eee;
  padding:.5rem 0;
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
        
        <section class="gallery" id="gallery">

        <h1 class="text-center"> <b>Sucursales</b> </h1>

    <div class="box-container">
        

        <div class="box">
            <img src="./recursos/img/sucursal1.jpg" alt="">
            <div class="content">
                <h3>La Paz</h3>
                <p>Se encuentra en la ciudad de La Paz en la calle Rosendo Gutierrez</p>
            </div>
        </div>
        <div class="box">
            <img src="./recursos/img/sucursal2.jpg" alt="">
            <div class="content">
                <h3>La Paz</h3>
                <p>Se encuentra en la ciudad de La Paz en la calle Juan de la Riva #2877</p>
            </div>
        </div>
        <div class="box">
            <img src="./recursos/img/sucursal3.jpg" alt="">
            <div class="content">
                <h3>La Paz</h3>
                <p>Se encuentra en la ciudad de El Alto en la calle Juan Pablo II</p>
            </div>
        </div>
        <div class="box">
            <img src="./recursos/img/sucursal4.jpg" alt="">
            <div class="content">
                <h3>La Paz</h3>
                <p>Se encuentra en la ciudad de La Paz en la calle Max Paredes</p>
            </div>
        </div>
        
        
        

    </div>

</section>
</body>
</html>