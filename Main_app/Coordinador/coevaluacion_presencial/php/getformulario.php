<?php
if (isset($_POST['nombre'])) {
  $nombre = $_POST['nombre'];

  $mysqli = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

  // Verificar si la conexión a la base de datos es exitosa
  if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
  }
  // Evitar inyección SQL al usar prepared statements
  $query = $mysqli->prepare("SELECT nombre FROM carreras WHERE nombre = ?");
  $query->bind_param("s", $nombre);  // "s" es para un string
  $query->execute();
  $result = $query->get_result();
  $query->close();
  $mysqli->close();
} else {
  echo json_encode(["error" => "El parámetro 'nombre' no fue enviado"]);
}
?>

<!-- MOODLE -->
<!-- cuando no es automotriz se genera este menú de opciones-->


<table id="tablaCoordinadoresDocentes" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;">
  <tr>
    <thead>

      <th colspan="2" scope="col" style="background: #914a31;color: white;">CONSIDERACIONES</th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno (1)</th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">
        <div align="center">Bueno (0.5)</div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Regular (0)</th>
    </thead>
  </tr>

  <tr>

    <!-- titulo vetrical de la tabla  -->
    <!-- primera pregunta  -->

    <td width="2%" rowspan="9" style="background: #f2b440;color: white;">
      <p class="verticalText" style="margin-left:15px;"><b>LA GESTIÓN DE LOS COORDINADORES/DOCENTES EN CADA CARRERA</b></p>
    </td>
    <td width="25%">
      <p align="justify" style="padding:10px">Convocatoria</p>
    </td>
    <td width="2%"><br>Convocatoria detallada y enviada puntualmente</br>
      <input type="radio" id="p1" name="a1" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" /></p>
    </td>
    <td width="12%">
      <p align="center"><br>Convocatoria detallada y enviada a destiempo.<br>
        <input type="radio" id="p2" name="a1" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <br>

    </p>

    </td>
    <td width="12%">
      <p align="center"><br>Convocatoria sin los detalles necesarios y enviada a destiempo.<br>
        <input type="radio" id="p3" name="a1" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
        </span>
      </p>
    </td>
  </tr>

  <!-- segunda  pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Acta</p>
    </td>
    <td>
      <p><br>Acta detallada y enviada puntualmente.</br>
        <input type="radio" id="p4" name="a2" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Acta detallada y enviada a destiempo.<br>
        <input type="radio" id="p5" name="a2" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
        <br>
      </p>
    </td>
    <td>
      <p align="center"><br>Acta sin los detalles necesarios y enviada a destiempo.
        <br>
        <input type="radio" id="p6" name="a2" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Eventos institucionales</p>
    </td>
    <td>
      <p> En todos los eventos institucionales se evidencia el aporte de la carrera y el control del grupo de docentes.<br>

        <input type="radio" id="p7" name="a3" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        En todos los eventos institucionales se evidencia el aporte de la carrera, pero NO el control del grupo de docentes.<br>
        <input type="radio" id="p8" name="a3" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        La carrera no participa en todos los eventos institucionales ni tampoco se evidencia el control del grupo de docentes.<br>
        <input type="radio" id="p9" name="a3" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Informes de eventos institucionales</p>
    </td>
    <td>
      <p> <br>Todos los informes son presentados el día solicitado y con los detalles requeridos.<br>
        <input type="radio" id="p10" name="a4" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Varios informes son presentados a destiempo o sin los detalles requeridos.<br>
        <input type="radio" id="p11" name="a4" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Todos los informes son a destiempo o sin los detalles requeridos
        <br>
        <input type="radio" id="p12" name="a4" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- Quinta pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding: 10px">Planificación de coevaluaciones</p>
    </td>
    <td>
      <p>Planificación entregada a tiempo en la cual se evalúa a todos los docentes.
        <br>
        <input type="radio" id="p13" name="a5" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Planificación entregada a tiempo en la cual NO se evalúa a todos los docentes.<br>
        <input type="radio" id="p14" name="a5" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Planificación entregada a destiempo en la cual se evalúa a todos los docentes.
        <br>
        <input type="radio" id="p15" name="a5" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Sexta pregunta  -->
  <tr>
    <td>
      <p align="justify" style="padding: 10px">Ejecución de coevaluaciones</p>
    </td>
    <td>
      <p><br>Se evalúa a todos los docentes según la planificación.
        <br>
        <input type="radio" id="p16" name="a6" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Se evalúa a todos los docentes sin cumplir totalmente la planificación.<br>
        <input type="radio" id="p17" name="a6" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        No se evalúa a todos los docentes ni tampoco se cumple la planificación.
        <br>
        <input type="radio" id="p18" name="a6" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Septima pregunta  -->
  <tr>
    <td>
      <p align="justify" style="padding: 10px">Informe de la evaluación de las actividades de docencia</p>
    </td>
    <td>
      <p><br>Todos los informes son presentados el día solicitado y con los detalles requeridos.
        <br>
        <input type="radio" id="p19" name="a7" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Varios informes son presentados a destiempo o sin los detalles requeridos.<br>
        <input type="radio" id="p20" name="a7" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Todos los informes son a destiempo o sin los detalles requeridos
        <br>
        <input type="radio" id="p21" name="a7" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Octava pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding: 10px">Aprobación de evaluaciones y portafolios</p>
    </td>
    <td>
      <p>Todas las evaluaciones y portafolios son revisados minuciosamente y aprobados a tiempo.
        <br>
        <input type="radio" id="p22" name="a8" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Todas las evaluaciones y portafolios son revisados minuciosamente pero NO aprobados a tiempo<br>
        <input type="radio" id="p23" name="a8" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Varias evaluaciones y portafolios NO son revisados minuciosamente ni aprobados a tiempo.
        <br>
        <input type="radio" id="p24" name="a8" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Novena pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding: 10px">Acompañamiento a los docentes de la carrera</p>
    </td>
    <td>
      <p>Se realiza un acompañamiento continuo, detallado y efectivo a todos los docentes de la carrera.
        <br>
        <input type="radio" id="p25" name="a9" value="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Se realiza un acompañamiento continuo, pero NO detallado ni efectivo a todos los docentes de la carrera.<br>
        <input type="radio" id="p26" name="a9" value="0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        NO se realiza un acompañamiento continuo a todos los docentes de la carrera.
        <br>
        <input type="radio" id="p27" name="a9" value="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);" required>
      </p>
    </td>
  </tr>



  <!--  <input type = "hidden" name = "a9">  -->


  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
    <td style="background: #914a31;color: white;">
      <div align="center">
        <h4>
          <textarea style="text-align:center;" name="result1" id="resultadox" readonly required></textarea>
        </h4>
      </div>
    </td>
  </tr>
</table>


<!-- ACTIVIDAD INICIAL-->
<!--BLOQUE 2 -->

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>


<!--SEGUNDA TABLA-->


<table id="tablaMantenimiento" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;">
  <tr>
    <thead>

      <th colspan="2" scope="col" style="background: #914a31;color: white;">CONSIDERACIONES</th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno (1)</th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">
        <div align="center">Bueno (0.5)</div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Regular (0)</th>
    </thead>
  </tr>

  <tr>

    <!-- titulo vetrical de la tabla  -->
    <!-- primera pregunta  -->
    <td width="2%" rowspan="8" style="background: #f2b440;color: white;">
      <p class="verticalText" style="margin-left:15px;"><b>GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS</b></p>
    </td>
    <td width="25%">
      <p align="justify" style="padding:10px">Cumplimiento del plan de mantenimiento </p>
    </td>
    <td width="2%"><br>Plan de mantenimiento ejecutado totalmente hasta la fecha.</br>
      <input type="radio" id="p28" name="d1" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" /></p>
    </td>
    <td width="12%">
      <p align="center"><br>Plan de mantenimiento ejecutado parcialmente hasta la fecha.<br>
        <input type="radio" id="p29" name="d1" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <br>

    </p>

    </td>
    <td width="12%">
      <p align="center"><br>Plan de mantenimiento NO ejecutado.<br>
        <input type="radio" id="p30" name="d1" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
        </span>
      </p>
    </td>
  </tr>

  <!-- segunda  pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Orden</p>
    </td>
    <td>
      <p><br>Espacios, máquinas y herramientas totalmente en orden.</br>
        <input type="radio" id="p31" name="d2" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>-------<br>

        <br>
      </p>
    </td>
    <td>
      <p align="center"><br>Espacios, máquinas y herramientas en desorden.
        <br>
        <input type="radio" id="p33" name="d2" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Limpieza</p>
    </td>
    <td>
      <p> Espacios, máquinas y herramientas limpias.<br>

        <input type="radio" id="p34" name="d3" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        -------<br>

      </p>
    </td>
    <td>
      <p align="center"><br>
        Espacios, máquinas y herramientas sucias.<br>
        <input type="radio" id="p36" name="d3" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Funcionamiento Óptimo de Equipos y Máquinas</p>
    </td>
    <td>
      <p> <br>Todos los equipos y máquinas operan de manera óptima, con mínima incidencia de fallos.<br>
        <input type="radio" id="p37" name="d4" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Varios equipos y máquinas NO operan de manera óptima.<br>
        <input type="radio" id="p38" name="d4" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Todos los equipos y máquinas NO operan de manera óptima.
        <br>
        <input type="radio" id="p39" name="d4" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- Quinta pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding: 10px">Gestión de recursos para mantenimiento</p>
    </td>
    <td>
      <p>Recursos gestionados a tiempo para cada tarea de mantenimiento
        <br>
        <input type="radio" id="p40" name="d5" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Recursos gestionados a destiempo para cada tarea de mantenimiento.<br>
        <input type="radio" id="p41" name="d5" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Recursos gestionados a destiempo y de manera inadecuada.
        <br>
        <input type="radio" id="p42" name="d5" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Sexta pregunta  -->
  <tr>
    <td>
      <p align="justify" style="padding: 10px">Fichas de Equipos y Máquinas</p>
    </td>
    <td>
      <p><br>Todas las fichas están actualizadas, con información completa y precisa.
        <br>
        <input type="radio" id="p43" name="d6" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Varias fichas NO están actualizadas, con información completa y precisa.<br>
        <input type="radio" id="p44" name="d6" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Todas las fichas NO están actualizadas, con información completa y precisa.
        <br>
        <input type="radio" id="p45" name="d6" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Septima pregunta  -->
  <tr>
    <td>
      <p align="justify" style="padding: 10px">Bitácoras</p>
    </td>
    <td>
      <p><br>Bitácoras actualizadas con registros e información completa
        <br>
        <input type="radio" id="p46" name="d7" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Bitácoras actualizadas SIN registros e información completa<br>
        <input type="radio" id="p47" name="d7" value="0.5" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        Bitácoras desactualizadas.
        <br>
        <input type="radio" id="p48" name="d7" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>

  <!-- Octava pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding: 10px">Informe</p>
    </td>
    <td>
      <p>El documento es presentado el día solicitado.
        <br>
        <input type="radio" id="p49" name="d8" value="1" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>-------<br>

      </p>
    </td>
    <td>
      <p align="center"><br>
        El documento NO es presentado el día solicitado.
        <br>
        <input type="radio" id="p51" name="d8" value="0" onchange="resultadofinald(this.value);" onclick="resultado2(this.value);" required>
      </p>
    </td>
  </tr>

  <!--  <input type = "hidden" name = "a9">  -->

  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
    <td style="background: #914a31;color: white;">
      <div align="center">
        <h4>
          <textarea style="text-align:center;" name="result2" id="resultadox2" readonly required></textarea>
        </h4>
      </div>
    </td>
  </tr>
</table>

<!-- DOCUMENTACION -->
<!--BLOQUE 3 -->

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>


<!--TERCERA TABLA-->



<table id="tablaResponsablesPracticas" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;">
  <tr>
    <thead>

      <th colspan="2" scope="col" style="background: #914a31;color: white;">CONSIDERACIONES</th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Muy Bueno (1)</th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">
        <div align="center">Bueno (0.5)</div>
      </th>
      <th width="9%" scope="col" style="background: #914a31;color: white;">Regular (0)</th>
    </thead>
  </tr>

  <tr>

    <!-- titulo vetrical de la tabla  -->
    <!-- primera pregunta  -->
    <td width="2%" rowspan="4" style="background: #f2b440;color: white;">
      <p class="verticalText" style="margin-left:15px;"><b>GESTIÓN DE LOS RESPONSABLES DE PRÁCTICAS LABORALES</b></p>
    </td>
    <td width="25%">
      <p align="justify" style="padding:10px">Cronograma</p>
    </td>
    <td width="2%"><br>Cronograma de prácticas ejecutado totalmente hasta la fecha.</br>
      <input type="radio" id="p52" name="f1" value="1" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" /></p>
    </td>
    <td width="12%">
      <p align="center"><br>Cronograma de prácticas ejecutado parcialmente hasta la fecha.<br>
        <input type="radio" id="p53" name="f1" value="0.5" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" />
      </p>
    </td>
    <br>

    </p>
    </div>
    </td>
    <td width="12%">
      <p align="center"><br>Cronograma de prácticas NO ejecutado.<br>
        <input type="radio" id="p54" name="f1" value="0" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" required>
        </span>
      </p>
    </td>
  </tr>

  <!-- segunda  pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Base de empresas/instituciones</p>
    </td>
    <td>
      <p><br>Base de datos se encuentra actualizada con información completa y acuerdos vigentes.</br>
        <input type="radio" id="p55" name="f2" value="1" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>Base de datos desactualizada, pero con información completa y acuerdos vigentes.<br>
        <input type="radio" id="p56" name="f2" value="0.5" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" required>
        <br>
      </p>
    </td>
    <td>
      <p align="center"><br>Base de datos desactualizada y sin información completa y acuerdos vigentes.
        <br>
        <input type="radio" id="p57" name="f2" value="0" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Informe o documentos necesarios</p>
    </td>
    <td>
      <p> Los documentos son presentados el día solicitado.<br>

        <input type="radio" id="p58" name="f3" value="1" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        -------<br>

      </p>
    </td>
    <td>
      <p align="center"><br>
        Los documentos NO son presentados el día solicitado.<br>
        <input type="radio" id="p60" name="f3" value="0" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" required>
      </p>
    </td>
  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    <td>
      <p align="justify" style="padding:10px">Contenido</p>
    </td>
    <td>
      <p> <br>El contenido en cada elemento del informe/documento tiene relación con lo solicitado en el formato y el trabajo realizado.<br>
        <input type="radio" id="p61" name="f4" value="1" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        El contenido en cada elemento del informe/documento NO tiene relación con lo solicitado en el formato, pero si con el trabajo realizado.<br>
        <input type="radio" id="p62" name="f4" value="0.5" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" />
      </p>
    </td>
    <td>
      <p align="center"><br>
        El contenido en cada elemento del informe/documento NO tiene relación con lo solicitado en el formato ni con el trabajo realizado.
        <br>
        <input type="radio" id="p63" name="f4" value="0" onchange="resultadofinalf(this.value);" onclick="resultado3(this.value);" required>
      </p>
    </td>
  </tr>


  <!--  <input type = "hidden" name = "a9">  -->

  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
    <td style="background: #914a31;color: white;">
      <div align="center">
        <h4>
          <textarea style="text-align:center;" name="result3" id="resultadox3" readonly required></textarea>
        </h4>
      </div>
    </td>
  </tr>
</table>

<!-- MATERIAL - EQUIPOS -->
<!-- BLOQUE 5 -->

<td>
  <table id="somosTUVN" border="2" align="center" cellpadding="2" cellspacing="2" style="border: #270D07 3px solid; width: 67.4em;">

    <tr>
      <thead>

    </tr>
    <tr>
      <td width="25%" style="background: #914a31; color: white; text-align: center;"><strong>CONSIDERACIONES</strong></td>
      <td width="25%" style="background: #914a31; color: white; text-align: center;"><strong>Muy bueno (8)</strong></td>
      <td width="25%" style="background: #914a31; color: white; text-align: center;"><strong>Bueno (4)</strong></td>
      <td width="25%" style="background: #914a31; color: white; text-align: center;"><strong>Regular (0)</strong></td>
    </tr>
    <tr>

      <td align="center" style="padding: 10px">Participación</td>
      <td>
        <p>Participa totalmente en la actividad
          <br>
          <input type="radio" name="h1" value="8" onchange="resultadofinali(this.value);" onclick="resultado4(this.value);" />
        </p>
      </td>

      <td>
        <p>Participa parcialmente en la actividad
          <br>
          <input type="radio" name="h1" value="4" onchange="resultadofinali(this.value);" onclick="resultado4(this.value);" />
        </p>
      </td>
      <td>
        <p>NO participa en la actividad
          <br>
          <input type="radio" name="h1" value="0" onchange="resultadofinali(this.value);" onclick="resultado4(this.value);" required>
        </p>
      </td>
    </tr>
    <tr>
      <td style="background: #914a31;color: white;">&nbsp;</td>
      <td colspan="2" style="background: #914a31;color: white;"><b>TOTAL</b></td>
      <td colspan="2" style="background: #914a31;color: white;">
        <div align="center">
          <h4>
            <textarea style="text-align:center;" name="result4" id="resultadox4" readonly required></textarea>
          </h4>
        </div>
      </td>

    </tr>
  </table>
</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

<!-- BLOQUE 6-->

<td>
  <table id="somosTUVN2" border="2" align="center" cellpadding="2" cellspacing="0" style="border: #270D07 3px solid; width: 67.4em;">

    <tr>
      <thead>
        <th width="2%" scope="col" style="background: #914a31;color: white;">&nbsp;</th>
        <th width="25%" scope="col" style="background: #914a31;color: white;">CONSIDERACIONES</th>
        <th width="25%" scope="col" style="background: #914a31;color: white;">Muy Bueno (2)</th>
        <th width="25%" scope="col" style="background: #914a31;color: white;">Bueno (1)</th>
        <th width="25%" scope="col" style="background: #914a31;color: white;">Regular (0)</th>
      </thead>
    </tr>
    <tr>
      <td width="2%" rowspan="5" style="background: #f2b440;color: white;">
        <p class="verticalText" style="margin-left:15px;"><b>NOTA 2</b></p>
      </td>
      <td align="justify" style="padding: 10px">Cronograma</td>
      <td>Cronograma ejecutado totalmente hasta la fecha
        <br>
        <input type="radio" name="i1" value="2" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>Cronograma ejecutado parcialmente hasta la fecha
        <br>
        <input type="radio" name="i1" value="1" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>Cronograma NO ejecutado
        <br>
        <input type="radio" name="i1" value="0" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" required>
        </p>
      </td>
    </tr>
    <tr>
      <td align="justify" style="padding: 10px">Responsabilidad en la Ejcución</td>
      <td>Cumple con todas sus tareas de manera puntual y eficiente, sin necesidad de supervisión constante
        <br>
        <input type="radio" name="i2" value="2" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>Cumple con la mayoría de responsabilidades aunque requiere recordatorios ocasionales
        <br>
        <input type="radio" name="i2" value="1" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>Cumple con algunas responsabilidades, pero siempre necesita supervisión o recordatorios
        <br>
        <input type="radio" name="i2" value="0" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" required>
        </p>
      </td>
    </tr>
    <tr>
      <td align="justify" style="padding: 10px">Cumplimiento de plazos</td>
      <td>Todas las actividades asignadas se completan dentro de los plazos establecidos, con alta calidad
        <br>
        <input type="radio" name="i3" value="2" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>La mayoría de las actividades se completan a tiempo, con algunos ajustes necesarios
        <br>
        <input type="radio" name="i3" value="1" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>Algunas actividades se completan fuera de plazo o con calidad insuficiente
        <br>
        <input type="radio" name="i3" value="0" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" required>
        </p>
      </td>
    </tr>
    <tr>
      <td align="justify" style="padding: 10px">Producto</td>
      <td>El producto tiene las caracteristicas establecidas en la propuesta
        <br>
        <input type="radio" name="i4" value="2" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" />
        </p>
      </td>
      <td>-------<br>

        <br>
        <label>
          </p>
      </td>
      <td>El producto NO tiene las caracteristicas establecidas en la propuesta

        <br>
        <input type="radio" name="i4" value="0" onchange="resultadofinali(this.value);" onclick="resultado5(this.value);" required>
        </p>
      </td>
    </tr>
    <tr>

    <tr>
      <td style="background: #914a31;color: white;">&nbsp;</td>
      <td colspan="3" style="background: #914a31;color: white;"><b>TOTAL</b></td>
      <td style="background: #914a31;color: white;">
        <div align="center">
          <h4>
            <textarea style="text-align:center;" name="result5" id="resultadox5" readonly required></textarea>
          </h4>
        </div>
      </td>
    </tr>
  </table>
</td>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>