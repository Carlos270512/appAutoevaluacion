<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];

        $error = '';
        
        if (empty($codigo) or empty($nombre)){
            
            $error .= '<h4><b>X Error, campos vacíos</b></h4>';
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=desaroll_appautoevaluacionbd', 'desaroll_appUsuario', '=v=J7WL@V8zT');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            
            $statement = $conexion->prepare('SELECT * FROM carreras WHERE codigo = :codigo LIMIT 1');
            $statement->execute(array(':codigo' => $codigo));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<h4><b>X Esta carrera ya está registrada</b></h4>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO carreras (codigo, nombre) VALUES (:codigo, :nombre)');
            $statement->execute(array(
                
               
                ':codigo' => $codigo,
                ':nombre' => $nombre
                
            ));
            
            $error .= '<h4 style="color: green;"><b>✓ Carrera registrada exitosamente</b></h4>';
        }
    }


    require 'frontend/register3-vista.php';

?>