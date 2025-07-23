<?php
// Conexión a la base de datos
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   

    // Consulta para obtener el archivo PDF desde la base de datos
    $query = "SELECT archivopdf FROM coevaluacion_general WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($archivopdf);
    $stmt->fetch();

    if ($archivopdf) {
        // Define los encabezados para que se descargue el PDF
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=coevaluacion.pdf");
        echo $archivopdf;
    } else {
        echo '<center><script>alert("No se encuentra subido ningún PDF")</script></center>';
        echo "<script>location.href='convertidor.php'</script>";
    }

    $stmt->close();
} else {
    echo "ID no proporcionado.";
}

$conexion->close();
?>
