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
<!--<!doctype html>-->
<html>
<title>Lista de Reportes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="../../image/logo_inicio.ico" />


<link rel="stylesheet" href="../css3/iconos.css?v=1">
<link rel="stylesheet" href="estilo.css?=2">
<link rel="stylesheet" href="botones.css?v=3">
<link rel="stylesheet" href="cargar.css">
<link rel="stylesheet" href="../assets/css/styles.css">
<link rel="stylesheet" href="../bod.css?v=1" />
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script defer src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script defer src="JS/tablescript.js"></script>

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
                  <a href="pdfSubida.php" class="dropdown__link">
                    <i class="ph ph-file-pdf"></i>
                    <span>PDFs</span>
                  </a>
                  <a href="pdfSubida1.php" class="dropdown__link">
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
                  <a href="somosTuvn1.php" class="dropdown__link">
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

  <section>
    <div class="cont">
      <div class="logo-title">
        <h2 style="color: black; font-size: 30px;"><b>Lista de Instrumentos Evaluados al Coordinador
          </b> </h2>
      </div>

      <table id="example" style="border: #f2b440 2px solid; width: 95%;">
        <thead class="tabla">
          <tr class="head" style="background-color: #914a31;">
            <th style="text-align: center;">FECHA</th>
            <th style="text-align: center;">EVALUADOR</th>
            <th style="text-align: center;">CARRERA DOCENTE</th>
            <th style="text-align: center;">RESPONSABILIDADES</th>
            <th style="text-align: center;">PDF</th>
            <th style="text-align: center;">CARGAR PDF</th>
          </tr>
        </thead>
        <tbody style="background-color: #fff;">
          <?php
          $conexion = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

          $sentencia = "SELECT g.id, g.fecha, l.nombre AS coordinador, g.docente, g.carrera, g.coevaluacion, g.archivopdf
                    FROM coevaluacion_general g
                    JOIN login l ON g.id_coordinador = l.id
                    WHERE g.docente = '" . $_SESSION['usu']['nombre'] . "'
                    ORDER BY g.fecha ASC";

          $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

          while ($fila = $resultado->fetch_assoc()) {
            if (empty($fila['archivopdf'])) {
              $newDate = date("d/m/Y", strtotime($fila['fecha']));
              echo "<tr style='color: black;'>";
              echo "<td style='text-align: center; font-size: 12px;'>$newDate</td>";
              echo "<td style='text-align: center; font-size: 12px;'>{$fila['coordinador']}</td>";
              echo "<td style='text-align: center; font-size: 12px;'>{$fila['carrera']}</td>";
              echo "<td style='text-align: center; font-size: 12px;'>{$fila['coevaluacion']}</td>";

              // Opciones para PDF y Recomendación


              echo "<td><div align='center'>
                      <a href='Generar_PDF.php?id=" . $fila['id'] . "' target='_blank' class='botones botones-pdf'>
                      <i class='fa fa-file-pdf-o'></i>
                      </a>
                  </div></td>";



              echo "<td>
                  <div>
                      <form action='cargarPDF.php' method='POST' enctype='multipart/form-data'>
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
          <tr style="background-color: #914a31;">
            <th style="text-align: center;">FECHA</th>
            <th style="text-align: center;">EVALUADOR</th>
            <th style="text-align: center;">CARRERA DOCENTE</th>
            <th style="text-align: center;">RESPONSABILIDADES</th>
            <th style="text-align: center;">PDF</th>
            <th style="text-align: center;">CARGAR PDF</th>
          </tr>
        </tfoot>
      </table>

    </div>

  </section>


  <script type="text/javascript">
    function confirmation() {
      if (!confirm("¿Realmente desea eliminar este registro?")) return false;
    }
  </script>

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