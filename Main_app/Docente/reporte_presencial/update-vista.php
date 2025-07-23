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
?>

<html>
<title>Formulario de Envío de Datos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="../../image/logo_inicio.ico" />
<link rel="stylesheet" href="../css3/iconos.css">
<link rel="stylesheet" href="../diseno.css?v=2">
<link rel="stylesheet" href="../css3/main.css?v=3">
<link rel="stylesheet" href="../css3/style.css?v=4">

<link rel="stylesheet" href="css/estilo.css">

<style>
  #headerr {
    width: 100%;
    padding: 2px;
    height: 68px;
    background-color: #99421b;
    font-family: Arial, Helvetica, sans-serif;
    position: fixed;
    top: 0;
    left: 60px;
    z-index: 2;
  }

  ul,
  ol {
    list-style: none;
  }

  .nav>li {
    float: left;
  }

  .welcome {
    width: 100%;
    max-width: 600px;
    margin: auto;
    margin-top: 100px;
    background: rgba(0, 0, 0, 0.6);
    text-align: center;
    padding: 20px;
  }

  .welcome img {
    width: 120px;
    height: 120px;
    text-align: center;
  }

  .welcome h1 {
    font-size: 50px;
    color: white;
    font-weight: 100;
    margin-top: 20px;
  }

  .welcome a {
    display: block;
    margin-top: 40px;
    font-size: 20px;
    padding: 10px;
    border: 1px solid white;
  }

  .welcome a:hover {
    color: black;
    background: white;
  }



  .caja {
    color: black;
    font-size: 15px;
    vertical-align: middle;
    width: 275px;
    height: 32px;
    border-radius: 5px;
    border: solid 1px #212127;
    margin-left: 10px;
    margin-bottom: 20px;
  }


  .container-form .header .logo-title .icon5 {
    color: white;
    margin-top: 8px;
    font-size: 25px;
    vertical-align: middle;
  }

  .container-form .form .user .icon2 {
    color: #270D07;
    font-size: 25px;
    vertical-align: middle;
  }

  .container-form .form .password .icon2 {
    color: #270D07;
    font-size: 25px;
    vertical-align: middle;
  }

  .container-form .form .user input {
    color: black;
    font-size: 15px;
    vertical-align: middle;
    width: 275px;
    height: 32px;
    border-radius: 5px;
    border: solid 1px #212127;
    margin-left: 15px;
  }

  .container-form .form .password input {
    color: black;
    font-size: 15px;
    vertical-align: middle;
    width: 275px;
    height: 32px;
    border-radius: 5px;
    border: solid 1px #212127;
    margin-left: 15px;
  }

  table .tabla {
    background-color: white;
  }

  body {
    background-size: 4%;
    background-position: center;
    background-color: #ffffff;
    background-image: url("data:image/svg+xml,%3Csvg width='84' height='84' viewBox='0 0 84 84' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d1c1ac' fill-opacity='0.5'%3E%3Cpath d='M84 23c-4.417 0-8-3.584-8-7.998V8h-7.002C64.58 8 61 4.42 61 0H23c0 4.417-3.584 8-7.998 8H8v7.002C8 19.42 4.42 23 0 23v38c4.417 0 8 3.584 8 7.998V76h7.002C19.42 76 23 79.58 23 84h38c0-4.417 3.584-8 7.998-8H76v-7.002C76 64.58 79.58 61 84 61V23zM59.05 83H43V66.95c5.054-.5 9-4.764 9-9.948V52h5.002c5.18 0 9.446-3.947 9.95-9H83v16.05c-5.054.5-9 4.764-9 9.948V74h-5.002c-5.18 0-9.446 3.947-9.95 9zm-34.1 0H41V66.95c-5.053-.502-9-4.768-9-9.948V52h-5.002c-5.184 0-9.447-3.946-9.95-9H1v16.05c5.053.502 9 4.768 9 9.948V74h5.002c5.184 0 9.447 3.946 9.95 9zm0-82H41v16.05c-5.054.5-9 4.764-9 9.948V32h-5.002c-5.18 0-9.446 3.947-9.95 9H1V24.95c5.054-.5 9-4.764 9-9.948V10h5.002c5.18 0 9.446-3.947 9.95-9zm34.1 0H43v16.05c5.053.502 9 4.768 9 9.948V32h5.002c5.184 0 9.447 3.946 9.95 9H83V24.95c-5.053-.502-9-4.768-9-9.948V10h-5.002c-5.184 0-9.447-3.946-9.95-9zM50 50v7.002C50 61.42 46.42 65 42 65c-4.417 0-8-3.584-8-7.998V50h-7.002C22.58 50 19 46.42 19 42c0-4.417 3.584-8 7.998-8H34v-7.002C34 22.58 37.58 19 42 19c4.417 0 8 3.584 8 7.998V34h7.002C61.42 34 65 37.58 65 42c0 4.417-3.584 8-7.998 8H50z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }
</style>

<header>
  <div>
    <div id="headerr">
      <ul class="nav">

        <li><img src="../../image/logo_inicio.ico" width="65" height="65" style="margin-left: 10px" /></li>
        <li>
          <h4 style="color: white; font-size: 20px; margin-top: 20px; margin-left: 10px"><b>Coevaluación de Docentes</b></h4>
        </li>
      </ul>
    </div>
</header>


<body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <div id="inicio_admin" class="menu-collapsed">
    <div id="header">

      <div id=menu-btn>
        <div class="btn-inicio"></div>
        <div class="btn-inicio"></div>
        <div class="btn-inicio"></div>
      </div>

    </div>

    <div id="profile">
      <div id="photo"><img src="../image/usuario.png" /></div>
      <div id="name"><span><b>Bienvenido:</b> <br>
          <div style="margin-top: 13px">
            <h4 style="color: white; font-size: 16px"><b><span class="fa fa-user icon-menu" style="margin-right: 5px"></span><?php echo $_SESSION['usu']['usuario'] ?></b></h4>
        </span></div>
    </div>
  </div>

  <div id="menu-items">
    <div class="item">
      <ul>
        <li><a href="../docente.php">
            <div class="icon"><i class="fa fa-home"></i></div>
            <div class="title"><b>Inicio</b></div>
          </a>
        </li>


        <div class="item separator">
        </div>
        <li><a href="../usuarios/cambiarclave.php">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="title">Perfil de Usuario</div>

          </a>
        </li>



        <div class="item separator">
        </div>

        <li><a href="../cerrar.php">
            <div class="icon"><i class="fa fa-close"></i></div>
            <div class="title"><b>Salir</b></div>
          </a></li>
      </ul>
    </div>
  </div>
  </div>
  <script>
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('#inicio_admin');
    btn.addEventListener('click', e => {
      menu.classList.toggle("menu-expanded");
      menu.classList.toggle("menu-collapsed");

      document.querySelector('body').classList.toggle('body-expanded');
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.item > ul > li:has(ul)').addClass('desplegable');
      $('.item > ul > li > a').click(function() {
        var comprobar = $(this).next();
        $('.item li').removeClass('active');
        $(this).closest('li').addClass('active');
        if ((comprobar.is('ul')) && (comprobar.is(':visible'))) {
          $(this).closest('li').removeClass('active');
          comprobar.slideUp('normal');
        }
        if ((comprobar.is('ul')) && (!comprobar.is(':visible'))) {
          $('.item ul ul:visible').slideUp('normal');
          comprobar.slideDown('normal');
        }
      });
      $('.item > ul > li > ul > li:has(ul)').addClass('desplegable');
      $('.item > ul > li > ul > li > a').click(function() {
        var comprobar = $(this).next();
        $('.item ul ul li').removeClass('active');
        $(this).closest('ul ul li').addClass('active');
        if ((comprobar.is('ul ul')) && (comprobar.is(':visible'))) {
          $(this).closest('ul ul li').removeClass('active');
          comprobar.slideUp('normal');
        }
        if ((comprobar.is('ul ul')) && (!comprobar.is(':visible'))) {
          $('.item ul ul ul:visible').slideUp('normal');
          comprobar.slideDown('normal');
        }
      });
    });
  </script>
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
    </script>
    <section>
      <div align="center">
        <div class="container-form" style="border: 2px solid #270D07;  
                                            color: #ffffff; 
                                            border-radius: 12px; /* Bordes curvos */
                                            padding: 16px; /* Espacio interno para mejorar el aspecto */
                                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra suave */">
          <div class="header">
            <div class="logo-title">
              <style type="text/css">
                .icon4 {
                  color: white;
                  font-size: 20px;
                  vertical-align: middle;
                  margin-left: 90px;
                  margin-top: 10px;

                }

                textarea {
                  color: black;
                  font-size: 15px;
                  vertical-align: middle;
                  border-radius: 5px;
                  border: solid 1px #212127;


                  text-align: left;


                }
              </style>
              <div class="icon"><i class="icon5 fa fa-edit" style="margin-top: 10px;"></i></div>
              <h2 style="color: white; font-size: 20px; margin-top: 10px; margin-left: 5px;"><b>Formulario de Envío de Datos</b> </h2><a style="display: inline-block;" href="convertidor.php"><i class="icon4 fa fa-close"></i></a>
            </div>
          </div>

          <form action="" method="post" class="form">

            <br><br>
            <h4 style="font-size: 14px;text-align: left;margin-left: 15px; color:black;">RECOMENDACIÓN PARA EL EVALUADOR:</h4>
            <br>
            <textarea name="recomendacion" id="recomendacion" required style="height: 90px; width: 475px"></textarea>




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
            <button style="display: inline-block;" type="submit" name="guardar" value="Guardar"><i class="icon3 fa fa-file"></i> Registrar</button>

          </form>

        </div>
      </div>
      </div>
    </section>
</body>

</html>