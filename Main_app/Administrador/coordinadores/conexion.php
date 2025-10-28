<?php
$host = 'localhost';
$dbname = 'desaroll_appautoevaluacionbd';
$user = 'desaroll_appUsuario';
$password = '=v=J7WL@V8zT';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error: No se pudo conectar a la base de datos. ' . $e->getMessage());
}
?>