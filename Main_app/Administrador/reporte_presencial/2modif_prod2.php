<?php
$coevaluacion = $_POST['coeval'];
$id_coevaluacion_general = $_POST['id_coevaluacion_general'];


if ($coevaluacion === "GESTIÓN DE LOS COORDINADORES/DOCENTES"){
	
	function ModificarProducto1($docente, $carrera, $result1 , $resultado_final, $fortalezas, $debilidades, $compromiso, $a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$id_coevaluacion_general)
	{
		include 'conexion.php';
		$sentencia_general = "UPDATE coevaluacion_general 
		SET 
			docente = '".$docente."', 
			carrera = '".$carrera."', 
			fortalezas = '".$fortalezas."', 
			debilidades = '".$debilidades."', 
			compromiso = '".$compromiso."' 
		WHERE id = '".$id_coevaluacion_general."'";

		mysqli_query($conexion, $sentencia_general);

		$sentencia_1 = "UPDATE coevaluacion1
		SET 
			result1 = '".$result1."', 
			resultado_final = '".$resultado_final."', 
			a1 = '".$a1."', 
			a2 = '".$a2."', 
			a3 = '".$a3."', 
			a4 = '".$a4."', 
			a5 = '".$a5."', 
			a6 = '".$a6."', 
			a7 = '".$a7."', 
			a8 = '".$a8."', 
			a9 = '".$a9."' 
		WHERE id_coevaluacion_general = '".$id_coevaluacion_general."'";

		// Ejecuta la sentencia para `coevaluacion_1`
		mysqli_query($conexion, $sentencia_1);
	}

	ModificarProducto1($_POST['docente'], $_POST['carrera'], $_POST['result1'], $_POST['resultado_final'], $_POST['fortalezas'], $_POST['debilidades'], $_POST['compromiso'], $_POST['a1'],$_POST['a2'],$_POST['a3'],$_POST['a4'],$_POST['a5'],$_POST['a6'],$_POST['a7'], $_POST['a8'], $_POST['a9'], $id_coevaluacion_general);

}else if ($coevaluacion === "GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS"){
	function ModificarProducto2($docente, $carrera, $result2 , $resultado_final, $fortalezas, $debilidades, $compromiso, $aula, $d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$id_coevaluacion_general)
	{
		include 'conexion.php';
		$sentencia_general = "UPDATE coevaluacion_general 
		SET 
			docente = '".$docente."', 
			carrera = '".$carrera."', 
			fortalezas = '".$fortalezas."', 
			debilidades = '".$debilidades."', 
			compromiso = '".$compromiso."' 
		WHERE id = '".$id_coevaluacion_general."'";

		mysqli_query($conexion, $sentencia_general);

		$sentencia_2 = "UPDATE coevaluacion2 
		SET 
			result2 = '".$result2."', 
			resultado_final = '".$resultado_final."',
			aula = '".$aula."', 
			d1 = '".$d1."', 
			d2 = '".$d2."', 
			d3 = '".$d3."', 
			d4 = '".$d4."', 
			d5 = '".$d5."', 
			d6 = '".$d6."', 
			d7 = '".$d7."', 
			d8 = '".$d8."' 
		WHERE id_coevaluacion_general = '".$id_coevaluacion_general."'";

		// Ejecuta la sentencia para `coevaluacion_1`
		mysqli_query($conexion, $sentencia_2);
	}

	ModificarProducto2($_POST['docente'], $_POST['carrera'], $_POST['result2'], $_POST['resultado_final'], $_POST['fortalezas'], $_POST['debilidades'], $_POST['compromiso'], $_POST['aula'],$_POST['d1'],$_POST['d2'],$_POST['d3'],$_POST['d4'],$_POST['d5'],$_POST['d6'],$_POST['d7'], $_POST['d8'], $id_coevaluacion_general);

}else if ($coevaluacion === "RESPONSABLES DE PRÁCTICAS LABORALES"){
	function ModificarProducto3($docente, $carrera, $result3 , $resultado_final, $fortalezas, $debilidades, $compromiso, $f1,$f2,$f3,$f4,$id_coevaluacion_general)
	{
		include 'conexion.php';
		$sentencia_general = "UPDATE coevaluacion_general 
		SET 
			docente = '".$docente."', 
			carrera = '".$carrera."', 
			fortalezas = '".$fortalezas."', 
			debilidades = '".$debilidades."', 
			compromiso = '".$compromiso."' 
		WHERE id = '".$id_coevaluacion_general."'";

		mysqli_query($conexion, $sentencia_general);

		$sentencia_3 = "UPDATE coevaluacion3 
		SET 
			result3 = '".$result3."', 
			resultado_final = '".$resultado_final."', 
			f1 = '".$f1."', 
			f2 = '".$f2."', 
			f3 = '".$f3."', 
			f4 = '".$f4."'
		WHERE id_coevaluacion_general = '".$id_coevaluacion_general."'";

		// Ejecuta la sentencia para `coevaluacion_1`
		mysqli_query($conexion, $sentencia_3);
	}

	ModificarProducto3($_POST['docente'], $_POST['carrera'], $_POST['result3'], $_POST['resultado_final'], $_POST['fortalezas'], $_POST['debilidades'], $_POST['compromiso'], $_POST['f1'],$_POST['f2'],$_POST['f3'],$_POST['f4'], $id_coevaluacion_general);

}else if ($coevaluacion === "GESTION DE SOMOS TUVN EN LOS DOCENTES"){
	function ModificarProducto4($docente, $carrera,$actividad , $result4 ,$result5 , $resultado_final, $fortalezas, $debilidades, $h1,$i1,$i2,$i3,$i4,$id_coevaluacion_general)
	{
		include 'conexion.php';
		$sentencia_general = "UPDATE coevaluacion_general 
		SET 
			docente = '".$docente."', 
			carrera = '".$carrera."',
			fortalezas = '".$fortalezas."', 
			debilidades = '".$debilidades."'
		WHERE id = '".$id_coevaluacion_general."'";

		mysqli_query($conexion, $sentencia_general);

		$sentencia_3 = "UPDATE coevaluacion4 
		SET 
			result4 = '".$result4."', 
			result5 = '".$result5."',
			actividad = '".$actividad."',   
			resultado_final = '".$resultado_final."', 
			h1 = '".$h1."', 
			i1 = '".$i1."', 
			i2 = '".$i2."', 
			i3 = '".$i3."', 
			i4 = '".$i4."'
		WHERE id_coevaluacion_general = '".$id_coevaluacion_general."'";

		// Ejecuta la sentencia para `coevaluacion_1`
		mysqli_query($conexion, $sentencia_3);
	}

	ModificarProducto4($_POST['docente'], $_POST['carrera'], $_POST['actividad'] ,$_POST['result4'], $_POST['result5'], $_POST['resultado_final'], $_POST['fortalezas'], $_POST['debilidades'], $_POST['h1'],$_POST['i1'],$_POST['i2'],$_POST['i3'],$_POST['i4'], $id_coevaluacion_general);
}

?>

<script type="text/javascript">
	alert("Ficha Actualizada exitosamente!!!");
	window.location.href='convertidor.php';
</script>
