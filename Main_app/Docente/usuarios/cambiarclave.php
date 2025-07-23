<?php

session_start();
if (isset($_SESSION['usu'])) {
  if ($_SESSION['usu']['tipo'] != "Docente") {
    if ($_SESSION['usu']['tipo'] == "Administrador") {
      header('Location:../Administrador/');
    } else if ($_SESSION['usu']['tipo'] == "Coordinador") {
      header('Location:../Coordinador/');
    }
  }
} else {
  header('Location:../../');
}

$docente = $_SESSION['usu']['nombre'];
$tipo = $_SESSION['usu']['tipo'];
$error = '';

if (isset($_POST['guardar'])) {
  require "conexion2.php";

  $passActual = $mysqli->real_escape_string($_POST['passActual']);
  $passNueva = $mysqli->real_escape_string($_POST['passNueva']);
  $passConfir = $mysqli->real_escape_string($_POST['passConfir']);
  $codigo = $mysqli->real_escape_string($_POST['codigo']);
  $nombre = $mysqli->real_escape_string($_POST['nombre']);

  $sqlA = $mysqli->query("SELECT clave FROM login WHERE usuario ='" . $_SESSION['usu']['usuario'] . "'");
  $rowA = $sqlA->fetch_array();

  if ($rowA['clave'] == $passActual) {
    if ($passNueva == $passConfir) {
      $update = $mysqli->query("UPDATE login SET usuario='$codigo', nombre='$nombre', clave='$passNueva', newclave='$passNueva' WHERE usuario='" . $_SESSION['usu']['usuario'] . "'");
      if ($update) {
        $error .= '<h4 style="color: green;"><b>✓ Datos actualizados correctamente</b></h4>';
        session_unset();
        session_destroy();
        header('Location: ../../../');
      }
    } else {
      $error .= '<h4><b>X Las contraseñas no coinciden</b></h4>';
    }
  } else {
    $error .= '<h4><b>X Su contraseña actual es incorrecta</b></h4>';
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
  <!-- ICONS -->
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link rel="stylesheet" href="../assets/css/styles.css?v=1">
  <link rel="stylesheet" href="../css3/style.css?v=2">
  <link rel="stylesheet" href="../css3/iconos.css?v=3">
  <link rel="stylesheet" href="../bod.css">

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
            <a href="cambiarclave.php" class="dropdown__link">
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

      <div class="nav__menu" id="nav-menu" style="position: absolute; margin-left: 28em;">
        <ul class="nav__list">
          <li>
            <i class="icon ph-bold ph-house-simple"></i>
            <a href="../docente.php" class="nav__link">Inicio</a>
          </li>

          <li>
            <i class="icon ph-bold ph-file"></i>
            <a href="../reporte_presencial/convertidor.php" class="nav__link">Reporte General</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <section>
    <div style="width: 1535px; height: 520px; margin-top: 8em;">
      <div class="container-form" style="margin-left: 34em;">
        <div class="cabecera" style="background-color: #f2b440;">
          <div class="logo-title">
            <style type="text/css">
              .icon4 {
                color: white;
                font-size: 20px;
                vertical-align: middle;
                margin-left: 60px;

              }
            </style>
            <div class="icon"><i class="fa fa-edit" style="margin-top: 1em; margin-left: -28em;"></i></div>
            <h2 style="color: white; font-size: 20px; margin-top: -1em;"><b>Formulario de Actualización de Datos</b> </h2>
          </div>
        </div>

        <form action="" method="post" class="form">

          <div class="user line-input">
            <div class="icon2"><i class="fa fa-user"></i></div>

            <input type="text" name="codigo" readonly="" style="font-size: 13px" value="<?php echo $_SESSION['usu']['usuario'] ?>" required="">
          </div>
          <div class="user line-input">
            <div class="icon2"><i class="fa fa-user"></i></div>

            <input type="text" name="nombre" placeholder="APELLIDOS Y NOMBRES" style="font-size: 13px" value="<?php echo $_SESSION['usu']['nombre'] ?>" required="" onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="password line-input">
            <div class="icon2"><i class="fa fa-lock"></i></div>

            <input type="password" name="passActual" placeholder="CONTRASEÑA ACTUAL" style="font-size: 13px" required="">
          </div>

          <div class="password line-input">
            <div class="icon2"><i class="fa fa-lock"></i></div>

            <input type="password" name="passNueva" placeholder="NUEVA CONTRASEÑA" style="font-size: 13px" required="" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contraseña debe empezar con una letra y contener al menos un dígito" minlength="5">
          </div>
          <div class="password line-input">
            <div class="icon2"><i class="fa fa-lock"></i></div>

            <input type="password" name="passConfir" placeholder="CONFIRMAR NUEVA CONTRASEÑA" style="font-size: 13px" required="">
          </div>
          <?php if (!empty($error)): ?>
            <div class="mensaje">
              <?php echo $error; ?>
            </div>
          <?php endif; ?>

          <style type="text/css">
            .icon3 {
              color: white;
              font-size: 15px;
              vertical-align: middle;
            }
          </style>
          <button style="display: inline-block;" type="submit" name="guardar" value="Guardar"><i class="icon3 fa fa-save"></i> Guardar</button>

        </form>

      </div>
    </div>
    </div>
  </section>
  <script src="../assets/js/main.js"></script>
</body>

</html>