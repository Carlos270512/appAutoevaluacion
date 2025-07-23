<!doctype html>
<?php

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
  <link rel="stylesheet" href="../css3/iconos.css">
  <link rel="stylesheet" href="../../css/tabla.css">
  <link rel="stylesheet" href="form.css">
  <link rel="stylesheet" href="estilo.css">
  <link rel="stylesheet" href="assets/css/styles.css?v=1">
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
                      <i class="ph ph-hard-drives"></i>
                      <a href="../reporte_presencial/pdfSubida1.php" class="nav__link">Almacenamiento</a>
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
                  <a href="../reporte_presencial/convertidor.php" class="dropdown__link">
                    <i class="icon ph-bold ph-file"></i>
                    <span>Reporte de Evaluación</span>
                  </a>
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

  <section class="contenido wrapper">
    <div style="width: 1535px; height: 2400px;">
      <div class="welcome">
        <form action="enviar_reporte/enviar.php" method="POST">
          <h2>
            <div align="center" class="page-header" style="margin-bottom: 30px;">
              <div id="logo" style="margin-left: -50rem; width: 75px; height: 75px; padding-top: 30px;">
                <img src="../image/logo_inicio.ico" style="width: 75px; height: 75px;" />
              </div>
              <h2 style=" font-size:26px; margin-top: -20px;"><b>FICHA DE EVALUACION DE RESPONSABILIDADES</b></h2>
            </div>
          </h2><br>
          <table cellpadding="2" cellspacing="0" style="width: 200px; font-family: Arial, sans-serif;border: 2px solid #2c4073; border-radius: 50%; text-align: center">

            <tr style="background: #f2b440;color: white">
              <th height="300" colspan="8" style="height: 300px; overflow: auto;">
                <div style="height: 300px;">
                  <div style="display: flex; flex-direction: row; align-items: center; gap: 50px;">
                    <div style="width: 480px; height: 80px;padding: 20px;">
                      <label for="" id="Label1" style="font-size: 17px; margin-right: 40px; margin-left: -10px">FECHA:</label>
                      <input style="width: 250px; height: 30px;" class="texto" type="datatime" readonly="" name="fecha" size="60" placeholder="<?= $fecha ?>" />
                    </div>

                    <div style="width: 480px; height: 80px; padding: 20px;">
                      <label for="" id="Label2" required="" style="font-size: 17px; margin-right: 10px; margin-left: -23px;">FORMULARIOS:</label>
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
                      <label for="Label" id="Label5" style="font-size: 17px; margin-right: 30px; margin-left: -50px"> COD DOCENTE:</label>
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
                      <label for="Label" id="Label5" style="font-size: 17px; margin-right: 50px; margin-left: -25px;"> CARRERA:</label>

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
                      <label for="" id="Label2" style="font-size: 17px; margin-right: 40px; margin-left: -20px">NOMBRE:</label>
                      <input type="" class="texto" required="" readonly="" style="width: 250px; height: 30px;">
                      <div id="resultadoBusqueda" style="position: none;"></div>
                    </div>

                    <div id="labAula" style="width: 480px; height: 80px; margin-top: 20px; display: none;">
                      <label for="aula" style="font-size: 17px; margin-left: -10px;">TALLER / LABORATORIO:</label><br>
                      <input type="text" name="aula" style="width: 250px; height: 30px;">
                    </div>

                    <input type="hidden" name="tipo" class="contenido-input2" required="" readonly="" value="AULA">
                  </div>
                  <script type="text/javascript">
                    function select_formulario() {
                      var seleccion = $("#coeval").val(); // Obtener el valor seleccionado del combo box
                      document.getElementById('el-resultadofinal').value = "";

                      var ob2 = {
                        nombre: seleccion
                      };

                      $.ajax({
                        type: "POST",
                        url: "php/getformulario.php", // El archivo que gestionará la solicitud
                        data: ob2,
                        beforeSend: function(objeto) {
                          // Opcional: animación de carga si lo necesitas
                        },
                        success: function(data) {
                          $("#panel_selector2").html(data);

                          // Controlar la visibilidad de las tablas en función de la selección
                          if (seleccion === "GESTIÓN DE LOS COORDINADORES/DOCENTES") {
                            $("#tablaCoordinadoresDocentes").show().find("input, textarea").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#tablaMantenimiento").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaResponsablesPracticas").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN2").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#compromisoMejora").show().find("textarea[name='compromiso']").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#labAula").hide().find("input, textarea").removeAttr('required');
                          } else if (seleccion === "GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS") {
                            $("#tablaCoordinadoresDocentes").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaMantenimiento").show().find("input, textarea").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#tablaResponsablesPracticas").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN2").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#compromisoMejora").show().find("textarea[name='compromiso']").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#labAula").show().find("input, textarea").attr('required');
                          } else if (seleccion === "RESPONSABLES DE PRÁCTICAS LABORALES") {
                            $("#tablaCoordinadoresDocentes").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaMantenimiento").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaResponsablesPracticas").show().find("input, textarea").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#somosTUVN").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN2").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#compromisoMejora").show().find("textarea[name='compromiso']").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#labAula").hide().find("input, textarea").removeAttr('required');
                          } else if (seleccion === "GESTION DE SOMOS TUVN EN LOS DOCENTES") {
                            $("#tablaCoordinadoresDocentes").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaMantenimiento").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaResponsablesPracticas").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN").show().find("input, textarea").attr('required', 'required'); // Muestra y agrega 'required'
                            $("#somosTUVN2").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#compromisoMejora").hide()
                            $("textarea[name='compromiso']").hide().removeAttr('required'); // Oculta y elimina 'required'
                            $("#labAula").hide().find("input, textarea").removeAttr('required');

                            // Agregar evento para mostrar somosTUVN2 si el valor es 8 o 4, o alerta si es 0
                            $("input[name='h1']").change(function() {
                              var valorSeleccionado = $("input[name='h1']:checked").val();
                              if (valorSeleccionado === "8" || valorSeleccionado === "4") {
                                $("#somosTUVN2").show().find("input, textarea").attr('required', 'required'); // Muestra y agrega 'required' en somosTUVN2
                              } else if (valorSeleccionado === "0") {
                                alert("No participo en la actividad, no puede llenar la encuesta");
                                $("#somosTUVN2").hide().find("input, textarea");
                                $("#somosTUVN2").hide().find("input[name='i1'][value='0']").prop("checked", true);
                                $("#somosTUVN2").hide().find("input[name='i2'][value='0']").prop("checked", true);
                                $("#somosTUVN2").hide().find("input[name='i3'][value='0']").prop("checked", true);
                                $("#somosTUVN2").hide().find("input[name='i4'][value='0']").prop("checked", true);
                                $("#resultadox5").val("0.00");
                              } else {
                                $("#somosTUVN2").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                              }
                            });
                          } else {
                            $("#tablaCoordinadoresDocentes").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaMantenimiento").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#tablaResponsablesPracticas").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#somosTUVN2").hide().find("input, textarea").removeAttr('required'); // Oculta y elimina 'required'
                            $("#labAula").hide().find("input, textarea").attr('required');
                          }


                        }
                      });
                    }
                  </script>
                </div>
              </th>
            </tr>
          </table>


          <div id="panel_selector2">

          </div>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>




          <!-- PRESENTA EL RESULTADO FINAL -->


          <table id="Table8" style="border: #270D07 3px solid; margin-top: -40px; width: 30px; height: 50px;">

            <tr>
              <!--<td>&nbsp;</td>-->
              <td colspan="2" style="background: #914a31;color: white; padding-left: 40px; padding-right:40px"><b>PUNTAJE FINAL</b></td>
              <td style="background: #914a31;color: white;">
                <div align="center">
                  <h4>
                    <textarea style="text-align:center; " name="resultado_final" id="el-resultadofinal" readonly required></textarea>
                  </h4>
                </div>
              </td>
            </tr>
          </table>
          </p>

          <p style="position: relative; margin-bottom: 60px; font-size: 15px">
            <label for="textarea"><b>OBSERVACIONES:</b></label>
            <!--<textarea class="col-md-7 col-md-offset-3" name="observaciones" id="observaciones" required style="margin-bottom: 15px; height: 45px; width: 515px"></textarea>-->
          </p>
          <p style="position: relative; margin-bottom: 60px;">
            <label for="textarea">FORTALEZAS:</label><br>
            <textarea name="fortalezas" id="fortalezas" required style=" height: 45px; width: 515px"></textarea>
          </p>
          <p style="position: relative; margin-bottom: 60px;">
            <label for="textarea" style="margin-bottom: 8px;">DEBILIDADES:</label><br>
            <textarea name="debilidades" id="debilidades" required style="height: 45px; width: 515px"></textarea>
          </p>
          <p style="position: relative; margin-bottom: 60px;">
            <label id="compromisoMejora" for="textarea">COMPROMISO DE MEJORA:</label><br>
            <textarea name="compromiso" id="compromiso" required style="height: 45px; width: 515px"></textarea>
          </p>

          <tr>
            <table></table>
          </tr>

          <!-- BOTON DE ENVIO DE FORMULARIO  A BASE DE DATOS -->

          <td>&nbsp;</td>
          <td>

            <div style="margin-top: -5em;">

              <button type="submit" id="enviar" class="button" value="Registrar"><i class="icon3 fa fa-file"></i> Registrar</button>

            </div>
            <!-- -->

        </form>
      </div>
    </div>


  </section>

  <script>
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

    /*funcion para calcular radiobutton*/




    /* FUNCIONES PARA TODAS LAS CARRERAS EXCEPTO MECANICA AUTOMOTRIZ */
    /*BLOQUE A*/

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
      document.getElementById('resultadox').innerHTML = "resultado:" + a; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox').innerHTML = (Math.round((a) * 100) / 100).toFixed(2);
    }




    /**funcion2**/
    function resultado2() {
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
      document.getElementById('resultadox2').innerHTML = "resultado:" + d * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox2').innerHTML = (Math.round((d) * 100) / 100).toFixed(2);
    }


    /**funcion3**/
    function resultado3() {
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
      document.getElementById('resultadox3').innerHTML = "resultado:" + f * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox3').innerHTML = (Math.round((f) * 100) / 100).toFixed(2);
    }

    /**funcion4**/
    function resultado4() {
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
      document.getElementById('resultadox4').innerHTML = "resultado:" + h * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox4').innerHTML = (Math.round((h) * 100) / 100).toFixed(2);
    }
    /**funcion5**/
    function resultado5() {
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
      document.getElementById('resultadox5').innerHTML = "resultado:" + i * 100; //<!--PROMEDIO ADEMAS QUE QUE CON LA FUNCION "ROUND NO ME REDONDEA A DOS DECIMALES "-->
      document.getElementById('resultadox5').innerHTML = (Math.round((i) * 100) / 100).toFixed(2);
    }


    function resultadofinal() {
      var aa = document.getElementById('resultadox').value;

      if (aa == null || aa == "") aa = 0;

      var rf = (parseFloat(aa)).toFixed(2);
      var regla3 = (rf * 100) / (9);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el-resultadofinal').value = regla3;
    }

    function resultadofinald() {
      var bb = document.getElementById('resultadox2').value;

      if (bb == null || bb == "") bb = 0;

      var rf = (parseFloat(bb)).toFixed(2);
      var regla3 = (rf * 100) / (8);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el-resultadofinal').value = regla3;
    }

    function resultadofinalf() {
      var ff = document.getElementById('resultadox3').value;

      if (ff == null || ff == "") ff = 0;

      var rf = (parseFloat(ff)).toFixed(2);
      var regla3 = (rf * 100) / (4);
      regla3 = parseFloat(regla3.toFixed(2));
      document.getElementById('el-resultadofinal').value = regla3;
    }

    function resultadofinali() {
      var hh = document.getElementById('resultadox4').value;
      var ii = document.getElementById('resultadox5').value;

      if (hh == null || hh === "") hh = 0;
      if (ii == null || ii === "") ii = 0;


      var rf = ((parseFloat(hh) + parseFloat(ii)) / 2).toFixed(2);
      document.getElementById('el-resultadofinal').value = rf;
    }
  </script>

  <script src="assets/js/main.js"></script>
</body>

</html>