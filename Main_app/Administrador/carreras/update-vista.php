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

<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.css">
    <link rel="stylesheet" href="../assets/css/styles.css?v=1">
    <link rel="stylesheet" href="../css3/style.css?v=2">
    <link rel="stylesheet" href="../css3/iconos.css?v=3">
    <link rel="stylesheet" href="../bod.css">

    <title>Evaluacion de Responsabilidades</title>
  </head>

  <body>
    <header class="header">
      <nav class="nav container">
        <div class="nav__actions">
          <!-- Dropdown -->
          <div class="dropdown" id="dropdown" style="margin-left: 2em;">
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
  <section>
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
    </script>
    <section>
      <div style="width: 550px; height: 550px; margin-top: 9.7em; margin-left: 35em;">
        <div class="container-form">
          <div class="cabecera">
            <div class="logo-title">
              <style type="text/css">
                .icon4 {
                  color: white;
                  font-size: 20px;
                  vertical-align: middle;
                  margin-left: 60px;

                }
              </style>
              <div class="icon"><i class="icon5 fa fa-edit" style="margin-top: 1em; margin-left: -28em;"></i></div>
              <h2 style="color: white; font-size: 20px; margin-top: -0.5em;"><b>Formulario de Actualización de Datos</b> </h2><a style="display: inline-block;" href="index.php"><i class="icon4 fa fa-close" style="margin-top: -1.5em; margin-left: 21em;"></i></a>
            </div>
          </div>

          <form action="" method="post" class="form">

            <div class="user line-input">
              <div class="icon2"><i class="fa fa-user"></i></div>

              <input type="text" name="codigo" value="<?php if ($resultado) echo $resultado['codigo']; ?>" required="" style="font-size: 13px" placeholder="CÓDIGO" readonly="">
            </div>

            <div class="user line-input">
              <div class="icon2"><i class="fa fa-user"></i></div>

              <input type="text" name="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return soloLetras(event)" style="font-size: 13px" value="<?php if ($resultado) echo $resultado['nombre']; ?>" required="" placeholder="CARRERA">
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