<!DOCTYPE html>
<?php

session_start();
if (isset($_SESSION['usu'])) {
  if ($_SESSION['usu']['newclave'] == null) {
    echo '<center><script>alert("Bienvenido al Sistema de Evaluaciones de Responsabilidades!!!\nPor favor cambie su contraseña para poder continuar")</script></center>';
    echo "<script>location.href='coordinadores/cambiarclave.php'</script>";
  } else if ($_SESSION['usu']['tipo'] != "Administrador") {
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
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
  <!-- ICONS -->
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.css">
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
            <a href="coordinadores/cambiarclave.php" class="dropdown__link">
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
            <a href="administrador.php" class="nav__link">Inicio</a>
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
                <a href="register.php" class="dropdown__link">
                  <i class="ph ph-user-circle-plus"></i>
                  <span>Usuario</span>
                </a>

                <a href="register3.php" class="dropdown__link">
                  <i class="ph ph-bank"></i>
                  <span>Carrera</span>
                </a>

                <a href="gestionCoordinadores.php" class="dropdown__link">
                  <i class="ph ph-bank"></i>
                  <span>Gestion Coordinadores</span>
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
                <a href="coordinadores/index.php" class="dropdown__link">
                  <i class="ph ph-suitcase-simple"></i>
                  <span>Coordinadores</span>
                </a>

                <a href="docentes/index.php" class="dropdown__link">
                  <i class="ph ph-graduation-cap"></i>
                  <span>Docentes</span>
                </a>

                <a href="carreras/index.php" class="dropdown__link">
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
                <a href="coevaluacion_presencial/index2.php" class="dropdown__link">
                  <i class="ph ph-desktop"></i>
                  <span>Formulario</span>
                </a>
              </div>
            </div>
          </li>

          <li>
            <i class="icon ph-bold ph-file"></i>
            <a href="reporte_presencial/convertidor.php" class="nav__link">Reporte General</a>
          </li>
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