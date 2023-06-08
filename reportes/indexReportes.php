
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roles</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">


    <style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: gray}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
</head>

<body>
    <!-- <div class="container my-5 w-50">
        <div class="dropdown show ">
            <a class="btn btn-secondary dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    </div> -->
    
    <div class="container my-5 w-50">
        <h1 class="text-center">Reportes</h1>
        <br>
        
        <div class="dropdown w-100">
            <button class="dropbtn w-100">Reporte Usuarios</button>
            <div class="dropdown-content w-100">
                <form action="./ReportesUsuarios.php">
                    <button type="submit">Generar reporte en PDF</button>
                </form>
                <a href="./ReporteUsuariosExcel.php">Generar reporte de EXCEL</a>
                
            </div>
        </div>
        <br><br>
        <div class="dropdown w-100">
            <button class="dropbtn w-100">Reporte Categorias</button>
            <div class="dropdown-content w-100">
                <form action="./ReportesCategorias/ReporteCategoriasPDF.php">
                    <button type="submit">Generar reporte en PDF</button>
                </form>
                <a href="./ReportesCategorias/ReporteCategoriasExcel.php">Generar reporte de EXCEL</a>
            </div>
        </div>
        <br><br>
        <div class="dropdown w-100">
            <button class="dropbtn w-100">Reporte Marcas</button>
            <div class="dropdown-content w-100">
                <form action="./ReportesMarcas/ReporteMarcasPDF.php">
                    <button type="submit">Generar reporte en PDF</button>
                </form>
                <a href="./ReportesMarcas/ReporteMarcasExcel.php">Generar reporte de EXCEL</a>
            </div>
        </div>
        <br><br>
        <div class="dropdown w-100">
            <button class="dropbtn w-100">Reporte Proveedores</button>
            <div class="dropdown-content w-100">
                <form action="./ReportesProveedores/ReporteProveedoresPDF.php">
                    <button type="submit">Generar reporte en PDF</button>
                </form>
                <a href="./ReportesProveedores/ReporteProveedoresExcel.php">Generar reporte de EXCEL</a>
            </div>
        </div>
        <br><br>
        <div class="dropdown w-100">
            <button class="dropbtn w-100">Reporte Productos</button>
            <div class="dropdown-content w-100">
                <form action="./ReportesProductos/ReportesProductosPDF.php">
                    <button type="submit">Generar reporte en PDF</button>
                </form>
                <a href="./ReportesProductos/ReporteProductosExcel.php">Generar reporte de EXCEL</a>
            </div>
        </div>
    </div>
    
</body>


</html>