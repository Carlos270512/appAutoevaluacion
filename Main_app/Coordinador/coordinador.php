<?php
session_start();

if (isset($_SESSION['usu'])) {
  if ($_SESSION['usu']['newclave'] == null) {
    echo '<center><script>alert("Bienvenido al Sistema de Coevaluación de Docentes!!!\nPor favor cambie su contraseña para poder continuar")</script></center>';
    echo "<script>location.href='usuarios/cambiarclave.php'</script>";
  } else if ($_SESSION['usu']['tipo'] != "Coordinador") {
    if ($_SESSION['usu']['tipo'] == "Administrador") {
      header('Location:../Administrador/');
    } else if ($_SESSION['usu']['tipo'] == "Docente") {
      header('Location:../Docente/');
    }
  }
} else {
  header('Location:../../');
}

if ($_SESSION['usu']['nombre'] != "GUAMAN FREIRE MARIO RUBEN") {
  $conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

  if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
  }

  $docente = $_SESSION['usu']['nombre'];
  $sql = "SELECT tipo,archivopdf FROM coevaluacion_general WHERE docente = ?";

  if ($stmt = mysqli_prepare($conexion, $sql)) {
    // Vincular parámetro
    mysqli_stmt_bind_param($stmt, "s", $docente);

    // Ejecutar consulta
    mysqli_stmt_execute($stmt);

    // Vincular el resultado
    mysqli_stmt_bind_result($stmt, $tipo, $archivo_pdf);
    mysqli_stmt_store_result($stmt);
    $documentos_faltantes = false;
    $es_coordinadoA = false;


    // Obtener resultados
    while (mysqli_stmt_fetch($stmt)) { // Llenar $archivo_pdf con los datos
      if (empty($archivo_pdf)) {
        $documentos_faltantes = true;
      }
      if ($tipo === "coordinadoA" && $tipo === "docente") {
        $es_coordinadoA = true;
      }
    }

    if ($documentos_faltantes === true) {
      echo '<center><script>alert("Tiene documentos por subir")</script></center>';
      echo "<script>location.href='../Coordinador/reporte_presencial/convertidor1.php'</script>";
    } else if ($es_coordinadoA === true) {
      echo '<center><script>alert("Tiene documentos por subir")</script></center>';
      echo "<script>location.href='../Coordinador/reporte_presencial/somoTuvn.php'</script>";
    } else {
      $docente = $_SESSION['usu']['nombre'];
      $tipo = $_SESSION['usu']['tipo']; ?>

      <!DOCTYPE html>

      <html lang="en">

      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
        <!-- ICONS -->
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="bod.css?v=1" />

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
                  <a href="usuarios/cambiarclave.php" class="dropdown__link">
                    <i class="ph ph-user-circle"></i>
                    <span>Perfil de Usuario</span>
                  </a>

                  <a href="cerrar.php" class="dropdown__link">
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
                  <a href="coordinador.php" class="nav__link">Inicio</a>
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
                      <a href="coevaluacion_presencial/index2.php" class="dropdown__link">
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
                          <a href="pdfSubida1.php" class="nav__link">Almacenamiento</a>
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
                        <a href="reporte_presencial/convertidor.php" class="dropdown__link">
                          <i class="icon ph-bold ph-file"></i>
                          <span>Reporte de Evaluación</span>
                        </a>
                        <a href="reporte_presencial/somosTuvn1.php" class="dropdown__link">
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
                        <a href="reporte_presencial/convertidor.php" class="dropdown__link">
                          <i class="icon ph-bold ph-file"></i>
                          <span>Reporte de Evaluación</span>
                        </a>
                        <a href="reporte_presencial/convertidor1.php" class="dropdown__link">
                          <i class="icon ph-bold ph-file"></i>
                          <span>Reporte General</span>
                        </a>
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="ph ph-upload"></i>
                    <a href="reporte_presencial/somoTuvn.php" class="nav__link">Somos TUVN</a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </nav>
        </header>

        <a href="https://www.istvidanueva.edu.ec/sigaa/" target="_blank" style="text-decoration: none;">
          <div class="darksoul-card1">
            <div class="circle1"></div>
            <img src="../../image/logo_inicio.ico" alt="DarkSoul - Instagram" width="25" height="25" style="z-index: 100;" />
            <h2 class="content">Sigaa</h2>
          </div>
        </a>
        <a href="https://aulavirtual.istvidanueva.edu.ec/" target="_blank" style="text-decoration: none;">
          <div class="darksoul-card2">
            <div class="circle2"></div>
            <img src="../../image/logo_inicio.ico" alt="DarkSoul - CodePen" width="25" height="25" style="z-index: 100;" />
            <p class="content">Aula Virtual</p>
          </div>
        </a>
        <a href="https://vidanueva.edu.ec/" target="_blank" style="text-decoration: none;">
          <div class="darksoul-card3">
            <div class="circle3"></div>
            <img src="../../image/logo_inicio.ico" alt="DarkSoul - Dribbble" width="25" height="25" style="z-index: 100;" />
            <h4 class="content">Vida Nueva</h4>
          </div>
        </a>
        <script src="assets/js/main.js"></script>
      </body>

      </html>
  <?php }
  }
} else {
  $docente = $_SESSION['usu']['nombre'];
  $tipo = $_SESSION['usu']['tipo'];
  ?>

  <!DOCTYPE html>

  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
    <!-- ICONS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="bod.css?v=1" />

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
              <a href="usuarios/cambiarclave.php" class="dropdown__link">
                <i class="ph ph-user-circle"></i>
                <span>Perfil de Usuario</span>
              </a>

              <a href="cerrar.php" class="dropdown__link">
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
              <a href="coordinador.php" class="nav__link">Inicio</a>
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
                  <a href="coevaluacion_presencial/index2.php" class="dropdown__link">
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
                      <a href="../Coordinador/reporte_presencial/pdfSubida1.php" class="nav__link">Almacenamiento</a>
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
                    <a href="reporte_presencial/convertidor.php" class="dropdown__link">
                      <i class="icon ph-bold ph-file"></i>
                      <span>Reporte de Evaluación</span>
                    </a>
                    <a href="reporte_presencial/somosTuvn1.php" class="dropdown__link">
                      <i class="ph ph-download"></i>
                      <span>Reportes SOMOS TUVN</span>
                    </a>
                    <a href="reporte_presencial/somoTuvnCoor.php" class="dropdown__link">
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
                    <a href="reporte_presencial/convertidor.php" class="dropdown__link">
                      <i class="icon ph-bold ph-file"></i>
                      <span>Reporte de Evaluación</span>
                    </a>
                    <a href="reporte_presencial/convertidor1.php" class="dropdown__link">
                      <i class="icon ph-bold ph-file"></i>
                      <span>Reporte General</span>
                    </a>
                  </div>
                </div>
              </li>
              <li>
                <i class="ph ph-upload"></i>
                <a href="reporte_presencial/somoTuvn.php" class="nav__link">Somos TUVN</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>

    <a href="https://www.istvidanueva.edu.ec/sigaa/" target="_blank" style="text-decoration: none;">
      <div class="darksoul-card1">
        <div class="circle1"></div>
        <img src="../../image/logo_inicio.ico" alt="DarkSoul - Instagram" width="25" height="25" style="z-index: 100;" />
        <h2 class="content">Sigaa</h2>
      </div>
    </a>
    <a href="https://aulavirtual.istvidanueva.edu.ec/" target="_blank" style="text-decoration: none;">
      <div class="darksoul-card2">
        <div class="circle2"></div>
        <img src="../../image/logo_inicio.ico" alt="DarkSoul - CodePen" width="25" height="25" style="z-index: 100;" />
        <p class="content">Aula Virtual</p>
      </div>
    </a>
    <a href="https://vidanueva.edu.ec/" target="_blank" style="text-decoration: none;">
      <div class="darksoul-card3">
        <div class="circle3"></div>
        <img src="../../image/logo_inicio.ico" alt="DarkSoul - Dribbble" width="25" height="25" style="z-index: 100;" />
        <h4 class="content">Vida Nueva</h4>
      </div>
    </a>
    <script src="assets/js/main.js"></script>
  </body>

  </html>

<?php
}
?>