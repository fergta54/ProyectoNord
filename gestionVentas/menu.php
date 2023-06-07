<?php
session_start();
include('conexion.php');
class CreateDb
{    
    public $tablename;
    public $con;
    public function __construct(
        $tablename = "productos"
    )
    {
      $this->tablename = $tablename;
      include('conexion.php');
      $this->con = mysqli_connect($servidor, $usu, $password, $bd);
    }
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}

$database = new CreateDb("productos");

include ('checkout.php');

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id_prod");

        if(in_array($_POST['id_prod'], $item_array_id)){
            echo "<script>alert('El producto ya esta en el carrito')</script>";
            echo "<script>window.location = 'menu.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'id_prod' => $_POST['id_prod']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
                'id_prod' => $_POST['id_prod']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>


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

<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['nombre_prod'], $row['precio_prod'], $row['imagen_prod'], $row['id']);
                }
            ?>
        </div>
</div>

</body>

</html>