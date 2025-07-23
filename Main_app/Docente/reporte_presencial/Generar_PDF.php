<?php
$consulta = ConsultarProducto($_GET['id']);
function ConsultarProducto($no_prod)
{
  include 'conexion.php';
  $usuario = "SELECT

    l.nombre, 
    -- Campos de la tabla coevaluacion_general
    c.*,
    
    -- Campos de la tabla coevaluacion1
    co1.*, co1.resultado_final AS final1,
    
    -- Campos de la tabla coevaluacion2
    co2.*, co2.resultado_final AS final2,
    
    -- Campos de la tabla coevaluacion3
    co3.*, co3.resultado_final AS final3,
    
    -- Campos de la tabla coevaluacion4
    co4.*, co4.resultado_final AS final4
    
    FROM 
        coevaluacion_general c
    
    LEFT JOIN 
        login l ON c.id_coordinador = l.id

    LEFT JOIN 
        coevaluacion1 co1 ON c.id = co1.id_coevaluacion_general
    LEFT JOIN 
        coevaluacion2 co2 ON c.id = co2.id_coevaluacion_general
    LEFT JOIN 
        coevaluacion3 co3 ON c.id = co3.id_coevaluacion_general
    LEFT JOIN 
        coevaluacion4 co4 ON c.id = co4.id_coevaluacion_general
    WHERE 
        c.id = '" . $no_prod . "'";

  $usuarios = $conexion->query($usuario) or die("Error al consultar registro" . mysqli_error($conexion));

  require_once('tcpdf/tcpdf.php');
  class mipdf extends TCPDF
  {

    public function Header()
    {
      $this->SetFont('helvetica', 'B', 15);
      $this->Cell(170, 0, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
  }

  $pdf = new mipdf(PDF_PAGE_ORIENTATION, 'mm', 'A4', true, 'UTF-8', false);

  $pdf->SetMargins(20, 10, 20);
  $pdf->SetHeaderMargin(20);

  $pdf->SetCreator('Coordinador');
  $pdf->SetAuthor('Coordinador');
  $pdf->SetTitle('Ficha de coevaluacion');
  $pdf->SetAutoPageBreak(true, 20);
  $pdf->SetFont('Helvetica', '', 9);
  $pdf->addPage();

  ob_start();

  while ($user = $usuarios->fetch_assoc()) {
    $newDate = date("d/m/Y", strtotime($user['fecha']));
?>
    <style>
      .tabla tr td {
        border: 0px solid black;
        font-size: 8px;
        text-align: center;
      }

      .texto {
        font-size: 10px;
      }
    </style>
    <table width="100%" cellpadding="2" cellspacing="0" style="text-align: center">
      <tr>
        <td style="border:hidden ;vertical-align:middle;">
          <div style="position:relative; justify-content:center">
            <!-- Imagen del reporte pdf-->

            <img src="encabezado.webp" width="596" height="80">
          </div>
        </td>

      </tr>
    </table>

    <?php

    if ($user['coevaluacion'] == 'GESTIÓN DE LOS COORDINADORES/DOCENTES') { ?>

      <table width="100%" style="text-align: center; line-height: 15px;">
        <tr>
          <td>
            <h3 style="width: 280px; height:0px; line-height: 18px; font-size: 15px">RUBRICA PARA EVALUAR LA GESTIÓN DE LOS COORDINADORES/DOCENTES EN CADA CARRERA</h3>
          </td>
        </tr>
        <br>
        <tr>
          <td style="text-align: left; width: 300px;"><b>APELLIDOS Y NOMBRES: </b><?php echo $user['docente'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 400px;"><b>CARRERA: </b><?php echo $user['carrera'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 100px;"><b>FECHA: </b><?php echo $newDate ?></td>
        </tr>
      </table>

      <br><br>
      <table width="100%" class="tabla">
        <tr bgcolor="#2c4073" style="color:white;">
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Consideraciones</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Muy Bueno (1)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Bueno (0.5)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Regular (1)</td>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Convocatoria</strong></p>
          </td>

          <?php if ($user['a1'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CONVOCATORIA DETALLADA Y ENVIADA PUNTUALMENTE</td>
          <?php } else { ?>
            <td width="25%"><br><br>CONVOCATORIA DETALLADA Y ENVIADA PUNTUALMENTE</td>
          <?php } ?>

          <?php if ($user['a1'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CONVOCATORIA DETALLADA Y ENVIADA A DESTIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>CONVOCATORIA DETALLADA Y ENVIADA A DESTIEMPO</td>
          <?php } ?>

          <?php if ($user['a1'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CONVOCATORIA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>CONVOCATORIA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Acta</strong></p>
          </td>

          <?php if ($user['a2'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ACTA DETALLADA Y ENVIADA PUNTUALMENTE</td>
          <?php } else { ?>
            <td width="25%"><br><br>ACTA DETALLADA Y ENVIADA PUNTUALMENTE</td>
          <?php } ?>

          <?php if ($user['a2'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ACTA DETALLADA Y ENVIADA A DESTIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>ACTA DETALLADA Y ENVIADA A DESTIEMPO</td>
          <?php } ?>

          <?php if ($user['a2'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ACTA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>ACTA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Eventos institucionales</strong></p>
          </td>

          <?php if ($user['a3'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA Y EL CONTROL DEL GRUPO DE DOCENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA Y EL CONTROL DEL GRUPO DE DOCENTES</td>
          <?php } ?>

          <?php if ($user['a3'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA, PERO NO EL CONTROL DEL GRUPO DE DOCENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA, PERO NO EL CONTROL DEL GRUPO DE DOCENTES</td>
          <?php } ?>

          <?php if ($user['a3'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>LA CARRERA NO PARTICIPA EN TODOS LOS EVENTOS INSTITUCIONALES NI TAMPOCO SE EVIDENCIA EL CONTROL DEL GRUPO DE DOCENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>LA CARRERA NO PARTICIPA EN TODOS LOS EVENTOS INSTITUCIONALES NI TAMPOCO SE EVIDENCIA EL CONTROL DEL GRUPO DE DOCENTES</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Informes de eventos institucionales</strong></p>
          </td>

          <?php if ($user['a4'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS</td>
          <?php } ?>

          <?php if ($user['a4'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } ?>

          <?php if ($user['a4'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Planificación de coevaluaciones</strong></p>
          </td>

          <?php if ($user['a5'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES</td>
          <?php } ?>

          <?php if ($user['a5'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL NO SE EVALÚA A TODOS LOS DOCENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL NO SE EVALÚA A TODOS LOS DOCENTES</td>
          <?php } ?>

          <?php if ($user['a5'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PLANIFICACIÓN ENTREGADA A DESTIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>PLANIFICACIÓN ENTREGADA A DESTIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Ejecución de coevaluaciones</strong></p>
          </td>

          <?php if ($user['a6'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>SE EVALÚA A TODOS LOS DOCENTES SEGÚN LA PLANIFICACIÓN</td>
          <?php } else { ?>
            <td width="25%"><br><br>SE EVALÚA A TODOS LOS DOCENTES SEGÚN LA PLANIFICACIÓN</td>
          <?php } ?>

          <?php if ($user['a6'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>SE EVALÚA A TODOS LOS DOCENTES SIN CUMPLIR TOTALMENTE LA PLANIFICACIÓN</td>
          <?php } else { ?>
            <td width="25%"><br><br>SE EVALÚA A TODOS LOS DOCENTES SIN CUMPLIR TOTALMENTE LA PLANIFICACIÓN</td>
          <?php } ?>

          <?php if ($user['a6'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>NO SE EVALÚA A TODOS LOS DOCENTES NI TAMPOCO SE CUMPLE LA PLANIFICACIÓN</td>
          <?php } else { ?>
            <td width="25%"><br><br>NO SE EVALÚA A TODOS LOS DOCENTES NI TAMPOCO SE CUMPLE LA PLANIFICACIÓN</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Informe de la evaluación de las actividades de docencia</strong></p>
          </td>

          <?php if ($user['a7'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS</td>
          <?php } ?>

          <?php if ($user['a7'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } ?>

          <?php if ($user['a7'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Aprobación de evaluaciones y portafolios</strong></p>
          </td>

          <?php if ($user['a8'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE Y APROBADOS A TIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE Y APROBADOS A TIEMPO</td>
          <?php } ?>

          <?php if ($user['a8'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE PERO NO APROBADOS A TIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE PERO NO APROBADOS A TIEMPO</td>
          <?php } ?>

          <?php if ($user['a8'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>VARIAS EVALUACIONES Y PORTAFOLIOS NO SON REVISADOS MINUCIOSAMENTE NI APROBADOS A TIEMPO</td>
          <?php } else { ?>
            <td width="25%"><br><br>VARIAS EVALUACIONES Y PORTAFOLIOS NO SON REVISADOS MINUCIOSAMENTE NI APROBADOS A TIEMPO</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Acompañamiento a los docentes de la carrera</strong></p>
          </td>

          <?php if ($user['a9'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, DETALLADO Y EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA</td>
          <?php } else { ?>
            <td width="25%"><br><br>SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, DETALLADO Y EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA</td>
          <?php } ?>

          <?php if ($user['a9'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, PERO NO DETALLADO NI EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA</td>
          <?php } else { ?>
            <td width="25%"><br><br>SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, PERO NO DETALLADO NI EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA</td>
          <?php } ?>

          <?php if ($user['a9'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>NO SE REALIZA UN ACOMPAÑAMIENTO CONTINUO A TODOS LOS DOCENTES DE LA CARRERA</td>
          <?php } else { ?>
            <td width="25%"><br><br>NO SE REALIZA UN ACOMPAÑAMIENTO CONTINUO A TODOS LOS DOCENTES DE LA CARRERA</td>
          <?php } ?>
        </tr>

        <tr bgcolor="#2c4073" style="color:white;">
          <td colspan="4" style="font-size:20px;"><b>TOTAL: <?php echo $user['final1'] ?>%</b></td>
        </tr>
      </table>

      <br>
      <br><br><br>
      <table class="tabla" style="text-align: left; width: 100%;">
        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>FORTALEZAS:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['fortalezas'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>DEBILIDADES:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['debilidades'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>COMPROMISO DE MEJORA:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['compromiso'] ?></label></td>
        </tr>
      </table>

      <br><br><br>
      <table class="tabla">
        <tr>
          <td>
            <br><br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['nombre'] ?><br>
            <b>EVALUADOR</b><br><br>
          </td>
          <td>
            <br><br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['docente'] ?><br>
            <b>COORDINADOR/DOCENTE</b><br><br>
          </td>
        </tr>

      </table>

    <?php } else if ($user['coevaluacion'] == 'GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS') { ?>

      <table width="100%" style="text-align: center; line-height: 15px;">
        <tr>
          <td>
            <h3 style="width: 280px; height:0px; line-height: 18px; font-size: 15px">RUBRICA PARA EVALUAR LA GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/LABORATORIOS</h3>
          </td>
        </tr>
        <br>
        <tr>
          <td style="text-align: left; width: 300px;"><b>APELLIDOS Y NOMBRES: </b><?php echo $user['docente'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 400px;"><b>CARRERA: </b><?php echo $user['carrera'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 400px;"><b>TALLER/LABORATORIO: </b><?php echo $user['aula'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 100px;"><b>FECHA: </b><?php echo $newDate ?></td>
        </tr>
      </table>

      <br><br>
      <table width="100%" class="tabla">
        <tr bgcolor="#2c4073" style="color:white;">
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Consideraciones</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Muy Bueno (1)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Bueno (0.5)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Regular (1)</td>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Cumplimiento del plan de mantenimiento</strong></p>
          </td>

          <?php if ($user['d1'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PLAN DE MANTENIMIENTO EJECUTADO TOTALMENTE HASTA LA FECHA</td>
          <?php } else { ?>
            <td width="25%"><br><br>PLAN DE MANTENIMIENTO EJECUTADO TOTALMENTE HASTA LA FECHA</td>
          <?php } ?>

          <?php if ($user['d1'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PLAN DE MANTENIMIENTO EJECUTADO PARCIALMENTE HASTA LA FECHA</td>
          <?php } else { ?>
            <td width="25%"><br><br>PLAN DE MANTENIMIENTO EJECUTADO PARCIALMENTE HASTA LA FECHA</td>
          <?php } ?>

          <?php if ($user['d1'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PLAN DE MANTENIMIENTO NO EJECUTADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>PLAN DE MANTENIMIENTO NO EJECUTADO</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Orden</strong></p>
          </td>

          <?php if ($user['d2'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS TOTALMENTE EN ORDEN</td>
          <?php } else { ?>
            <td width="25%"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS TOTALMENTE EN ORDEN</td>
          <?php } ?>

          <td width="25%"><br><br>-------</td>


          <?php if ($user['d2'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS EN DESORDEN</td>
          <?php } else { ?>
            <td width="25%"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS EN DESORDEN</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Limpieza</strong></p>
          </td>

          <?php if ($user['d3'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS LIMPIAS</td>
          <?php } else { ?>
            <td width="25%"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS LIMPIAS</td>
          <?php } ?>

          <td width="25%"><br><br>-------</td>

          <?php if ($user['d3'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS SUCIAS</td>
          <?php } else { ?>
            <td width="25%"><br><br>ESPACIOS, MÁQUINAS Y HERRAMIENTAS SUCIAS</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Funcionamiento Óptimo de Equipos y Máquinas</strong></p>
          </td>

          <?php if ($user['d4'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODOS LOS EQUIPOS Y MÁQUINAS OPERAN DE MANERA ÓPTIMA, CON MÍNIMA INCIDENCIA DE FALLOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODOS LOS EQUIPOS Y MÁQUINAS OPERAN DE MANERA ÓPTIMA, CON MÍNIMA INCIDENCIA DE FALLOS</td>
          <?php } ?>

          <?php if ($user['d4'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>VARIOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA</td>
          <?php } else { ?>
            <td width="25%"><br><br>VARIOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA</td>
          <?php } ?>

          <?php if ($user['d4'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODOS LOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODOS LOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Gestión de recursos para mantenimiento</strong></p>
          </td>

          <?php if ($user['d5'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>RECURSOS GESTIONADOS A TIEMPO PARA CADA TAREA DE MANTENIMIENTO</td>
          <?php } else { ?>
            <td width="25%"><br><br>RECURSOS GESTIONADOS A TIEMPO PARA CADA TAREA DE MANTENIMIENTO</td>
          <?php } ?>

          <?php if ($user['d5'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>RECURSOS GESTIONADOS A DESTIEMPO PARA CADA TAREA DE MANTENIMIENTO</td>
          <?php } else { ?>
            <td width="25%"><br><br>RECURSOS GESTIONADOS A DESTIEMPO PARA CADA TAREA DE MANTENIMIENTO</td>
          <?php } ?>

          <?php if ($user['d5'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>RECURSOS GESTIONADOS A DESTIEMPO Y DE MANERA INADECUADA</td>
          <?php } else { ?>
            <td width="25%"><br><br>RECURSOS GESTIONADOS A DESTIEMPO Y DE MANERA INADECUADA</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Fichas de Equipos y Máquinas</strong></p>
          </td>

          <?php if ($user['d6'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODAS LAS FICHAS ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODAS LAS FICHAS ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA</td>
          <?php } ?>

          <?php if ($user['d6'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>VARIAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA</td>
          <?php } else { ?>
            <td width="25%"><br><br>VARIAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA</td>
          <?php } ?>

          <?php if ($user['d6'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODAS LAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODAS LAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Bitácoras</strong></p>
          </td>

          <?php if ($user['d7'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>BITÁCORAS ACTUALIZADAS CON REGISTROS E INFORMACIÓN COMPLETA</td>
          <?php } else { ?>
            <td width="25%"><br><br>BITÁCORAS ACTUALIZADAS CON REGISTROS E INFORMACIÓN COMPLETA</td>
          <?php } ?>

          <?php if ($user['d7'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>BITÁCORAS ACTUALIZADAS (SIN) REGISTROS E INFORMACIÓN COMPLETA</td>
          <?php } else { ?>
            <td width="25%"><br><br>BITÁCORAS ACTUALIZADAS (SIN) REGISTROS E INFORMACIÓN COMPLETA</td>
          <?php } ?>

          <?php if ($user['d7'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>BITÁCORAS DESACTUALIZADAS</td>
          <?php } else { ?>
            <td width="25%"><br><br>BITÁCORAS DESACTUALIZADAS</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Informe</strong></p>
          </td>

          <?php if ($user['d8'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL DOCUMENTO ES PRESENTADO EL DÍA SOLICITADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL DOCUMENTO ES PRESENTADO EL DÍA SOLICITADO</td>
          <?php } ?>

          <td width="25%"><br><br>-------</td>

          <?php if ($user['d8'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL DOCUMENTO (NO) ES PRESENTADO EL DÍA SOLICITADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL DOCUMENTO (NO) ES PRESENTADO EL DÍA SOLICITADO</td>
          <?php } ?>
        </tr>

        <tr bgcolor="#2c4073" style="color:white;">
          <td colspan="4" style="font-size:20px;"><b>TOTAL: <?php echo $user['final2'] ?>%</b></td>
        </tr>
      </table>

      <br>
      <br><br><br><br><br><br><br><br><br><br><br><br>
      <table class="tabla" style="text-align: left; width: 100%;">
        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>FORTALEZAS:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['fortalezas'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>DEBILIDADES:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['debilidades'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>COMPROMISO DE MEJORA:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['compromiso'] ?></label></td>
        </tr>
      </table>

      <br><br><br>
      <table class="tabla">
        <tr>
          <td>
            <br><br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['nombre'] ?><br>
            <b>EVALUADOR</b><br><br>
          </td>
          <td>
            <br><br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['docente'] ?><br>
            <b>RESPONSABLE DEL MANTENIMIENTO</b><br><br>
          </td>
        </tr>

      </table>
    <?php } else if ($user['coevaluacion'] == 'RESPONSABLES DE PRÁCTICAS LABORALES') { ?>
      <table width="100%" style="text-align: center; line-height: 15px;">
        <tr>
          <td>
            <h3 style="width: 280px; height:0px; line-height: 18px; font-size: 15px">RÚBRICA PARA EVALUAR LA GÉSTION DE LOS RESPONSABLES DE PRÁCTICAS LABORALES</h3>
          </td>
        </tr>
        <br>
        <tr>
          <td style="text-align: left; width: 300px;"><b>APELLIDOS Y NOMBRES: </b><?php echo $user['docente'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 400px;"><b>CARRERA: </b><?php echo $user['carrera'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 100px;"><b>FECHA: </b><?php echo $newDate ?></td>
        </tr>
      </table>

      <br><br>
      <table width="100%" class="tabla">
        <tr bgcolor="#2c4073" style="color:white;">
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Consideraciones</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Muy Bueno (1)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Bueno (0.5)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Regular (1)</td>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Cronograma</strong></p>
          </td>

          <?php if ($user['f1'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CRONOGRAMA DE PRÁCTICAS EJECUTADO TOTALMENTE HASTA LA FECHA</td>
          <?php } else { ?>
            <td width="25%"><br><br>CRONOGRAMA DE PRÁCTICAS EJECUTADO TOTALMENTE HASTA LA FECHA</td>
          <?php } ?>

          <?php if ($user['f1'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CRONOGRAMA DE PRÁCTICAS EJECUTADO PARCIALMENTE HASTA LA FECHA</td>
          <?php } else { ?>
            <td width="25%"><br><br>CRONOGRAMA DE PRÁCTICAS EJECUTADO PARCIALMENTE HASTA LA FECHA</td>
          <?php } ?>

          <?php if ($user['f1'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Base de empresas/instituciones</strong></p>
          </td>

          <?php if ($user['f2'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>BASE DE DATOS SE ENCUENTRA ACTUALIZADA CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>BASE DE DATOS SE ENCUENTRA ACTUALIZADA CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</td>
          <?php } ?>

          <?php if ($user['f2'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>BASE DE DATOS DESACTUALIZADA, PERO CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>BASE DE DATOS DESACTUALIZADA, PERO CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</td>
          <?php } ?>

          <?php if ($user['f2'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>BASE DE DATOS DESACTUALIZADA Y SIN INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</td>
          <?php } else { ?>
            <td width="25%"><br><br>BASE DE DATOS DESACTUALIZADA Y SIN INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Informe o documentos necesarios</strong></p>
          </td>

          <?php if ($user['f3'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>LOS DOCUMENTOS SON PRESENTADOS EL DÍA SOLICITADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>LOS DOCUMENTOS SON PRESENTADOS EL DÍA SOLICITADO</td>
          <?php } ?>

          <td width="25%"><br><br>-------</td>

          <?php if ($user['f3'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>LOS DOCUMENTOS NO SON PRESENTADOS EL DÍA SOLICITADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>LOS DOCUMENTOS NO SON PRESENTADOS EL DÍA SOLICITADO</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Contenido</strong></p>
          </td>

          <?php if ($user['f4'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO Y EL TRABAJO REALIZADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO Y EL TRABAJO REALIZADO</td>
          <?php } ?>

          <?php if ($user['f4'] === "0.5") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO, PERO SI CON EL TRABAJO REALIZADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO, PERO SI CON EL TRABAJO REALIZADO</td>
          <?php } ?>

          <?php if ($user['f4'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO NI CON EL TRABAJO REALIZADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO NI CON EL TRABAJO REALIZADO</td>
          <?php } ?>
        </tr>

        <tr bgcolor="#2c4073" style="color:white;">
          <td colspan="4" style="font-size:20px;"><b>TOTAL: <?php echo $user['final3'] ?>%</b></td>
        </tr>
      </table>

      <br>
      <br>
      <table class="tabla" style="text-align: left; width: 100%;">
        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>FORTALEZAS:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['fortalezas'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>DEBILIDADES:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['debilidades'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>COMPROMISO DE MEJORA:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['compromiso'] ?></label></td>
        </tr>
      </table>

      <br><br>
      <table class="tabla">
        <tr>
          <td>
            <br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['nombre'] ?><br>
            <b>EVALUADOR</b><br><br>
          </td>
          <td>
            <br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['docente'] ?><br>
            <b>RESPONSABLE DE PRACTICAS</b><br><br>
          </td>
        </tr>

      </table>
    <?php } else if ($user['coevaluacion'] == 'GESTION DE SOMOS TUVN EN LOS DOCENTES') { ?>
      <table width="100%" style="text-align: center; line-height: 15px;">
        <tr>
          <td>
            <h3 style="width: 280px; height:0px; line-height: 18px; font-size: 15px">RÚBRICA PARA EVALUAR LA GÉSTION DE "SOMOS TUVN" EN LOS DOCENTES</h3>
          </td>
        </tr>
        <br>
        <tr>
          <td style="text-align: left; width: 300px;"><b>APELLIDOS Y NOMBRES: </b><?php echo $user['docente'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 400px;"><b>CARRERA: </b><?php echo $user['carrera'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left; width: 100px;"><b>FECHA: </b><?php echo $newDate ?></td>
        </tr>
      </table>

      <br><br><br><br>
      <table width="100%" class="tabla">
        <tr bgcolor="#2c4073" style="color:white;">
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Consideraciones</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Muy Bueno (8)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Bueno (4)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Regular (0)</td>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Participación</strong></p><br><br>
          </td>

          <?php if ($user['h1'] === "8") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PARTICIPA TOTALMENTE EN LA ACTIVIDAD</td>
          <?php } else { ?>
            <td width="25%"><br><br>PARTICIPA TOTALMENTE EN LA ACTIVIDAD</td>
          <?php } ?>

          <?php if ($user['h1'] === "4") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>PARTICIPA PARCIALMENTE EN LA ACTIVIDAD</td>
          <?php } else { ?>
            <td width="25%"><br><br>PARTICIPA PARCIALMENTE EN LA ACTIVIDAD</td>
          <?php } ?>

          <?php if ($user['h1'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>(NO) PARTICIPA EN LA ACTIVIDAD</td>
          <?php } else { ?>
            <td width="25%"><br><br>(NO) PARTICIPA EN LA ACTIVIDAD</td>
          <?php } ?>
        </tr>

        <tr bgcolor="#2c4073" style="color:white;">
          <td colspan="4" style="font-size:20px;"><b>TOTAL: <?php echo $user['result4'] ?>%</b></td>
        </tr>
      </table>

      <br><br><br><br><br><br>

      <table width="100%" class="tabla">
        <tr bgcolor="#2c4073" style="color:white;">
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Consideraciones</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Muy Bueno (1)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Bueno (0.5)</td>
          <td width="25%" style="background: #2c4073;color: white; font-size: 15px">Regular (1)</td>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Cronograma</strong></p>
          </td>

          <?php if ($user['i1'] === "2") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CRONOGRAMA EJECUTADO TOTALMENTE HASTA LA FECHA</td>
          <?php } else { ?>
            <td width="25%"><br><br>CRONOGRAMA EJECUTADO TOTALMENTE HASTA LA FECHA</td>
          <?php } ?>

          <?php if ($user['i1'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CRONOGRAMA EJECUTADO PARCIALMENTE HASTA LA FECHA</td>
          <?php } else { ?>
            <td width="25%"><br><br>CRONOGRAMA EJECUTADO PARCIALMENTE HASTA LA FECHA</td>
          <?php } ?>

          <?php if ($user['i1'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Responsabilidad la Ejecución</strong></p>
          </td>

          <?php if ($user['i2'] === "2") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CUMPLE CON TODAS SUS TAREAS DE MANERA PUNTUAL Y EFICIENTE, SIN NECESIDAD DE SUPERVISION CONSTANTE</td>
          <?php } else { ?>
            <td width="25%"><br><br>CUMPLE CON TODAS SUS TAREAS DE MANERA PUNTUAL Y EFICIENTE, SIN NECESIDAD DE SUPERVISION CONSTANTE</td>
          <?php } ?>

          <?php if ($user['i2'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CUMPLE CON LA MAYORIA DE SUS RESPONSABILIDADES, AUNQUE REQUIERE RECORDATORIS OCASIONALES</td>
          <?php } else { ?>
            <td width="25%"><br><br>CUMPLE CON LA MAYORIA DE SUS RESPONSABILIDADES, AUNQUE REQUIERE RECORDATORIS OCASIONALES</td>
          <?php } ?>

          <?php if ($user['i2'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>CUMPLE CON ALGUNAS RESPONSABILIDADES PERO SIEMPRE NECESITA SUPERVISION O RECORDATORIOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>CUMPLE CON ALGUNAS RESPONSABILIDADES PERO SIEMPRE NECESITA SUPERVISION O RECORDATORIOS</td>
          <?php } ?>
        </tr>

        <tr>
          <td width="25%">
            <p class="texto"><strong>Cumplimiento de Plazos</strong></p>
          </td>

          <?php if ($user['i3'] === "2") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>TODAS LAS ACTIVIDADES ASIGNADAS SE COMPLETAN DENTRO DE LOS PLAZOS ESTABLECIDOS, CON ALTA CALIDAD</td>
          <?php } else { ?>
            <td width="25%"><br><br>TODAS LAS ACTIVIDADES ASIGNADAS SE COMPLETAN DENTRO DE LOS PLAZOS ESTABLECIDOS, CON ALTA CALIDAD</td>
          <?php } ?>

          <?php if ($user['i3'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>LA MAYORIA DE LAS ACTIVIDADES SE COMPLETA A TIEMPO, CON ALGUNOS AJUSTES NECESARIOS</td>
          <?php } else { ?>
            <td width="25%"><br><br>LA MAYORIA DE LAS ACTIVIDADES SE COMPLETA A TIEMPO, CON ALGUNOS AJUSTES NECESARIOS</td>
          <?php } ?>

          <?php if ($user['i3'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>ALGUNAS ACTIVIDADES SE COMPLETAN FUERA DE PLAZO O CON CALIDAD INSUFICIENTE</td>
          <?php } else { ?>
            <td width="25%"><br><br>ALGUNAS ACTIVIDADES SE COMPLETAN FUERA DE PLAZO O CON CALIDAD INSUFICIENTE</td>
          <?php } ?>
        </tr>


        <tr>
          <td width="25%">
            <p class="texto"><strong>Producto</strong></p>
          </td>

          <?php if ($user['i4'] === "2") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL PRODUCTO TIENE LAS CARACTERISTICAS ESTABLECIDAS EN EL PROPUESTA</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL PRODUCTO TIENE LAS CARACTERISTICAS ESTABLECIDAS EN EL PROPUESTA</td>
          <?php } ?>

          <?php if ($user['i4'] === "1") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO, PERO SI CON EL TRABAJO REALIZADO</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO, PERO SI CON EL TRABAJO REALIZADO</td>
          <?php } ?>

          <?php if ($user['i4'] === "0") { ?>
            <td width="25%" style="background-color: yellow;"><br><br>EL PRODUCTO (NO) TIENE LAS CARACTERISTICAS ESTABLECIDAS EN LA PROPUESTA</td>
          <?php } else { ?>
            <td width="25%"><br><br>EL PRODUCTO (NO) TIENE LAS CARACTERISTICAS ESTABLECIDAS EN LA PROPUESTA</td>
          <?php } ?>
        </tr>

        <tr bgcolor="#2c4073" style="color:white;">
          <td colspan="4" style="font-size:20px;"><b>TOTAL: <?php echo $user['result5'] ?>%</b></td>
        </tr>
      </table>

      <br><br><br>
      <table class="tabla" style="text-align: center; width: 50%;">
        <tr bgcolor="#2c4073" style="color:white;">
          <td colspan="1" style="font-size:20px; "><b>TOTAL FINAL: <?php echo $user['final4'] ?>%</b></td>
        </tr>
      </table>

      <br><br><br><br>
      <table class="tabla" style="text-align: left; width: 100%;">
        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>FORTALEZAS:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['fortalezas'] ?></label></td>
        </tr>

        <tr>
          <td width="25%" height="40" bgcolor="#2c4073" style="color:white;"><br><br><label for="textarea"><strong>DEBILIDADES:</strong></label></td>
          <td width="75%" style="text-align: left;"><br><br><label><?php echo $user['debilidades'] ?></label></td>
        </tr>

      </table>

      <br><br><br><br><br>
      <table class="tabla">
        <tr>
          <?php
          include 'conexion.php';
          $firma = "SELECT coord.id_login, l.nombre , c.nombre AS carreraFirma FROM coordinadores coord INNER JOIN login l ON coord.id_login = l.id 
                      INNER JOIN carreras c ON coord.id_carrera = c.id WHERE c.nombre ='" . $user['carrera'] . "'";
          $firma = $conexion->query($firma) or die("Error al consultar registro" . mysqli_error($conexion));
          while ($rubrica = $firma->fetch_assoc()) {?>

            <?php if ($user['carrera'] === $rubrica['carreraFirma']) { ?>
              <td>
                <br><br><br><br><br><br><br><br>
                ---------------------------------------------<br>
                <?php echo $rubrica['nombre'] ?><br>
                <b>EVALUADOR 1</b><br><br>
              </td>
            <?php }?>
          <?php }
          ?>

          <td>
            <br><br><br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo "GUAMAN FREIRE MARIO RUBEN" ?><br>
            <b>EVALUADOR 2</b><br><br>
          </td>

          <td>
            <br><br><br><br><br><br><br><br>
            ---------------------------------------------<br>
            <?php echo $user['docente'] ?><br>
            <b>DOCENTE</b><br><br>
          </td>
        </tr>

      </table>
    <?php } ?>
<?php
    $html = ob_get_clean();
  }

  $pdf->writeHTML($html, true, false, true, false);
  $pdf->lastPage(); // Mueve el puntero al final del documento.
  $pdf->Output('Reporte_de_Evaluaciones.pdf', 'I'); // Genera y envía el PDF al navegador.
}
?>