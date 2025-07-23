<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require('conexion.php');

    if ($mysqli->connect_error) {
        echo json_encode(array('error' => true, 'message' => 'No se pudo conectar a la base de datos.'));
        exit(); // Detiene la ejecución si no hay conexión
    }

    sleep(2); // Deliberate delay to prevent brute force attacks
    session_start();

    $mysqli->set_charset('utf8');

    // Sanitización de entradas
    $usu = trim($_POST['usuariolg']);
    $pass = trim($_POST['passlg']);

    // Verificar que las variables no estén vacías
    if (!empty($usu) && !empty($pass)) {
        if ($nueva_consulta = $mysqli->prepare("SELECT id, usuario, nombre, tipo, newclave FROM login WHERE usuario = ? AND clave = BINARY ?")) {
            $nueva_consulta->bind_param('ss', $usu, $pass);
            $nueva_consulta->execute();
            $resultado = $nueva_consulta->get_result();

            if ($resultado->num_rows === 1) {
                $datos = $resultado->fetch_assoc();
                $_SESSION['usu'] = $datos;
                echo json_encode(array('error' => false, 'tipo' => $datos['tipo']));
            } else {
                echo json_encode(array('error' => true, 'message' => 'Credenciales incorrectas.'));
            }
            $nueva_consulta->close();
        } else {
            echo json_encode(array('error' => true, 'message' => 'Error en la consulta a la base de datos.'));
        }
    } else {
        echo json_encode(array('error' => true, 'message' => 'Por favor, ingresa usuario y contraseña.'));
    }
}

$mysqli->close();
