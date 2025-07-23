<?php
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

// Configurar caracteres para UTF-8
if (!$conexion->set_charset('utf8mb4')) {
    die('Error al configurar el conjunto de caracteres: ' . $conexion->error);
}
?>
