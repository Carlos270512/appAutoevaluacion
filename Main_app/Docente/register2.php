<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
        $codigo = $_POST['codigo'];
        $docente = $_POST['docente'];

        $error = '';
        
        if (empty($codigo) or empty($docente)){
            
            $error .= '<h4><b>x) Error, campos vacíos</b></h4>';
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=desaroll_appautoevaluacionbd', 'desaroll_appUsuario', '=v=J7WL@V8zT');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            
            $statement = $conexion->prepare('SELECT * FROM docentes WHERE docente = :docente LIMIT 1');
            $statement->execute(array(':docente' => $docente));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<h4><b>x) Este docente ya está registrado</b></h4>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO docentes (codigo, docente) VALUES (:codigo, :docente)');
            $statement->execute(array(
                
               
                ':codigo' => $codigo,
                ':docente' => $docente
                
            ));
            
            $error .= '<h4 style="color: green;"><b>✓) Docente registrado exitosamente</b></h4>';
        }
    }


    require 'frontend/register2-vista.php';

?>