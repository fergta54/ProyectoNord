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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            /*border: 1px solid black;*/
        }

        .dropdown-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border: none;
        }

        .dropdown-content button:hover {
            background-color: gray
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: gray
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 ">
                <h1 class="text-center">Reportes</h1>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning btn-primary">Reporte Usuarios</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesUsuarios/ReportesUsuarios.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesUsuarios/ReporteUsuariosExcel.php">Generar reporte de EXCEL</a>

                            </div>
                        </div>
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Categorias</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesCategorias/ReporteCategoriasPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesCategorias/ReporteCategoriasExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Marcas</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesMarcas/ReporteMarcasPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesMarcas/ReporteMarcasExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Proveedores</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesProveedores/ReporteProveedoresPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesProveedores/ReporteProveedoresExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Productos</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesProductos/ReportesProductosPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesProductos/ReporteProductosExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Clientes</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesClientes/ReporteClientesPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesClientes/ReporteClientesExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Tiendas</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesTiendas/ReporteTiendasPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesTiendas/ReporteTiendasExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="dropdown w-100">
                            <button class="dropbtn w-100 btn btn-warning">Reporte Inventario</button>
                            <div class="dropdown-content w-100">
                                <form action="./ReportesInventario/ReporteInventarioPDF.php">
                                    <button class="w-100" type="submit">Generar reporte en PDF</button>
                                </form>
                                <a class="text-center" href="./ReportesInventario/ReporteInventarioExcel.php">Generar reporte de EXCEL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
