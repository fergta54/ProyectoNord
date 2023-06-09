<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analitica</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="../recursos/js/botonMostrar.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
  </head>
  <body>
    <div class="row">
          <div class="col-2">
              <?php include('../incluir/asideNavAdmin.php')
              ?>
          </div>
          <div class="col-10">
          <?php
              include ('../conexionOlap.php');
              // include ('../incluir/asideNavAdmin.php');

              //query
              $ejecutarConsulta = $conexionolap->query("SELECT T.descripcion nombre, `cant_herramientas` total FROM `dbo.ventas` INNER JOIN `dbo.herramientas` as T ON `dbo.ventas`.`Herramientas_id_olap` = T.id_olap 
              ORDER BY `cant_herramientas` DESC LIMIT 10;
              ");
              //arreglo donde guardamos las filas y columnas
              $datos_rows = array();
              $datos_table = array();

              $datos_table['cols'] = array(

                  //array('label' => 'Tienda_id_olap', 'type' => 'string'), //para especificar que es un string
                  array('label' => 'Producto', 'type' => 'string'), //para especificar que es un numero
                  array('label' => 'Cantidad Total', 'type' => 'number'), //para especificar que es un numero
                  
              );             

              //Extraer los datos
              foreach($ejecutarConsulta as $p) {
                  $pastel_temp = array();

                  //$pastel_temp[] = array('v' => (string) $p['idTiend']);
                  $pastel_temp[] = array('v' => (string) $p['nombre']);

                  $pastel_temp[] = array('v' => (double) $p['total']);

                  $pastel_rows[] = array('c' => $pastel_temp);
              }

              //codificar a json
              $datos_table['rows'] = $pastel_rows;
              $pastel_jsonTable = json_encode($datos_table);
          ?>
            <!-- <div id="barchart_material" style="width: 900px; height: 500px;"></div>
            <button onClick="mostrarGrafico1()">Mostrar primer grafico</button> -->

              <div class="container">
                  <h1>Consulta 6: Productos mas vendidos por cantidad de la categoria Herramientas</h1>

                  <div id="graficoMontos" style="width:1200px;height:800px;"></div>
                  <!-- <button onClick="mostrarMontos1()">Mostrar segundo grafico</button> -->
              </div>
          </div>
    </div>

  </body>

  <script type="text/javascript">
    // function mostrarGrafico1(){
    //   google.charts.load('current', {'packages':['bar']});
    //   google.charts.setOnLoadCallback(drawChart);
    //   function drawChart() {
    //     var data = google.visualization.arrayToDataTable([
    //       ['Year', 'Sales', 'Expenses', 'Profit'],
    //       ['2014', 1000, 400, 200],
    //       ['2015', 1170, 460, 250],
    //       ['2016', 660, 1120, 300],
    //       ['2017', 1030, 540, 350]
    //     ]);
    //     var options = {
    //       chart: {
    //         title: 'Company Performance',
    //         subtitle: 'Sales, Expenses, and Profit: 2014-2017',
    //       },
    //       bars: 'horizontal' // Required for Material Bar Charts.
    //     };
    //     var chart = new google.charts.Bar(document.getElementById('barchart_material'));
    //     chart.draw(data, google.charts.Bar.convertOptions(options));
    //   }
      
    // }    
    
        //google.charts.load('current', {'packages':['bar']});
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart22);
        //google.charts.setOnLoadCallback(drawChartPastel);

        function drawChart22() {
            var data3 = new google.visualization.DataTable(<?=$pastel_jsonTable?>);
            var options3 = 
            {
              chart: {
                  title: 'Clientes por Monto',
                  
                },
                bars: 'horizontal' // Required for Material Bar Charts.
            };

            var chart3 = new google.charts.Bar(document.getElementById('graficoMontos'));
            chart3.draw(data3, google.charts.Bar.convertOptions(options3));
            
        }
    
      

    // function mostrarGrafico3(){
    //     //google.charts.load('current', {'packages':['bar']});
    //     google.load('visualization','1',{'packages':['corechart']});
    //     google.setOnLoadCallback(drawChartPastel);
    //     //google.charts.setOnLoadCallback(drawChartPastel);

    //     function drawChartPastel() {
    //         var data2 = new google.visualization.DataTable();
    //         var options2 = 
    //         {
    //             title: 'Titulo del grafico',
    //             id3D: 'true',
    //             width: 900,
    //             heigth: 700
    //         };
    //         var chart2 = new google.visualization.PieChart(document.getElementById('grafico_Pastel')
    //         );
    //         chart2.draw(data2, options2);
    //     }
    // }
      
    </script>
</html>