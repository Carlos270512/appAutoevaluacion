<?php

session_start();
if (isset($_SESSION['usu'])) {
  if ($_SESSION['usu']['tipo'] != "Administrador") {
    if ($_SESSION['usu']['tipo'] == "Coordinador") {
      header('Location:../Coordinador/');
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
<link rel="stylesheet" href="../assets/css/styles.css">
<link rel="stylesheet" href="../bod.css" />
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script defer src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script defer src="tablescript.js"></script>

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
            <a href="../coordinadores/cambiarclave.php" class="dropdown__link">
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
            <a href="../administrador.php" class="nav__link">Inicio</a>
          </li>

          <li>
            <div class="dropdown" id="dropdown">
              <div class="dropdown__profile">
                <div class="dropdown__names">
                  <i class="ph ph-identification-badge"></i>
                  <a class="nav__link">Registrar</a>
                </div>
              </div>

              <div class="dropdown__list" style="margin-left: -2em;">
                <a href="../register.php" class="dropdown__link">
                  <i class="ph ph-user-circle-plus"></i>
                  <span>Usuario</span>
                </a>

                <a href="../register3.php" class="dropdown__link">
                  <i class="ph ph-bank"></i>
                  <span>Carrera</span>
                </a>
              </div>
            </div>
          </li>

          <li>
            <div class="dropdown" id="dropdown">
              <div class="dropdown__profile">
                <div class="dropdown__names">
                  <i class="icon ph-bold ph-pencil-simple-line"></i>
                  <a class="nav__link">Editar</a>
                </div>
              </div>

              <div class="dropdown__list" style="margin-left: -4em;">
                <a href="../coordinadores/index.php" class="dropdown__link">
                  <i class="ph ph-suitcase-simple"></i>
                  <span>Coordinadores</span>
                </a>

                <a href="../docentes/index.php" class="dropdown__link">
                  <i class="ph ph-graduation-cap"></i>
                  <span>Docentes</span>
                </a>

                <a href="../carreras/index.php" class="dropdown__link">
                  <i class="ph ph-bank"></i>
                  <span>Carreras</span>
                </a>
              </div>
            </div>
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

          <li>
            <i class="icon ph-bold ph-file"></i>
            <a href="../reporte_presencial/convertidor.php" class="nav__link">Reporte General</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <script language="javascript">
    function doSearch() {
      const tableReg = document.getElementById('datos');
      const searchText = document.getElementById('searchTerm').value.toLowerCase();
      let total = 0;

      // Recorremos todas las filas con contenido de la tabla
      for (let i = 1; i < tableReg.rows.length; i++) {
        // Si el td tiene la clase "noSearch" no se busca en su cntenido
        if (tableReg.rows[i].classList.contains("noSearch")) {
          continue;
        }

        let found = false;
        const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        // Recorremos todas las celdas
        for (let j = 0; j < cellsOfRow.length && !found; j++) {
          const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
          // Buscamos el texto en el contenido de la celda
          if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
            found = true;
            total++;
          }
        }
        if (found) {
          tableReg.rows[i].style.display = '';
        } else {
          // si no ha encontrado ninguna coincidencia, esconde la
          // fila de la tabla
          tableReg.rows[i].style.display = 'none';
        }
      }

      // mostramos las coincidencias
      const lastTR = tableReg.rows[tableReg.rows.length - 1];
      const td = lastTR.querySelector("td");
      lastTR.classList.remove("hide", "red");
      if (searchText == "") {
        lastTR.classList.add("hide");
        td.innerHTML = "";
      } else if (total) {
        td.innerHTML = "Se ha encontrado " + total + " coincidencia" + ((total > 1) ? "s" : "");
      } else {
        lastTR.classList.add("red");
        td.innerHTML = "No se han encontrado coincidencias";
      }
    }
  </script>
  <script type="text/javascript">
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
  </script>

  <section>
    <div class="cont">
      <div class="logo-title">
        <div class="icon"><i class="icon5 fa fa-files-o"></i></div>
        <h2 style="color: black; font-size: 30px;"><b>Lista de Reportes
          </b> </h2>
      </div>

      <div class="logo-title2" style="text-align: center; margin-top: -42px; margin-left: 300px; margin-bottom: 26px;">
        <form id="reporteForm" method="post" action="">
          <select id="reporteSelect" name="reporte" style="padding: 5px; font-size: 14px;">
            <option value="" selected hidden>ELIGE UNA REPORTE</option>
            <option value="reporte.php">GESTIÓN DE LOS COORDINADORES/DOCENTES</option>
            <option value="reporte1.php">GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/LABORATORIOS</option>
            <option value="reporte2.php">RESPONSABLES DE PRÁCTICAS LABORALES</option>
            <option value="reporte3.php">GESTIÓN DE SOMOS TUVN EN LOS DOCENTES</option>
          </select>
          <button type="submit" style="margin-left: 10px;" class="button2">
            <i class="fa fa-file-excel-o"></i>
          </button>
        </form>
      </div>

      <table id="example" style="border: #f2b440 2px solid; width:95%;">
        <thead class="tabla">
          <tr class="head" style="background-color: #914a31;">
            <td style="font-size: 12px; text-align: center;">FECHA</td>
            <td style="font-size: 12px; text-align: center;">COORDINADOR</td>
            <td style="font-size: 12px; text-align: center;" center>DOCENTE</td>
            <td style="font-size: 12px; text-align: center;" center>CARRERA</td>
            <td style="font-size: 12px; text-align: center;" center>RESPONSABILIDADES</td>
            <td style="font-size: 12px; text-align: center;" center>INSTRUMENTO PDF RESULTADOS</td>
            <td style="font-size: 12px; text-align: center;" center>INSTRUMENTOS PDF FIRMADOS</td>
            <td style="font-size: 12px; text-align: center;" center>ELIMINAR PDF</td>
            <td style="font-size: 12px; text-align: center;" center>EDITAR</td>
            <td style="font-size: 12px; text-align: center;" center>ELIMINAR</td>
          </tr>
        </thead>
        <tbody style="background-color: #fff;">
          <?php
          $conexion = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

          $sentencia = "
                          SELECT g.id, g.fecha, l.nombre AS coordinador, l.tipo, g.docente, g.carrera, g.coevaluacion, g.archivopdf, g.tipo AS TUVN
                                FROM coevaluacion_general g
                                JOIN login l ON g.id_coordinador = l.id
                                WHERE
                                (
                                    -- Si estamos en abril a septiembre, buscamos fechas entre abril y septiembre del año actual
                                    (MONTH(CURDATE()) BETWEEN 4 AND 9 AND
                                    g.fecha BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-09-30'))
                                    
                                    OR
                                    
                                    -- Si estamos en octubre a diciembre, buscamos fechas entre octubre del año actual y marzo del año siguiente
                                    (MONTH(CURDATE()) BETWEEN 10 AND 12 AND
                                    g.fecha BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()) + 1, '-03-31'))
                                    
                                    OR
                                    
                                    -- Si estamos en enero a marzo, buscamos fechas entre octubre del año anterior y marzo del año actual
                                    (MONTH(CURDATE()) BETWEEN 1 AND 3 AND
                                    g.fecha BETWEEN CONCAT(YEAR(CURDATE()) - 1, '-10-01') AND CONCAT(YEAR(CURDATE()), '-03-31'))
                                )
                                ORDER BY g.fecha DESC";

          $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));
          while ($fila = $resultado->fetch_assoc()) {
            $newDate = date("d/m/Y", strtotime($fila['fecha']));
            echo "<tr style='color: black'>";
            echo "<td width='90px'>";
            echo $newDate;
            echo "</td>";
            echo "<td style='font-size: 12px;'>";
            echo $fila['coordinador'];
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

            echo "<td><div align='center'>
                      <a href='Generar_PDF.php?id=" . $fila['id'] . "' target='_blank' class='botones botones-pdf'>
                      <i class='fa fa-file-pdf-o'></i>
                      </a>
                  </div></td>";

            if (empty($fila['archivopdf'])) {
              echo "<td><div align='center'>
            <a href='errorPDF.php?id=" . $fila['id'] . "' class='botones botones-view'>
              <i class='fa fa-file-pdf-o'></i>
            </a>
          </div></td>";
            } else {
              echo "<td><div align='center'>
            <a href='descargar.php?id=" . $fila['id'] . "' target='_blank' class='botones botones-view'>
              <i class='fa fa-file-pdf-o'></i>
            </a>
          </div></td>";
            }

            echo "<td><div align='center'>
                    <a href='eliminarpdf.php?id=" . $fila['id'] . "' onclick='return confirmation()' class='botones botones-pdfs'>
                      <i class='fa fa-trash-o'></i>
                    </a>
                  </div></td>";

            echo "<td><div align='center'>
        <a href='1modif_prod1.php?id=" . $fila['id'] . "&texto=$textoCompleto&texto1=$textoCompleto1' class='botones botones-edit'>
          <i class='fa fa-edit'></i>
        </a>
      </div></td>";

            echo "<td><div align='center'>
        <a href='1eliminar_prod.php?id=" . $fila['id'] . "' onclick='return confirmation()' class='botones botones-delete'>
          <i class='fa fa-trash-o'></i>
        </a>
      </div></td>";
            echo "</tr>";
          }

          ?>
        </tbody>
        <tfoot>
          <tr class='noSearch hide' style="background-color: #914a31;">
            <td style="font-size: 12px; text-align: center;">FECHA</td>
            <td style="font-size: 12px; text-align: center;">COORDINADOR</td>
            <td style="font-size: 12px; text-align: center;" center>DOCENTE</td>
            <td style="font-size: 12px; text-align: center;" center>CARRERA</td>
            <td style="font-size: 12px; text-align: center;" center>RESPONSABILIDADES</td>
            <td style="font-size: 12px; text-align: center;" center>INSTRUMENTO PDF RESULTADOS</td>
            <td style="font-size: 12px; text-align: center;" center>INSTRUMENTOS PDF FIRMADOS</td>
            <td style="font-size: 12px; text-align: center;" center>ELIMINAR PDF</td>
            <td style="font-size: 12px; text-align: center;" center>EDITAR</td>
            <td style="font-size: 12px; text-align: center;" center>ELIMINAR</td>
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
    document.getElementById('reporteSelect').addEventListener('change', function() {
      // Cambiar la acción del formulario según la opción seleccionada
      document.getElementById('reporteForm').action = this.value;
    });

    document.getElementById('reporteForm').addEventListener('submit', function() {
      setTimeout(function() {
        document.getElementById('reporteSelect').selectedIndex = 0;
      }, 100); // Pequeña demora para permitir el envío del formulario
    });
  </script>
  <script src="../assets/js/main.js"></script>
</body>

</html>