<!doctype html>
<?php

session_start();
if (isset($_SESSION['usu'])) {
  if ($_SESSION['usu']['tipo'] != "Coordinador") {
    if ($_SESSION['usu']['tipo'] == "Administrador") {
      header('Location:../Administrador/');
    } else if ($_SESSION['usu']['tipo'] == "Docente") {
      header('Location:../Docente/');
    }
  }
} else {
  header('Location:../../');
}

$docente = $_SESSION['usu']['nombre'];
$tipo = $_SESSION['usu']['tipo'];
?>

<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_ES.UTF-8');
$fecha = date("d-m-Y");
?>
<?php

$coevaluacion = $_GET['texto'];
$carrera = $_GET['texto1'];
$id =  $_GET['id'];


if ($coevaluacion === "GESTIÓN DE LOS COORDINADORES/DOCENTES") {

  function ConsultarProducto1($id, $coevaluacion, $carrera)
  {
    $conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
    $sentencia = "
      SELECT 
          cg.*,
          c1.*
      FROM 
          coevaluacion_general AS cg
      LEFT JOIN coevaluacion1 AS c1 ON cg.id = c1.id_coevaluacion_general
      WHERE 
          cg.id = '" . $id . "' AND cg.carrera ='" . $carrera . "' AND cg.coevaluacion = '" . $coevaluacion . "'";

    $resultado = $conexion->query($sentencia) or die("error al consultar reporte" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();
    $newDate = date("d/m/Y", strtotime($fila['fecha']));
    return [

      $fila['tipo'],
      $fila['fecha'],
      $fila['docente'],
      $fila['coevaluacion'],
      $fila['carrera'],
      $fila['result1'],
      $fila['resultado_final'],
      $fila['fortalezas'],
      $fila['debilidades'],
      $fila['compromiso'],
      $fila['a1'],
      $fila['a2'],
      $fila['a3'],
      $fila['a4'],
      $fila['a5'],
      $fila['a6'],
      $fila['a7'],
      $fila['a8'],
      $fila['a9'],
      $fila['id_coevaluacion_general']

    ];
  }

  $consulta = ConsultarProducto1($_GET['id'], $_GET['texto'], $_GET['texto1']);
} else if ($coevaluacion === "GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS") {

  function ConsultarProducto2($id, $coevaluacion, $carrera)
  {
    $conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
    $sentencia = "
      SELECT 
          cg.*,
          c2.*
      FROM 
          coevaluacion_general AS cg
      LEFT JOIN coevaluacion2 AS c2 ON cg.id = c2.id_coevaluacion_general
      WHERE 
          cg.id = '" . $id . "' AND cg.carrera ='" . $carrera . "' AND cg.coevaluacion = '" . $coevaluacion . "'";

    $resultado = $conexion->query($sentencia) or die("error al consultar reporte" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();
    $newDate = date("d/m/Y", strtotime($fila['fecha']));
    return [

      $fila['tipo'],
      $fila['fecha'],
      $fila['docente'],
      $fila['coevaluacion'],
      $fila['aula'],
      $fila['carrera'],
      $fila['result2'],
      $fila['resultado_final'],
      $fila['fortalezas'],
      $fila['debilidades'],
      $fila['compromiso'],
      $fila['d1'],
      $fila['d2'],
      $fila['d3'],
      $fila['d4'],
      $fila['d5'],
      $fila['d6'],
      $fila['d7'],
      $fila['d8'],
      $fila['id_coevaluacion_general']

    ];
  }

  $consulta = ConsultarProducto2($_GET['id'], $_GET['texto'], $_GET['texto1']);
} else if ($coevaluacion === "RESPONSABLES DE PRÁCTICAS LABORALES") {
  function ConsultarProducto3($id, $coevaluacion, $carrera)
  {
    $conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
    $sentencia = "
      SELECT 
          cg.*,
          c3.*
      FROM 
          coevaluacion_general AS cg
      LEFT JOIN coevaluacion3 AS c3 ON cg.id = c3.id_coevaluacion_general
      WHERE 
          cg.id = '" . $id . "' AND cg.carrera ='" . $carrera . "' AND cg.coevaluacion = '" . $coevaluacion . "'";

    $resultado = $conexion->query($sentencia) or die("error al consultar reporte" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();
    $newDate = date("d/m/Y", strtotime($fila['fecha']));
    return [

      $fila['tipo'],
      $fila['fecha'],
      $fila['docente'],
      $fila['coevaluacion'],
      $fila['result3'],
      $fila['resultado_final'],
      $fila['fortalezas'],
      $fila['debilidades'],
      $fila['compromiso'],
      $fila['f1'],
      $fila['f2'],
      $fila['f3'],
      $fila['f4'],
      $fila['id_coevaluacion_general'],
      $fila['carrera']

    ];
  }

  $consulta = ConsultarProducto3($_GET['id'], $_GET['texto'], $_GET['texto1']);
} else if ($coevaluacion === "GESTION DE SOMOS TUVN EN LOS DOCENTES") {
  function ConsultarProducto4($id, $coevaluacion, $carrera)
  {
    $conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
    $sentencia = "
      SELECT 
          cg.*,
          c4.*
      FROM 
          coevaluacion_general AS cg
      LEFT JOIN coevaluacion4 AS c4 ON cg.id = c4.id_coevaluacion_general
      WHERE 
          cg.id = '" . $id . "' AND cg.carrera ='" . $carrera . "' AND cg.coevaluacion = '" . $coevaluacion . "'";

    $resultado = $conexion->query($sentencia) or die("error al consultar reporte" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();
    $newDate = date("d/m/Y", strtotime($fila['fecha']));
    return [

      $fila['tipo'],
      $fila['fecha'],
      $fila['docente'],
      $fila['coevaluacion'],
      $fila['result4'],
      $fila['result5'],
      $fila['resultado_final'],
      $fila['fortalezas'],
      $fila['debilidades'],
      $fila['compromiso'],
      $fila['h1'],
      $fila['i1'],
      $fila['i2'],
      $fila['i3'],
      $fila['i4'],
      $fila['id_coevaluacion_general'],
      $fila['carrera']

    ];
  }

  $consulta = ConsultarProducto4($_GET['id'], $_GET['texto'], $_GET['texto1']);
}
?>

<html lang="es">

<head>
  <title>Evaluacion de Responsabilidades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
  <link rel="stylesheet" href="../css3/iconos.css">
  <link rel="stylesheet" href="../../css/tabla.css">
  <link rel="stylesheet" href="../../css/form.css">
  <link rel="stylesheet" href="cssTable/estilo.css">
  <link rel="stylesheet" href="../assets/css/styles.css?v=1">
  <link rel="stylesheet" href="../bod.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>
  <header class="header">
    <nav class="nav container">
      <div class="nav__actions" style="margin-left: 2em;">
        <!-- Dropdown -->
        <div class="dropdown" id="dropdown">
          <div class="dropdown__profile">
            <div class="dropdown__names">
              <h3><?php echo htmlspecialchars($docente); ?></h3>
              <span><?php echo htmlspecialchars($tipo); ?></span>
            </div>

            <div class="dropdown__image">
              <img src="../../image/logo_inicio.ico" alt="" />
            </div>
          </div>

          <div class="dropdown__list">
            <a href="../usuarios/cambiarclave.php" class="dropdown__link">
              <i class="ph ph-user-circle"></i>
              <span>Perfil de Usuario</span>
            </a>

            <a href="../cerrar.php" class="dropdown__link">
              <i class="ph ph-sign-out"></i>
              <span>Cerrar Sesion</span>
            </a>
          </div>
        </div>
      </div>

      <div class="nav__menu" id="nav-menu" style="position: absolute; margin-left: 23em;">
        <ul class="nav__list">
          <li>
            <i class="icon ph-bold ph-house-simple"></i>
            <a href="../coordinador.php" class="nav__link">Inicio</a>
          </li>

          <li>
            <div class="dropdown" id="dropdown">
              <div class="dropdown__profile">
                <div class="dropdown__names">
                  <i class="icon ph-bold ph-table"></i>
                  <a class="nav__link">Instrumentos</a>
                </div>
              </div>

              <div class="dropdown__list" style="margin-left: -2em;">
                <a href="../coevaluacion_presencial/index2.php" class="dropdown__link">
                  <i class="ph ph-desktop"></i>
                  <span>Formulario</span>
                </a>
              </div>
            </div>
          </li>

          <?php if ($_SESSION['usu']['nombre'] === "GUAMAN FREIRE MARIO RUBEN") { ?>
            <li>
              <div class="dropdown" id="dropdown">
                <div class="dropdown__profile">
                  <div class="dropdown__names">
                    <i class="ph ph-hard-drives"></i>
                    <a class="nav__link">Almacenamiento</a>
                  </div>
                </div>

                <div class="dropdown__list" style="margin-left: -2em;">
                  <a href="../reporte_presencial/pdfSubida.php" class="dropdown__link">
                    <i class="ph ph-file-pdf"></i>
                    <span>PDFs</span>
                  </a>
                  <a href="../reporte_presencial/pdfSubida1.php" class="dropdown__link">
                    <i class="ph ph-disc"></i>
                    <span>Repositorio</span>
                  </a>
                </div>
              </div>
            </li>
          <?php } ?>

          <?php if ($_SESSION['usu']['nombre'] === "GUAMAN FREIRE MARIO RUBEN") { ?>
            <li>
              <div class="dropdown" id="dropdown">
                <div class="dropdown__profile">
                  <div class="dropdown__names">
                    <i class="icon ph-bold ph-files"></i>
                    <a class="nav__link">Reportes</a>
                  </div>
                </div>

                <div class="dropdown__list" style="margin-left: -2em;">
                  <a href="../reporte_presencial/convertidor.php" class="dropdown__link">
                    <i class="icon ph-bold ph-file"></i>
                    <span>Reporte de Evaluación</span>
                  </a>
                  <a href="../reporte_presencial/somosTuvn1.php" class="dropdown__link">
                    <i class="ph ph-monitor-arrow-up"></i>
                    <span>SOMOS TUV</span>
                  </a>
                </div>
              </div>
            </li>
          <?php } ?>

          <?php if ($_SESSION['usu']['nombre'] != "GUAMAN FREIRE MARIO RUBEN") { ?>
            <li>
              <div class="dropdown" id="dropdown">
                <div class="dropdown__profile">
                  <div class="dropdown__names">
                    <i class="icon ph-bold ph-files"></i>
                    <a class="nav__link">Reportes</a>
                  </div>
                </div>

                <div class="dropdown__list" style="margin-left: -2em;">
                  <a href="../reporte_presencial/convertidor.php" class="dropdown__link">
                    <i class="icon ph-bold ph-file"></i>
                    <span>Reporte de Evaluación</span>
                  </a>
                  <a href="../reporte_presencial/convertidor1.php" class="dropdown__link">
                    <i class="icon ph-bold ph-file"></i>
                    <span>Reporte General</span>
                  </a>
                </div>
              </div>
            </li>
            <li>
              <i class="ph ph-upload"></i>
              <a href="../reporte_presencial/somoTuvn.php" class="nav__link">Somos TUVN</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>

  <?php

  if (($consulta[3] === $coevaluacion) && ($consulta[4] === $carrera)) {
  ?>
    <section class="contenido wrapper">
      <div>
        <div class="welcome">
          <form action="2modif_prod2.php" method="POST">
            <h2>
              <div align="center" class="page-header">
                <br>
                <h2 style=" font-size:26px;"><b>Ficha de Actualización de Datos</b></h2>
              </div>
            </h2><br>

            <!--eee-->
            <table width="200" class="col-md-10 col-md-offset-1" cellpadding="2" cellspacing="0" style="font-family: Arial, sans-serif;
                                                                                                          border: 2px solid #2c4073;
                                                                                                          border-radius: 50%;
                                                                                                          background-color: #f9f9f9; text-align: center">

              <tr style="background: #f2b440;color: white">
                <th height="300" colspan="8">
                  <div id="contenedor">
                    <div style="width: 480px; height: 80px;padding: 20px;">
                      <label for="" id="Label1" style="font-size: 17px; margin-right: 40px; margin-left: -10px">FECHA:</label>
                      <?php
                      $newDate = date("d/m/Y", strtotime($consulta[1]));
                      ?>
                      <input style="width: 250px; height: 30px;" class="texto" type="datatime" readonly="" name="fecha" size="60" placeholder="<?= $fecha ?>" value="<?php echo $newDate ?>" />
                    </div>
                    <input type="hidden" name="tipo" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="AULA">

                    <input type="hidden" name="coordinador" class="contenido-input2" required="" readonly="" style="position: absolute; left: 680px; top: 130px;" value="<?php echo $_SESSION['usu']['id'] ?>">
                    <input type="hidden" id="id_coevaluacion_general" name="id_coevaluacion_general" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[19] ?>">
                    <input type="hidden" id="coeval" name="coeval" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[3] ?>">
                    <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                      <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                        <label for="" id="Label2" style="font-size: 17px; margin-right: 40px; margin-left: -20px">NOMBRE:</label>
                        <input type="" name="docente" class="texto" required="" readonly="" style="width: 250px; height: 30px;" value="<?php echo $consulta[2] ?>">
                      </div>

                      <div style="width: 480px; height: 80px; margin-top: -15em; padding: 20px; margin-left: -20px;">
                        <label for="Label" id="Label5" style="font-size: 17px; margin-right: 50px; margin-left: -25px;"> CARRERA:</label>
                        <input name="carrera" class="texto" required="" value="<?php echo $consulta[4] ?>" style="width: 310px; height: 30px;">
                      </div>
                    </div>
                </th>
              </tr>
            </table>

            <table width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; margin-top:-20px">
              <tr>
                <thead>

                  <th colspan="2" scope="col" style="background: #914a31;color: white;">Consideraciones</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Bueno
        </div>
        </th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">Regular</th>
        </thead>
        <thead>
          <th colspan="2" scope="col" style="background: #914a31;color: white;"></th>
          <th width="9%" scope="col" style="background: #914a31;color: white;">1</th>
          <th width="9%" scope="col" style="background: #914a31;color: white;">0.5
      </div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">0</th>
      </thead>
      </tr>

      <tr>

        <!-- titulo vetrical de la tabla  -->
        <!-- primera pregunta  -->
        <td width="2%" rowspan="9" style="background: #f2b440 ;color: white;">
          <p class="verticalText" style="margin-left:15px;"><b>GESTIÓN DE LOS COORDINADORES / DOCENTES</b></p>
        </td>
        <td width="25%">
          <p align="justify" style="padding:10px">Convocatoria</p>
        </td>
        <td width="5%" style="padding:10px">
          <p><br>CONVOCATORIA DETALLADA Y ENVIADA PUNTUALMENTE</br>
            <input type="radio" id="p1" name="a1" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                    if ($consulta[10] === "1") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                    ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CONVOCATORIA DETALLADA Y ENVIADA A DESTIEMPO<br>
            <input type="radio" id="p2" name="a1" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[10] === "0.5") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <br>

        </p>
        </div>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CONVOCATORIA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO<br>
            <input type="radio" id="p3" name="a1" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                    if ($consulta[10] === "0") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                    ?> required>
            </span>
          </p>
        </td>
      </tr>

      <!-- segunda  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Acta</p>
        </td>
        <td style="padding:10px">
          <p>ACTA DETALLADA Y ENVIADA PUNTUALMENTE</br>
            <input type="radio" id="p4" name="a2" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                    if ($consulta[11] === "1") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                    ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">ACTA DETALLADA Y ENVIADA A DESTIEMPO<br>
            <input type="radio" id="p5" name="a2" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "0.5") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <br>
        </p>
        </td>
        <td>
          <p align="center">ACTA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO<br>
            <input type="radio" id="p6" name="a2" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                    if ($consulta[11] === "0") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                    ?> required>
          </p>
        </td>
      </tr>
      <!-- tercera  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Eventos institucionales</p>
        </td>
        <td style="padding:10px">
          <p>EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA Y EL CONTROL DEL GRUPO DE DOCENTES<br>

            <input type="radio" id="p7" name="a3" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                    if ($consulta[12] === "1") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                    ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA, PERO NO EL CONTROL DEL GRUPO DE DOCENTES<br>
            <input type="radio" id="p8" name="a3" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "0.5") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">LA CARRERA NO PARTICIPA EN TODOS LOS EVENTOS INSTITUCIONALES NI TAMPOCO SE EVIDENCIA EL CONTROL DEL GRUPO DE DOCENTES<br>
            <input type="radio" id="p9" name="a3" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                    if ($consulta[12] === "0") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                    ?>required>
          </p>
        </td>
      </tr>
      <!-- cuarta pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Informes de eventos institucionales</p>
        </td>
        <td style="padding:10px">
          <p>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS<br>

            <input type="radio" id="p10" name="a4" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[13] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
            <input type="radio" id="p11" name="a4" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                        if ($consulta[13] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
            <input type="radio" id="p12" name="a4" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"
              <?php
              if ($consulta[13] === "0") {
                echo "checked";
              }
              ?> required>
          </p>
        </td>
      </tr>
      <!-- Quinta pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Planificación de coevaluaciones</p>
        </td>
        <td style="padding:10px">
          <p>PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES<br>

            <input type="radio" id="p13" name="a5" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[14] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL NO SE EVALÚA A TODOS LOS DOCENTES<br>
            <input type="radio" id="p14" name="a5" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                        if ($consulta[14] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">PLANIFICACIÓN ENTREGADA A DESTIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES<br>
            <input type="radio" id="p15" name="a5" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[14] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>

      <!-- Sexta pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Ejecución de coevaluaciones</p>
        </td>
        <td style="padding:10px">
          <p>SE EVALÚA A TODOS LOS DOCENTES SEGÚN LA PLANIFICACIÓN<br>

            <input type="radio" id="p16" name="a6" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[15] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">SE EVALÚA A TODOS LOS DOCENTES SIN CUMPLIR TOTALMENTE LA PLANIFICACIÓN<br>
            <input type="radio" id="p17" name="a6" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                        if ($consulta[15] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">NO SE EVALÚA A TODOS LOS DOCENTES NI TAMPOCO SE CUMPLE LA PLANIFICACIÓN<br>
            <input type="radio" id="p18" name="a6" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[15] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>

      <!-- Septima pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Informe de la evaluación de las actividades de docencia</p>
        </td>
        <td style="padding:10px">
          <p>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS<br>

            <input type="radio" id="p19" name="a7" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[16] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
            <input type="radio" id="p20" name="a7" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                        if ($consulta[16] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
            <input type="radio" id="p21" name="a7" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[16] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>

      <!-- Octava pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Aprobación de evaluaciones y portafolios</p>
        </td>
        <td style="padding:10px">
          <p>TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE Y APROBADOS A TIEMPO<br>

            <input type="radio" id="p22" name="a8" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[17] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE PERO NO APROBADOS A TIEMPO<br>
            <input type="radio" id="p23" name="a8" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                        if ($consulta[17] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">VARIAS EVALUACIONES Y PORTAFOLIOS NO SON REVISADOS MINUCIOSAMENTE NI APROBADOS A TIEMPO<br>
            <input type="radio" id="p24" name="a8" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[17] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>

      <!-- Novena pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Acompañamiento a los docentes de la carrera</p>
        </td>
        <td style="padding:10px">
          <p>SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, DETALLADO Y EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA<br>

            <input type="radio" id="p25" name="a9" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[18] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, PERO NO DETALLADO NI EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA<br>
            <input type="radio" id="p26" name="a9" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                        if ($consulta[18] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">NO SE REALIZA UN ACOMPAÑAMIENTO CONTINUO A TODOS LOS DOCENTES DE LA CARRERA<br>
            <input type="radio" id="p26" name="a9" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" <?php
                                                                                                                                      if ($consulta[18] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>


      <!-- ///////////// <input type = "hidden" name = "a6">  -->


      <tr>
        <td style="background: #914a31;color: white;">&nbsp;</td>
        <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
        <td style="background: #914a31;color: white;">
          <div align="center">
            <h4>
              <textarea style="text-align:center;color: black; border-radius: 5px;" value="<?php echo $consulta[5] ?>" name="result1" id="resultadox" readonly required><?php echo $consulta[5] ?></textarea>
            </h4>
          </div>
        </td>
        </h4>
        </div>
        </td>
      </tr>
      </table>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>



      <table id="Table8" style="border: #270D07 3px solid; margin-top: -40px; width: 30px; height: 50px;">

        <tr>
          <!--<td>&nbsp;</td>-->
          <td colspan="2" style="background: #914a31;color: white; padding-left:70px; padding-right:70px;"><b>% FINAL</b></td>
          <td style="background: #914a31;color: white; padding-left:70px; padding-right:70px;">
            <div align="center">
              <h4>
                <textarea style="text-align:center;color: black;border-radius: 5px; " value="<?php echo $consulta[6] ?>" name="resultado_final" id="el_resultadofinal" readonly required><?php echo $consulta[6] ?></textarea>
              </h4>
            </div>
          </td>
        </tr>
      </table>
      </p>

      <p>
        <label class="col-md-7" style="position: relative; left: 30px; margin-bottom: 20px; font-size: 15px" for="textarea"><b>OBSERVACIONES:</b></label>
        <!--<textarea class="col-md-7 col-md-offset-3" name="observaciones" id="observaciones" required style="margin-bottom: 15px; height: 45px; width: 515px"></textarea>-->
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px; ">FORTALEZAS:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[7] ?>" name="fortalezas" id="fortalezas" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[7] ?></textarea>
      </p>
      <p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px;">DEBILIDADES:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[8] ?>" name="debilidades" id="debilidades" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[8] ?></textarea>
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="position: relative; margin-bottom: 8px;">COMPROMISO DE MEJORA:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[9] ?>" name="compromiso" id="compromiso" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[9] ?></textarea>
      </p>
      <tr>
        <table></table>
      </tr>

      <!-- BOTON DE ENVIO DE FORMULARIO  A BASE DE DATOS -->

      <td>&nbsp;</td>
      <td>
        <style type="text/css">
          .button {
            width: 100px;
            height: 35px;
            color: white;
            background: #914a31;
            /* Color de guardar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          .button:hover {
            background-color: #a55b44;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }

          #cancelar {
            width: 100px;
            height: 35px;
            color: white;
            background: #f2b440;
            /* Color de cancelar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          #cancelar:hover {
            background-color: #f5c062;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }
        </style>
        <div style="margin-left: -20em;"><button type="submit" id="enviar" class="button" value="Registrar"><i class="icon3 fa fa-save"></i> Guardar</button></div>
        <div style="margin-top: -5em; margin-left: 15em;"><a href="convertidor.php" id="cancelar" style="font-size: 14px;text-decoration: none;"><i class="fa fa-close"></i> Cancelar</a></div>


        </form>
        </div>
        </div>
    </section>

  <?php } else if (($consulta[3] === $coevaluacion) && ($consulta[5] === $carrera)) { ?>

    <section class="contenido wrapper">
      <div>
        <div class="welcome">
          <form action="2modif_prod2.php" method="POST">
            <h2>
              <div align="center" class="page-header">
                <br>
                <h2 style=" font-size:26px;"><b>Ficha de Actualización de Datos</b></h2>
              </div>
            </h2><br>

            <table width="200" class="col-md-10 col-md-offset-1" cellpadding="2" cellspacing="0" style="font-family: Arial, sans-serif;
                                                                                                          border: 2px solid #2c4073;
                                                                                                          border-radius: 50%;
                                                                                                          background-color: #f9f9f9; text-align: center">

              <tr style="background: #f2b440;color: white">
                <th height="300" colspan="8">
                  <div id="contenedor">
                    <div style="width: 480px; height: 80px;padding: 20px;">
                      <label for="" id="Label1" style="font-size: 17px; margin-right: 40px; margin-left: -10px">FECHA:</label>
                      <?php
                      $newDate = date("d/m/Y", strtotime($consulta[1]));
                      ?>
                      <input style="width: 250px; height: 30px;" class="texto" type="datatime" readonly="" name="fecha" size="60" placeholder="<?= $fecha ?>" value="<?php echo $newDate ?>" />
                    </div>
                    <input type="hidden" name="tipo" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="AULA">

                    <input type="hidden" name="coordinador" class="contenido-input2" required="" readonly="" style="position: absolute; left: 680px; top: 130px;" value="<?php echo $_SESSION['usu']['id'] ?>">
                    <input type="hidden" id="id_coevaluacion_general" name="id_coevaluacion_general" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[19] ?>">
                    <input type="hidden" id="coeval" name="coeval" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[3] ?>">
                    <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                      <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                        <label for="" id="Label2" style="font-size: 17px; margin-right: 40px; margin-left: -20px">NOMBRE:</label>
                        <input type="" name="docente" class="texto" required="" readonly="" style="width: 250px; height: 30px;" value="<?php echo $consulta[2] ?>">
                      </div>

                      <div style="width: 480px; height: 80px; margin-top: -15em; padding: 20px; margin-left: -20px;">
                        <label for="Label" id="Label5" style="font-size: 17px; margin-right: 50px; margin-left: -25px;"> CARRERA:</label>
                        <input name="carrera" class="texto" required="" value="<?php echo $consulta[5] ?>" style="width: 310px; height: 30px;">
                      </div>
                    </div>
                </th>
              </tr>
            </table>

            <table width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid;">
              <tr>
                <thead>

                  <th colspan="2" scope="col" style="background: #914a31;color: white;">Consideraciones</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Bueno
        </div>
        </th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">Regular</th>
        </thead>
        <thead>
          <th colspan="2" scope="col" style="background: #914a31;color: white;"></th>
          <th width="9%" scope="col" style="background: #914a31;color: white;">1</th>
          <th width="9%" scope="col" style="background: #914a31;color: white;">0.5
      </div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">0</th>
      </thead>
      </tr>

      <tr>

        <!-- titulo vetrical de la tabla  -->
        <!-- primera pregunta  -->
        <td width="2%" rowspan="8" style="background: #f2b440;color: white;">
          <p class="verticalText" style="margin-left:15px;"><b>GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS</b></p>
        </td>
        <td width="25%">
          <p align="justify" style="padding:10px">Cumplimiento del plan de mantenimiento </p>
        </td>
        <td width="5%" style="padding:10px">
          <p><br>PLAN DE MANTENIMIENTO EJECUTADO TOTALMENTE HASTA LA FECHA</br>
            <input type="radio" id="q1" name="d1" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">PLAN DE MANTENIMIENTO EJECUTADO PARCIALMENTE HASTA LA FECHA<br>
            <input type="radio" id="q2" name="d1" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[11] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <br>

        </p>
        </div>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">PLAN DE MANTENIMIENTO NO EJECUTADO<br>
            <input type="radio" id="q3" name="d1" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
            </span>
          </p>
        </td>
      </tr>

      <!-- segunda  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Orden</p>
        </td>
        <td style="padding:10px">
          <p>ESPACIOS, MÁQUINAS Y HERRAMIENTAS TOTALMENTE EN ORDEN</br>
            <input type="radio" id="q4" name="d2" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">-------<br>
            <br>
          </p>
        </td>
        <td>
          <p align="center">ESPACIOS, MÁQUINAS Y HERRAMIENTAS EN DESORDEN<br>
            <input type="radio" id="q6" name="d2" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?>required>
          </p>
        </td>
      </tr>
      <!-- tercera  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Limpieza</p>
        </td>
        <td style="padding:10px">
          <p>ESPACIOS, MÁQUINAS Y HERRAMIENTAS LIMPIAS<br>

            <input type="radio" id="q7" name="d3" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                      if ($consulta[13] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">-------<br>
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">ESPACIOS, MÁQUINAS Y HERRAMIENTAS SUCIAS<br>
            <input type="radio" id="q9" name="d3" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                      if ($consulta[13] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>
      <!-- cuarta pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Funcionamiento Óptimo de Equipos y Máquinas</p>
        </td>
        <td style="padding:10px">
          <p>TODOS LOS EQUIPOS Y MÁQUINAS OPERAN DE MANERA ÓPTIMA, CON MÍNIMA INCIDENCIA DE FALLOS<br>

            <input type="radio" id="q10" name="d4" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[14] === "1") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">VARIOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA<br>
            <input type="radio" id="q11" name="d4" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                          if ($consulta[14] === "0.5") {
                                                                                                                                            echo "checked";
                                                                                                                                          }
                                                                                                                                          ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">TODOS LOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA<br>
            <input type="radio" id="q12" name="d4" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[14] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>
      <!-- Quinta pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Gestión de recursos para mantenimiento</p>
        </td>
        <td style="padding:10px">
          <p>RECURSOS GESTIONADOS A TIEMPO PARA CADA TAREA DE MANTENIMIENTO<br>

            <input type="radio" id="q13" name="d5" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[15] === "1") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">RECURSOS GESTIONADOS A DESTIEMPO PARA CADA TAREA DE MANTENIMIENTO<br>
            <input type="radio" id="q14" name="d5" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                          if ($consulta[15] === "0.5") {
                                                                                                                                            echo "checked";
                                                                                                                                          }
                                                                                                                                          ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">RECURSOS GESTIONADOS A DESTIEMPO Y DE MANERA INADECUADA<br>
            <input type="radio" id="q15" name="d5" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[15] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>

      <!-- Sexta pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Fichas de Equipos y Máquinas</p>
        </td>
        <td style="padding:10px">
          <p>TODAS LAS FICHAS ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA<br>

            <input type="radio" id="q16" name="d6" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[16] === "1") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">VARIAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA<br>
            <input type="radio" id="q17" name="d6" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                          if ($consulta[16] === "0.5") {
                                                                                                                                            echo "checked";
                                                                                                                                          }
                                                                                                                                          ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">TODAS LAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA<br>
            <input type="radio" id="q18" name="d6" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[16] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>

      <!-- Septima pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Bitácoras</p>
        </td>
        <td style="padding:10px">
          <p>BITÁCORAS ACTUALIZADAS CON REGISTROS E INFORMACIÓN COMPLETA<br>

            <input type="radio" id="q19" name="d7" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[17] === "1") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">BITÁCORAS ACTUALIZADAS (SIN) REGISTROS E INFORMACIÓN COMPLETA<br>
            <input type="radio" id="q20" name="d7" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                          if ($consulta[17] === "0.5") {
                                                                                                                                            echo "checked";
                                                                                                                                          }
                                                                                                                                          ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">BITÁCORAS DESACTUALIZADAS<br>
            <input type="radio" id="q21" name="d7" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[17] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>

      <!-- Octava pregunta  -->
      <tr>
        <td>
          <p align="justify" style="padding:10px">Informe</p>
        </td>
        <td style="padding:10px">
          <p>EL DOCUMENTO ES PRESENTADO EL DÍA SOLICITADO<br>

            <input type="radio" id="q22" name="d8" value="1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[18] === "1") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">-------<br>
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">EL DOCUMENTO (NO) ES PRESENTADO EL DÍA SOLICITADO<br>
            <input type="radio" id="q24" name="d8" value="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" <?php
                                                                                                                                        if ($consulta[18] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>


      <!-- ///////////// <input type = "hidden" name = "a6">  -->


      <tr>
        <td style="background: #914a31;color: white;">&nbsp;</td>
        <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
        <td style="background: #914a31;color: white;">
          <div align="center">
            <h4>
              <textarea style="text-align:center;color: black; border-radius: 5px;" value="<?php echo $consulta[6] ?>" name="result2" id="resultadox4" readonly required><?php echo $consulta[6] ?></textarea>
            </h4>
          </div>
        </td>
      </tr>
      </table>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>



      <table id="Table8" style="border: #270D07 3px solid; margin-top: -40px; width: 30px; height: 50px;">

        <tr>
          <!--<td>&nbsp;</td>-->
          <td colspan="2" style="background: #914a31;color: white;"><b>% FINAL</b></td>
          <td style="background: #914a31;color: white; padding-left:70px; padding-right:70px;">
            <div align="center">
              <h4>
                <textarea style="text-align:center;color: black;border-radius: 5px; " value="<?php echo $consulta[7] ?>" name="resultado_final" id="el_resultadofinal" readonly required><?php echo $consulta[7] ?></textarea>
              </h4>
            </div>
          </td>
        </tr>
      </table>
      </p>

      <p>
        <label class="col-md-7" style="position: relative; left: 30px; margin-bottom: 20px; font-size: 15px" for="textarea"><b>OBSERVACIONES:</b></label>
        <!--<textarea class="col-md-7 col-md-offset-3" name="observaciones" id="observaciones" required style="margin-bottom: 15px; height: 45px; width: 515px"></textarea>-->
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px; ">FORTALEZAS:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[8] ?>" name="fortalezas" id="fortalezas" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[8] ?></textarea>
      </p>
      <p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px;">DEBILIDADES:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[9] ?>" name="debilidades" id="debilidades" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[9] ?></textarea>
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="position: relative; margin-bottom: 8px;">COMPROMISO DE MEJORA:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[10] ?>" name="compromiso" id="compromiso" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[10] ?></textarea>
      </p>
      <!-- <p>
  <label class="col-md-8"for="textarea" style=" position: relative; left: 38px;margin-bottom: 8px;">RECOMENDACIÓN PARA EL EVALUADOR:</label>
  <textarea class="col-md-7 col-md-offset-3" class="form-control"  name="recomendacion" id="recomendacion"  required style="height: 45px; width: 515px"></textarea>
  
</p>-->
      <tr>
        <table></table>
      </tr>

      <!-- BOTON DE ENVIO DE FORMULARIO  A BASE DE DATOS -->

      <td>&nbsp;</td>
      <td>
        <style type="text/css">
          .button {
            width: 100px;
            height: 35px;
            color: white;
            background: #914a31;
            /* Color de guardar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          .button:hover {
            background-color: #a55b44;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }

          #cancelar {
            width: 100px;
            height: 35px;
            color: white;
            background: #f2b440;
            /* Color de cancelar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          #cancelar:hover {
            background-color: #f5c062;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }
        </style>
        <div style="margin-left: -20em;"><button type="submit" id="enviar" class="button" value="Registrar"><i class="icon3 fa fa-save"></i> Guardar</button></div>
        <div style="margin-top: -5em; margin-left: 15em;"><a href="convertidor.php" id="cancelar" style="font-size: 14px;text-decoration: none;"><i class="fa fa-close"></i> Cancelar</a></div>

        <!-- -->

        </form>
        </div>
        </div>
    </section>
  <?php } else if (($consulta[3] === $coevaluacion) && ($consulta[14] === $carrera)) { ?>

    <section class="contenido wrapper">
      <div>
        <div class="welcome">
          <form action="2modif_prod2.php" method="POST">
            <h2>
              <div align="center" class="page-header" style="margin-bottom: 30px;">
                <div id="logo" style="margin-left: -50rem; width: 65px; height: 65px; padding-top: 30px;">
                  <img src="../image/logo_inicio.ico" style="width: 65px; height: 65px;" />
                </div>
                <h2 style=" font-size:26px; margin-top: -20px;"><b>Ficha de Actualización de Datos</b></h2>
              </div>
            </h2>

            <!--eee-->
            <table width="200" class="col-md-10 col-md-offset-1" cellpadding="2" cellspacing="0" style="font-family: Arial, sans-serif;
                                                                                                          border: 2px solid #2c4073;
                                                                                                          border-radius: 50%;
                                                                                                          background-color: #f9f9f9; text-align: center">

              <tr style="background: #f2b440;color: white">
                <th height="300" colspan="8">
                  <div id="contenedor">
                    <div style="width: 480px; height: 80px;padding: 20px;">
                      <label for="" id="Label1" style="font-size: 17px; margin-right: 40px; margin-left: -10px">FECHA:</label>
                      <?php
                      $newDate = date("d/m/Y", strtotime($consulta[1]));
                      ?>
                      <input style="width: 250px; height: 30px;" class="texto" type="datatime" readonly="" name="fecha" size="60" placeholder="<?= $fecha ?>" value="<?php echo $newDate ?>" />
                    </div>
                    <input type="hidden" name="tipo" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="AULA">

                    <input type="hidden" name="coordinador" class="contenido-input2" required="" readonly="" style="position: absolute; left: 680px; top: 130px;" value="<?php echo $_SESSION['usu']['id'] ?>">
                    <input type="hidden" id="id_coevaluacion_general" name="id_coevaluacion_general" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[13] ?>">
                    <input type="hidden" id="coeval" name="coeval" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[3] ?>">
                    <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                      <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                        <label for="" id="Label2" style="font-size: 17px; margin-right: 40px; margin-left: -20px">NOMBRE:</label>
                        <input type="" name="docente" class="texto" required="" readonly="" style="width: 250px; height: 30px;" value="<?php echo $consulta[2] ?>">
                      </div>

                      <div style="width: 480px; height: 80px; margin-top: -15em; padding: 20px; margin-left: -20px;">
                        <label for="Label" id="Label5" style="font-size: 17px; margin-right: 50px; margin-left: -25px;"> CARRERA:</label>
                        <input name="carrera" class="texto" required="" value="<?php echo $consulta[14] ?>" style="width: 310px; height: 30px;">
                      </div>
                    </div>
                </th>
              </tr>
            </table>

            <table width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid;">
              <tr>
                <thead>

                  <th colspan="2" scope="col" style="background: #914a31;color: white;">Consideraciones</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Bueno
        </div>
        </th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">Regular</th>
        </thead>
        <thead>
          <th colspan="2" scope="col" style="background: #914a31;color: white;"></th>
          <th width="9%" scope="col" style="background: #914a31;color: white;">1</th>
          <th width="9%" scope="col" style="background: #914a31;color: white;">0.5
      </div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">0</th>
      </thead>
      </tr>

      <tr>

        <!-- titulo vetrical de la tabla  -->
        <!-- primera pregunta  -->
        <td width="2%" rowspan="4" style="background: #f2b440;color: white;">
          <p class="verticalText" style="margin-left:15px;"><b>RESPONSABLES DE PRÁCTICAS LABORALES</b></p>
        </td>
        <td width="25%">
          <p align="justify" style="padding:10px">Cronograma</p>
        </td>
        <td width="5%" style="padding:10px">
          <p><br>CRONOGRAMA DE PRÁCTICAS EJECUTADO TOTALMENTE HASTA LA FECHA</br>
            <input type="radio" id="g1" name="f1" value="1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                      if ($consulta[9] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CRONOGRAMA DE PRÁCTICAS EJECUTADO PARCIALMENTE HASTA LA FECHA<br>
            <input type="radio" id="g2" name="f1" value="0.5" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                        if ($consulta[9] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <br>

        </p>
        </div>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO<br>
            <input type="radio" id="g3" name="f1" value="0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                      if ($consulta[9] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
            </span>
          </p>
        </td>
      </tr>

      <!-- segunda  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Base de empresas/instituciones</p>
        </td>
        <td style="padding:10px">
          <p>BASE DE DATOS SE ENCUENTRA ACTUALIZADA CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</br>
            <input type="radio" id="g4" name="f2" value="1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                      if ($consulta[10] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">BASE DE DATOS DESACTUALIZADA, PERO CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES<br>
            <input type="radio" id="g6" name="f2" value="0.5" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                        if ($consulta[10] === "0.5") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>
            <br>
          </p>
        </td>
        <td>
          <p align="center">BASE DE DATOS DESACTUALIZADA Y SIN INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES<br>
            <input type="radio" id="g7" name="f2" value="0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                      if ($consulta[10] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>
      <!-- tercera  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Informe o documentos necesarios</p>
        </td>
        <td style="padding:10px">
          <p>LOS DOCUMENTOS SON PRESENTADOS EL DÍA SOLICITADO<br>

            <input type="radio" id="g8" name="f3" value="1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">-------<br>
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">LOS DOCUMENTOS NO SON PRESENTADOS EL DÍA SOLICITADO<br>
            <input type="radio" id="g9" name="f3" value="0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>
      <!-- cuarta pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Contenido</p>
        </td>
        <td style="padding:10px">
          <p>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO Y EL TRABAJO REALIZADO<br>

            <input type="radio" id="g10" name="f4" value="1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                        if ($consulta[12] === "1") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO, PERO SI CON EL TRABAJO REALIZADO<br>
            <input type="radio" id="g11" name="f4" value="0.5" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                          if ($consulta[12] === "0.5") {
                                                                                                                                            echo "checked";
                                                                                                                                          }
                                                                                                                                          ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO NI CON EL TRABAJO REALIZADO<br>
            <input type="radio" id="g12" name="f4" value="0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" <?php
                                                                                                                                        if ($consulta[12] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>


      <tr>
        <td style="background: #914a31;color: white;">&nbsp;</td>
        <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
        <td style="background: #914a31;color: white;">
          <div align="center">
            <h4>
              <textarea style="text-align:center;color: black; border-radius: 5px;" value="<?php echo $consulta[4] ?>" name="result3" id="resultadox5" readonly required><?php echo $consulta[4] ?></textarea>
            </h4>
          </div>
        </td>
      </tr>
      </table>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>



      <table id="Table8" style="border: #270D07 3px solid; margin-top: -40px; width: 30px; height: 50px;">

        <tr>
          <!--<td>&nbsp;</td>-->
          <td colspan="2" style="background: #914a31;color: white;"><b>% FINAL</b></td>
          <td style="background: #914a31;color: white; padding-left:70px; padding-right:70px;">
            <div align="center">
              <h4>
                <textarea style="text-align:center;color: black;border-radius: 5px; " value="<?php echo $consulta[5] ?>" name="resultado_final" id="el_resultadofinal" readonly required><?php echo $consulta[5] ?></textarea>
              </h4>
            </div>
          </td>
        </tr>
      </table>
      </p>

      <p>
        <label class="col-md-7" style="position: relative; left: 30px; margin-bottom: 20px; font-size: 15px" for="textarea"><b>OBSERVACIONES:</b></label>
        <!--<textarea class="col-md-7 col-md-offset-3" name="observaciones" id="observaciones" required style="margin-bottom: 15px; height: 45px; width: 515px"></textarea>-->
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px; ">FORTALEZAS:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[6] ?>" name="fortalezas" id="fortalezas" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[6] ?></textarea>
      </p>
      <p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px;">DEBILIDADES:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[7] ?>" name="debilidades" id="debilidades" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[7] ?></textarea>
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="position: relative;margin-bottom: 8px;">COMPROMISO DE MEJORA:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[8] ?>" name="compromiso" id="compromiso" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"><?php echo $consulta[8] ?></textarea>
      </p>

      <tr>
        <table></table>
      </tr>

      <!-- BOTON DE ENVIO DE FORMULARIO  A BASE DE DATOS -->

      <td>&nbsp;</td>
      <td>
        <style type="text/css">
          .button {
            width: 100px;
            height: 35px;
            color: white;
            background: #914a31;
            /* Color de guardar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          .button:hover {
            background-color: #a55b44;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }

          #cancelar {
            width: 100px;
            height: 35px;
            color: white;
            background: #f2b440;
            /* Color de cancelar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          #cancelar:hover {
            background-color: #f5c062;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }
        </style>
        <div style="margin-left: -20em;"><button type="submit" id="enviar" class="button" value="Registrar"><i class="icon3 fa fa-save"></i> Guardar</button></div>
        <div style="margin-top: -5em; margin-left: 15em;"><a href="convertidor.php" id="cancelar" style="font-size: 14px;text-decoration: none;"><i class="fa fa-close"></i> Cancelar</a></div>

        <!-- -->

        </form>
        </div>
        </div>
    </section>

  <?php } else if (($consulta[3] === $coevaluacion) && ($consulta[16] === $carrera)) { ?>
    <section class="contenido wrapper">
      <div>
        <div class="welcome">
          <form action="2modif_prod2.php" method="POST">
            <h2>
              <div align="center" class="page-header">
                <br>
                <h2 style=" font-size:26px;"><b>Ficha de Actualización de Datos</b></h2>
              </div>
            </h2><br>

            <table cellpadding="2" cellspacing="0" style="width: 200px; font-family: Arial, sans-serif;border: 2px solid #2c4073; border-radius: 50%; text-align: center">

              <tr style="background: #f2b440;color: white">
                <th height="300" colspan="8">
                  <div id="contenedor">
                    <div style="width: 480px; height: 80px;padding: 20px;">
                      <label for="" id="Label1" style="font-size: 17px; margin-right: 40px; margin-left: -10px">FECHA:</label>
                      <?php
                      $newDate = date("d/m/Y", strtotime($consulta[1]));
                      ?>
                      <input style="width: 250px; height: 30px;" class="texto" type="datatime" readonly="" name="fecha" size="60" placeholder="<?= $fecha ?>" value="<?php echo $newDate ?>" />
                    </div>
                    <input type="hidden" name="tipo" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="AULA">

                    <input type="hidden" name="coordinador" class="contenido-input2" required="" readonly="" style="position: absolute; left: 680px; top: 130px;" value="<?php echo $_SESSION['usu']['id'] ?>">
                    <input type="hidden" id="id_coevaluacion_general" name="id_coevaluacion_general" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[15] ?>">
                    <input type="hidden" id="coeval" name="coeval" class="contenido-input2" required="" readonly="" style="position: absolute; left: 900px; top: 100px;" value="<?php echo $consulta[3] ?>">
                    <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                      <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                        <label for="" id="Label2" style="font-size: 17px; margin-right: 40px; margin-left: -20px">NOMBRE:</label>
                        <input type="" name="docente" class="texto" required="" readonly="" style="width: 250px; height: 30px;" value="<?php echo $consulta[2] ?>">
                      </div>

                      <div style="width: 480px; height: 80px; margin-top: -15em; padding: 20px; margin-left: -20px;">
                        <label for="Label" id="Label5" style="font-size: 17px; margin-right: 50px; margin-left: -25px;"> CARRERA:</label>
                        <input name="carrera" class="texto" required="" value="<?php echo $consulta[16] ?>" style="width: 310px; height: 30px;">
                      </div>
                    </div>
                </th>
              </tr>
            </table>

            <table width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid;">
              <tr>

                <thead>
                  <th colspan="2" scope="col" style="background: #914a31;color: white;">Consideraciones</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Bueno
                  </th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">Regular</th>
                </thead>

                <thead>
                  <th colspan="2" scope="col" style="background: #914a31;color: white;"></th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">8</th>
                  <th width="9%" scope="col" style="background: #914a31;color: white;">4
        </div>
        </th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">0</th>
        </thead>
        </tr>

        <tr>

          <!-- titulo vetrical de la tabla  -->
          <!-- primera pregunta  -->
          <td width="2%" rowspan="1" style="background: #f2b440;color: white;">
            <p class="verticalText" style="margin-left:15px;"><b>NOTA 1</b></p>
          </td>
          <td width="25%">
            <p align="justify" style="padding:10px">Participación</p>
          </td>
          <td width="2%">
            <p align="center" style="padding:10px">PARTICIPA TOTALMENTE EN LA ACTIVIDAD</br>
              <input type="radio" id="t1" name="h1" value="8" onchange="resultadofinali(this.value);" onclick="resultado7(this.value);" <?php
                                                                                                                                        if ($consulta[10] === "8") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
            </p>
          </td>
          <td width="2%">
            <p align="center" style="padding:10px">PARTICIPA PARCIALMENTE EN LA ACTIVIDAD</br>
              <input type="radio" id="t2" name="h1" value="4" onchange="resultadofinali(this.value);" onclick="resultado7(this.value);" <?php
                                                                                                                                        if ($consulta[10] === "4") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
            </p>
          </td>
          <td width="12%">
            <p align="center" style="padding:10px"><br>(NO) PARTICIPA EN LA ACTIVIDAD<br>
              <input type="radio" id="t3" name="h1" value="0" onchange="resultadofinali(this.value);" onclick="resultado7(this.value);" <?php
                                                                                                                                        if ($consulta[10] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
              </span>
            </p>
          </td>
        </tr>

        <!-- ///////////// <input type = "hidden" name = "a6">  -->


        <tr>
          <td style="background: #914a31;color: white;">&nbsp;</td>
          <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
          <td style="background: #914a31;color: white;">
            <div align="center">
              <h4>
                <textarea style="text-align:center;color: black; border-radius: 5px;" value="<?php echo $consulta[4] ?>" name="result4" id="resultadox7" readonly required><?php echo $consulta[4] ?></textarea>
              </h4>
            </div>
          </td>
        </tr>
        </table>


        <!-- ACTIVIDAD INICIAL-->
        <!--BLOQUE 2 -->

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <!--SEGUNDA TABLA-->
        <table id="segundaTabla" width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid;" false>
          <tr>
            <thead>

              <th colspan="5" scope="col" style="background: #f2b440; color: white; text-align: center;">EN EL CASO DE PARTICIPAR</th>

            </thead>
            <thead>

              <th colspan="2" scope="col" style="background: #914a31;color: white;">Consideraciones</th>
              <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno</th>
              <th width="9%" scope="col" style="background: #914a31;color: white;">Bueno
      </div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Regular</th>
      </thead>
      <thead>
        <th colspan="2" scope="col" style="background: #914a31;color: white;"></th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">2</th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">1</div>
        </th>
        <th width="9%" scope="col" style="background: #914a31;color: white;">0</th>
      </thead>
      </tr>

      <tr>

        <!-- titulo vetrical de la tabla  -->
        <!-- primera pregunta  -->
        <td width="2%" rowspan="4" style="background: #f2b440;color: white;">
          <p class="verticalText" style="margin-left:15px;"><b>NOTA 2</b></p>
        </td>
        <td width="25%">
          <p align="justify" style="padding:10px">Cronograma</p>
        </td>
        <td width="5%" style="padding:10px">
          <p><br>CRONOGRAMA EJECUTADO TOTALMENTE HASTA LA FECHA</br>
            <input type="radio" id="v1" name="i1" value="2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "2") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CRONOGRAMA EJECUTADO PARCIALMENTE HASTA LA FECHA<br>
            <input type="radio" id="v2" name="i1" value="1" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <br>

        </p>
        </div>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO<br>
            <input type="radio" id="v3" name="i1" value="0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[11] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
            </span>
          </p>
        </td>
      </tr>

      <!-- segunda  pregunta  -->

      <tr>
        <td>
          <p align="justify" style="padding:10px">Responsabilidad la Ejecución</p>
        </td>
        <td style="padding:10px">
          <p>CUMPLE CON TODAS SUS TAREAS DE MANERA PUNTUAL Y EFICIENTE, SIN NECESIDAD DE SUPERVISION CONSTANTE.</br>
            <input type="radio" id="v4" name="i2" value="2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "2") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td width="12%" style="padding:10px">
          <p align="center">CUMPLE CON LA MAYORIA DE SUS RESPONSABILIDADES, AUNQUE REQUIERE RECORDATORIS OCASIONALES<br>
            <input type="radio" id="v6" name="i2" value="1" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?>>
            <br>
          </p>
        </td>
        <td>
          <p align="center">CUMPLE CON ALGUNAS RESPONSABILIDADES PERO SIEMPRE NECESITA SUPERVISION O RECORDATORIOS<br>
            <input type="radio" id="v7" name="i2" value="0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "0") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> required>
          </p>
        </td>
      </tr>
      <!-- tercera  pregunta  -->

      <tr>

        <td>
          <p align="justify" style="padding:10px">Cumplimiento de Plazos</p>
        </td>
        <td style="padding:10px">
          <p>TODAS LAS ACTIVIDADES ASIGNADAS SE COMPLETAN DENTRO DE LOS PLAZOS ESTABLECIDOS, CON ALTA CALIDAD<br>

            <input type="radio" id="v8" name="i3" value="2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "2") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">LA MAYORIA DE LAS ACTIVIDADES SE COMPLETA A TIEMPO, CON ALGUNOS AJUSTES NECESARIOS<br>
            <input type="radio" id="v9" name="i3" value="1" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                      if ($consulta[12] === "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      }
                                                                                                                                      ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">ALGUNAS ACTIVIDADES SE COMPLETAN FUERA DE PLAZO O CON CALIDAD INSUFICIENTE<br>
            <input type="radio" id="v10" name="i3" value="0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                        if ($consulta[12] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>

      </tr>
      <!-- cuarta pregunta  -->

      <tr>

        <td>
          <p align="justify" style="padding:10px">Producto</p>
        </td>
        <td style="padding:10px">
          <p>EL PRODUCTO TIENE LAS CARACTERISTICAS ESTABLECIDAS EN EL PROPUESTA<br>

            <input type="radio" id="v11" name="i4" value="2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                        if ($consulta[13] === "2") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">-------<br>
          </p>
        </td>
        <td style="padding:10px">
          <p align="center">EL PRODUCTO (NO) TIENE LAS CARACTERISTICAS ESTABLECIDAS EN LA PROPUESTA<br>
            <input type="radio" id="v11" name="i4" value="0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" <?php
                                                                                                                                        if ($consulta[13] === "0") {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> required>
          </p>
        </td>
      </tr>


      <tr>
        <td style="background: #914a31;color: white;">&nbsp;</td>
        <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
        <td style="background: #914a31;color: white;">
          <div align="center">
            <h4>
              <textarea style="text-align:center;color: black; border-radius: 5px;" value="<?php echo $consulta[5] ?>" name="result5" id="resultadox9" readonly required><?php echo $consulta[5] ?></textarea>
            </h4>
          </div>
        </td>
      </tr>
      </table>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>



      <table id="Table8" style="border: #270D07 3px solid; margin-top: -40px; width: 30px; height: 50px;">

        <tr>
          <td colspan="2" style="background: #914a31;color: white;"><b>% FINAL</b></td>
          <td style="background: #914a31;color: white; padding-left:70px; padding-right:70px;">
            <div align="center">
              <h4>
                <textarea style="text-align:center;color: black;border-radius: 5px; " value="<?php echo $consulta[6] ?>" name="resultado_final" id="el_resultadofinal" readonly required><?php echo $consulta[6] ?></textarea>
              </h4>
            </div>
          </td>
        </tr>
      </table>
      </p>

      <p>
        <label class="col-md-7" style="position: relative; left: 30px; margin-bottom: 20px; font-size: 15px" for="textarea"><b>OBSERVACIONES:</b></label>
      </p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px; ">FORTALEZAS:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[7] ?>" name="fortalezas" id="fortalezas" required style="margin-bottom: 15px; height: 45px; width: 515px"><?php echo $consulta[7] ?></textarea>
      </p>
      <p>
      <p>
        <label class="col-md-7" for="textarea" style="margin-bottom: 8px;">DEBILIDADES:</label><br>
        <textarea class="col-md-7 col-md-offset-3 textinput" value="<?php echo $consulta[8] ?>" name="debilidades" id="debilidades" required style="margin-bottom: 15px; height: 45px; width: 515px"><?php echo $consulta[8] ?></textarea>
      </p>
      <tr>
        <table></table>
      </tr>

      <!-- BOTON DE ENVIO DE FORMULARIO  A BASE DE DATOS -->

      <td>&nbsp;</td>
      <td>
        <style type="text/css">
          .button {
            width: 100px;
            height: 35px;
            color: white;
            background: #914a31;
            /* Color de guardar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          .button:hover {
            background-color: #a55b44;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }

          #cancelar {
            width: 100px;
            height: 35px;
            color: white;
            background: #f2b440;
            /* Color de cancelar */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Transición suave */
          }

          #cancelar:hover {
            background-color: #f5c062;
            /* Un tono más claro para hover */
            transform: scale(1.05);
            /* Efecto dinámico */
          }
        </style>
        <div style="margin-left: -20em;"><button type="submit" id="enviar" class="button" value="Registrar"><i class="icon3 fa fa-save"></i> Guardar</button></div>
        <div style="margin-top: -5em; margin-left: 15em;"><a href="convertidor.php" id="cancelar" style="font-size: 14px;text-decoration: none;"><i class="fa fa-close"></i> Cancelar</a></div>


        <!-- -->

        </form>
        </div>
        </div>
    </section>
  <?php } ?>

  <script>
    /* <
         !--FUNCION PARA BLOQUEAR LETRAS-- > */
    function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }


    /*     !--FUNCION PARA BLOQUEAR NUMEROS-- > */
    function soloNumeros(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      numeros = "0123456789";
      especiales = [8, 37, 39, 46];

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (numeros.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }

    /*funcion para calcular radiobutton*/
    function resultado() {
      var fin = "no";
      var a = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('a' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              a += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox').innerHTML = "resultado:" + a; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox').innerHTML = (Math.round((a) * 100) / 100).toFixed(2);
    }

    function resultado4() {
      var fin = "no";
      var d = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('d' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              d += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox4').innerHTML = "resultado:" + d * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox4').innerHTML = (Math.round((d) * 100) / 100).toFixed(2);
    }

    function resultado5() {
      var fin = "no";
      var f = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('f' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              f += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox5').innerHTML = "resultado:" + f * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox5').innerHTML = (Math.round((f) * 100) / 100).toFixed(2);
    }

    function resultado7() {
      var fin = "no";
      var h = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('h' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              h += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox7').innerHTML = "resultado:" + h * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox7').innerHTML = (Math.round((h) * 100) / 100).toFixed(2);
    }

    function resultado9() {
      var fin = "no";
      var i = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('i' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              i += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox9').innerHTML = "resultado:" + i * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox9').innerHTML = (Math.round((i) * 100) / 100).toFixed(2);
    }


    /**funcion total**/
    function resultadofinal() {
      var aa = document.getElementById('resultadox').value;

      if (aa == null || aa == "") aa = 0;

      var rf = (parseFloat(aa)).toFixed(2);
      var regla3 = (rf * 100) / (9);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el_resultadofinal').value = regla3;
    }

    function resultadofinald() {
      var bb = document.getElementById('resultadox4').value;

      if (bb == null || bb == "") bb = 0;

      var rf = (parseFloat(bb)).toFixed(2);
      var regla3 = (rf * 100) / (8);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el_resultadofinal').value = regla3;
    }

    function resultadofinalf() {
      var ff = document.getElementById('resultadox5').value;

      if (ff == null || ff == "") ff = 0;

      var rf = (parseFloat(ff)).toFixed(2);
      var regla3 = (rf * 100) / (4);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el_resultadofinal').value = regla3;
    }

    function resultadofinali() {
      var hh = document.getElementById('resultadox7').value;
      var ii = document.getElementById('resultadox9').value;

      if (hh == null || hh === "") hh = 0;
      if (ii == null || ii === "") ii = 0;

      // Mostrar u ocultar la segunda tabla en función del valor de hh
      if (parseFloat(hh) >= 4) {
        document.getElementById('segundaTabla').style.display = 'table';
      } else {
        document.getElementById('segundaTabla').style.display = 'false';
        resetSegundaTabla();
        document.getElementById('el_resultadofinal').value = '0.00'; // Establece el resultado en 0 si hh < 4
        return; // Salir de la función para evitar cálculos adicionales
      }

      // Si la segunda tabla está visible, calcula el promedio entre hh e ii
      var rf = ((parseFloat(hh) + parseFloat(ii)) / 2).toFixed(2);
      document.getElementById('el_resultadofinal').value = rf;
    }

    // Función para limpiar las selecciones de la segunda tabla y establecer el resultado en 0
    function resetSegundaTabla() {
      // Selecciona todos los radio buttons en la segunda tabla
      var radios = document.querySelectorAll('#segundaTabla input[type="radio"]');

      // Recorre cada radio button y selecciona el que tiene el valor "0"
      radios.forEach(function(radio) {
        if (radio.value === "0") {
          radio.checked = true;
          resultado9();
        }
      });

      // Restablece el valor de el_resultadofinal a '0.00'
      document.getElementById('el_resultadofinal').value = '0.00';
    }
  </script>
  <script src="../assets/js/main.js"></script>
</body>

</html>