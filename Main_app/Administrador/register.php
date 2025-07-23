<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
        $tipo_usuario = 2;
        $usuario = $_POST['usuario'];
        $nombre= $_POST['nombre'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
		$tipo = $_POST['tipo'];
        $error = '';
        
        if (empty($usuario) or empty($clave) or empty($clave2)  or empty($tipo) or empty($nombre)){
            
            $error .= '<h4><b>X Error, campos vacíos</b></h4>';
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=desaroll_appautoevaluacionbd', 'desaroll_appUsuario', '=v=J7WL@V8zT');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<h4><b>X Este usuario ya está registrado</b></h4>';
            }
            
            if ($clave != $clave2){
                $error .= '<h4><b>X Las contraseñas no coinciden</b></h4>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (usuario, clave, nombre, tipo) VALUES (:usuario, :clave, :nombre, :tipo)');
            $statement->execute(array(
                
               
                ':usuario' => $usuario,
                ':clave' => $clave,
                ':nombre'=>$nombre,
				':tipo' => $tipo
                
            ));
            
            $error .= '<h4 style="color: green;"><b>✓ Usuario registrado exitosamente</b></h4>';
        }
    }


    require 'frontend/register-vista.php';

?>