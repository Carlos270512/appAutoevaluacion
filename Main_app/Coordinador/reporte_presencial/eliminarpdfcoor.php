<?php
// Conexión a la base de datos
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si el PDF existe en la base de datos para el registro
    $query_verificar = "SELECT archivopdf FROM coevaluacion_general WHERE id = ?";
    $stmt_verificar = $conexion->prepare($query_verificar);

    if (!$stmt_verificar) {
        echo "Error en la preparación de la consulta: " . $conexion->error;
        exit;
    }

    $stmt_verificar->bind_param("i", $id);
    $stmt_verificar->execute();
    $stmt_verificar->store_result();

    // Verifica si existe y tiene contenido en el campo archivopdf
    if ($stmt_verificar->num_rows > 0) {
        $stmt_verificar->bind_result($archivo_pdf);
        $stmt_verificar->fetch();

        if (!empty($archivo_pdf)) {
            // Si existe el PDF, procede a eliminarlo
            $query_eliminar = "UPDATE coevaluacion_general SET archivopdf = NULL WHERE id = ?";
            $stmt_eliminar = $conexion->prepare($query_eliminar);

            if (!$stmt_eliminar) {
                echo "Error en la preparación de la consulta: " . $conexion->error;
                exit;
            }

            $stmt_eliminar->bind_param("i", $id);

            if ($stmt_eliminar->execute()) {
                echo '<center><script>alert("Se eliminó el PDF exitosamente")</script></center>';
                echo "<script>location.href='somosTuvn1.php'</script>";
            } else {
                echo '<center><script>alert("Error al eliminar el PDF")</script></center>';
                echo "<script>location.href='somosTuvn1.php'</script>";
            }

            $stmt_eliminar->close();
        } else {
            echo '<center><script>alert("No se encuentra subido ningún PDF")</script></center>';
            echo "<script>location.href='convertidor.php'</script>";
        }
    } else {
        echo '<center><script>alert("No se encuentra el registro")</script></center>';
        echo "<script>location.href='convertidor.php'</script>";
    }

    $stmt_verificar->close();
} else {
    echo "No se recibió el ID.";
}

// Cierra la conexión
$conexion->close();
?>

