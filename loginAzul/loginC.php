<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">

    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');
*{
    font-family: 'Poppins' ,sans-serif;
}

.overlay {
    background-image: url("../recursos/img/fondoLogin.jpg");

    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    
    mix-blend-mode: normal;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Ajusta el último valor (0.5) para controlar la opacidad */
}
.overl{
    mix-blend-mode: normal;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); 
}

.buttonSubmit{
    width: 100%;
    height: 40px;
    border-radius: 5px;
    background-color: black;
    color: white;
    border-color: white;
    
}

.buttonSubmit:hover{
    background-color: whitesmoke;
    color: black;
    transition-duration: 500ms;
    transition-delay: 25ms;
}

.boxLog{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
    
    
}
.containerLog{
    width: 500px;
    display: flex;
    flex-direction: column;
    padding: 0 15px 0 15px;
    border-radius: 10px;
}
span{
    color: #fff;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
header{
    color: #fff;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
.input-field .input{
    height: 45px;
    width: 100%;
    border: none;
    border-radius: 10px;
    color: #fff;
    font-size: 15px;
    padding: 0 0 0 45px;
    background: rgba(255,255,255,0.1);
    outline: none;
    margin-bottom: 25px;
}
i{
    position: relative;
    top: -33px;
    left: 17px;
    color: #fff;
}
::-webkit-input-placeholder{
    color: #fff;
}
.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    outline: none;
    width: 100%;
    color: black;
    background: rgba(255,255,255,0.7);
    cursor: pointer;
    transition: .3s ;
}
.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}
.two-col{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}
.one{
    display: flex;
}
label a{
    text-decoration: none;
    color: #fff;
}
#anav{
    color: white;
}
#anav:hover{
    color: orange;
}
    </style>
</head>

<body>
    
    <!-- <form action="./validar.php" method="post">
        <h1>Ingrese credencial</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su contraseña" name="contrasenia"></p>
        <input type="submit" value="Ingresar">
    </form> -->

    <div class="overlay">
        <!-- navbar -->
        <div class="overl">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="../index.php">
                        <img src="../recursos/img/lg.png" alt="logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a id="anav" class="nav-link text-light" href="../index.php">
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="index.php">
                                    Servicios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="./gestionVentas/menuProd.php">
                                    Comprar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="index.php">
                                    Sucursales
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="index.php">
                                    Sobre Nosotros
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="index.php">
                                    Contacto
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../loginAzul/loginC.php">
                                    Log In
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="index.php">
                                    Sign In
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    <!-- fin navbar -->
            <form action="./validarC.php" method="post">
                <div class="boxLog">
                    <div class="containerLog">
                        <div class="text-center" class="top">
                            <img  src="../recursos/img/lg.png" alt="" />
                            <h1 class="text-center text-light"><b>Bienvenido Cliente</b></h1>
                            <p class="text-center text-light"><b>al sistema</b></p>
                            <h4 class="text-center text-light"><b>"NORD-NET PRO"</b></h4>
                            <h3 class="text-center text-light">Login</h3>
                        </div>
                        <div class="input-field">
                            <input type="text" name='usuario' class="input" placeholder="Ingrese su usuario" id=""/>
                            <i class='bx bx-user' ></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name='contrasenia'  class="input" placeholder="Ingresa tu Contraseña" id=""/>
                            <i class='bx bx-lock-alt'></i>
                        </div>
                        <div class="input-field">
                            <button class='btn btn-danger w-100' type='submit'>Login</button>
                            
                        </div>
                        <br>
                        <a href="./login.php">Ir al login de empleados</a>

                        
                    </div>
                </div>
            </form>
            </div>
        </div>
</body>

</html>