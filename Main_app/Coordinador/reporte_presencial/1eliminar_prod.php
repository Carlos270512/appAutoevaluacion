<?php


	if(EliminarProducto($_GET['id'])){
		echo "correcto";
	}else{
		header('Location: ../../Coordinador/reporte_presencial/convertidor.php');
	}

	function EliminarProducto($id)
	{
		include "conexion.php";
		$sentencia="DELETE FROM coevaluacion_general WHERE id='".$id."' ";
		$conexion->query($sentencia) ;
		//or die ("Error al ingresar los datos ".mysqli_error($conexion));
			echo "BIEN";
	}
