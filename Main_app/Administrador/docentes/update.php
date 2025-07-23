<?php
include_once 'conexion.php';

  if(isset($_GET['id'])){
    $id=(int) $_GET['id'];

    $buscar_id=$con->prepare('SELECT * FROM login WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
      ':id'=>$id
    ));
    $resultado=$buscar_id->fetch();
  }else{
    header('Location: index.php');
  }


  if(isset($_POST['guardar'])){
    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $clave=$_POST['clave'];
    $clave2=$_POST['clave2'];
    $error = '';
    $id=(int) $_GET['id'];
    
    if ($clave != $clave2){
      $error .= '<h4><b>X Las contraseñas no coinciden</b></h4>';
      }else if ($error == ''){
      
       $consulta_update=$con->prepare(' UPDATE login SET  
          usuario=:usuario, clave=:clave, newclave=null, nombre=:nombre
          WHERE id=:id;'
        );
        $consulta_update->execute(array(
          ':usuario' =>$usuario,
          ':clave'=>$clave,
          ':nombre'=>$nombre,
          ':id' =>$id
        ));

        $error .= '<h4 style="color: green;"><b>✓ Datos actualizados correctamente</b></h4>';


        
    }
  }
  require 'update-vista.php';
?>