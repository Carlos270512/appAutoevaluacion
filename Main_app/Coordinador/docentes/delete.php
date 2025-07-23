<?php 

	
	session_start();
if(isset($_SESSION['usu'])){
if($_SESSION['usu']['tipo'] != "Admin"){ 
header('Location:../Usuario/');
  }
} else {
	 header('Location: ../../../');//Aqui lo redireccionas al lugar que quieras.
}
	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM docentes WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>