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
?>
<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_ES.UTF-8');
$fecha = date("d-m-Y");

$docente = $_SESSION['usu']['nombre'];
$tipo = $_SESSION['usu']['tipo'];
?>

<html lang="es">

<head>
  <title>Evaluacion de Responsabilidades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
  <link rel="stylesheet" href="../css3/iconos.css?v=1">
  <link rel="stylesheet" href="estilos.css?=2">
  <link rel="stylesheet" href="botones.css?v=3">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../bod.css?v=1" />
  <link rel="stylesheet" href="cargar.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script defer src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script defer src="tablescript.js"></script>
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
                    <a href="../reporte_presencial/pdfSubida1.php" class="nav__link">Almacenamiento</a>
                  </div>
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
                  <a href="convertidor.php" class="dropdown__link">
                    <i class="icon ph-bold ph-file"></i>
                    <span>Reporte de Evaluación</span>
                  </a>
                  <a href="somosTuvn1.php" class="dropdown__link">
                    <i class="ph ph-download"></i>
                    <span>Reportes SOMOS TUVN</span>
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
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
  <section>
    <div class="cont" style="width: 1500px;">
      <div class="logo-title">
        <h2 style="color: black; font-size: 30px;"><b>Lista de Instrumentos a Docentes Evaluados
          </b> </h2>
      </div>

      <table id="example" style="border: #f2b440 2px solid;margin-top: 1px; width:95%">
        <thead class="tabla">
          <tr class="head" style="background-color: #914a31;">
            <td style="font-size: 12px; text-align: center;">FECHA</td>
            <td style="font-size: 12px; text-align: center;" center>DOCENTE</td>
            <td style="font-size: 12px; text-align: center;" center>CARRERA</td>
            <td style="font-size: 12px; text-align: center;" center>RESPONSABILIDADES</td>
            <td style="font-size: 12px; text-align: center;" center>CARGAR PDF</td>
          </tr>
        </thead>
        <tbody style="background-color: #fff;">
          <?php
          $conexion = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

          $coordinador_id = $_SESSION['usu']['id']; // Asumiendo que el id del coordinador está en la sesión

          $sentencia = "SELECT g.id ,g.fecha, l.nombre AS coordinador, g.docente, g.carrera, g.coevaluacion, g.archivopdf, g.tipo
            FROM coevaluacion_general g
            JOIN login l ON g.id_coordinador = l.id
            WHERE g.id_coordinador = '$coordinador_id'  -- Filtrar por el ID del coordinador
            ORDER BY g.fecha ASC";

          $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));
          while ($fila = $resultado->fetch_assoc()) {
            if (($fila['archivopdf']) && ($fila['tipo'] === "docente") && ($fila['coevaluacion'] === "GESTION DE SOMOS TUVN EN LOS DOCENTES")) {
              $newDate = date("d/m/Y", strtotime($fila['fecha']));
              echo "<tr style='color: black'>";
              echo "<td width='90px'>";
              echo $newDate;
              echo "</td>";
              echo "<td style='font-size: 12px;'>";
              echo $fila['docente'];
              echo "</td>";
              echo "<td style='font-size: 12px;'>";
              echo $fila['carrera'];
              echo "</td>";
              echo "<td style='font-size: 12px;'>";
              echo $fila['coevaluacion'];
              echo "</td>";

              $textoCompleto = urlencode($fila['coevaluacion']);
              $textoCompleto1 = urlencode($fila['carrera']);

              echo "<td>
                  <div>
                      <form action='cargarPDFcoorA.php' method='POST' enctype='multipart/form-data'>
                          <label for='file_pdf_{$fila['id']}' class='file-label'>
                              Seleccionar Archivo
                              <input type='file' id='file_pdf_{$fila['id']}' name='file_pdf' required onchange='showFileName(this, \"file_name_{$fila['id']}\")'>
                          </label><br><br>
                          <span id='file_name_{$fila['id']}' style='margin-left: 1px; font-size: 12px; color: #555;'>No seleccionado</span>
                          <input type='hidden' name='id' value='{$fila['id']}'><br><br>
                          <button type='submit' class='button2'>
                              <i class='icon3 fa fa-upload'></i> 
                          </button>
                      </form>
                  </div>
              </td>";

              echo "</tr>";
            }
          }
          ?>

        </tbody>
        <tfoot>
          <tr class='noSearch hide' style="background-color: #914a31;">
            <td style="font-size: 12px; text-align: center;">FECHA</td>
            <td style="font-size: 12px; text-align: center;" center>DOCENTE</td>
            <td style="font-size: 12px; text-align: center;" center>CARRERA</td>
            <td style="font-size: 12px; text-align: center;" center>RESPONSABILIDADES</td>
            <td style="font-size: 12px; text-align: center;" center>CARGAR PDF</td>
          </tr>
        </tfoot>
      </table>
    </div>

  </section>
  <script>
    function showFileName(input, spanId) {
      // Verifica si un archivo ha sido seleccionado
      if (input.files && input.files.length > 0) {
        const fileName = input.files[0].name; // Obtiene el nombre del archivo
        document.getElementById(spanId).textContent = fileName; // Muestra el nombre en el <span>
      } else {
        document.getElementById(spanId).textContent = "No seleccionado";
      }
    }
  </script>

  <script src="../assets/js/main.js"></script>
</body>

</html>