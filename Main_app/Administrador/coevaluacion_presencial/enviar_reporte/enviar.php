<?php
$conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_ES.UTF-8');
if($conexion){
	echo"";
}else{
	echo"Error en la conexion";
}
// Configuración de conexión a la base de datos
$host = 'localhost';
$user = 'desaroll_appUsuario';
$password = '=v=J7WL@V8zT';
$database = 'desaroll_appautoevaluacionbd';

// Establecer conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error: No se pudo conectar a la base de datos. ' . $conexion->connect_error);
}

// Configuración de caracteres para compatibilidad con UTF-8
if (!$conexion->set_charset('utf8mb4')) {
    die('Error al configurar el conjunto de caracteres: ' . $conexion->error);
}

// Conexión establecida correctamente

$fechaactual=date("Y-m-d");
$tipo=$_POST['tipo'];
$coordinador=$_POST['coordinador'];
$docente=$_POST['docente'];
$carrera=$_POST['carrera'];
$coevaluacion=$_POST['coeval'];
$resultado_final=$_POST['resultado_final'];
$fortalezas=$_POST['fortalezas'];
$debilidades=$_POST['debilidades'];
$compromiso=$_POST['compromiso'];

$sqlvalidacion = "SELECT fecha
                  FROM coevaluacion_general
                  WHERE coevaluacion = ? AND docente = ? AND carrera = ?
                    AND MONTH(fecha) = MONTH(CURRENT_DATE())
                    AND YEAR(fecha) = YEAR(CURRENT_DATE())";

	if ($stmt = mysqli_prepare($conexion, $sqlvalidacion)) {
		// Vincular los parámetros
		mysqli_stmt_bind_param($stmt, "sss", $coevaluacion, $docente, $carrera);
		
		// Ejecutar la consulta
		mysqli_stmt_execute($stmt);
		
		// Obtener el resultado
		mysqli_stmt_store_result($stmt);
		
		if (mysqli_stmt_num_rows($stmt) > 0) {
			echo '<center><script>alert("Coevaluacion ya registrada con el docente y esa carrera en este mes")</script></center>';
			echo "<script>location.href='../../coevaluacion_presencial/index2.php'</script>";
		} else {
			if($coevaluacion === "GESTIÓN DE LOS COORDINADORES/DOCENTES"){

				$a1=$_POST['a1'];
				$a2=$_POST['a2'];
				$a3=$_POST['a3'];
				$a4=$_POST['a4'];
				$a5=$_POST['a5'];
				$a6=$_POST['a6'];
				$a7=$_POST['a7'];
				$a8=$_POST['a8'];
				$a9=$_POST['a9'];
				$res1=$_POST['result1'];
			
				// Inserta en la tabla coevaluacion_general
				$sql_general = "INSERT INTO coevaluacion_general(tipo, fecha, id_coordinador, docente,coevaluacion, carrera, fortalezas, debilidades, compromiso)
						VALUES('$tipo', '$fechaactual', '$coordinador','$docente','$coevaluacion', '$carrera', '$fortalezas', '$debilidades', '$compromiso')";
			
				if ($conexion->query($sql_general) === TRUE) {
					// Obtén el id generado en coevaluacion_general para usarlo en coevaluacion1
					$id_coevaluacion_general = $conexion->insert_id;
			
					// Inserta en la tabla coevaluacion1 usando el id de coevaluacion_general
					$sql_coevaluacion1 = "INSERT INTO coevaluacion1(id_coevaluacion_general, a1, a2, a3, a4, a5, a6, a7, a8, a9, result1, resultado_final)
							VALUES('$id_coevaluacion_general','$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$res1', '$resultado_final')";
			
					if ($conexion->query($sql_coevaluacion1) === TRUE) {
						echo '<center><script>alert("La información fue registrada exitosamente")</script></center>';
						echo "<script>location.href='../../coevaluacion_presencial/index2.php'</script>";
					} else {
						echo "Error en la consulta: " . $conexion->error;
					}
				} else {
					echo "Error al insertar en coevaluacion_general: " . $conexion->error;
				}
			
			}else if($coevaluacion === "GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS"){
			
			
				$aula=$_POST['aula'];
				$d1=$_POST['d1'];
				$d2=$_POST['d2'];
				$d3=$_POST['d3'];
				$d4=$_POST['d4'];
				$d5=$_POST['d5'];
				$d6=$_POST['d6'];
				$d7=$_POST['d7'];
				$d8=$_POST['d8'];
				$res2=$_POST['result2'];
			
				// Inserta en la tabla coevaluacion_general
				$sql_general = "INSERT INTO coevaluacion_general(tipo, fecha, id_coordinador, docente,coevaluacion, carrera, fortalezas, debilidades, compromiso)
						VALUES('$tipo', '$fechaactual', '$coordinador', '$docente','$coevaluacion', '$carrera', '$fortalezas', '$debilidades', '$compromiso')";
			
				if ($conexion->query($sql_general) === TRUE) {
					// Obtén el id generado en coevaluacion_general para usarlo en coevaluacion2
					$id_coevaluacion_general = $conexion->insert_id;
			
					// Inserta en la tabla coevaluacion2 usando el id de coevaluacion_general
					$sql_coevaluacion2 = "INSERT INTO coevaluacion2(id_coevaluacion_general,aula, d1, d2, d3, d4, d5, d6, d7, d8, result2, resultado_final)
							VALUES('$id_coevaluacion_general', '$aula', '$d1', '$d2', '$d3', '$d4', '$d5', '$d6', '$d7', '$d8', '$res2', '$resultado_final')";
			
					if ($conexion->query($sql_coevaluacion2) === TRUE) {
						echo '<center><script>alert("La información fue registrada exitosamente")</script></center>';
						echo "<script>location.href='../../coevaluacion_presencial/index2.php'</script>";
					} else {
						echo "Error en la consulta: " . $conexion->error;
					}
				} else {
					echo "Error al insertar en coevaluacion_general: " . $conexion->error;
				}
			
			}else if($coevaluacion === "RESPONSABLES DE PRÁCTICAS LABORALES"){
				$f1=$_POST['f1'];
				$f2=$_POST['f2'];
				$f3=$_POST['f3'];
				$f4=$_POST['f4'];
				$res3=$_POST['result3'];
			
				// Inserta en la tabla coevaluacion_general
				$sql_general = "INSERT INTO coevaluacion_general(tipo, fecha, id_coordinador, docente,coevaluacion, carrera, fortalezas, debilidades, compromiso)
						VALUES('$tipo', '$fechaactual', '$coordinador','$docente','$coevaluacion', '$carrera', '$fortalezas', '$debilidades', '$compromiso')";
			
				if ($conexion->query($sql_general) === TRUE) {
					// Obtén el id generado en coevaluacion_general para usarlo en coevaluacion3
					$id_coevaluacion_general = $conexion->insert_id;
			
					// Inserta en la tabla coevaluacion3 usando el id de coevaluacion_general
					$sql_coevaluacion3 = "INSERT INTO coevaluacion3(id_coevaluacion_general, f1, f2, f3, f4, result3, resultado_final)
							VALUES('$id_coevaluacion_general', '$f1', '$f2', '$f3', '$f4', '$res3', '$resultado_final')";
			
					if ($conexion->query($sql_coevaluacion3) === TRUE) {
						echo '<center><script>alert("La información fue registrada exitosamente")</script></center>';
						echo "<script>location.href='../../coevaluacion_presencial/index2.php'</script>";
					} else {
						echo "Error en la consulta: " . $conexion->error;
					}
				} else {
					echo "Error al insertar en coevaluacion_general: " . $conexion->error;
				}	
			}else if($coevaluacion == "GESTION DE SOMOS TUVN EN LOS DOCENTES"){
				
				$h1=$_POST['h1'];
				$i1=$_POST['i1'];
				$i2=$_POST['i2'];
				$i3=$_POST['i3'];
				$i4=$_POST['i4'];
				$res4=$_POST['result4'];
				$res5=$_POST['result5'];
			
				// Inserta en la tabla coevaluacion_general
				$sql_general = "INSERT INTO coevaluacion_general(tipo, fecha, id_coordinador, docente ,coevaluacion, carrera, fortalezas, debilidades)
						VALUES('$tipo', '$fechaactual', '$coordinador','$docente','$coevaluacion', '$carrera', '$fortalezas', '$debilidades')";
			
				if ($conexion->query($sql_general) === TRUE) {
					// Obtén el id generado en coevaluacion_general para usarlo en coevaluacion3
					$id_coevaluacion_general = $conexion->insert_id;
			
					// Inserta en la tabla coevaluacion3 usando el id de coevaluacion_general
					$sql_coevaluacion4 = "INSERT INTO coevaluacion4(id_coevaluacion_general, h1, result4, i1, i2, i3, i4, result5, resultado_final)
							VALUES('$id_coevaluacion_general', '$h1','$res4', '$i1', '$i2', '$i3','$i4', '$res5', '$resultado_final')";
			
					if ($conexion->query($sql_coevaluacion4) === TRUE) {
						echo '<center><script>alert("La información fue registrada exitosamente")</script></center>';
						echo "<script>location.href='../../coevaluacion_presencial/index2.php'</script>";
					} else {
						echo "Error en la consulta: " . $conexion->error;
					}
				} else {
					echo "Error al insertar en coevaluacion_general: " . $conexion->error;
				}
			}else{
				echo "Error al insertar en coevaluacion_general: " . $conexion->error;
			}
		}
	
		// Cerrar la declaración
		mysqli_stmt_close($stmt);
	} else {
		echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
	}


sleep(2)
?>
