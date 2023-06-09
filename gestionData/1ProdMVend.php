<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO</title>
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
              $id_tienda = $_GET['id'];
              $pastel_table = 0;

              //query
              $pastel = $conexionolap->query("SELECT `nombre_prod`,`precio_unit_compra` FROM `productos`");
              //arreglo donde guardamos las filas y columnas
              $pastel_rows = array();
              $pastel_table = array();

              $pastel_table['cols'] = array(

                  array('label' => 'nombre_prod', 'type' => 'string'), //para especificar que es un string
                  array('label' => 'precio_unit_compra', 'type' => 'number') //para especificar que es un numero
                  
              );


              //Extraer los datos
              foreach($pastel as $p) {
                  $pastel_temp = array();

                  $pastel_temp[] = array('v' => (string) $p['nombre_prod']);

                  $pastel_temp[] = array('v' => (int) $p['precio_unit_compra']);
                  $pastel_rows[] = array('c' => $pastel_temp);
              }

              //codificar a json
              $pastel_table['rows'] = $pastel_rows;
              $pastel_jsonTable = json_encode($pastel_table);
          ?>
            <div id="barchart_material" style="width: 900px; height: 500px;"></div>
            <button onClick="mostrarGrafico1()">Mostrar primer grafico</button>

              <div class="container">
                  <h1>Consulta 1: Titulo del grafico</h1>

                  <div id="grafico_Pastel"></div>
                  <button onClick="mostrarGrafico2()">Mostrar segundo grafico</button>
              </div>
          </div>
    </div>

  </body>

  <script type="text/javascript">
    function mostrarGrafico1(){
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);
        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      
    }    
    function mostrarGrafico2(){
        //google.charts.load('current', {'packages':['bar']});
        google.load('visualization','1',{'packages':['corechart']});
        google.setOnLoadCallback(drawChartPastel);
        //google.charts.setOnLoadCallback(drawChartPastel);

        function drawChartPastel() {
            var data2 = new google.visualization.DataTable(<?=$pastel_jsonTable?>);
            var options2 = 
            {
                title: 'Titulo del grafico',
                id3D: 'true',
                width: 900,
                heigth: 700
            };
            var chart2 = new google.visualization.PieChart(document.getElementById('grafico_Pastel')
            );
            chart2.draw(data2, options2);
        }
    }
      
    </script>
</html>