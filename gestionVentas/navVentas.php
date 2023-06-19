<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .nav-item {
    margin-right: 15px;
    }
    </style>
</head>
<header class="navbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-4 px-lg-5">
            <a class="cabecera" href="../index.php">
                <img src="../recursos/img/lg.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="cabecera" href="../index.php">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="menuProd.php">
                            Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Sucursales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="index.php">
                            Contacto
                        </a>
                    </li> 
                    
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="cabecera" href="./perfilCliente.php">
                            PERFIL
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="cabecera" href="./ayudaCliente.php">
                            AYUDA
                        </a>
                    </li>
                </ul>
            </div>   
                
        </div>
    </nav>
</header>
</html>