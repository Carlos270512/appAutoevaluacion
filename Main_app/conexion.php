<?php
// Configuraci��n de conexi��n a la base de datos
$host = 'localhost';
$user = 'desaroll_appUsuario';
$password = '=v=J7WL@V8zT';
$database = 'desaroll_appautoevaluacionbd';

// Establecer conexi��n
$mysqli = new mysqli($host, $user, $password, $database);

// Verificar la conexi��n
if ($mysqli->connect_error) {
    die('Error: No se pudo conectar a la base de datos. ' . $mysqli->connect_error);
}

// Configuraci��n de caracteres para compatibilidad con UTF-8
if (!$mysqli->set_charset('utf8mb4')) {
    die('Error al configurar el conjunto de caracteres: ' . $mysqli->error);
}

// Conexi��n establecida correctamente
?>


