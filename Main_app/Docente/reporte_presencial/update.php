<?php
include_once 'conexion2.php';

  if(isset($_GET['id'])){
    $id=(int) $_GET['id'];

    $buscar_id=$con->prepare('SELECT recomendacion FROM coevaluacion_general WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
      ':id'=>$id
    ));
    $resultado=$buscar_id->fetch();
  }else{
    header('Location: convertidor.php');
  }


  if(isset($_POST['guardar'])){
    $recomendacion=$_POST['recomendacion'];
    $error = '';
    $id=(int) $_GET['id'];

    
    if ($error == ''){
      
       $consulta_update=$con->prepare(' UPDATE coevaluacion_general SET  
          recomendacion=:recomendacion
          WHERE id=:id;'
        );
        $consulta_update->execute(array(
          ':recomendacion' =>$recomendacion,
          ':id' =>$id
        ));

        $error .= '<h4 style="color: green;"><b>✓ Datos enviados correctamente</b></h4>';


        
    }
  }
  require 'update-vista.php';
?>