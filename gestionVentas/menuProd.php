<?php

session_start();
include('../conexion.php');
require_once ('tarjetas.php');



if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id_prod");

        if(in_array($_POST['id_prod'], $item_array_id)){
            echo "<script>alert('El producto ya esta en el carrito')</script>";
            echo "<script>window.location = 'menuProd.php'</script>";
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
    <title>menuProd</title>
    <link rel="stylesheet" href="../recursos/css/ventas.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <!-- Font Awesome carrito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>



<body>
<?php include('navVentas.php'); ?>

    <h1>PRODUCTOS</h1>

            <?php
            //mostar todos los productos //
            /*include('../conexion.php');
            $seleccionar = mysqli_query(
                $conexion,
                "SELECT pr.id_prod as id,pr.nombre_prod,pr.imagen_prod,pr.precio_unit_compra,pr.estado_producto                        
                FROM productos pr
                 where estado_producto=1 order by id_prod"
            );
            if($seleccionar) {
                while ($row = mysqli_fetch_assoc($seleccionar)){
                    component($row['nombre_prod'], $row['precio_unit_compra'], $row['imagen_prod'], $row['id']);
                }
            }*/
/*
            include('../conexion.php');

            session_start();

            // Verificar si se ha enviado el formulario y se ha seleccionado una tienda
            if (isset($_POST['tienda'])) {
                // Guardar el ID de la tienda seleccionada en la variable de sesión
                $_SESSION['selected_tienda'] = $_POST['tienda'];
            }
            
            // Obtener el valor de la tienda seleccionada (si existe)
            $tiendaSeleccionada = isset($_SESSION['selected_tienda']) ? $_SESSION['selected_tienda'] : '';
            
            // Obtener todas las tiendas disponibles
            $tiendas = mysqli_query($conexion, "SELECT id_tienda, nombre_tienda FROM tiendas WHERE estado_tienda = 1 ORDER BY nombre_tienda");
            
            if ($tiendas) {
                // Generar el formulario de selección de tiendas
                echo "<form method='POST' action=''>
                        <label for='tienda'>Seleccione una sucursal:</label>
                        <select name='tienda' id='tienda'>
                            <option value=''>-- Seleccione una sucursal --</option>";
            
                while ($tienda = mysqli_fetch_assoc($tiendas)) {
                    // Verificar si la tienda seleccionada coincide con la tienda actual en el bucle
                    $selected = '';
                    if ($tiendaSeleccionada == $tienda['id_tienda']) {
                        $selected = 'selected';
                    }
            
                    echo "<option value='" . $tienda['id_tienda'] . "' $selected>" . $tienda['nombre_tienda'] . "</option>";
                }
            
                echo "</select>
                        <button type='submit' class=\"btn btn-info my-3 \">Mostrar productos</button>
                    </form>";
            
                echo "<div class='container'>
                        <div class='row text-center py-5'>";
            
                // Verificar si se ha seleccionado una tienda y mostrar los productos correspondientes
                if (!empty($tiendaSeleccionada)) {
                    $productos = mysqli_query($conexion, "SELECT p.id_prod, p.nombre_prod, p.imagen_prod, p.precio_unit_compra
                                                          FROM productos p
                                                          INNER JOIN inventarios i ON p.id_prod = i.id_producto
                                                          INNER JOIN tiendas t ON i.id_tienda = t.id_tienda
                                                          WHERE t.id_tienda = " . $tiendaSeleccionada . "
                                                          ORDER BY p.nombre_prod");
            
                    if ($productos) {
                        while ($producto = mysqli_fetch_assoc($productos)) {
                            // Mostrar los datos del producto
                            component($producto['nombre_prod'], $producto['precio_unit_compra'], $producto['imagen_prod'], $producto['id_prod']);
                        }
                    } else {
                        echo "Error en la consulta de productos: " . mysqli_error($conexion);
                    }
                }
            } else {
                echo "Error en la consulta de tiendas: " . mysqli_error($conexion);
            }           
            echo "</div>
                  </div>";*/

                  include('../conexion.php');
                  session_start();
                  
                  // Verificar si se ha enviado el formulario y se ha seleccionado una tienda
                  if (isset($_POST['tienda'])) {
                      // Guardar el ID de la tienda seleccionada en la variable de sesión
                      $_SESSION['selected_tienda'] = $_POST['tienda'];
                  }
                  
                  // Obtener el valor de la tienda seleccionada (si existe)
                  $tiendaSeleccionada = isset($_SESSION['selected_tienda']) ? $_SESSION['selected_tienda'] : '';
                  
                  // Obtener todas las tiendas disponibles
                  $tiendas = mysqli_query($conexion, "SELECT id_tienda, nombre_tienda FROM tiendas WHERE estado_tienda = 1 ORDER BY nombre_tienda");
                  
                  if ($tiendas) {
                      // Generar el formulario de selección de tiendas y categorías en la misma fila
                      echo "<div style='display: flex; align-items: center;'>
                              <form method='POST' action=''>
                              <span style='margin-right: 30px;''></span> <!-- Espacio horizontal adicional -->
                                  <label for='tienda'> Seleccione:  </label>
                                  <select name='tienda' id='tienda'>
                                      <option value=''>--Seleccione una sucursal--</option>";
                  
                      while ($tienda = mysqli_fetch_assoc($tiendas)) {
                          // Verificar si la tienda seleccionada coincide con la tienda actual en el bucle
                          $selected = $tiendaSeleccionada == $tienda['id_tienda'] ? 'selected' : '';
                  
                          echo "<option value='" . $tienda['id_tienda'] . "' $selected>" . $tienda['nombre_tienda'] . "</option>";
                      }
                  
                      echo "</select>
                              <button type='submit' class=\"btn btn-info my-3\">Mostrar productos</button>
                          </form>";
                  
                      // Obtener todas las categorías disponibles
                      $categorias = mysqli_query($conexion, "SELECT id_categoria, nombre_categoria FROM categorias WHERE estado_categoria = 1 ORDER BY nombre_categoria");
                  
                      if ($categorias) {
                          echo "<form method='POST' action=''>
                          <span style='margin-right: 40px;''></span> <!-- Espacio horizontal adicional -->
  
                                  <label for='categoria'></label>
                                  <select name='categoria' id='categoria'>
                                      <option value=''>-- Todas las categorías --</option>";
                  
                          while ($categoria = mysqli_fetch_assoc($categorias)) {
                              // Verificar si la categoría seleccionada coincide con la categoría actual en el bucle
                              $selectedCategoria = isset($_POST['categoria']) && $_POST['categoria'] == $categoria['id_categoria'] ? 'selected' : '';
                  
                              echo "<option value='" . $categoria['id_categoria'] . "' $selectedCategoria>" . $categoria['nombre_categoria'] . "</option>";
                          }
                  
                          echo "</select>
                                  <button type='submit' class=\"btn btn-info my-3\">Mostrar productos por categoría</button>
                              </form>";
                      } else {
                          echo "Error en la consulta de categorías: " . mysqli_error($conexion);
                      }
                  
                      echo "</div>";
                  
                      echo "<div class='container'>
                              <div class='row text-center py-5'>";
                  
                      // Verificar si se ha seleccionado una tienda y mostrar los productos correspondientes
                      if (!empty($tiendaSeleccionada)) {
                          $whereClause = "WHERE i.id_tienda = " . $tiendaSeleccionada;
                          if (isset($_POST['categoria']) && $_POST['categoria'] != '') {
                              $categoriaSeleccionada = $_POST['categoria'];
                              $whereClause .= " AND p.id_categoria = " . $categoriaSeleccionada;
                          }
                  
                          $productos = mysqli_query($conexion, "SELECT p.id_prod, p.nombre_prod, p.imagen_prod, p.precio_unit_compra
                                                                FROM productos p
                                                                INNER JOIN inventarios i ON p.id_prod = i.id_producto
                                                                INNER JOIN tiendas t ON i.id_tienda = t.id_tienda
                                                                $whereClause
                                                                ORDER BY p.nombre_prod");
                  
                          if ($productos) {
                              while ($producto = mysqli_fetch_assoc($productos)) {
                                  // Mostrar los datos del producto
                                  component($producto['nombre_prod'], $producto['precio_unit_compra'], $producto['imagen_prod'], $producto['id_prod']);
                              }
                          } else {
                              echo "Error en la consulta de productos: " . mysqli_error($conexion);
                          }
                      }
                  } else {
                      echo "Error en la consulta de tiendas: " . mysqli_error($conexion);
                  }
                  
                  echo "</div>
                        </div>";                                  
?>

 <?php include('../incluir/footer.php'); ?>
</body>
</html>