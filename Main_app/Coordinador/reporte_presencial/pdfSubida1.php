<?php
// Conexión a la base de datos
include('conexion.php');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

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

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css3/iconos.css?v=1">
    <link rel="stylesheet" href="botones.css?v=4">
    <link rel="stylesheet" href="pdfs/subidaPdf.css?v=6">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../bod.css?v=1" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script defer src="tablescript.js"></script>

    <title>Evaluacion de Responsabilidades</title>
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
                                        <i class="ph ph-download"></i>
                                        <span>Reportes SOMOS TUVN</span>
                                    </a>
                                    <a href="../reporte_presencial/somoTuvnCoor.php" class="dropdown__link">
                                        <i class="ph ph-eject-simple"></i>
                                        <span>Firmas SOMOS TUVN</span>
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

    <section>
        <div class="cont" style="width: 1500px; height: 87%; margin-top: 6em; margin-left: 1em;">
            <div class="logo-title" style="margin-bottom: 10px;">
                <div class="icon"><i class="icon5 fa fa-files-o"></i></div>
                <h2 style="color: black; font-size: 30px;"><b>Lista de Reportes
                    </b> </h2>
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
                          SELECT g.id ,g.fecha, l.nombre AS coordinador, g.docente, g.carrera, g.coevaluacion, g.archivopdf
                          FROM coevaluacion_general g
                          JOIN login l ON g.id_coordinador = l.id
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