<?php
$host = 'localhost';
$dbname = 'desaroll_appautoevaluacionbd';
$user = 'desaroll_appUsuario';
$password = '=v=J7WL@V8zT';

// Crear la conexión
$mysqli = new mysqli($host, $user, $password, $dbname);

// Verificar si hay error de conexión
if ($mysqli->connect_error) {
    die('Error: No se pudo conectar a la base de datos. ' . $mysqli->connect_error);
}

// Establecer el conjunto de caracteres
$mysqli->set_charset("utf8mb4");
?>



