<?php
$nombre = $_POST['nombre'];

$mysqli = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
 $query = $mysqli -> query ("SELECT nombre  FROM carreras WHERE nombre='$nombre'");
 $row_u = mysqli_fetch_array($query);

 $nom=$row_u['nombre'];

 if($nom=='TECNOLOGÍA SUPERIOR EN MECÁNICA AUTOMOTRIZ'){
 ?>

<table width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid;">
  <tr><thead>
 
    <th colspan="2" scope="col" style="background: #2c4073;color: white;">ASPECTOS OBSERVADOS</th>
    <th width="9%" scope="col" style="background: #2c4073;color: white;">0</th>
    <th width="9%" scope="col" style="background: #2c4073;color: white;"><div align="center">1</div></th>
    <th width="9%" scope="col" style="background: #2c4073;color: white;">2</th>
  </thead></tr>
  
  <tr>
    <td width="2%" rowspan="6" style="background: #2c4073;color: white;"><p class="verticalText" style="margin-left:15px;"><b>MOODLE</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Documentos académicos institucionales. (calendario académico, syllabus, guías para prácticas, horario de acción tutorial, rúbricas, horario para evaluaciones de recuperación, plantilla ABC)</p></td>
     <td width="2%"><p>NO<br>
  <input type = "radio" id="p1"  name = "a1" value = "0"  onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);" /></p></td>
    <td width="12%"><p align="center" >SI<br>
      (INCOMPLETOS)<br>
        <input type = "radio" id="p2" name = "a1" value ="1" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p>
    </div></td>
   <td width="12%"><p align="center">SI<br>
    (COMPLETOS)<br>
        <input type = "radio"  id="p3"  name = "a1" value ="2" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"required>
      </span></p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding:10px">Documentos de apoyo académico</p></td>
    <td><p>NO<br>
          <input type = "radio" id="p4"  name = "a2" value = "0" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
        </p></td>
 <td><p align="center" >SI<br>

      (UN DOCUMENTO  POR UNIDAD)<br>
        <input type = "radio" id="p5" name = "a2" value ="1" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p>
    </td>
    <td><p align="center">SI<br>
      (MAS DE  UN  DOCUMENTO POR UNIDAD)<br>
        <input type = "radio" id="p6" name = "a2" value ="2"  onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding:10px">Actividades de evaluación</p></td>
    <td><p>NO<br>
    
          <input type = "radio" id="p7" name = "a3" value = "0" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
        </p></td>
    <td><p align="center">SI<br>
      (INCOMPLETAS)<br>
        <input type = "radio" id="p8"name = "a3" value = "1" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
      (CONFORME AL SYLLABUS)<br>
        <input type = "radio" id="p8"name = "a3" value = "2" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding:10px">Trabajos  autónomos</p></td>
    <td><p>NO<br>
        <input type = "radio" id="p8"name = "a4" value = "0"onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p>
  </td>
    <td><p align="center">SI<br>
      (INCOMPLETAS)<br>
        <input type = "radio" id="p8"name = "a4" value = "1" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
(CONFORME AL SYLLABUS)
<br>
        <input type = "radio" id="p9"name = "a4" value = "2" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding: 10px">Trabajos colaborativos (foros-otros)</p></td>
    <td><p>NO
  <br>
          <input type = "radio" id="p10"name = "a5" value = "0" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
        </p></td>
    <td><p align="center">SI<br>(INCOMPLETAS)<br>
        <input type = "radio" id="p8"name = "a5" value = "1" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
(CONFORME AL SYLLABUS)
 <br>
        <input type = "radio" id="p11" name = "a5" value = "2"  onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding: 10px">Clases síncronas planificadas (GOOGLE DRIVE)<br><b>(SOLO PARA SEMIPRESENCIAL)</b></p></td>
    <td><p>NO
  <br>
          <input type = "radio" id="p10"name = "a6" value = "0" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
        </p></td>
    <td><p align="center">SI<br>(NO RELACIONADAS CON EL SYLLABUS)<br>
        <input type = "radio" id="p8"name = "a6" value = "1" onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
(RELACIONADAS CON EL SYLLABUS)M
 <br>
        <input type = "radio" id="p11" name = "a6" value = "2"  onchange="resultadofinal(this.value);" onclick="resultadoM(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td style="background: #2c4073;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #2c4073;color: white;"><b>TOTAL</b></td>
   <td style="background: #2c4073;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result1" id="resultadox" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>

<?php }else{?>



	<table width="100" class="col-md-10 col-md-offset-1" border="2" align="center" cellpadding="2" cellspacing="2" class="footcollapse" style="border: #270D07 3px solid;">
  <tr><thead>
 
    <th colspan="2" scope="col"style="background: #2c4073;color: white;">ASPECTOS OBSERVADOS</th>
    <th width="9%" scope="col"style="background: #2c4073;color: white;">0</th>
    <th width="9%" scope="col"style="background: #2c4073;color: white;"><div align="center">1</div></th>
    <th width="9%" scope="col"style="background: #2c4073;color: white;">2</th>
  </thead></tr>
  
  <tr>
    <td width="2%" rowspan="5" style="background: #2c4073;color: white;"><p class="verticalText" style="margin-left:15px;"><b>MOODLE</b></p></td>
    <td width="25%"><p align="justify" style="padding:10px">Documentos académicos institucionales. (calendario académico, syllabus, guías para prácticas, horario de acción tutorial, rúbricas, horario para evaluaciones de recuperación, plantilla ABC)</p></td>
     <td width="2%"><p>NO<br>
  <input type = "radio" id="p1"  name = "a1" value = "0"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);" /></p></td>
    <td width="12%"><p align="center" >SI<br>
      (INCOMPLETOS)<br>
        <input type = "radio" id="p2" name = "a1" value ="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p>
    </div></td>
   <td width="12%"><p align="center">SI<br>
    (COMPLETOS)<br>
        <input type = "radio"  id="p3"  name = "a1" value ="2" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </span></p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding:10px">Documentos de apoyo académico</p></td>
    <td><p>NO<br>
          <input type = "radio" id="p4"  name = "a2" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
 <td><p align="center" >SI<br>

      (UN DOCUMENTO  POR UNIDAD)<br>
        <input type = "radio" id="p5" name = "a2" value ="1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p>
    </td>
    <td><p align="center">SI<br>
      (MAS DE  UN  DOCUMENTO POR UNIDAD)<br>
        <input type = "radio" id="p6" name = "a2" value ="2"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding:10px">Actividades de evaluación</p></td>
    <td><p>NO<br>
    
          <input type = "radio" id="p7" name = "a3" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td><p align="center">SI<br>
      (INCOMPLETAS)<br>
        <input type = "radio" id="p8"name = "a3" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
      (CONFORME AL SYLLABUS)<br>
        <input type = "radio" id="p8"name = "a3" value = "2" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding:10px">Trabajos  autónomos</p></td>
    <td><p>NO<br>
        <input type = "radio" id="p8"name = "a4" value = "0"onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p>
  </td>
    <td><p align="center">SI<br>
      (INCOMPLETAS)<br>
        <input type = "radio" id="p8"name = "a4" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
(CONFORME AL SYLLABUS)
<br>
        <input type = "radio" id="p9"name = "a4" value = "2" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>
  <tr>
    <td><p align="justify" style="padding: 10px">Trabajos colaborativos (foros-otros)</p></td>
    <td><p>NO
  <br>
          <input type = "radio" id="p10"name = "a5" value = "0" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
        </p></td>
    <td><p align="center">SI<br>(INCOMPLETAS)<br>
        <input type = "radio" id="p8"name = "a5" value = "1" onchange="resultadofinal(this.value);" onclick="resultado(this.value);"/>
      </p></td>
    <td><p align="center">SI<br>
(CONFORME AL SYLLABUS)
 <br>
        <input type = "radio" id="p11" name = "a5" value = "2"  onchange="resultadofinal(this.value);" onclick="resultado(this.value);"required>
      </p></td>
  </tr>

        <input type = "hidden" name = "a6">
  <tr>
    <td style="background: #2c4073;color: white;">&nbsp;</td>
    <td colspan="3"style="background: #2c4073;color: white;"><b>TOTAL</b></td>
   <td style="background: #2c4073;color: white;"><div align="center">
      <h4>
    <textarea style="text-align:center;" name="result1" id="resultadox" readonly required></textarea>
    </h4>
    </div></td>
  </tr>
</table>

<?php } ?>
 <?php

 ?>