<?php
require('conexion2.php');

$consultaBusqueda = $_POST['valorBusqueda'];

if (isset($consultaBusqueda)) {

	$consulta = mysqli_query($conexion, "SELECT nombre FROM login
	WHERE usuario LIKE '%$consultaBusqueda%' and tipo LIKE 'Docente'");

	$filas = mysqli_fetch_array($consulta);
    $nombre=$filas['nombre'];

	if ($filas == 0) {
		echo '<input type="" readonly="" style="position: absolute; left: 500px; top: 76px;font-size: 11px;z-index:8;" name="docente" class="texto" required=""  value="ÉSTE CÓDIGO NO EXISTE">';
	} else {
		
		?>
			<input style='position: absolute; left: 500px; top: 76px;font-size: 11px;z-index:8;' value="<?php echo $nombre?>" readonly='' name='docente' class='texto' required=''>
	<?php
	}; 

};

?>