<?php 
session_start();
if(isset($_SESSION['usu'])){
if($_SESSION['usu']['tipo'] != "Administrador"){ 
  if($_SESSION['usu']['tipo'] == "Coordinador"){
    header('Location:../Coordinador/');
  }else if($_SESSION['usu']['tipo'] == "Docente"){
    header('Location:../Docente/');
  }
}
} else {
  header('Location:../../');
}
	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM carreras WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>