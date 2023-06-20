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
    .services .box-container{
  display: flex;
  flex-wrap: wrap;
  gap:1.5rem;
}

.services .box-container .box{
  flex: 1 1 30rem;
  border-radius: .5rem;
  padding:1rem;
  text-align: center;
}

.services .box-container .box i{
  padding:1rem;
  font-size: 5rem;
  color:var(--orange);
}

.services .box-container .box h3{
  font-size: 2.5rem;
  color:#333;
}

.services .box-container .box p{
  font-size: 1.5rem;
  color:#666;
  padding:1rem 0;
}

.services .box-container .box:hover{
  box-shadow: 0 1rem 2rem rgba(0,0,0,.1);
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
        
        <section class="services" id="services">

    <!-- <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>i</span>
        <span>o</span>
        <span>s</span>
    </h1> -->
    <br>
    <h1 class="text-center"> <b>Servicios</b> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <h3>Venta de articulos</h3>
            <p>Compra productos relacionados con telecomunicaciones</p>
        </div>
        <div class="box">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            <h3>Insumos</h3>
            <p>Venta y administracion</p>
        </div>
        <div class="box">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <h3>Todo en un mismo sitio</h3>
            <p>Todo lo que necesitas para armar redes lo encuentras aqui</p>
        </div>
        <div class="box">
            <i class="fa fa-users" aria-hidden="true"></i>
            <h3>Consultas Online</h3>
            <p>Evita las filas y realiza tus consultas online</p>
        </div>
        <div class="box">
            <i class="fa fa-ambulance" aria-hidden="true"></i>
            <h3>Soporte tecnico</h3>
            <p>Garantia asegurada</p>
        </div>
        <div class="box">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <h3>Atencion al cliente 24/7</h3>
            <p>No dudes en contactarnos si lo necesitas</p>
        </div>

    </div>

</section>
</body>
</html>