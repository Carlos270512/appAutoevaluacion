<?php
$id_periodo = $_POST['id_periodo'];

$mysqli = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
 $query = $mysqli -> query ("SELECT codigo FROM periodolectivo WHERE id='$id_periodo'");
 $row_u = mysqli_fetch_array($query);
 $codigo=$row_u['codigo'];
 ?>
 <input type="" maxlength="8" minlength="8" value="<?php echo $codigo; ?>" name="codigo" class="texto" required="" onkeypress="return soloNumeros(event)" style="position: absolute; left: 500px; top: 192px;height: 20px; font-size: 11px;z-index: 8">

 <?php

 ?>