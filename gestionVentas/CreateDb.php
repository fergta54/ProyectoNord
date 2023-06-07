<?php
class CreateDb
{    
    public $tablename;
    public $con;
    public function __construct(
        $tablename = "productos"
    )
    {
      $this->tablename = $tablename;
      include('../conexion.php');
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



session_start();
include('../conexion.php');
require_once ("CreateDb.php");

include('../conexion.php');

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
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}






session_start();
include('../conexion.php');
require_once ("CreateDb.php");

$database = new CreateDb("productos", "Productos");

include ('checkout.php');


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["id_prod"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Producto eliminado')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
