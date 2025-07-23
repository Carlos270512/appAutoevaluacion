<?php
// Conexión a la base de datos
include 'conexion.php';

if (isset($_FILES['file_pdf']) && isset($_POST['id'])) {
    $pdf = file_get_contents($_FILES['file_pdf']['tmp_name']);
    $id = $_POST['id'];

    // Verifica que el archivo se haya leído correctamente
    if ($pdf === false) {
        echo "Error al leer el archivo PDF.";
        exit;
    }

    // Consulta para actualizar el archivo en la base de datos
    $query = "UPDATE coevaluacion_general SET archivopdf = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);

    if (!$stmt) {
        echo "Error en la preparación de la consulta: " . $conexion->error;
        exit;
    }

    // Asigna los parámetros: "b" indica que el archivo PDF es binario, "i" indica entero para el ID
    $stmt->bind_param("si", $pdf, $id); // Aquí "si" se usa porque $pdf es binario (string) y $id es entero (integer)

    // Ejecuta la consulta y verifica si se ejecutó correctamente
    if ($stmt->execute()) {
        echo '<center><script>alert("El PDF se carago exitosamente")</script></center>';
        echo "<script>location.href='../../Coordinador/reporte_presencial/convertidor1.php'</script>";
    } else {
        echo "Error al cargar el archivo PDF: " . $stmt->error;
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "No se recibió el archivo o el ID.";
}

// Cierra la conexión
$conexion->close();
