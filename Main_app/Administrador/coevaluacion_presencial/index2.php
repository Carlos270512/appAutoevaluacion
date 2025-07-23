<!DOCTYPE html>
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


<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_ES.UTF-8');
$fecha = date("d-m-Y");

$docente = $_SESSION['usu']['nombre'];
$tipo = $_SESSION['usu']['tipo'];
?>
<html lang="es">

<head>
  <title>Evaluacion de Responsabilidades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
  <link rel="stylesheet" href="../css3/iconos.css?v=1">
  <link rel="stylesheet" href="../../css/tabla.css?v=2">
  <link rel="stylesheet" href="form.css?v=3">
  <link rel="stylesheet" href="estilo.css?v=4">
  <link rel="stylesheet" href="assets/css/styles.css?v=5">
  <link rel="stylesheet" href="../bod.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

  <section class="contenido wrapper">
    <div>
      <div class="welcome">
        <form action="enviar_reporte/enviar.php" method="POST" onsubmit="return validarSeleccion();">
          <h2>
            <div style="text-align: center; margin-bottom: 30px;" class="page-header">
              <div id="logo" style="margin-left: -50rem; width: 75px; height: 75px; padding-top: 30px;">
                <img src="../image/logo_inicio.ico" style="width: 75px; height: 75px;" />
              </div>
              <h2 style=" font-size:26px; margin-top: -20px;"><b>FICHAS DE EVALUACIONES DE RESPONSABILIDAD</b></h2>
            </div>
          </h2><br>

          <table cellpadding="2" cellspacing="0" style="width: 200px; font-family: Arial, sans-serif;border: 2px solid #2c4073; border-radius: 50%; text-align: center">

            <tr style="background: #f2b440;color: white">
              <th colspan="8" style="height: 300px; overflow: auto;">
                <div style="height: 300px;">
                  <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                    <div style="width: 480px; height: 80px;padding: 20px;">
                      <label for="Label1" id="Label1" style="font-size: 17px; margin-right: 40px; margin-left: -10px">FECHA:</label>
                      <input style="width: 250px; height: 30px;" class="texto" type="datatime" readonly="" name="fecha" size="60" placeholder="<?= $fecha ?>" />
                    </div>

                    <div style="width: 480px; height: 80px; padding: 20px;">
                      <label for="coeval" id="Label2" required="" style="font-size: 17px; margin-right: 10px; margin-left: -23px;">FORMULARIOS:</label>
                      <select id="coeval" name="coeval" style="width: 310px; height: 30px;" required="" onchange="select_formulario();">
                        <option value="">ELIGE UNA OPCIÓN</option>
                        <option value="GESTIÓN DE LOS COORDINADORES/DOCENTES">GESTIÓN DE LOS COORDINADORES/DOCENTES</option>
                        <option value="GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS">GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS</option>
                        <option value="RESPONSABLES DE PRÁCTICAS LABORALES">RESPONSABLES DE PRÁCTICAS LABORALES</option>
                        <option value="GESTION DE SOMOS TUVN EN LOS DOCENTES">GESTION DE SOMOS TUVN EN LOS DOCENTES</option>
                      </select>
                    </div>

                  </div>
                  <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                    <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                      <input type="hidden" name="coordinador" class="contenido-input2" required="" readonly="" value="<?php echo $_SESSION['usu']['id'] ?>">
                      <label for="busqueda" id="Label5" style="font-size: 17px; margin-right: 30px; margin-left: -50px"> COD DOCENTE:</label>
                      <script>
                        $(document).ready(function() {
                          $("#resultadoBusqueda").html('');
                        });

                        function buscar() {
                          var textoBusqueda = $("input#busqueda").val();

                          if (textoBusqueda != "") {
                            $.post("php/buscar.php", {
                              valorBusqueda: textoBusqueda
                            }, function(mensaje) {
                              $("#resultadoBusqueda").html(mensaje);
                            });
                          } else {
                            $("#resultadoBusqueda").html('');
                          };
                        };
                      </script>

                      <form accept-charset="utf-8" method="POST">
                        <input style="width: 250px; height: 30px;" type="text" name="busqueda" id="busqueda" class="texto" onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();buscar();">
                      </form>
                    </div>

                    <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                      <label for="videos" id="Label5" style="font-size: 17px; margin-right: 50px; margin-left: -25px;"> CARRERA:</label>
                      <script type="text/javascript">
                        function select_formulario() {

                          var select = document.getElementById("coeval");
                          var labelAula = document.getElementById("labAula");
                          var labelCompromiso = document.getElementById("compromiso2");
                          var inputCompromiso1 = document.getElementById("compromiso");


                          if (select.value === "GESTIÓN DE LOS COORDINADORES/DOCENTE") {
                            labAula.style.display = "none";
                            labActividad.style.display = "none";

                            labelCompromiso.style.display = "block";
                            labelCompromiso.setAttribute("required", "true");
                          } else if (select.value === "GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS") {
                            labAula.style.display = "block";

                            labelCompromiso.style.display = "block";
                            labelCompromiso.setAttribute("required", "true");
                          } else if (select.value === "RESPONSABLES DE PRÁCTICAS LABORALES") {
                            labAula.style.display = "none";

                            labelCompromiso.style.display = "block";
                            labelCompromiso.setAttribute("required", "true");
                          } else if (select.value === "GESTION DE SOMOS TUVN EN LOS DOCENTES") {
                            labAula.style.display = "none";

                            labelCompromiso.style.display = "none";
                            inputCompromiso1.removeAttribute("required");
                          } else {
                            labAula.style.display = "none";

                            labelCompromiso.style.display = "block";
                            labelCompromiso.setAttribute("required", "true");
                          }



                          var nombre = $("#videos").val();
                          var coeval = $("#coeval").val();
                          var aula = $("#aula").val();

                          var ob2 = {
                            nombre: nombre,
                            coeval: coeval,
                            aula: aula
                          };

                          $.ajax({
                            type: "POST",
                            url: "php/getformulario.php",
                            data: ob2,
                            beforeSend: function(objeto) {

                            },
                            success: function(data) {
                              $("#panel_selector2").html(data);
                            }
                          });
                        }
                      </script>

                      <script>
                        function validarSeleccion() {
                          function validarSeleccion() {
                            var select = document.getElementById("videos");
                            if (select.value === "") {
                              alert("Por favor, elige una opción diferente de 'ELIGE UNA OPCIÓN'.");
                              return false; // Detiene el envío
                            }
                            return true; // Permite el envío
                          }

                        }
                      </script>
                      <!--COMBO CARRERA -->
                      <select id="videos" name="carrera" class="texto" required="" style="width: 310px; height: 30px;">
                        <?php
                        $mysqli = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
                        ?>
                        <option value="">ELIGE UNA OPCIÓN</option>
                        <?php
                        $query = $mysqli->query("SELECT nombre FROM carreras ORDER BY nombre ASC");
                        while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                    <div style="width: 480px; height: 80px; margin-top: 20px; padding: 20px;">
                      <label for="Label2" style="font-size: 17px; margin-right: 40px; margin-left: -20px">NOMBRE:</label>
                      <input type="" id="Label2" class="texto" required="" readonly="" style="width: 250px; height: 30px;">
                      <div id="resultadoBusqueda" style="position: none;"></div>
                    </div>

                    <div id="labAula" style="width: 480px; height: 80px; margin-top: 20px; display: none;">
                      <label for="aula" id="titulo" name="titulo" style="font-size: 17px; margin-left: -10px;">TALLER / LABORATORIO:</label><br>
                      <input type="text" id="aula" name="aula" style="width: 250px; height: 30px;">
                    </div>


                    <input type="hidden" name="tipo" class="contenido-input2" required="" readonly="" value="AULA">
                  </div>
                </div>
              </th>
            </tr>
          </table>

          <!-- AQUI SE PRESENTAN LOS DATOS DEL AJAX SEGUN SE SELECCIONES LAS CARReeras BLoque de preguntas 1 -->

          <div id="panel_selector2" style="margin-top: -20px;"> </div>

          <div id="formularioContainer"></div>



          <!-- PRESENTA EL RESULTADO FINAL -->


          <table id="Table8" style="border: #270D07 3px solid; margin-top: -40px; width: 30px; height: 50px;">

            <tr>
              <td colspan="2" style="background: #914a31;color: white; padding-left:70px; padding-right:70px;"><b>PUNTAJE FINAL</b></td>
              <td style="background: #914a31;color: white;">
                <div style="text-align: center;">
                  <h4>
                    <textarea style="text-align:center; " name="resultado_final" id="el_resultadofinal" readonly required></textarea>
                  </h4>
                </div>
              </td>
            </tr>
          </table>

          <p style="position: relative; margin-bottom: 60px; font-size: 15px">
            <label for="textarea"><b>OBSERVACIONES:</b></label>
            <!--<textarea class="col-md-7 col-md-offset-3" name="observaciones" id="observaciones" required style="margin-bottom: 15px; height: 45px; width: 515px"></textarea>-->
          </p>
          <p style="position: relative; margin-bottom: 60px;">
            <label for="textarea" style="margin-bottom: 8px; ">FORTALEZAS:</label><br>
            <textarea name="fortalezas" id="fortalezas" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"></textarea>
          </p>
          <p>
          <p style="position: relative; margin-bottom: 60px;">
            <label for="textarea" style="margin-bottom: 8px;">DEBILIDADES:</label><br>
            <textarea name="debilidades" id="debilidades" required style="margin-bottom: 15px; height: 45px; width: 515px; border: #f2b440 3px solid;"></textarea>
          </p>

          <div id="compromiso2">
            <p style="position: relative; margin-bottom: 60px;">
              <label for="compromiso" style="margin-bottom: -20px;">COMPROMISO DE MEJORA:</label><br><br>
              <textarea name="compromiso" id="compromiso" required="true" style="height: 45px; width: 515px; border: #f2b440 3px solid;"></textarea>
            </p>
          </div>

          <tr>
            <table></table>
          </tr>

          <!-- BOTON DE ENVIO DE FORMULARIO  A BASE DE DATOS -->

          <td>&nbsp;</td>
          <td>

            <div style="margin-top: -5em;">

              <button type="submit" id="enviar" class="button" value="Registrar"><i class="icon3 fa fa-file"></i> Registrar</button>

            </div>
        </form>
      </div>
    </div>


  </section>

  <script>
    /* <
         !--FUNCION PARA BLOQUEAR LETRAS-- > */
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


    /*     !--FUNCION PARA BLOQUEAR NUMEROS-- > */
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

    /*funcion para calcular radiobutton*/
    function resultado() {
      var fin = "no";
      var a = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('a' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              a += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox1').innerHTML = "resultado:" + a; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox1').innerHTML = (Math.round((a) * 100) / 100).toFixed(2);

    }

    function resultado4() {
      var fin = "no";
      var d = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('d' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              d += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox4').innerHTML = "resultado:" + d * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox4').innerHTML = (Math.round((d) * 100) / 100).toFixed(2);
    }

    function resultado5() {
      var fin = "no";
      var f = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('f' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              f += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox5').innerHTML = "resultado:" + f * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox5').innerHTML = (Math.round((f) * 100) / 100).toFixed(2);
    }

    function resultado7() {
      var fin = "no";
      var h = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('h' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              h += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox7').innerHTML = "resultado:" + h * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox7').innerHTML = (Math.round((h) * 100) / 100).toFixed(2);
    }

    function resultado9() {
      var fin = "no";
      var i = 0;
      x = 1;
      while (fin == "no") {
        g = document.getElementsByName('i' + x);
        if (g.length != 0) {
          for (y = 0; y < g.length; y++) {
            e = 0;
            if (g[y].checked == true) {
              i += parseFloat(g[y].value);
              e = 1;
              break;
            }
          }

        } else {
          fin = "si";
        }
        x++;
      }
      document.getElementById('resultadox9').innerHTML = "resultado:" + i * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox9').innerHTML = (Math.round((i) * 100) / 100).toFixed(2);
    }


    /**funcion total**/
    function resultadofinal() {
      var aa = document.getElementById('resultadox1').value;

      if (aa == null || aa == "") aa = 0;

      var rf = (parseFloat(aa)).toFixed(2);
      var regla3 = (rf * 100) / (9);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el_resultadofinal').value = regla3;
    }

    function resultadofinald() {
      var bb = document.getElementById('resultadox4').value;

      if (bb == null || bb == "") bb = 0;

      var rf = (parseFloat(bb)).toFixed(2);
      var regla3 = (rf * 100) / (8);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el_resultadofinal').value = regla3;
    }

    function resultadofinalf() {
      var ff = document.getElementById('resultadox5').value;

      if (ff == null || ff == "") ff = 0;

      var rf = (parseFloat(ff)).toFixed(2);
      var regla3 = (rf * 100) / (4);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el_resultadofinal').value = regla3;
    }

    function resultadofinali() {
      var hh = document.getElementById('resultadox7').value;
      var ii = document.getElementById('resultadox9').value;

      if (hh == null || hh === "") hh = 0;
      if (ii == null || ii === "") ii = 0;

      // Mostrar u ocultar la segunda tabla en función del valor de hh
      if (parseFloat(hh) >= 4) {
        document.getElementById('segundaTabla').style.display = 'table';
      } else {
        document.getElementById('segundaTabla').style.display = 'false';
        resetSegundaTabla();
        document.getElementById('el_resultadofinal').value = '0.00'; // Establece el resultado en 0 si hh < 4
        return; // Salir de la función para evitar cálculos adicionales
      }

      // Si la segunda tabla está visible, calcula el promedio entre hh e ii
      var rf = ((parseFloat(hh) + parseFloat(ii)) / 2).toFixed(2);
      document.getElementById('el_resultadofinal').value = rf;
    }

    // Función para limpiar las selecciones de la segunda tabla y establecer el resultado en 0
    function resetSegundaTabla() {
      // Selecciona todos los radio buttons en la segunda tabla
      var radios = document.querySelectorAll('#segundaTabla input[type="radio"]');

      // Recorre cada radio button y selecciona el que tiene el valor "0"
      radios.forEach(function(radio) {
        if (radio.value === "0") {
          radio.checked = true;
          resultado9();
        }
      });

      // Restablece el valor de el_resultadofinal a '0.00'
      document.getElementById('el_resultadofinal').value = '0.00';
    }
  </script>

<script src="assets/js/main.js"></script>
</body>

</html>