<?php
include('conexion.php');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegúrate de que el ID sea un entero

    // Obtener la ruta del archivo
    $stmt = $conexion->prepare("SELECT ruta FROM pdfs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $file = $result->fetch_assoc();

    if ($file) {
        $ruta = realpath($file['ruta']); // Normaliza la ruta del archivo
        if ($ruta && file_exists($ruta)) {
            if (unlink($ruta)) { // Elimina el archivo del servidor
                // Elimina el registro de la base de datos
                $stmt = $conexion->prepare("DELETE FROM pdfs WHERE id = ?");
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    echo '<script>alert("El PDF se eliminó correctamente.");</script>';
                    echo "<script>location.href='../../Coordinador/reporte_presencial/pdfSubida1.php'</script>";
                } else {
                    echo '<script>alert("Error al eliminar el registro de la base de datos: ' . $stmt->error . '");</script>';
                }
            } else {
                echo '<script>alert("Error al eliminar el archivo del servidor.");</script>';
            }
        } else {
            echo '<script>alert("El archivo no existe en el servidor.");</script>';
        }
    } else {
        echo '<script>alert("No se encontró el archivo en la base de datos.");</script>';
    }
} else {
    echo '<script>alert("Solicitud no válida.");</script>';
}
