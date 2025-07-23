<?php
include_once 'conexion.php';

  if(isset($_GET['id'])){
    $id=(int) $_GET['id'];

    $buscar_id=$con->prepare('SELECT * FROM carreras WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
      ':id'=>$id
    ));
    $resultado=$buscar_id->fetch();
  }else{
    header('Location: index.php');
  }


  if(isset($_POST['guardar'])){
    $codigo=$_POST['codigo'];
    $nombre=$_POST['nombre'];
    $error = '';
    $id=(int) $_GET['id'];
          
   
    if ($error == ''){
      
       $consulta_update=$con->prepare(' UPDATE carreras SET  
          codigo=:codigo, nombre=:nombre
          WHERE id=:id;'
        );
        $consulta_update->execute(array(
          ':codigo' =>$codigo,
          ':nombre'=>$nombre,
          ':id' =>$id
        ));

        $error .= '<h4 style="color: green;"><b>✓ Datos actualizados correctamente</b></h4>';


        
    }
  }
  require 'update-vista.php';
?>