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
?>
<!--<!doctype html>-->
<html>
<title>Lista de Reportes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="../../image/logo_inicio.ico" />


<link rel="stylesheet" href="../css3/iconos.css">
<link rel="stylesheet" href="../diseño.css">
<link rel="stylesheet" href="../css3/main.css">
<link rel="stylesheet" href="../css3/style.css">

<link rel="stylesheet" href="css/estilo.css">
<script src="myjava.js"></script>

<style>
  #headerr {
    width: 100%;
    padding: 2px;
    height: 68px;
    background-color: #512c05;
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

  body {
    background-image: url(image/fondo.jpg);
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


  .cont {
    width: 100%;
    max-width: 1500px;
    margin: 40px auto;
    overflow: hidden;
  }

  .cont .icon5 {
    color: black;
    margin-top: 12px;
    font-size: 25px;
    vertical-align: middle;
  }

  .cont .icon6 {
    color: black;
    font-size: 25px;
    vertical-align: middle;
  }

  .container-form .form .user .icon2 {
    color: #4A220C;
    font-size: 25px;
    vertical-align: middle;
  }

  .container-form .form .password .icon2 {
    color: #4A220C;
    font-size: 25px;
    vertical-align: middle;
  }

  .contenedor .user {
    color: black;
    font-size: 15px;
    vertical-align: middle;
    width: 275px;
    height: 32px;
    border-radius: 5px;
    border: solid 1px #212127;
    margin-left: 15px;
    margin-right: 15px;
    margin-top: 20px;
    margin-bottom: 50px;
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
    background-color: #efefef;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-left: 10px
  }

  table .head {
    background: #2c4073;
  }

  table .head td {
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    font-size: 15px;
    text-align: center;
  }

  table tr td {
    border: 1px solid gray;
    padding: 8px;
    font-size: 14px;
    text-align: center;
  }

  tr:hover {
    background: #566792;
    color: white;
    transition: .2s ease-in;
  }

  tr:first-child {
    background: #2c4073;
    color: white;
    transition: .2s ease-in;
  }

  body {
    background-size: 4%;
    background-position: center;
    background-color: #f7f8ba;
    background-image: url("data:image/svg+xml,%3Csvg width='84' height='84' viewBox='0 0 84 84' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d1c1ac' fill-opacity='0.5'%3E%3Cpath d='M84 23c-4.417 0-8-3.584-8-7.998V8h-7.002C64.58 8 61 4.42 61 0H23c0 4.417-3.584 8-7.998 8H8v7.002C8 19.42 4.42 23 0 23v38c4.417 0 8 3.584 8 7.998V76h7.002C19.42 76 23 79.58 23 84h38c0-4.417 3.584-8 7.998-8H76v-7.002C76 64.58 79.58 61 84 61V23zM59.05 83H43V66.95c5.054-.5 9-4.764 9-9.948V52h5.002c5.18 0 9.446-3.947 9.95-9H83v16.05c-5.054.5-9 4.764-9 9.948V74h-5.002c-5.18 0-9.446 3.947-9.95 9zm-34.1 0H41V66.95c-5.053-.502-9-4.768-9-9.948V52h-5.002c-5.184 0-9.447-3.946-9.95-9H1v16.05c5.053.502 9 4.768 9 9.948V74h5.002c5.184 0 9.447 3.946 9.95 9zm0-82H41v16.05c-5.054.5-9 4.764-9 9.948V32h-5.002c-5.18 0-9.446 3.947-9.95 9H1V24.95c5.054-.5 9-4.764 9-9.948V10h5.002c5.18 0 9.446-3.947 9.95-9zm34.1 0H43v16.05c5.053.502 9 4.768 9 9.948V32h5.002c5.184 0 9.447 3.946 9.95 9H83V24.95c-5.053-.502-9-4.768-9-9.948V10h-5.002c-5.184 0-9.447-3.946-9.95-9zM50 50v7.002C50 61.42 46.42 65 42 65c-4.417 0-8-3.584-8-7.998V50h-7.002C22.58 50 19 46.42 19 42c0-4.417 3.584-8 7.998-8H34v-7.002C34 22.58 37.58 19 42 19c4.417 0 8 3.584 8 7.998V34h7.002C61.42 34 65 37.58 65 42c0 4.417-3.584 8-7.998 8H50z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }

  .btn__env {
    width: 75px;
    height: 35px;
    display: block;
    color: white;
    background: #0D1A4D;
    border-style: none;
    border-radius: 15px;
    font-size: 11px;
    font-weight: bold;
    cursor: pointer;
    padding: 6px;
  }

  .btn__env:hover {
    background-color: #1C2859;
    color: white;
  }

  .btn__upd {
    width: 75px;
    height: 35px;
    display: block;
    color: white;
    background: #02601B;
    border-style: none;
    border-radius: 15px;
    font-size: 11px;
    font-weight: bold;
    cursor: pointer;
    padding: 6px;
  }

  .btn__upd:hover {
    background-color: #247728;
    color: white;
  }

  .btn__del {
    width: 75px;
    height: 35px;
    display: block;
    color: white;
    background: #BC0404;
    border-style: none;
    border-radius: 15px;
    font-size: 11px;
    font-weight: bold;
    cursor: pointer;
    padding: 6px;
  }

  .btn__del:hover {
    background-color: #BF2525;
    color: white;
  }

  .button2 {
    width: 185px;
    height: 35px;
    color: white;
    background: #02601B;
    border-style: none;
    border-radius: 15px;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
    padding: 6px;



  }

  .button2:hover {
    background-color: #247728;
    color: white;
  }

  .button {
    width: 90px;
    height: 35px;
    color: white;
    background: #0D1A4D;
    border-style: none;
    border-radius: 15px;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
    padding: 6px;
    margin-left: 20px;
    top: 194px;

  }

  .button:hover {
    background-color: #1C2859;
    color: white;
  }

  #contenedor {
    display: inline-block;
    min-width: 100px;
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
        <li><a href="../administrador.php">
            <div class="icon"><i class="fa fa-home"></i></div>
            <div class="title"><b>Inicio</b></div>
          </a>
        </li>

        <div class="item separator">
        </div>
        <li><a href="../coordinadores/cambiarclave.php">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="title">Perfil de Usuario</div>

          </a>
        </li>
        <div class="item separator">
        </div>

        <li><a href="javascript:void();">
            <div class="icon"><i class="fa fa-file-text-o"></i></div>
            <div class="title"><b>Registrar</b></div>
            <div class="icon"><i style="font-size: 12px;" class="fa fa-chevron-down"></i></div>
          </a>
          <ul>

            <li><a href="../register.php">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="title">Usuarios</div>
              </a></li>
            <li><a href="../register2.php">
                <div class="icon"><i class="fa fa-calendar"></i></div>
                <div class="title">Periodos</div>
              </a></li>
            <li><a href="../register3.php">
                <div class="icon"><i class="fa fa-university"></i></div>
                <div class="title">Carreras</div>
              </a></li>
          </ul>
        </li>

        <div class="item separator">
        </div>

        <li><a href="javascript:void();">
            <div class="icon"><i class="fa fa-edit"></i></div>
            <div class="title"><b>Editar</b></div>
            <div class="icon"><i style="font-size: 12px;" class="fa fa-chevron-down"></i></div>
          </a>
          <ul>

            <li><a href="../coordinadores/index.php">
                <div class="icon"><i class="fa fa-suitcase"></i></div>
                <div class="title">Coordinadores</div>
            </li>
            <li><a href="../docentes/index.php">
                <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                <div class="title">Docentes</div>
            </li>
            <li><a href="../periodos/index.php">
                <div class="icon"><i class="fa fa-calendar"></i></div>
                <div class="title">Períodos</div>
            </li>
            <li><a href="../carreras/index.php">
                <div class="icon"><i class="fa fa-university"></i></div>
                <div class="title">Carreras</div>
            </li>
          </ul>
        </li>

        <div class="item separator">
        </div>

        <li><a href="javascript:void();">
            <div class="icon"><i class="fa fa-suitcase icon-menu"></i></div>
            <div class="title"><b>Coevaluación</b></div>
            <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div>
          </a>
          <ul>
            <li><a href="../coevaluacion_presencial/index2.php">
                <div class="icon"><i class="fa fa-desktop"></i></div>
                <div class="title">Aula</div>
              </a>

            </li>
          </ul>
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
      <div class="logo-title" style="margin-top: 60px;margin-bottom: 35px;">
        <div class="icon"><i class="icon5 fa fa-files-o"></i></div>
        <h2 style="color: black; font-size: 30px;"><b>Lista de Reportes
          </b> </h2>
      </div>
      <style type="text/css">
        .cont .user {
          color: black;
          font-size: 15px;
          vertical-align: middle;
          width: 180px;
          height: 35px;
          border-radius: 5px;
          border: solid 1px #212127;

          margin-right: 20px;
          top: 167px;

        }

        .cont .user2 {
          color: black;
          font-size: 15px;
          vertical-align: middle;
          width: 220px;
          height: 32px;
          border-radius: 5px;
          border: solid 1px #212127;

          margin-left: 10px;
          margin-top: 10px;
          top: 193px;
          ;
        }

        .cont .user3 {
          color: black;
          font-size: 15px;
          vertical-align: middle;
          width: 180px;
          height: 35px;
          border-radius: 5px;
          border: solid 1px #212127;
          margin-left: 5px;
          top: 167px;

        }
      </style>

      <style type="text/css">
        i {
          color: white;
          font-size: 15px;
          vertical-align: middle;
          margin-bottom: 3px;
        }

        .logo-title2 {
          display: inline-block;

          margin-left: 10px;
        }

        .button3 {
          width: 185px;
          height: 35px;
          color: white;
          background: #BC0404;
          border-style: none;
          border-radius: 15px;
          font-size: 13px;
          font-weight: bold;
          cursor: pointer;
          padding: 10px;
          margin-left: 25px;
          margin-top: 10px;

        }

        .button3:hover {
          background-color: #BF2525;
          color: white;
        }
      </style>

      <?php
      $coordinador = $_REQUEST['coordinador'];
      $fecha_inicio = $_REQUEST['fecha_inicio'];
      $fecha_final = $_REQUEST['fecha_final'];

      echo "Coordinador: " . $coordinador . "<br>";

      if (empty($coordinador) && empty($fecha_inicio) && empty($fecha_final)) {
        header("location: convertidor.php");
      }
      ?>
      <div class="logo-title2">
        <form method="post" action="reporte2.php" style="display: block;">



          <form action="buscar.php" method="get">
            <div class="icon" style="display: inline-block;"><i class="icon6 fa fa-search"></i>
              <input id="coordinador" name="coordinador" readonly="" value="<?php echo $coordinador; ?>" type="text" style="font-size: 13px" class="user2">
            </div>
            <label for=fecha_inicio style="font-size:14px;position: relative; top:-35;left: 36px;"><b>FECHA DE INICIO:</b> </label>
            <input type="date" style="position: relative;top:-2px; left: -90px;" class="user" value="<?php echo $fecha_inicio; ?>" id="fecha_inicio" name="fecha_inicio" readonly="">
            <label for=fecha_final style="font-size:14px;position: relative; top:-35;left: -73px; "><b>FECHA FIN:</b> </label>
            <input type="date" style="position: relative; top:-2;left: -160px; " class="user3" value="<?php echo $fecha_final; ?>" id="fecha_final" name="fecha_final" readonly="">

            <button class="button2" type="submit" style="position: relative; top:0;left: -130px; " name="generar_reporte"><i class="fa fa-file-excel-o"></i> Generar Excel Periódico</button>

          </form>
          <a href="convertidor.php" class="button3" style="position: relative;top:-37px; left: 930px;"><i class="fa fa-files-o"></i> Ver Todos los Reportes</a>
      </div>

      <table id="datos" style="border: #270D07 3px solid;margin-top: 20px;">
        <thead class="tabla">
          <tr class="head">
            <td style="font-size: 12px">FECHA</td>
            <td style="font-size: 12px">COORDINADOR</td>
            <td style="font-size: 12px">DOCENTE</td>
            <td style="font-size: 12px">CARRERA</td>
            <td style="font-size: 12px">COEVALUACION</td>

            <td colspan="3" style="font-size: 12px">OPCIONES</td>
          </tr>
          <tr></tr>
          <style type="text/css">
            i {
              color: white;
              font-size: 15px;
              vertical-align: middle;
            }
          </style>
          <?php
          $conexion = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

          $sentencia = "
                        SELECT 
                          g.id, 
                          g.fecha, 
                          l.nombre AS nombre_coordinador, 
                          g.docente, 
                          g.coevaluacion, 
                          g.carrera 
                        FROM 
                            coevaluacion_general g
                        JOIN 
                            login l ON g.id_coordinador = l.id
                        WHERE 
                            l.usuario = '$coordinador' 
                            AND g.fecha BETWEEN '$fecha_inicio' AND '$fecha_final'
                        ORDER BY 
                        g.fecha ASC";

          $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));
          while ($fila = $resultado->fetch_assoc()) {
            $newDate = date("d/m/Y", strtotime($fila['fecha']));
            echo "<tr>";
            echo "<td width='90px'>";
            echo $newDate;
            echo "</td>";
            echo "<td style='font-size: 12px;'>";
            echo $fila['nombre_coordinador'];
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


            echo "<td><div align='center'><a href='fichapdf.php?id=" . $fila['id'] . "' target='_blank'><button type='button' class='btn__del'><i class='icon3 fa fa-file-pdf-o'></i> Generar PDF</button></a></div></td>";

            echo "<td><div align='center'><a href='1modif_prod1.php?id=" . $fila['id'] . "&texto=$textoCompleto" . "&texto1=$textoCompleto1'> <button type='button' class='btn__upd'><i class='icon3 fa fa-edit'></i> Editar</button> </a></div></td>";

            echo "<td><div align='center'><a href='1eliminar_prod.php?id=" . $fila['id'] . "'><button type='button' onclick='return confirmation()' class='btn__env'><i class='icon3 fa fa-trash-o'></i> Eliminar</button></a></div> </td>";
            echo "</tr>";
          }


          echo ' </thead>';
          echo '<tr class="noSearch hide">';
          echo '  <td colspan="22" height="34px" style="background: #2c4073;color: white"></td>';
          echo '</tr>';
          echo ' </table>';

          ?>
    </div>

  </section>


  <script type="text/javascript">
    function confirmation() {
      if (!confirm("¿Realmente desea eliminar este registro?")) return false;
    }
  </script>

</body>

</html>