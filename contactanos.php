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
    
    .contact{
        position: relative;
        padding: 50px 100px;
        /* min-height: 100vh; */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: #F7F3E8;
        background-size: cover;
        text-align: center;
        
    }
    /* .contact .content{
        align-items: center;
        justify-content: center;
    } */
    .contact .content h2{
        font-size: 36px;
        font-weight: 500;
        color: black;
    }
    .contact .content p{
        font-weight: 300;
        color: black;
    }
    .containerC{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }
    .containerC .contactInfo{
        width: 50%;
        display: flex;
        flex-direction: column;
    }
    .containerC .contactInfo .box{
        position: relative;
        padding: 20px 0;
        display: flex;
        align-items: left;
        justify-content: left;
    }
    .containerC .contactInfo .box .icon{
        min-width: 60px;
        height: 60px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 22px
    }
    .containerC .contactInfo .box .text{
        display: flex;
        margin-left: 20px;
        font-size: 16px;
        color: black;
        flex-direction: column;
        font-weight: 300;
        align-items: flex-start;
    }
    .containerC .contactInfo .box. text. h3{
        font-weight: 500;
        color: #00bcd4;
    }
    .contactForm{
        width: 40%;
        padding: 40px;
        background: #fff;
        border-radius: 10px;
    }
    .contactForm h2{
        font-size: 30px;
        color: #333;
        font-weight: 500;
    }
    .contactForm .inputBox{
        position: relative;
        width: 100%;
        margin-top: 10px;
    }
    .contactForm .inputBox input,
    .contactForm .inputBox textarea{
        width: 100%;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        border: none;
        border-bottom: 2px solid #333;
        outline: none;
        resize: none;
    }
    
    .contactForm .inputBox span{
        position: absolute;
        left: 0;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        pointer-events: none;
        transition: 0,5s;
        color: #666;
    }
    .contactForm .inputBox input:focus ~ span,
    .contactForm .inputBox input:valid ~ span,
    .contactForm .inputBox textarea:focus ~ span,
    .contactForm .inputBox textarea:valid ~ span{
        color: #e91e63;
        font-size: 12px;
        transform: translateY(-20px);
    }
    .contactForm .inputBox input[type="submit"]{
        width: 100px;
        background: #F47A1A;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
    }
    .contactForm .inputBox input:hover[type="submit"]{
        background: #333333;
    }
    @media (max-width: 991px){
        .contact{
            padding: 50px;
        }
        .containerC{
            flex-direction: column;
        }
        .containerC .contactInfo{
            margin-bottom: 40px;
        }
        .container .contactInfo,
        .contactForm{
            width: 100%;
        }
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
        <section class="contact">
            <div class="content">
                <h2 >Contactanos</h2>
                <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> -->

            </div>
            <div class="containerC">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div  class="text">
                            <h3 >Dirección</h3>
                            <p>344  Calle Rosendo Gutierrez, La Paz, Bolivia,35303</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="text">
                            <h3>Correo Electrónico</h3>
                            <p>NORDSTERN@gmail.com</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="text">
                            <h3>Teléfono</h3>
                            <p>78254199</p>
                        </div>
                    </div>
                </div>

                <div class="contactForm">
                    <form action="">
                        <h2>Enviar Mensaje</h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Nombre Completo</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Correo Electrónico</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"> </textarea>
                            <span>Escribe tu mensaje...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </section>

</body>
</html>