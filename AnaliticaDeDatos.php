<?php
    $servidor = 'MYSQL8001.site4now.net';
    $usu = 'a9a738_nrdazul';
    $password = 'GrupoAzul777';
    $bd = 'db_a9a738_nrdazul';

    $conexion = mysqli_connect($servidor, $usu, $password, $bd);

    $pastel_table = 0;

    //query
    $pastel = $conexion->query("SELECT `nombre_prod`,`precio_unit_compra` FROM `productos`");
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


<html>
  <head>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    /*
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
      */
    </script>

    <script type="text/javascript">
        //google.charts.load('current', {'packages':['bar']});
        google.load('visualization','1',{'packages':['corechart']});
        google.setOnLoadCallback(drawChartPastel);
        //google.charts.setOnLoadCallback(drawChartPastel);

        function drawChartPastel() {
            var data = new google.visualization.DataTable(<?=$pastel_jsonTable?>);
            var options = 
            {
                title: 'Titulo del grafico',
                id3D: 'true',
                width: 900,
                heigth: 700
            };
            var chart = new google.visualization.PieChart(document.getElementById('grafico_Pastel')
            );
            chart.draw(data, options);
        }
    </script>


  </head>
  <body>
   <!-- <div id="barchart_material" style="width: 900px; height: 500px;"></div>-->

    <div class="container">
        <h1>Consulta 1: Titulo del grafico</h1>

        <div id="grafico_Pastel"></div>

    </div>

  </body>
</html>