<?php
// include('verificarSesionAdminNav.php');
?>
<!doctype html>
<html lang="es">

<head>
  <title>Sidebar 01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./recursos/css/asideAdmin.css">
  <style>
  /* Estilos para las opciones principales */
  #sidebar ul.list-unstyled.components li>a {
    padding-left: 20px; /* Agrega sangría a las opciones principales */
    display: block;
    color: #F47A1A; /* Color de texto para opciones no seleccionadas */
  }

  #sidebar ul.list-unstyled.components li>a.selected {
    background-color:#004B99; /* Color de fondo para opciones seleccionadas */
    color: #fff; /* Color de texto para opciones seleccionadas */
  }

  /* Estilos para los submenús */
  #sidebar ul.list-unstyled.components ul li>a {
    padding-left: 40px; /* Agrega más sangría a las opciones de submenú */
  }
  #sidebar {
    overflow-y: auto; 
    height: 100vh; 
  }
  #sidebar::-webkit-scrollbar {
  width: 0.5em; 
  background-color: transparent; 
}

#sidebar::-webkit-scrollbar-thumb {
  background-color: transparent; 
}
</style>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var menuLinks = document.querySelectorAll("#sidebar a");
    menuLinks.forEach(function(link) {
      link.addEventListener("click", function() {
        menuLinks.forEach(function(link) {
          link.classList.remove("selected");
        });
        this.classList.add("selected");
      });
    });
  });
</script>

</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#"><img src="./recursos/img/lg.png"></a>
        <br><br>
        <div id="menu-container"> 
        <ul class="list-unstyled components mb-5">
          <!-- <li class="active"> -->
          <li>
            <a href="#usuarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-users"></i> Gestion de usuarios
            </a>
            <ul class="collapse list-unstyled" id="usuarioSubmenu">
              <li>
                <a href="./gestionUsuarios/listarUsuarios.php">◉ Listar usuarios</a>
              </li>
              <li>
                <a href="./gestionUsuarios/registrarUsuario.php">◉ Crear usuario</a>
              </li>
              <li>
                <a href="#"> ◉ Editar usuarios</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-address-book"></i> Gestion de Clientes
          </a>
            <ul class="collapse list-unstyled" id="clientesSubmenu">
              <li>
                <a href="./gestionClientes/listarClientes.php">◉ Listar Clientes</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs"></i> Gestion de roles</a>
            <ul class="collapse list-unstyled" id="rolesSubmenu">
              <li>
                <a href="./gestionUsuarios/listarRoles.php">◉ Listar roles</a>
              </li>
              <li>
                <a href="./gestionUsuarios/crearRol.php">◉ Crear rol</a>
              </li>
              <li>
                <a href="./gestionUsuarios/editarRol.php">◉ Editar roles</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#categoriasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-tags"></i> Gestion de categorías</a>
            <ul class="collapse list-unstyled" id="categoriasSubmenu">
              <li>
<<<<<<< Updated upstream
                <a href="./gestionProductos/adminCategorias.php">◉ Listar categorías</a>
=======
                <a href="./gestionProductos/listarCategorias.php">Listar categorías</a>
>>>>>>> Stashed changes
              </li>
              <li>
                <a href="./gestionProductos/crearCategoria.php">◉ Crear categoría</a>
              </li>
              <li>
<<<<<<< Updated upstream
                <a href="#">◉ Editar categoría</a>
=======
                <a href="./gestionProductos/adminCategorias.php">Editar categoría</a>
>>>>>>> Stashed changes
              </li>
            </ul>
          </li>
          <li>
            <a href="#marcasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-barcode"></i> Gestion de marcas</a>
            <ul class="collapse list-unstyled" id="marcasSubmenu">
              <li>
<<<<<<< Updated upstream
                <a href="./gestionProductos/adminMarcas.php">◉ Listar marcas</a>
=======
                <a href="./gestionProductos/listarMarcas.php">Listar marcas</a>
>>>>>>> Stashed changes
              </li>
              <li>
                <a href="./gestionProductos/crearMarca.php">◉ Crear marca</a>
              </li>
              <li>
<<<<<<< Updated upstream
                <a href="#">◉ Editar marcas</a>
=======
                <a href="./gestionProductos/adminMarcas.php">Editar marcas</a>
>>>>>>> Stashed changes
              </li>
            </ul>
          </li>
          <li>
            <a href="#productosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> Gestion de productos</a>
            <ul class="collapse list-unstyled" id="productosSubmenu">
              <li>
<<<<<<< Updated upstream
                <a href="./gestionProductos/adminProductos.php">◉ Listar productos</a>
=======
                <a href="./gestionProductos/listarProductos.php">Listar productos</a>
>>>>>>> Stashed changes
              </li>
              <li>
                <a href="./gestionProductos/crearProducto.php">◉ Crear producto</a>
              </li>
              <li>
<<<<<<< Updated upstream
                <a href="#">◉ Editar productos</a>
=======
                <a href="./gestionProductos/adminProductos.php">Editar productos</a>
>>>>>>> Stashed changes
              </li>
            </ul>
          </li>
          <li>
            <a href="#tiendasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-building"></i> Gestion de tiendas</a>
            <ul class="collapse list-unstyled" id="tiendasSubmenu">
              <li>
                <a href="#">◉ Listar tiendas</a>
              </li>
              <li>
<<<<<<< Updated upstream
                <a href="#">◉ Crear tienda</a>
              </li>
              <li>
                <a href="#">◉ Editar tiendas</a>
=======
                <a href="./gestionTiendas/crearTienda.php">Crear tienda</a>
              </li>
              <li>
                <a href="./gestionTiendas/adminTiendas.php">Editar tiendas</a>
>>>>>>> Stashed changes
              </li>
            </ul>
          </li>
          <li>
            <a href="#inventariosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cubes"></i> Gestion de inventarios</a>
            <ul class="collapse list-unstyled" id="inventariosSubmenu">
              <li>
                <a href="#">◉ Ver Inventarios</a>
              </li>
              <li>
                <a href="#">◉ Editar Inventarios</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#proveedoresSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-truck"></i> Gestion de proveedores</a>
            <ul class="collapse list-unstyled" id="proveedoresSubmenu">
              <li>
                <a href="./gestionProveedores/listarProveedores.php">◉ Listar proveedores</a>
              </li>
              <li>
                <a href="./gestionProveedores/crearProveedor.php">◉ Crear proveedor</a>
              </li>
              <li>
                <a href="#">◉ Editar proveedores</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#pedidosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-list-alt"></i> Gestion de pedidos</a>
            <ul class="collapse list-unstyled" id="pedidosSubmenu">
              <li>
                <a href="#">◉ Listar pedidos</a>
              </li>
              <li>
                <a href="#">◉ Crear pedido</a>
              </li>
              <li>
                <a href="#">◉ Editar pedidos</a>
              </li>
            </ul>
          </li>

          <br>
          <?php
          if ($_SESSION['usuario']) {
            // echo '<script>Console.log("LLEGA")</script>';
            $usuario = $_SESSION['usuario'];
            $varRol = $_SESSION['rol'];
          }
          if ($varRol === 'admin') {
          ?>
            <li>
              Bienvenido <?php
                          echo 'Administrador ';
                          // echo $_SESSION['usuario'];
                          ?> !
            </li>
            <li>
              <a class="cabecera" href="./loginAzul/cerrarSesion.php">
                Cerrar Sesion
              </a>
            </li>
          <?php
          } // 
          else {
          ?>
            <li class="nav-item pl-4">
              <a class="cabecera" href="../loginAzul/login.php">
                Login
              </a>
            </li>
          <?php
          }
          ?>
        </ul>
        </div>
        <div class="footer">
          <p>Grupo Azul</p>
        </div>
      </div>
    </nav>
  </div>

  <!-- <script src="../recursos/js/jquery.min.js"></script>
  <script src="../recursos/js/popper.js"></script>
  <script src="../recursos/js/bootstrap.min.js"></script>
  <script src="../recursos/js/mainAside.js"></script> -->
</body>

</html>