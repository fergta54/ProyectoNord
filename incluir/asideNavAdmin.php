<?php
include('verificarSesionAdminNav.php');
?>
<!doctype html>
<html lang="es">

<head>
  <title>Sidebar 01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../recursos/css/asideAdmin.css">
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="../admin.php"><img src="../recursos/img/lg.png"></a>
        <br><br>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="#usuarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de usuarios</a>
            <ul class="collapse list-unstyled" id="usuarioSubmenu">
              <li>
                <a href="../gestionUsuarios/listarUsuarios.php">Listar usuarios</a>
              </li>
              <li>
                <a href="../gestionUsuarios/registrarUsuario.php">Crear usuario</a>
              </li>
              <li>
                <a href="#">Editar usuarios</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de Clientes</a>
            <ul class="collapse list-unstyled" id="clientesSubmenu">
              <li>
                <a href="../gestionClientes/listarClientes.php">Listar Clientes</a>
              </li>
              <li>
                <a href="../gestionClientes/listarClientes.php">Listar Clientes</a>
              </li>
            </ul>
          </li>
          <li>
          <li>
            <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de roles</a>
            <ul class="collapse list-unstyled" id="rolesSubmenu">
              <li>
                <a href="../gestionUsuarios/listarRoles.php">Listar roles</a>
              </li>
              <li>
                <a href="../gestionUsuarios/crearRol.php">Crear rol</a>
              </li>
              <li>
                <a href="../gestionUsuarios/editarRol.php">Editar roles</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="../reportes/indexReportes.php" class="">Reportes</a>

          </li>
          <li>
            <a href="#categoriasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de categorías</a>
            <ul class="collapse list-unstyled" id="categoriasSubmenu">
              <li>
                <a href="../gestionProductos/adminCategorias.php">Listar categorías</a>
              </li>
              <li>
                <a href="../gestionProductos/crearCategoria.php">Crear categoría</a>
              </li>
              <li>
                <a href="#">Editar categoría</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#marcasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de marcas</a>
            <ul class="collapse list-unstyled" id="marcasSubmenu">
              <li>
                <a href="../gestionProductos/adminMarcas.php">Listar marcas</a>
              </li>
              <li>
                <a href="../gestionProductos/crearMarca.php">Crear marca</a>
              </li>
              <li>
                <a href="#">Editar marcas</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#productosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de productos</a>
            <ul class="collapse list-unstyled" id="productosSubmenu">
              <li>
                <a href="../gestionProductos/adminProductos.php">Listar productos</a>
              </li>
              <li>
                <a href="../gestionProductos/crearProducto.php">Crear producto</a>
              </li>
              <li>
                <a href="#">Editar productos</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#tiendasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de tiendas</a>
            <ul class="collapse list-unstyled" id="tiendasSubmenu">
              <li>
                <a href="#">Listar tiendas</a>
              </li>
              <li>
                <a href="#">Crear tienda</a>
              </li>
              <li>
                <a href="#">Editar tiendas</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#inventariosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de inventarios</a>
            <ul class="collapse list-unstyled" id="inventariosSubmenu">
              <li>
                <a href="#">Ver Inventarios</a>
              </li>
              <li>
                <a href="#">Editar Inventarios</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#proveedoresSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de proveedores</a>
            <ul class="collapse list-unstyled" id="proveedoresSubmenu">
              <li>
                <a href="../gestionProveedores/listarProveedores.php">Listar proveedores</a>
              </li>
              <li>
                <a href="../gestionProveedores/crearProveedor.php">Crear proveedor</a>
              </li>
              <li>
                <a href="#">Editar proveedores</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#pedidosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestion de pedidos</a>
            <ul class="collapse list-unstyled" id="pedidosSubmenu">
              <li>
                <a href="#">Listar pedidos</a>
              </li>
              <li>
                <a href="#">Crear pedido</a>
              </li>
              <li>
                <a href="#">Editar pedidos</a>
              </li>
            </ul>
          </li>

          <br><br><br>
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
              <a class="cabecera" href="../loginAzul/cerrarSesion.php">
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
        <div class="footer">
          <p>Grupo Azul</p>
        </div>
      </div>
    </nav>
  </div>

  <script src="../recursos/js/jquery.min.js"></script>
  <script src="../recursos/js/popper.js"></script>
  <script src="../recursos/js/bootstrap.min.js"></script>
  <script src="../recursos/js/mainAside.js"></script>
</body>

</html>