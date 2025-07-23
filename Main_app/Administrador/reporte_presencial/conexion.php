<?php

// Establecer conexi贸n
$conexion = mysqli_connect(
    'localhost',           // Host
    'desaroll_appUsuario', // Usuario
    '=v=J7WL@V8zT',        // Contrase帽a
    'desaroll_appautoevaluacionbd' // Base de datos
);

if (!$conexion) {
    die('Error: No se pudo conectar a la base de datos. ' . mysqli_connect_error());
}

// Configuraci贸n opcional para garantizar compatibilidad con UTF-8
mysqli_set_charset($conexion, 'utf8mb4');

?>


