<?php
require('conexion2.php');

$consultaBusqueda = $_POST['valorBusqueda'];

if (isset($consultaBusqueda)) {
    // Escapar la entrada para evitar inyección SQL
    $consultaBusqueda = mysqli_real_escape_string($conexion, $consultaBusqueda);

    $consulta = mysqli_query($conexion, "SELECT nombre FROM login WHERE usuario LIKE '$consultaBusqueda'");

    if ($consulta && mysqli_num_rows($consulta) > 0) {
        // Si hay resultados, obtener el nombre
        $filas = mysqli_fetch_array($consulta);
        $nombre = $filas['nombre'];
?>
        <div style="width: 480px; height: 80px; margin-top: -50px; padding: 20px; margin-left: 32px;">
            <input name="docente" type="" class="texto" required="" readonly="" style="width: 250px; height: 30px;" value="<?php echo $nombre; ?>">
        </div>

<?php
    } else {
        // Si no hay resultados
        echo '<div style="width: 480px; height: 80px; margin-top: -50px; padding: 20px; margin-left: 32px;">
            <input name="docente" type="" class="texto" required="" readonly="" style="width: 250px; height: 30px;" required="" value="ÉSTE CÓDIGO NO EXISTE">
        </div>';
    }
}
?>