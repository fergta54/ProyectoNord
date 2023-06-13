<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regresión lineal</title>
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
      <?php include('../incluir/asideNavAdmin.php') ?>
    </div>
    <div class="col-10">

      <div class="container my-5 w-50">
        <h2 class="text-center">ESTIMACION DE VENTAS</h2>
        <div>
          <form action="" method="GET">
            <div class="form-group">
              <!-- <label for="valX">Valor del mes</label><br>
            <input name="valX" type="text" class="form-control-lg w-100" id="valX">
            <br><br> -->
              <label for="valX">Elegir mes</label><br>
              <select style="width:600px;" class="form-control-lg w-100" name="valX" required>
                <option value="1" selected> Marzo-23 (mes 1)</option>
                <option value="2"> Abril-23 (mes 2)</option>
                <option value="3"> Mayo-23 (mes 3)</option>
                <option value="4"> Junio-23 (mes 4)</option>
                <option value="5"> Julio-23 (mes 5)</option>
                <option value="6"> Agosto-23 (mes 6)</option>
                <option value="7"> Septiembre-23 (mes 7)</option>
                <option value="8"> Octubre-23 (mes 8)</option>
                <option value="9"> Noviembre-23 (mes 9)</option>
                <option value="10"> Diciembre-23 (mes 10)</option>
                <option value="11"> Enero-24 (mes 11)</option>
                <option value="12"> Febrero-24 (mes 12)</option>
                <option value="13"> Marzo-24 (mes 13)</option>
                <option value="14"> Abril-24 (mes 14)</option>
                <option value="15"> Mayo-24 (mes 15)</option>
              </select>
            </div>

            <a href="./regresionLineal.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
            <button type="submit" class="btn btn-primary btn-success btn-lg w-100" name="definirX">Calcular</button>

          </form>

          <?php
          include('../conexionOlap.php');
          // include ('../incluir/asideNavAdmin.php');

          //query
          $ejecutarConsulta = $conexionolap->query("SELECT `dbo.calendario`.nombre_mes as Mes, `dbo.calendario`.id_mes as IdMes,
      sum(`dbo.ventas`.monto_total) as Monto_total FROM `dbo.ventas`
      inner join `dbo.calendario` on `dbo.calendario`.id_olap =`dbo.ventas`.Calendario_id_olap   
      group by `dbo.calendario`.id_mes
      order by `dbo.calendario`.id_mes asc;");
          //arreglo donde guardamos las filas y columnas
          $valores_X = [1, 1];
          $valores_Y = [2, 2];
          $valoresXY = array();
          $datos_table = array();

          $datos_table['cols'] = array(
            array('label' => 'Mes', 'type' => 'number'), //para especificar que es un numero
            array('label' => 'Monto Total', 'type' => 'number'), //para especificar que es un numero
          );


          foreach ($ejecutarConsulta as $p) {
            $pastel_temp = array();

            //$pastel_temp[] = array('v' => (string) $p['idTiend']);
            $pastel_temp[] = array('v' => (int) $p['IdMes']);

            $pastel_temp[] = array('v' => (float) $p['Monto_total']);

            $pastel_rows[] = array('c' => $pastel_temp);
          }

          //codificar a json
          $datos_table['rows'] = $pastel_rows;
          $pastel_jsonTable = json_encode($datos_table);

          //query
          $ejecutarConsulta2 = $conexionolap->query("SELECT `dbo.calendario`.nombre_mes as Mes, `dbo.calendario`.id_mes as IdMes,
      sum(`dbo.ventas`.monto_total) as Monto_total FROM `dbo.ventas`
      inner join `dbo.calendario` on `dbo.calendario`.id_olap =`dbo.ventas`.Calendario_id_olap   
      group by `dbo.calendario`.id_mes
      order by `dbo.calendario`.id_mes asc;");

          $verFilas = mysqli_num_rows($ejecutarConsulta2);
          $fila = mysqli_fetch_array($ejecutarConsulta2);
          if (!$ejecutarConsulta) {
            echo "Error en la consulta";
          } else {
            for ($i = 0; $i < $verFilas; $i++) {
              $valores_X[$i] = $fila[1];

              $valores_Y[$i] = $fila[2];
              $fila = mysqli_fetch_array($ejecutarConsulta2);
            }
          }
          // Función para calcular la regresión lineal
          function regresionLineal($x, $y)
          {
            $n = count($x);
            $sumX = array_sum($x);
            $sumY = array_sum($y);
            $sumXX = 0;
            $sumXY = 0;
            $sumYY = 0;

            for ($i = 0; $i < $n; $i++) {
              $sumXX += $x[$i] * $x[$i];
              $sumXY += $x[$i] * $y[$i];
              $sumYY += $y[$i] * $y[$i];
            }

            $m = ($n * $sumXY - $sumX * $sumY) / ($n * $sumXX - $sumX * $sumX);
            $a = ($sumY - $m * $sumX) / $n;
            $corr = ($n * $sumXY - $sumX * $sumY) / (sqrt(($n * $sumXX - pow($sumX, 2)) * ($n * $sumYY - pow($sumY, 2))));
            $r2 = pow($corr, 2);
            return [$m, $a, $r2];
          }

          // Calcula los coeficientes de la regresión lineal
          $coeficientes = regresionLineal($valores_X, $valores_Y);

          // Imprime los coeficientes
          echo "Pendiente (m): " . $coeficientes[0] . "<br>";
          echo "Intersección con el eje y (a): " . $coeficientes[1] . "<br>";
          echo "El coeficiente de correlación r2 es: " . $coeficientes[2] . "<br>";

          if (isset($_GET['valX'])) {

            $valorX = $_GET['valX'];
            $valorY = $coeficientes[0] * $valorX + $coeficientes[1];

            $puntosRegr = array();
            $puntosRegr[0][0] = 0;
            $puntosRegr[0][1] = $coeficientes[1];
            $puntosRegr[1][0] = $valorX;
            $puntosRegr[1][1] = $valorY;

            $valoresXY['cols'] = array(
              array('label' => 'Mes', 'type' => 'number'), //para especificar que es un numero
              array('label' => 'Monto Total', 'type' => 'number'), //para especificar que es un numero
            );

            // SE CREA OTRO ARRAY CON LOS Id_Mes para la regresion lineal
            // $datosX = [1, 2, 3];
            // $datosY = [65458425, 96875458, 87541256];
            $xy_temp = array();

            //$pastel_temp[] = array('v' => (string) $p['idTiend']);
            $xy_temp[] = array('v' => (float) $puntosRegr[0][0]);
            $xy_temp[] = array('v' => (float) $puntosRegr[0][1]);
            $valoresXY_rows[] = array('c' => $xy_temp);

            $xy_temp = array();

            $xy_temp[] = array('v' => (float) $puntosRegr[1][0]);
            $xy_temp[] = array('v' => (float) $puntosRegr[1][1]);
            $valoresXY_rows[] = array('c' => $xy_temp);

            //codificar a json
            $valoresXY['rows'] = $valoresXY_rows;
            $valoresRegr_jsonTable = json_encode($valoresXY);
            // $puntosRegr[1][0] = $valorX;
            // $puntosRegr[1][1] = $valorY;
            $_COOKIE['valX'] = $puntosRegr[1][0];
            $_COOKIE['valY'] = $puntosRegr[1][1];

            echo '<script type="text/javascript">alert("El valor estimado de ventas\n para mes ' . $valorX . ' es : ' . $valorY . ' Bs.");              
        </script>';
            // el valor calculado
            echo 'El valor estimado de ventas para mes ' . $valorX . ' es : ' . $valorY . ' Bs.';
            // echo '<br>';
            // echo $_COOKIE['valX'];
            // echo '<br>';
            // echo $_COOKIE['valY'];
          }

          ?>
        </div>
        <br>
        <table class="tablaMarcas table table-bordered">
          <thead class="thead thead-dark">
            <tr>
              <th class="td1">Nro</th>
              <th class="td2">Mes</th>
              <th class="td3">Monto total de ventas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('../conexionOlap.php');
            if (!$conexionolap) {
              echo "Error en la conexion";
            } else {
              //session_start();
              $ejecutarConsulta3 = mysqli_query(
                $conexionolap,
                "SELECT `dbo.calendario`.nombre_mes as Mes, `dbo.calendario`.id_mes as IdMes,
              sum(`dbo.ventas`.monto_total) as Monto_total FROM `dbo.ventas`
              inner join `dbo.calendario` on `dbo.calendario`.id_olap =`dbo.ventas`.Calendario_id_olap   
              group by `dbo.calendario`.id_mes
              order by `dbo.calendario`.id_mes asc;"
              )
                or die("Problemas en la inserción" . mysqli_error($conexion));
              //echo $_SESSION['IdRegistro'];
              // mysqli_close($conexion);
              $verFilas3 = mysqli_num_rows($ejecutarConsulta3);
              $fila3 = mysqli_fetch_array($ejecutarConsulta3);
              if (!$ejecutarConsulta3) {
                echo "Error en la consulta";
              } else {
                if ($verFilas3 < 1) {
                  echo "<tr><td colspan='6'>SIN REGISTROS</td></tr>";
                } else {
                  for ($i = 0; $i < $verFilas3; $i++) {
                    echo '
                                <tr>
                                    <td>' . ($i + 1) . '</td>
                                    <td>' . $fila3[0] . '</td>
                                    <td>' . $fila3[2] . '</td></tr>                                     
                            ';
                    $fila3 = mysqli_fetch_array($ejecutarConsulta3);
                  }
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="container">
        <h2>Gráfica de tendencia</h2>

        <div id="graficoMontos" style="width:1200px;height:800px;"></div>
        <!-- <button onClick="mostrarMontos1()">Mostrar segundo grafico</button> -->
      </div>
    </div>

  </div>

  <script>
    //google.charts.load('current', {'packages':['bar']});
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart22);
    //google.charts.setOnLoadCallback(drawChartPastel);

    valX = 0;
    valY = 0;

    function drawChart22() {
      var data3 = new google.visualization.DataTable(<?= $pastel_jsonTable ?>);

      function getCookie(c_name) {
        if (document.cookie.length > 0) {
          c_start = document.cookie.indexOf(c_name + "=");
          if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
              c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
          }
        }
        return "";
      }
      // var valX = getCookie("valX")
      // var valY = getCookie("valY")
      valX = <?= json_encode($valorX); ?>;
      valY = <?= json_encode($valorY); ?>;
      console.log(valX)
      console.log(valY)
      console.log(<?= $pastel_jsonTable ?>);



      // var puntosRecta = new google.visualization.DataTable(<?= $valoresRegr_jsonTable ?>);
      // //data3.addRow([valX, valY, 'point {size: 8; shape-type: circle; fill-color: red;}']);
      // // data3.addRows(puntosRecta);
      // var tablaUnida = new google.visualization.data.join(data3, puntosRecta)

      console.log(<?= $pastel_jsonTable ?>);
      console.log(<?= $valoresRegr_jsonTable ?>);

      var options3 = {
        title: 'Mes vs. Monto total',
        hAxis: {
          title: 'Mes',
          minValue: 0,
          maxValue: 5,
          step: 1
        },
        vAxis: {
          title: 'Monto en Bs.',
          minValue: 64000000,
          maxValue: 150000000
        },
        legend: 'none',
        trendlines: {
          0: {
            color: 'green',
            showR2: true,
            visibleInLegend: true
          }
        }
      };

      if (valX > 5) {
        options3['hAxis']['maxValue'] = valX;
        options3['vAxis']['maxValue'] = valY;
      }

      // chart.draw(data, options);

      var chart3 = new google.visualization.ScatterChart(document.getElementById('graficoMontos'));
      //var chart4 = new google.visualization.LineChart(document.getElementById('graficoMontos'));


      chart3.draw(data3, options3);
      //chart4.draw(puntosRecta, options3);
    }
  </script>
</body>

</html>