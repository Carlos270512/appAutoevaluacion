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
include_once 'conexion.php';

$sentencia_select = $con->prepare('SELECT * FROM carreras  ORDER BY nombre ASC');
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();

// metodo buscar
if (isset($_POST['btn_buscar'])) {
  $buscar_text = $_POST['buscar'];
  $select_buscar = $con->prepare(
    '
			SELECT * FROM carreras WHERE codigo LIKE :campo OR codigo LIKE :campo;'
  );

  $select_buscar->execute(array(
    ':campo' => "%" . $buscar_text . "%"
  ));

  $resultado = $select_buscar->fetchAll();
}

$docente = $_SESSION['usu']['nombre'];
$tipo = $_SESSION['usu']['tipo'];
?>

<html>

<head>
  <title>Coordinadores Registrados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />

  <link rel="stylesheet" href="../css3/iconos.css?v=1">
  <link rel="stylesheet" href="css/estilo.css?v=2">
  <link rel="stylesheet" href="botones.css?v=3">
  <link rel="stylesheet" href="../assets/css/styles.css?v=4">
  <link rel="stylesheet" href="../bod.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
    <div class="contenedor">
      <div class="logo-title">
        <div class="icon" style="width: 50px; height: 50px; font-size: 35px; margin-top: 10px; margin-left: 60px;"><i class="icon5 fa fa-university"></i></div>
        <h2 style="color: black; font-size: 28px; margin-top: -25px; margin-left: 10px;"><b>Carreras Registradas</b> </h2>
      </div>
      <table id="example" class="hover" class="display" style="width:50%; border: #f2b440 2px solid;">
        <thead class="tabla" style="color: black">
          <tr class="head" style="background-color: #914a31;">
            <th style="text-align: center;">CÓDIGO</th>
            <th style="text-align: center;">CARRERA</th>
            <th style="text-align: center;">EDITAR</th>
            <th style="text-align: center;">ELIMINAR</th>
          </tr>
        </thead>
        <tbody style="background-color: #fff;">
          <?php foreach ($resultado as $fila): ?>
            <tr style="color: black;">
              <td style="font-size: 12px"><?php echo $fila['codigo']; ?></td>
              <td style="width: 430px;font-size: 12px"><?php echo $fila['nombre']; ?></td>

              <td>
                <div align='center'>
                  <a href="update.php?id=<?php echo $fila['id']; ?>" class="botones botones-edit">
                    <i class='fa fa-edit'></i>
                  </a>
                </div>
              </td>
              <td style="width: 110px">
                <div align="center">
                  <a href="delete.php?id=<?php echo $fila['id']; ?>" onclick="return confirmation()" class="botones botones-delete"><i class="icon3 fa fa-trash-o"></i></a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr class='noSearch hide' style="background-color: #914a31;">
            <th style="text-align: center;">CÓDIGO</th>
            <th style="text-align: center;">CARRERA</th>
            <th style="text-align: center;">EDITAR</th>
            <th style="text-align: center;">ELIMINAR</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </section>
  <script type="text/javascript">
    <!--
    function confirmation() {
      if (!confirm("¿Realmente desea eliminar este registro?")) return false;
    }
    //
    -->
  </script>
  <script src="../assets/js/main.js"></script>
</body>

</html>