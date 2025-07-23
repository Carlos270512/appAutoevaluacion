<?php
// Conexión a la base de datos
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $docente = $_GET['text'];


    // Consulta para obtener el archivo PDF desde la base de datos
    $query = "SELECT archivopdf FROM coevaluacion_general WHERE id_coordinador = ? AND docente = ? AND coevaluacion='GESTION DE SOMOS TUVN EN LOS DOCENTES'";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("is", $id,$docente);
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
        echo "<script>location.href='../reporte_presencial/somoTuvn.php'</script>";
    }

    $stmt->close();
} else {
    echo "ID no proporcionado.";
}

$conexion->close();
