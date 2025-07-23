<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
        $tipo_usuario = 2;
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
		$tipo = $_POST['tipo'];

        $error = '';
        
        if (empty($usuario) or empty($clave) or empty($clave2)  or empty($tipo)){
            
            $error .= '<h4><b>x) Error, campos vacíos</b></h4>';
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
                $error .= '<h4><b>x) Este usuario ya existe</b></h4>';
            }
            
            if ($clave != $clave2){
                $error .= '<h4><b>x) Las contraseñas no coinciden</b></h4>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (usuario, clave, tipo) VALUES (:usuario, :clave, :tipo)');
            $statement->execute(array(
                
               
                ':usuario' => $usuario,
                ':clave' => $clave,
				':tipo' => $tipo
                
            ));
            
            $error .= '<h4 style="color: green;"><b>✓) Usuario registrado exitosamente</b></h4>';
        }
    }


    require 'frontend/register-vista.php';

?>