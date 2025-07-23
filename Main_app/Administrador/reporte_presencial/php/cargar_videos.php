<?php 
require_once 'conexion.php';

function getVideos(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT * FROM `carreras` WHERE id_lista = $id ORDER BY nombre ASC";
  $result = $mysqli->query($query);
  $videos = '<option value="">ELIGE UNA OPCIÓN</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $videos .= "<option value='$row[nombre]'>$row[nombre]</option>";
  }
  return $videos;
}

echo getVideos();
