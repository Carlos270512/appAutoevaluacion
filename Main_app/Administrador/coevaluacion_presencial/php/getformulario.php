<?php
$nombre = $_POST['nombre'];
$coeval = $_POST['coeval'];
$aula = $_POST['aula'];
$mysqli = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
$query = $mysqli->query("SELECT nombre  FROM carreras WHERE nombre='$nombre'");
$row_u = mysqli_fetch_array($query); ?>

<?php if ($coeval == "GESTIÓN DE LOS COORDINADORES/DOCENTES") {

  echo  '
  <h2>
      <div text-align: center; class="page-header">
        <h2 style=" font-size:26px;"><b>GESTIÓN DE LOS COORDINADORES / DOCENTES</b></h2>
      </div>
  </h2>

  <table border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;">
  <tr><thead>
 
    <th colspan="2" scope="col"style="background:#914a31;color: white;">Consideraciones</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Muy Bueno</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Bueno</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Regular</th>
  </thead>
  <thead>
    <th colspan="2" scope="col"style="background: #914a31;color: white;"></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">1</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0.5</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0</th>
  </thead></tr>
  
  <tr>
 
       <!-- titulo vetrical de la tabla  -->
           <!-- primera pregunta  -->
    <td width="2%" rowspan="9" style="background: #f2b440;color: white;"><p class="verticalText" style="margin-left:15px;"><b>GESTIÓN DE LOS COORDINADORES / DOCENTES</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Convocatoria</p></td>
     <td width="5%" style="padding:10px"><p><br>CONVOCATORIA DETALLADA Y ENVIADA PUNTUALMENTE</br>
  <input type = "radio" id="p1"  name = "a1" value = "1"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);" /></p></td>
    <td width="12%" style="padding:10px"><p align="center" >CONVOCATORIA DETALLADA Y ENVIADA A DESTIEMPO<br>
     <input type = "radio" id="p2"  name = "a1" value = "0.5"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);" /></p></td>
      <br>
        
      </p>
    </div></td>
   <td width="12%" style="padding:10px"><p align="center">CONVOCATORIA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO<br>
        <input type = "radio"  id="p3"  name = "a1" value ="0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </span></p></td>
  </tr>

<!-- segunda  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Acta</p></td>
    <td style="padding:10px"><p>ACTA DETALLADA Y ENVIADA PUNTUALMENTE</br>
          <input type = "radio" id="p4"  name = "a2" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td width="12%" style="padding:10px"><p align="center" >ACTA DETALLADA Y ENVIADA A DESTIEMPO<br>
     <input type = "radio" id="p5"  name = "a2" value = "0.5"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);" /></p></td>
      <br>
      </p>
    </td>
    <td><p align="center">ACTA SIN LOS DETALLES NECESARIOS Y ENVIADA A DESTIEMPO<br>
        <input type = "radio" id="p6" name = "a2" value ="0"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Eventos institucionales</p></td>
    <td style="padding:10px"><p>EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA Y EL CONTROL DEL GRUPO DE DOCENTES<br>
    
          <input type = "radio" id="p7" name = "a3" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">EN TODOS LOS EVENTOS INSTITUCIONALES SE EVIDENCIA EL APORTE DE LA CARRERA, PERO NO EL CONTROL DEL GRUPO DE DOCENTES<br>
        <input type = "radio" id="p8"name = "a3" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">LA CARRERA NO PARTICIPA EN TODOS LOS EVENTOS INSTITUCIONALES NI TAMPOCO SE EVIDENCIA EL CONTROL DEL GRUPO DE DOCENTES<br>
        <input type = "radio" id="p9"name = "a3" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Informes de eventos institucionales</p></td>
    <td style="padding:10px"><p>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS<br>
    
          <input type = "radio" id="p10" name = "a4" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
        <input type = "radio" id="p11"name = "a4" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
        <input type = "radio" id="p12"name = "a4" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>
  <!-- Quinta pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Planificación de coevaluaciones</p></td>
    <td style="padding:10px"><p>PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES<br>
    
          <input type = "radio" id="p13" name = "a5" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">PLANIFICACIÓN ENTREGADA A TIEMPO EN LA CUAL NO SE EVALÚA A TODOS LOS DOCENTES<br>
        <input type = "radio" id="p14" name = "a5" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">PLANIFICACIÓN ENTREGADA A DESTIEMPO EN LA CUAL SE EVALÚA A TODOS LOS DOCENTES<br>
        <input type = "radio" id="p15" name = "a5" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>

  <!-- Sexta pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Ejecución de coevaluaciones</p></td>
    <td style="padding:10px"><p>SE EVALÚA A TODOS LOS DOCENTES SEGÚN LA PLANIFICACIÓN<br>
    
          <input type = "radio" id="p16" name = "a6" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">SE EVALÚA A TODOS LOS DOCENTES SIN CUMPLIR TOTALMENTE LA PLANIFICACIÓN<br>
        <input type = "radio" id="p17" name = "a6" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">NO SE EVALÚA A TODOS LOS DOCENTES NI TAMPOCO SE CUMPLE LA PLANIFICACIÓN<br>
        <input type = "radio" id="p18" name = "a6" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>

  <!-- Septima pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Informe de la evaluación de las actividades de docencia</p></td>
    <td style="padding:10px"><p>TODOS LOS INFORMES SON PRESENTADOS EL DÍA SOLICITADO Y CON LOS DETALLES REQUERIDOS<br>
    
          <input type = "radio" id="p19" name = "a7" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">VARIOS INFORMES SON PRESENTADOS A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
        <input type = "radio" id="p20" name = "a7" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">TODOS LOS INFORMES SON A DESTIEMPO O SIN LOS DETALLES REQUERIDOS<br>
        <input type = "radio" id="p21" name = "a7" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>

  <!-- Octava pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Aprobación de evaluaciones y portafolios</p></td>
    <td style="padding:10px"><p>TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE Y APROBADOS A TIEMPO<br>
    
          <input type = "radio" id="p22" name = "a8" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">TODAS LAS EVALUACIONES Y PORTAFOLIOS SON REVISADOS MINUCIOSAMENTE PERO NO APROBADOS A TIEMPO<br>
        <input type = "radio" id="p23" name = "a8" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">VARIAS EVALUACIONES Y PORTAFOLIOS NO SON REVISADOS MINUCIOSAMENTE NI APROBADOS A TIEMPO<br>
        <input type = "radio" id="p24" name = "a8" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>

  <!-- Novena pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Acompañamiento a los docentes de la carrera</p></td>
    <td style="padding:10px"><p>SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, DETALLADO Y EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA<br>
    
          <input type = "radio" id="p25" name = "a9" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">SE REALIZA UN ACOMPAÑAMIENTO CONTINUO, PERO NO DETALLADO NI EFECTIVO A TODOS LOS DOCENTES DE LA CARRERA<br>
        <input type = "radio" id="p26" name = "a9" value = "0.5" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">NO SE REALIZA UN ACOMPAÑAMIENTO CONTINUO A TODOS LOS DOCENTES DE LA CARRERA<br>
        <input type = "radio" id="p26" name = "a9" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>


 <!-- ///////////// <input type = "hidden" name = "a6">  -->

        
  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #914a31;color: white;"><b>TOTAL</b></td>
   <td style="background: #914a31;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result1" id="resultadox1" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>';
} else if ($coeval == "GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS") {
  echo  '
  <h2>
      <div text-align: center; class="page-header">
        <h2 style=" font-size:26px;"><b>GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES / LABORATORIOS</b></h2>
      </div>
  </h2>
  <table border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;">
  <tr><thead>
 
    <th colspan="2" scope="col"style="background: #914a31;color: white;">Consideraciones</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Muy Bueno</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Bueno</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Regular</th>
  </thead>
  <thead>
    <th colspan="2" scope="col"style="background: #914a31;color: white;"></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">1</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0.5</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0</th>
  </thead></tr>
  
  <tr>
 
       <!-- titulo vetrical de la tabla  -->
           <!-- primera pregunta  -->
    <td width="2%" rowspan="8" style="background: #f2b440;color: white;"><p class="verticalText" style="margin-left:15px;"><b>GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES / LABORATORIOS</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Cumplimiento del plan de mantenimiento </p></td>
     <td width="5%" style="padding:10px"><p><br>PLAN DE MANTENIMIENTO EJECUTADO TOTALMENTE HASTA LA FECHA</br>
  <input type = "radio" id="q1"  name = "d1" value = "1"  onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" /></p></td>
    <td width="12%" style="padding:10px"><p align="center" >PLAN DE MANTENIMIENTO EJECUTADO PARCIALMENTE HASTA LA FECHA<br>
     <input type = "radio" id="q2"  name = "d1" value = "0.5"  onchange="resultadofinald(this.value);" onclick="resultado4(this.value);" /></p></td>
      <br>
        
      </p>
    </div></td>
   <td width="12%" style="padding:10px"><p align="center">PLAN DE MANTENIMIENTO NO EJECUTADO<br>
        <input type = "radio"  id="q3"  name = "d1" value ="0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </span></p></td>
  </tr>

<!-- segunda  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Orden</p></td>
    <td style="padding:10px"><p>ESPACIOS, MÁQUINAS Y HERRAMIENTAS TOTALMENTE EN ORDEN</br>
          <input type = "radio" id="q4"  name = "d2" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td width="12%" style="padding:10px"><p align="center" >-------<br>
      <br>
      </p>
    </td>
    <td><p align="center">ESPACIOS, MÁQUINAS Y HERRAMIENTAS EN DESORDEN<br>
        <input type = "radio" id="q6" name = "d2" value ="0"  onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Limpieza</p></td>
    <td style="padding:10px"><p>ESPACIOS, MÁQUINAS Y HERRAMIENTAS LIMPIAS<br>
    
          <input type = "radio" id="q7" name = "d3" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">-------<br>
      </p></td>
    <td style="padding:10px"><p align="center">ESPACIOS, MÁQUINAS Y HERRAMIENTAS SUCIAS<br>
        <input type = "radio" id="q9"name = "d3" value = "0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Funcionamiento Óptimo de Equipos y Máquinas</p></td>
    <td style="padding:10px"><p>TODOS LOS EQUIPOS Y MÁQUINAS OPERAN DE MANERA ÓPTIMA, CON MÍNIMA INCIDENCIA DE FALLOS<br>
    
          <input type = "radio" id="q10" name = "d4" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">VARIOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA<br>
        <input type = "radio" id="q11"name = "d4" value = "0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">TODOS LOS EQUIPOS Y MÁQUINAS (NO) OPERAN DE MANERA ÓPTIMA<br>
        <input type = "radio" id="q12"name = "d4" value = "0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>
  <!-- Quinta pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Gestión de recursos para mantenimiento</p></td>
    <td style="padding:10px"><p>RECURSOS GESTIONADOS A TIEMPO PARA CADA TAREA DE MANTENIMIENTO<br>
    
          <input type = "radio" id="q13" name = "d5" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">RECURSOS GESTIONADOS A DESTIEMPO PARA CADA TAREA DE MANTENIMIENTO<br>
        <input type = "radio" id="q14" name = "d5" value = "0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">RECURSOS GESTIONADOS A DESTIEMPO Y DE MANERA INADECUADA<br>
        <input type = "radio" id="q15" name = "d5" value = "0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>

  <!-- Sexta pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Fichas de Equipos y Máquinas</p></td>
    <td style="padding:10px"><p>TODAS LAS FICHAS ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA<br>
    
          <input type = "radio" id="q16" name = "d6" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">VARIAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA<br>
        <input type = "radio" id="q17" name = "d6" value = "0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">TODAS LAS FICHAS (NO) ESTÁN ACTUALIZADAS, CON INFORMACIÓN COMPLETA Y PRECISA<br>
        <input type = "radio" id="q18" name = "d6" value = "0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>

  <!-- Septima pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Bitácoras</p></td>
    <td style="padding:10px"><p>BITÁCORAS ACTUALIZADAS CON REGISTROS E INFORMACIÓN COMPLETA<br>
    
          <input type = "radio" id="q19" name = "d7" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">BITÁCORAS ACTUALIZADAS (SIN) REGISTROS E INFORMACIÓN COMPLETA<br>
        <input type = "radio" id="q20" name = "d7" value = "0.5" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">BITÁCORAS DESACTUALIZADAS<br>
        <input type = "radio" id="q21" name = "d7" value = "0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>

  <!-- Octava pregunta  -->
  <tr>
    <td><p align="justify" style="padding:10px">Informe</p></td>
    <td style="padding:10px"><p>EL DOCUMENTO ES PRESENTADO EL DÍA SOLICITADO<br>
    
          <input type = "radio" id="q22" name = "d8" value = "1" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">-------<br>
      </p></td>
    <td style="padding:10px"><p align="center">EL DOCUMENTO (NO) ES PRESENTADO EL DÍA SOLICITADO<br>
        <input type = "radio" id="q24" name = "d8" value = "0" onchange="resultadofinald(this.value);" onclick="resultado4(this.value);"required>
      </p></td>
  </tr>


 <!-- ///////////// <input type = "hidden" name = "a6">  -->

        
  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #914a31;color: white;"><b>TOTAL</b></td>
   <td style="background: #914a31;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result2" id="resultadox4" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>';
} else if ($coeval == "RESPONSABLES DE PRÁCTICAS LABORALES") {
  echo '
  <h2>
      <div text-align: center; class="page-header">
        <h2 style=" font-size:26px;"><b>RESPONSABLES DE PRÁCTICAS LABORALES</b></h2>
      </div>
  </h2>
  <table border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;">
  <tr><thead>
 
    <th colspan="2" scope="col"style="background: #914a31;color: white;">Consideraciones</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Muy Bueno</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Bueno</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Regular</th>
  </thead>
  <thead>
    <th colspan="2" scope="col"style="background: #914a31;color: white;"></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">1</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0.5</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0</th>
  </thead></tr>
  
  <tr>
 
       <!-- titulo vetrical de la tabla  -->
           <!-- primera pregunta  -->
    <td width="2%" rowspan="4" style="background: #f2b440;color: white;"><p class="verticalText" style="margin-left:15px;"><b>RESPONSABLES DE PRÁCTICAS LABORALES</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Cronograma</p></td>
     <td width="5%" style="padding:10px"><p><br>CRONOGRAMA DE PRÁCTICAS EJECUTADO TOTALMENTE HASTA LA FECHA</br>
  <input type = "radio" id="g1"  name = "f1" value = "1"  onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" /></p></td>
    <td width="12%" style="padding:10px"><p align="center" >CRONOGRAMA DE PRÁCTICAS EJECUTADO PARCIALMENTE HASTA LA FECHA<br>
     <input type = "radio" id="g2"  name = "f1" value = "0.5"  onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);" /></p></td>
      <br>
        
      </p>
    </div></td>
   <td width="12%" style="padding:10px"><p align="center">CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO<br>
        <input type = "radio"  id="g3"  name = "f1" value ="0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"required>
      </span></p></td>
  </tr>

<!-- segunda  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Base de empresas/instituciones</p></td>
    <td style="padding:10px"><p>BASE DE DATOS SE ENCUENTRA ACTUALIZADA CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES</br>
          <input type = "radio" id="g4"  name = "f2" value = "1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"/>
        </p></td>
    <td width="12%" style="padding:10px"><p align="center" >BASE DE DATOS DESACTUALIZADA, PERO CON INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES<br>
      <input type = "radio" id="g6" name = "f2" value ="0.5"  onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"required>
      <br>
      </p>
    </td>
    <td><p align="center">BASE DE DATOS DESACTUALIZADA Y SIN INFORMACIÓN COMPLETA Y ACUERDOS VIGENTES<br>
        <input type = "radio" id="g7" name = "f2" value ="0"  onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"required>
      </p></td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Informe o documentos necesarios</p></td>
    <td style="padding:10px"><p>LOS DOCUMENTOS SON PRESENTADOS EL DÍA SOLICITADO<br>
    
          <input type = "radio" id="g8" name = "f3" value = "1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">-------<br>
      </p></td>
    <td style="padding:10px"><p align="center">LOS DOCUMENTOS NO SON PRESENTADOS EL DÍA SOLICITADO<br>
        <input type = "radio" id="g9"name = "f3" value = "0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"required>
      </p></td>
  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Contenido</p></td>
    <td style="padding:10px"><p>EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO Y EL TRABAJO REALIZADO<br>
    
          <input type = "radio" id="g10" name = "f4" value = "1" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO, PERO SI CON EL TRABAJO REALIZADO<br>
        <input type = "radio" id="g11"name = "f4" value = "0.5" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">EL CONTENIDO EN CADA ELEMENTO DEL INFORME/DOCUMENTO NO TIENE RELACIÓN CON LO SOLICITADO EN EL FORMATO NI CON EL TRABAJO REALIZADO<br>
        <input type = "radio" id="g12"name = "f4" value = "0" onchange="resultadofinalf(this.value);" onclick="resultado5(this.value);"required>
      </p></td>
  </tr>
  
        
  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #914a31;color: white;"><b>TOTAL</b></td>
   <td style="background: #914a31;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result3" id="resultadox5" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>';
} else if ($coeval == "GESTION DE SOMOS TUVN EN LOS DOCENTES") {
  echo  '
  <h2>
      <div text-align: center; class="page-header">
        <h2 style=" font-size:26px;"><b>GESTION DE SOMOS TUVN EN LOS DOCENTES</b></h2>
      </div>
  </h2><br><br>
  
<table id="segundaTabla" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em; false>
  <tr>
  <thead>
 
    <th colspan="5" scope="col" style="background: #f2b440; color: white; text-align: center;">EN EL CASO DE PARTICIPAR</th>

  </thead>
  <thead>
 
    <th colspan="2" scope="col"style="background: #914a31;color: white;">Consideraciones</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Muy Bueno</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Bueno</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Regular</th>
  </thead>
  <thead>
    <th colspan="2" scope="col"style="background: #914a31;color: white;"></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">8</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">4</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0</th>
  </thead></tr>
  
  <tr>
       <!-- titulo vetrical de la tabla  -->
           <!-- primera pregunta  -->
    <td width="2%" rowspan="1" style="background: #f2b440;color: white;"><p class="verticalText" style="margin-left:15px;"><b>NOTA 1</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Participación</p></td>
     <td width="2%"><p align="center" style="padding:10px">PARTICIPA TOTALMENTE EN LA ACTIVIDAD</br>
  <input type = "radio" id="t1"  name = "h1" value = "8"  onchange="resultadofinali(this.value);" onclick="resultado7(this.value);" /></p></td>
    <td width="2%"><p align="center" style="padding:10px">PARTICIPA PARCIALMENTE EN LA ACTIVIDAD</br>
  <input type = "radio" id="t2"  name = "h1" value = "4"  onchange="resultadofinali(this.value);" onclick="resultado7(this.value);" /></p></td>
   <td width="12%"><p align="center" style="padding:10px"><br>(NO) PARTICIPA EN LA ACTIVIDAD<br>
        <input type = "radio"  id="t3"  name = "h1" value ="0" onchange="resultadofinali(this.value);" onclick="resultado7(this.value);"required>
      </span></p></td>
  </tr>

  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #914a31;color: white;"><b>TOTAL</b></td>
   <td style="background: #914a31;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result4" id="resultadox7" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>


<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

<!--SEGUNDA TABLA-->
<table id="segundaTabla" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid; width: 67.4em;" false>
  <tr>
  <thead>
 
    <th colspan="5" scope="col" style="background: #f2b440; color: white; text-align: center;">EN EL CASO DE PARTICIPAR</th>

  </thead>
  <thead>
 
    <th colspan="2" scope="col"style="background: #914a31;color: white;">Consideraciones</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Muy Bueno</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Bueno</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">Regular</th>
  </thead>
  <thead>
    <th colspan="2" scope="col"style="background: #914a31;color: white;"></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">2</th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">1</div></th>
    <th width="9%" scope="col"style="background: #914a31;color: white;">0</th>
  </thead></tr>
  
  <tr>
 
       <!-- titulo vetrical de la tabla  -->
           <!-- primera pregunta  -->
    <td width="2%" rowspan="4" style="background: #f2b440;color: white;"><p class="verticalText" style="margin-left:15px;"><b>NOTA 2</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Cronograma</p></td>
     <td width="5%" style="padding:10px"><p><br>CRONOGRAMA EJECUTADO TOTALMENTE HASTA LA FECHA</br>
  <input type = "radio" id="v1"  name = "i1" value = "2"  onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" /></p></td>
    <td width="12%" style="padding:10px"><p align="center" >CRONOGRAMA EJECUTADO PARCIALMENTE HASTA LA FECHA<br>
     <input type = "radio" id="v2"  name = "i1" value = "1"  onchange="resultadofinali(this.value);" onclick="resultado9(this.value);" /></p></td>
      <br>
        
      </p>
    </div></td>
   <td width="12%" style="padding:10px"><p align="center">CRONOGRAMA DE PRÁCTICAS (NO) EJECUTADO<br>
        <input type = "radio"  id="v3"  name = "i1" value ="0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"required>
      </span></p></td>
  </tr>

<!-- segunda  pregunta  -->

  <tr>
    <td><p align="justify" style="padding:10px">Responsabilidad la Ejecución</p></td>
    <td style="padding:10px"><p>CUMPLE CON TODAS SUS TAREAS DE MANERA PUNTUAL Y EFICIENTE, SIN NECESIDAD DE SUPERVISION CONSTANTE.</br>
          <input type = "radio" id="v4"  name = "i2" value = "2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"/>
        </p></td>
    <td width="12%" style="padding:10px"><p align="center" >CUMPLE CON LA MAYORIA DE SUS RESPONSABILIDADES, AUNQUE REQUIERE RECORDATORIS OCASIONALES<br>
      <input type = "radio" id="v6" name = "i2" value ="1"  onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"required>
      <br>
      </p>
    </td>
    <td><p align="center">CUMPLE CON ALGUNAS RESPONSABILIDADES PERO SIEMPRE NECESITA SUPERVISION O RECORDATORIOS<br>
        <input type = "radio" id="v7" name = "i2" value ="0"  onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"required>
      </p></td>
  </tr>
  <!-- tercera  pregunta  -->

  <tr>

    <td><p align="justify" style="padding:10px">Cumplimiento de Plazos</p></td>
    <td style="padding:10px"><p>TODAS LAS ACTIVIDADES ASIGNADAS SE COMPLETAN DENTRO DE LOS PLAZOS ESTABLECIDOS, CON ALTA CALIDAD<br>
    
          <input type = "radio" id="v8" name = "i3" value = "2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">LA MAYORIA DE LAS ACTIVIDADES SE COMPLETA A TIEMPO, CON ALGUNOS AJUSTES NECESARIOS<br>
        <input type = "radio" id="v9"name = "i3" value = "1" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"/>
      </p></td>
    <td style="padding:10px"><p align="center">ALGUNAS ACTIVIDADES SE COMPLETAN FUERA DE PLAZO O CON CALIDAD INSUFICIENTE<br>
        <input type = "radio" id="v10"name = "i3" value = "0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"required>
      </p></td>

  </tr>
  <!-- cuarta pregunta  -->

  <tr>
    
      <td><p align="justify" style="padding:10px">Producto</p></td>
    <td style="padding:10px"><p>EL PRODUCTO TIENE LAS CARACTERISTICAS ESTABLECIDAS EN EL PROPUESTA<br>
    
          <input type = "radio" id="v11" name = "i4" value = "2" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"/>
        </p></td>
    <td style="padding:10px"><p align="center">-------<br>
      </p></td>
    <td style="padding:10px"><p align="center">EL PRODUCTO (NO) TIENE LAS CARACTERISTICAS ESTABLECIDAS EN LA PROPUESTA<br>
        <input type = "radio" id="v11"name = "i4" value = "0" onchange="resultadofinali(this.value);" onclick="resultado9(this.value);"required>
      </p></td>
  </tr>
  
        
  <tr>
    <td style="background: #914a31;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #914a31;color: white;"><b>TOTAL</b></td>
   <td style="background: #914a31;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result5" id="resultadox9" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>';
}
$mysqli->close();
